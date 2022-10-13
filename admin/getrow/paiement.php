<script>
    function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'operation/commande_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.paiement').val(response.CodePaiement);
      $('#edit_commande').val(response.CodeTransaction);
      $('.fullname').html(response.CodeTransaction);
    }
  });
}
</script>