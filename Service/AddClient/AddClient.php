<?php
include '../../include/db.php';

$nazwa_firmy = $pakiet_id = $imie = $nazwisko = $email = $telefon = '';
$errors = array();
$opiekunowie = array();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dodaj klienta</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>
<body>
<?php include 'AddForm.html'; ?>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nazwa_firmy = $_POST['nazwa_firmy'];
    $pakiet_id = $_POST['pakiet_id'];
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $email = $_POST['email'];
    $telefon = $_POST['telefon'];
    $opiekunowie = $_POST['opiekunowie'];

    $query = "SELECT * FROM klienci WHERE nazwa_firmy = '$nazwa_firmy'";
    $result = mysqli_query($conn, $query);

    if (empty($nazwa_firmy) || empty($imie) || empty($nazwisko)) {
        $errors[] = "Pola 'Nazwa firmy', 'Imie' i 'Nazwisko' są wymagane.";
    }

    if (empty($email) || empty($telefon)) {
        $errors[] = "Pola 'E-mail' i 'Telefon' są obowiązkowe.";
    }

    if (empty($pakiet_id)) {
        $errors[] = "Pole 'Wybierz Pakiet' jest wymagane.";
    }

    if (empty($opiekunowie)) {
        $errors[] = "Przynajmniej один opiekun jest wymagany.";
    }

    if (mysqli_num_rows($result) > 0) {
        echo '<script>
            Swal.fire({
                icon: "error",
                title: "Błąd",
                text: "Firma o tej nazwie już istnieje w bazie danych."
            });
        </script>';
    } else {
        $insertQuery = "INSERT INTO klienci (nazwa_firmy, id_pakietu) VALUES ('$nazwa_firmy', '$pakiet_id')";

        if (mysqli_query($conn, $insertQuery)) {
            $lastInsertedID = mysqli_insert_id($conn);
            foreach ($opiekunowie as $opiekun_id) {
                $insertQueryOpiekunowie = "INSERT INTO klienci_opiekunowie (klient_id, opiekun_id) VALUES ('$lastInsertedID', '$opiekun_id')";
                if (!mysqli_query($conn, $insertQueryOpiekunowie)) {
                    echo "Błąd podczas dodawania klienta do tabeli klienci_opiekunowie: " . mysqli_error($conn);
                    exit;
                }
            }
            $insertQueryOsobyKontaktowe = "INSERT INTO osoby_kontaktowe (klient_id, imie, nazwisko, email, telefon) VALUES ('$lastInsertedID', '$imie', '$nazwisko', '$email', '$telefon')";
            if (mysqli_query($conn, $insertQueryOsobyKontaktowe)) {
                echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "Success",
                        text: "Klient został dodany do bazy danych."
                    }).then(function(result) {
                        if (result.isConfirmed) {
                            window.location.href = "../../index.php";
                        }
                    });
                </script>';
            } else {
                echo "Błąd podczas dodawania klienta: " . mysqli_error($conn);
            }
        } else {
            echo "Błąd podczas dodawania klienta: " . mysqli_error($conn);
        }
    }
}

function hasDuplicates($array) {
    return count($array) > count(array_unique($array));
}
?>
