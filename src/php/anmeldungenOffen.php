<!DOCTYPE html>
<html>
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
  $id = $pdo->lastInsertId();

?>
<head>
	<meta charset="utf-8">
	<title>Oldenburg Schwimmt</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div style="display:flex; flex-direction:column;justify-content:space-between;min-height:100vh;" class="content">
		<div class="container">
			<h1>Anmeldung erfolgreich!</h1>
			<p>Die Teilnahmegebühr beträgt für Erwachsene 15€ und für unter 18-Jährige 10€. Wenn sie ein T-Shirt gekauft haben, müssen sie dazu noch den Preis des T-Shirts in Höhe von 15€ mehr bezahlen.</p>
      <p><b>Betreff: </b>OLS <?php echo $id, " ", $name; ?></p>
      <p><b>Empfänger: </b>DRK Kreisverband Oldenburg e.V.</p>
      <p><b>IBAN: </b>DE89 2802 0050 1421 6576 00</p>
      <p><b>BIC: </b>OLBODEH2XXX</p>
    </div>

		<footer>
			<div class="container">
				<div class="pre-click">
					<p>&copy Copyright 2016 - 2017 Oldenburg Schwimmt</p>
					<button class="hider">Impressum</button>
				</div>
				<div class="impressum-hide hide">
					<ul>
						<li>Oldenburger Schwimmverein von 1902 e.V.</li>
						<ul>
							<li>Zypessenweg 16</li>
							<li>26133 Oldenburg</li>
						</ul>
						<li>Ansprechpartner: Bernd Leutbecher, Wasserwacht
							<ul>
								<li>Telefon: 01520 2795147</li>
							</ul>
						</li>
						<li>OSV-Telefon: +49 441 6835735</li>
						<li>Email: <a href="mailto:kontakt@oldenburg-schwimmt.de">kontakt@oldenburg-schwimmt.de</a></li>
						<li>WebMaster: <a href="mailto:kontakt@maltsbier.me">kontakt@maltsbier.me</a></li>
					</ul>
				</div>
			</div>
		</footer>
		<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
		<script src="js/custom.js"></script>
		<script src="js/ga.js"></script>
	</div>


</body>
</html>
