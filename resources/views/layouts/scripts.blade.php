<script src="plugins/jquery.dataTables.min.js" type="application/javascript"></script>
<script src="plugins/dataTables.bootstrap.min.js" type="application/javascript"></script>
<link href="plugins/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<script type="application/javascript">
    $(document).ready(function() {
        $('#lista').DataTable( {
            "language": {
                "url": "{{ asset('/js/Spanish.json') }}"
            }
        } );
    } );
</script>
