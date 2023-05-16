<link href="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.13.4/r-2.4.1/datatables.min.css" rel="stylesheet" />
<script src="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.13.4/r-2.4.1/datatables.min.js"></script>
<link href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/b-2.3.6/b-html5-2.3.6/b-print-2.3.6/r-2.4.1/datatables.min.css"
    rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script
    src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/b-2.3.6/b-html5-2.3.6/b-print-2.3.6/r-2.4.1/datatables.min.js">
</script>
@extends('extends.fontawesome')


<script>
    $(document).ready(function() {
        $('#noticiasTable').DataTable({
            responsive: true,
            pageLength: 5,
            language: {
                search: "Buscar:",
            },
            "lengthChange": false
        });

        $('#alumnosTable').DataTable({
            responsive: true,
            searching: false,
            language: {
                search: "Buscar:",
            }
        });
        $('#sugerenciasTable').DataTable({
            responsive: true,
            searching: false,
            language: {
                search: "Buscar:",
            },
            dom: 'Bfrtilp',
            buttons: [{
                extend: 'excelHtml5',
                text: '<i class="fa-solid fa-file-excel" style="color: #ffffff;"></i>',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success'
            }, {
                extend: 'pdfHtml5',
                text: '<i class="fa-regular fa-file-pdf" style="color: #ffffff;"></i>',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger'
            }, {
                extend: 'print',
                text: '<i class="fa-solid fa-print" style="color: #ffffff;"></i>',
                titleAttr: 'Imprimir',
                className: 'btn btn-info'
            }, ]
        });

    });
</script>

<style>
    table th {
        background-color: red;
        color: white;
    }

    table>tbody>tr>td {
        vertical-align: middle !important;
    }

    .btn-group .btn-group-vertical {
        position: absolute !important;
    }
</style>
