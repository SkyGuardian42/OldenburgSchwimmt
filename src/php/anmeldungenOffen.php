<?php
  $hostname = "localhost";
  $database = "storage";
  $user = "root";
  $password = "ScrePaZ!234";
  $charset = "utf8";


  $name =  $_POST['name'];
  $email = $_POST['email'];
  $age = $_POST['age'];
  $tshirt = (int)isset($_POST['tshirt']);
  if($tshirt != '1'){
    $tshirt = '0';
  }
  $size = $_POST['size'];

  $dsn = "mysql:host=$hostname;dbname=storage;charset=$charset";
  $opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
  ];

  $pdo = new PDO($dsn, $user, $password, $opt);

  $stmt = $pdo->prepare("INSERT INTO `storage`.`users` (`name`, `email`, `age`, `tshirt`, `size`) VALUES (:name, :email, :age, :tshirt, :size)");
  $stmt->execute(array(':name' => $name, ':email' => $email, ':age' => $age, ':tshirt' => $tshirt, ':size' => $size));


?>
