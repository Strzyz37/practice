<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dodawanie rekordu do bazy</h5>
      </div>
      <div class="modal-body">
        <form id="myForm" method="post" action="JESZCZE NIE WIEM">
          <label for="name">Imię:</label>
          <input type="text" name="name" id="first_nameDT" value="" /></br>
          <label for="nazwisko">Nazwisko:</label>
          <input type="text" name="nazwisko" id="surnameDT" value="" /></br>
          <label for="email">E-mail:</label>
          <input type="email" name="email" id="emailDT" value="" />
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cleanAdd()">Zamknij</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="addDT()">Zapisz</button>
      </div>
    </div>
  </div>
</div>
<script>
function addDT()
{
  var first_name = $('#first_nameDT').val();
  var surname = $('#surnameDT').val();
  var email = $('#emailDT').val();

    jQuery.ajax({
    type: "POST",
    url: "<?=site_url('User/addDT');?>",
    dataType: 'json',
    data: {first_name: first_name, surname: surname, email: email},
    success: function(response)
      {
      },
    });
  $('#users').DataTable().ajax.reload();
  cleanAdd();
}
function cleanAdd()
{
  $('#first_nameDT').val('');
  $('#surnameDT').val('');
  $('#emailDT').val('');

}
</script>
