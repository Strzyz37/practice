<div class="modal fade" id="addModalEditor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dodawanie rekordu do bazy</h5>
      </div>
      <div class="modal-body">
        <form id="myForm" method="post" action="JESZCZE NIE WIEM">
          <label for="name">Imię:</label>
          <input type="text" name="name" id="first_nameEDT" value="" /></br>
          <label for="nazwisko">Nazwisko:</label>
          <input type="text" name="nazwisko" id="surnameEDT" value="" /></br>
          <label for="stanowisko">Stanowisko</label>
          <select name="stanowisko" id="positionEDT"></br>
            <option value="dyrektor">dyrektor</option>
            <option value="malarz">malarz</option>
            <option value="kierowca">kierowca</option>
            <option value="piekarz">piekarz</option>
            <option value="doktor">doktor</option>
            <option value="marynarz">marynarz</option>
          </select></br>
          <label for="data_rozpoczecia">Data rozpoczecia</label>
          <input type="date" name="data_rozpoczecia" id="startupEDT" value=''/></br>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cleanEDT()">Zamknij</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="addEDT()">Zapisz</button>
      </div>
    </div>
  </div>
</div>
<script>
function addEDT()
{
  var first_name = $('#first_nameEDT').val();
  var surname = $('#surnameEDT').val();
  var position = $('#positionEDT').val();
  var startup = $('#startupEDT').val();
  jQuery.ajax(
    {
        type: "POST",
        url: "<?=site_url('User/addEDT');?>",
        dataType: 'json',
        data: {first_name: first_name, surname: surname, position: position, startup: startup},
        error: function(req, status, error)
        {

        }
      });
    $('#edit').DataTable().ajax.reload();
    cleanEDT();
}
function cleanEDT()
{
  $('#first_nameEDT').val('');
  $('#surnameEDT').val('');
  $('#positionEDT').val('');
  $('#startupEDT').val('');
}
</script>
