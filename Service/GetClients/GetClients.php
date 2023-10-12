<?php
include "../../include/db.php";

$sql = "SELECT 
            k.klient_id, 
            k.nazwa_firmy, 
            pa.nazwa_pakietu, 
            GROUP_CONCAT(DISTINCT CONCAT(p.imie, ' ', p.nazwisko) SEPARATOR ', ') AS opiekun,
            GROUP_CONCAT(DISTINCT CONCAT(o.imie, ' ', o.nazwisko) SEPARATOR ', ') AS kontakt
          FROM klienci k
          LEFT JOIN klienci_opiekunowie ko ON k.klient_id = ko.klient_id
          LEFT JOIN pracownicy p ON ko.opiekun_id = p.pracownik_id
          LEFT JOIN pakiety pa ON k.id_pakietu = pa.pakiet_id
          LEFT JOIN osoby_kontaktowe o ON k.klient_id = o.klient_id
          GROUP BY k.klient_id, k.nazwa_firmy, pa.nazwa_pakietu";

$result = mysqli_query($conn, $sql);
$data = array();

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode(['data' => $data]);

mysqli_close($conn);
?>
