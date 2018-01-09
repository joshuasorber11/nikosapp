<?php
$dsn = 'mysql:dbname=malicious;host=localhost';
$user = 'root';
$password = 'PASSWORD';
try {
    $odb = new PDO($dsn, $user, $password);
    $odb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}


?>
