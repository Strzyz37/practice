<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edycja rekordu</h5>
      </div>
      <div class="modal-body">
        <form id="myForm" method="post" action="JESZCZE NIE WIEM">
          <input type="hidden" name="id" id="editId" value="" />
          <label for="name">Imię:</label>
          <input type="text" name="name" id="editFirst_name" value="" /></br>
          <label for="nazwisko">Nazwisko:</label>
          <input type="text" name="nazwisko" id="editSurname" value="" /></br>
          <label for="email">E-mail:</label>
          <input type="email" name="email" id="editEmail" value="" />
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="clean()" >Zamknij</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="updateDT()">Zapisz</button>
      </div>
    </div>
  </div>
</div>
<script>
function updateDT()
{
      var id = $("#editId").val();
      var first_name = $("#editFirst_name").val();
      var surname =$("#editSurname").val();
      var email =$("#editEmail").val();
      jQuery.ajax({
      type: "POST",
      url: "<?=site_url('User/updateDT');?>",
      dataType: 'json',
      data: {id: id, first_name: first_name, surname: surname, email: email},
      });
      $('#users').DataTable().ajax.reload();
      $('#editModal').modal('hide')

}
</script>
