<?php
include "../../include/db.php";
include "Functions.php";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $client_id = $_GET['id'];

    $client_info = getClientInfo($conn, $client_id);

    if (!$client_info) {
        die('Klient o podanym ID nie istnieje.');
    }

    $opiekun_result = getOpiekunowie($conn, $client_id);
} else {
    die('Nieprawidłowe ID klienta.');
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Informacje o kliencie</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
</head>
<body>
<h2>Informacje o kliencie</h2>
<table class="table">
    <tr>
        <th>ID klienta</th>
        <td><?php echo $client_info['klient_id']; ?></td>
    </tr>
    <tr>
        <th>Nazwa firmy</th>
        <td><?php echo $client_info['nazwa_firmy']; ?></td>
    </tr>
    <tr>
        <th>Nazwa pakietu</th>
        <td><?php echo $client_info['nazwa_pakietu']; ?></td>
    </tr>
    <tr>
        <th>Osoby kontaktowe</th>
        <td><?php echo $client_info['osoby_kontaktowe']; ?></td>
    </tr>
    <tr>
        <th>Opiekunowie</th>
        <td>
            <?php
                while ($opiekun_row = mysqli_fetch_assoc($opiekun_result)) {
                    echo $opiekun_row['imie'] . ' ' . $opiekun_row['nazwisko'] . '<br>';
                }
            ?>
        </td>
    </tr>
</table>
<a href="../../index.php">Powrót</a>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="../../assets/js/bootstrap.min.js"></script>
</body>
</html>
