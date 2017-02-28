<html>

<head>
  <title>Hallo</title>
</head>
<body>
<?php
$hostname = "localhost";
$username = "root";
$password = "ScrePaZ!234";

try {
    $dbh = new PDO("mysql:host='localhost';dbname='storage'", 'root', 'ScrePaZ!234');
    echo "Connected to database"; // check for connection
    }
catch(PDOException $e)
    {
    echo "nee";
    }
?>
</body>
</html>
