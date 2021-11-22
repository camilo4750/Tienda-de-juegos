$(document).ready(function() {
    $('#example').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5', 'excelHtml5', 'pdfHtml5', 'csvHtml5'
        ]
    });
});