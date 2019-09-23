<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Laravel 5.7 First Ajax CRUD Application - Tutsmake.com</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
	<script src="{{ asset('js/librerias/jquery-3.4.1.js') }}"></script>
	<script src="{{ asset('js/librerias/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/librerias/jquery.validate.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
 <style>
   .container{
    padding: 0.5%;
   }
</style>
</head>
<body>

<div class="container">
    <h2 style="margin-top: 12px;" class="alert alert-dark">Lista Servicios</h2><br>
    <div class="row">
        <div class="col-12">
          <a href="javascript:void(0)" class="btn btn-success mb-2" id="create-new-servicio">Agregar Servicio</a>
          <a href="https://www.tutsmake.com/jquery-submit-form-ajax-php-laravel-5-7-without-page-load/" class="btn btn-secondary mb-2 float-right">Back to Post</a>
          <table class="table table-bordered" id="laravel_crud">
           <thead>
              <tr>
                 <th>Id</th>
                 <th>Servicio</th>
                 <td colspan="2">Acción</td>
              </tr>
           </thead>
           <tbody id="users-crud">
              @foreach($data['servicios'] as $servicio)
              <tr id="user_id_{{ $servicio->id }}">
                 <td>{{ $servicio->id_servicio  }}</td>
                 <td>{{ $servicio->nombre_servicio }}</td>
                 <td><a href="javascript:void(0)" id="edit-user" data-id="{{ $servicio->id_servicio }}" class="btn btn-info">Editar</a></td>
                 <td>
                  <a href="javascript:void(0)" id="delete-user" data-id="{{ $servicio->id_servicio }}" class="btn btn-danger delete-user">Eliminar</a></td>
              </tr>
              @endforeach
           </tbody>
          </table>
          {{ $data['servicios']->links() }}
       </div>
    </div>
</div>
<div class="modal fade" id="ajax-crud-modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="userCrudModal"></h4>
        </div>
        <div class="modal-body">
            <form id="userForm" name="userForm" class="form-horizontal">
               <input type="hidden" name="id_servicio" id="id_servicio">
                <div class="form-group">
                    <label for="name" class="col-sm-4 control-label">Nombre Servicio</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="name" name="nombre_servicio" placeholder="Ingrese el Servicio" value="" maxlength="50" required="">
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btn-save" value="create-user">Guardar Cambios
            </button>
        </div>
    </div>
  </div>
</div>


</body>

</html>
<script>
  $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    /*  When user click add user button */
    $('#create-new-servicio').click(function () {
        $('#btn-save').val("create-user");
        $('#userForm').trigger("reset");
        $('#userCrudModal').html("Agregar Nuevo Servicio");
        $('#ajax-crud-modal').modal('show');
    });

    $("#btn-save").on('click', function(){
    	var actionType = $('#btn-save').val();
    	$('#btn-save').html('Sending..');
	      $.ajax({
	          data: $('#userForm').serialize(),
	          url: `{{ route('serviciosSave')}}`,
	          type: "POST",
	          dataType: 'json',
	          success: function (data) {

	              var user = '<tr id="user_id_' + data.id_servicio + '"><td>' + data.id_servicio + '</td><td>' + data.nombre_servicio + '</td>';
	              user += '<td><a href="javascript:void(0)" id="edit-user" data-id="' + data.id_servicio + '" class="btn btn-info">Editar</a></td>';
	              user += '<td><a href="javascript:void(0)" id="delete-user" data-id="' + data.id_servicio + '" class="btn btn-danger delete-user">Eliminar</a></td></tr>';

	              if (actionType == "create-user") {
	                  $('#users-crud').prepend(user);
	              } else if(actionType == "edit-user"){

	                  $("#user_id_" + data.id_servicio).replaceWith(user);
	                  $('#laravel_crud').empty();
	              }

	              $('#userForm').trigger("reset");
	              $('#ajax-crud-modal').modal('hide');
	              $('#btn-save').html('Save Changes');

	          },
	          error: function (data) {
	              console.log('Error:', data);
	              $('#btn-save').html('Save Changes');
	          }
	      });
    });
   /* When click edit user */
    $('body').on('click', '#edit-user', function () {
      let servicio_id = $(this).data('id');
	      $.ajax({
	          data: { servicio_id : servicio_id },
	          url: `{{ route('serviciosFormUpdate')}}`,
	          type: "GET",
	          dataType: 'json',
	          success: function (data) {
	          	$('#userCrudModal').html("Editar Servicio");
		          $('#btn-save').val("edit-user");
		          $('#ajax-crud-modal').modal('show');
		          $('#id_servicio').val(data.id_servicio);
		          $('#name').val(data.nombre_servicio);
	          },
	          error: function (data) {
	              console.log('Error:', data);
	              $('#btn-save').html('Save Changes');
	          }
	      });
   });

   //delete user login
    $('body').on('click', '.delete-user', function () {
        var user_id = $(this).data("id");
        confirm("Are You sure want to delete !");

        $.ajax({
            type: "DELETE",
            url: "{{ url('ajax-crud')}}"+'/'+user_id,
            success: function (data) {
                $("#user_id_" + user_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
  });


</script>