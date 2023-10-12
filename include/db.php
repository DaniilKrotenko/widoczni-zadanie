<?php
$host = 'localhost';
$port = '3306';
$username = 'root';
$password = 'root';
$database = 'widoczni';

$conn = mysqli_connect($host, $username, $password, $database, $port);

if (!$conn) {
    die('Błąd połączenia z bazą danych: ' . mysqli_connect_error());
}

mysqli_set_charset($conn, 'utf8');
?>
