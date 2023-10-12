<?php
function getClientInfo($conn, $client_id) {
    $client_sql = "SELECT k.klient_id, k.nazwa_firmy, p.nazwa_pakietu, GROUP_CONCAT(o.imie, ' ', o.nazwisko) AS osoby_kontaktowe
            FROM klienci k
            LEFT JOIN osoby_kontaktowe o ON k.klient_id = o.klient_id
            LEFT JOIN pakiety p ON k.id_pakietu = p.pakiet_id
            WHERE k.klient_id = $client_id
            GROUP BY k.klient_id";

    $client_result = mysqli_query($conn, $client_sql);

    return ($client_result && mysqli_num_rows($client_result) > 0) ? mysqli_fetch_assoc($client_result) : null;
}

function getOpiekunowie($conn, $client_id) {
    $opiekun_sql = "SELECT o.imie, o.nazwisko
            FROM klienci_opiekunowie ko
            LEFT JOIN pracownicy o ON ko.opiekun_id = o.pracownik_id
            WHERE ko.klient_id = $client_id";

    $opiekun_result = mysqli_query($conn, $opiekun_sql);

    return ($opiekun_result && mysqli_num_rows($opiekun_result) > 0) ? $opiekun_result : null;
}