<script>
var editor = new $.fn.dataTable.Editor( {
  ajax:  {
    "url": '<?=site_url('User/getEDT');?>'
  },
  table: '#edit',
  idSrc: 'id',
  fields:
  [
      { label: 'id', name: 'id' },
      { label: 'first_name',  name: 'first_name'  },
      { label: 'surname',  name: 'surname'  },
      { type: "select", label: 'position',  name: 'position'  },
      { label: 'startup',  name: 'startup',
              type:      'datetime',
              def:       function () { return new Date(); } }
  ]
} );

editor.field('position').update(
[
  'dyrektor', 'malarz', 'kierowca', 'piekarz', 'doktor', 'marynarz'
] );
//edycja inline
$('#edit').on( 'click', 'tbody td:not(:first-child)', function (e) {
editor.inline( this, {
  onBlur: 'submit'
});

editor.on( 'submitSuccess', function () {

  var id = editor.field( 'id' ).val();
  var first_name = editor.field( 'first_name' ).val();
  var surname= editor.field( 'surname' ).val();
  var position = editor.field( 'position' ).val();
  var startup = editor.field( 'startup' ).val();

  updateEDT (id,first_name,surname,position,startup);
} );




  } );
$('#edit').DataTable( {
ajax:
{
  "url": '<?=site_url('User/getEDT');?>'
},
  dom: 'Bfrtip',
  columns: [
      { data: 'id' },
      { data: 'first_name' },
      { data: 'surname' },
      { data: 'position' },
      { data: 'startup' }
  ],


  select: {
          style:    'os',
          selector: 'td:first-child'
          },
  buttons:
  [{
          text: 'Usun',
          editor: edit,
          action: function()
          {
             var id=editor.field( 'id').val()
            deleteEDT(id);
          }
    }]
} );



function updateEDT (id,first_name,surname,position,startup)
{

jQuery.ajax(
  {
    type: "POST",
    url: "<?=site_url('User/updateEDT/');?>",
    dataType: 'json',
    data: {id:id,first_name:first_name,surname:surname,position:position,startup:startup},
    success: function(response){
        $('#edit').DataTable().ajax.reload();
    },
    error: function(req, status, error)
    {
        $('#edit').DataTable().ajax.reload();
    }
  });

}


function deleteEDT(id)
{
jQuery.ajax(
{
  type: "POST",
  url: "<?=site_url('User/deleteEDT');?>",
  dataType: 'json',
  data: {id: id},
  success: function(response){
      $('#edit').DataTable().ajax.reload();
  },
  error: function(req, status, error)
    {
  $('#edit').DataTable().ajax.reload();
    }
});


}
</script>
