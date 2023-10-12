<?php
include '../../include/db.php';

$query = "SELECT * FROM pracownicy";
$result = mysqli_query($conn, $query);

if ($result) {
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode(['data' => $data]);
} else {
    echo json_encode([]);
}
?>
