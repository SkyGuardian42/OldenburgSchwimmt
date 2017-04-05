<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Oldenburg Schwimmt</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/skeleton.css">
	<link rel="stylesheet" href="css/style.min.css">
</head>
<body>
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
	<div style="display:flex; flex-direction:column;justify-content:space-between;min-height:100vh;" class="content">
		<div class="container">
			<h1>Anmeldung erfolgreich!</h1>
			<p>Erwachsene müssen 15 € und Jugendliche 10 € an folgende Adresse überweisen:</p>
			<p>Empfänger: <b>DRK Kreisverband Oldenburg</b></p>
			<p>IBAN: <b>DE89 2802 0050 1421 6576 00</b></p>
			<p>BIC: <b>OLBODEH2XXX</b></p>
			<p>Verwendungszweck: <b><?php echo "OS " . htmlspecialchars($name) . " " . $pdo->lastInsertId(); ?></b></p>

		</div>
		<div class="container">
			<footer>
        <p>&copy Copyright 2016 - 2017 Oldenburg Schwimmt</p>
        <button class="hider">Impressum</button>
      </footer>
      <div class="impressum-hide hide">
        <p>Oldenburger Schwimmverein von 1902 e.V.</p>
        <p>Zypessenweg 16</p>
        <p>26133 Oldenburg</p>
        <p>Ansprechpartner: Bernd Leutbecher, Wasserwacht</p>
        <p>Telefon: 01520 2795147</p>
        <p>OSV-Telefon: +49 441 6835735</p>
        <p>Email: <a href="mailto:kontakt@oldenburg-schwimmt.de">kontakt@oldenburg-schwimmt.de</a></p>
        <p>Webmaster: <a href="mailto:kontakt@maltsbier.me">kontakt@maltsbier.me</a></p>

        <script src="js/ga.js"></script>
      </div>
		</div>
	</div>


</body>
</html>
