<script>
    function getRow(id){
        $.ajax({
            type: 'POST',
            url: 'operation/publication_row.php',
            data: {id:id},
            dataType: 'json',
            success: function(response){
                $('.publication').val(response.CodePub);
                $('.fullname').html(response.Titre);
            }
        });
    }
</script>