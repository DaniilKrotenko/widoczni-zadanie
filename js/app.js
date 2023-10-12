$(document).ready(function () {
    function initializeDataTable(tableId, ajaxUrl, columns) {
        $('#' + tableId).DataTable({
            ajax: {
                url: ajaxUrl,
                dataSrc: "data"
            },
            columns: columns
        });
    }

    var klientColumns = [
        { data: 'klient_id' },
        { data: 'nazwa_firmy' },
        { data: 'nazwa_pakietu' },
        { data: 'kontakt' },
        {
            data: 'opiekun',
            render: function(data) {
                return data;
            }
        }
    ];

    var pracownicyColumns = [
        { data: 'pracownik_id' },
        { data: 'imie' },
        { data: 'nazwisko' },
        { data: 'stanowisko' },
        { data: 'email' },
        { data: 'telefon' }
    ];

    var pakietyColumns = [
        { data: 'pakiet_id' },
        { data: 'nazwa_pakietu' },
        { data: 'cena' }
    ];

    var kontaktyColumns = [
        { data: 'osoba_id' },
        { data: 'imie' },
        { data: 'nazwisko' },
        { data: 'email' },
        { data: 'telefon' }
    ];

    initializeDataTable('klienciTable', 'Service/GetClients/GetClients.php', klientColumns);
    initializeDataTable('pracownicyTable', 'Service/GetEmployees/GetPracownicy.php', pracownicyColumns);
    initializeDataTable('pakietyTable', 'Service/GetServices/GetPakiety.php', pakietyColumns);
    initializeDataTable('kontaktyTable', 'Service/GetContacts/GetKontakty.php', kontaktyColumns);
});
