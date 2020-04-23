<script>
var table = $('#users').DataTable(
  {
            "ajax":
              {
                "url": "<?=site_url('User/getDT');?>",
                "dataSrc": "usersData",
              },
        "columns":
          [
              {"data": "id"},
              {"data": "first_name"},
              {"data": "surname"},
              {"data": "email"},
              {"data": "modify_date"},
              {"defaultContent": "<button>Usun</button>" },
              {"defaultContent": "<button>Edytuj</button>"}

          ] ,
          "columnDefs":
         [
            {targets: 5, "render": function ( data, type, full, meta )
            {
              return "<button id='delete' data-id='"+data+"'>Usun</button>"
            }},
            {targets: 6, "render": function ( data, type, full, meta )
            {
              return "<button id='takedata' data-id='"+data+"'>Edytuj</button>"
            }}
          ]
    } );
  //pobiera dane z tabeli i odswieza ja po usunieciu
  $('#users tbody').on( 'click', '#delete', function ()
      {
        var data = table.row( $(this).parents('tr') ).data();
        deleteDT(data['id']);
      } );
  //wyswietla modal i uzupelnia go danymi edytowanego uzytkownika
  $('#users tbody').on( 'click', '#takedata', function ()
    {
      var data = table.row( $(this).parents('tr') ).data();
      $('#editModal').modal('show')
      $("#editId").val(data['id']);
      $("#editFirst_name").val(data['first_name']);
      $("#editSurname").val(data['surname']);
      $("#editEmail").val(data['email']);
  } );
  function deleteDT(id)
  {
    jQuery.ajax({
    type: "POST",
    url: "<?=site_url('User/deleteDT');?>",
    dataType: 'json',
    data: {id: id},
    });
    $('#users').DataTable().ajax.reload();
  }

</script>
