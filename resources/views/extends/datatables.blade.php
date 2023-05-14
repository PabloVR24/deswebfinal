<link href="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.13.4/r-2.4.1/datatables.min.css" rel="stylesheet" />
<script src="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.13.4/r-2.4.1/datatables.min.js"></script>

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
    });
</script>
