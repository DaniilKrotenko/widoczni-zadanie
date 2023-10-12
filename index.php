<!DOCTYPE html>
<html>
<head>
    <title>Aplikacja CRM</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css"/>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-10 p-3">
                    <h1>Aplikacja CRM</h1>
                </div>
                <div class="col-2 p-4">
                    <a href="Service/AddClient/AddClient.php" class="btn btn-primary">Dodaj klienta</a>
                </div>
            </div>
            <div class="mb-5">
                <h2>Klienci</h2>
                <table id="klienciTable" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nazwa firmy klienta</th>
                        <th>Dane pakietu</th>
                        <th>Osoby kontaktowe</th>
                        <th>Opiekun</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Tabela zostanie wypełniona dynamicznie za pomocą DataTables -->
                    </tbody>
                </table>
            </div>

            <div class="mb-5">
                <h2>Pracownicy</h2>
                <table id="pracownicyTable" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imię</th>
                        <th>Nazwisko</th>
                        <th>Stanowisko</th>
                        <th>Email</th>
                        <th>Telefon</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Tabela zostanie wypełniona dynamicznie za pomocą DataTables -->
                    </tbody>
                </table>
            </div>

            <div class="mb-5">
                <h2>Pakiety</h2>
                <table id="pakietyTable" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nazwa pakietu</th>
                        <th>Cena</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Tabela zostanie wypełniona dynamicznie za pomocą DataTables -->
                    </tbody>
                </table>
            </div>

            <div class="mb-5">
                <h2>Dane Klientów</h2>
                <table id="kontaktyTable" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imię</th>
                        <th>Nazwisko</th>
                        <th>Email</th>
                        <th>Telefon</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Tabela zostanie wypełniona dynamicznie za pomocą DataTables -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<script src="js/app.js"></script>
</body>
</html>
