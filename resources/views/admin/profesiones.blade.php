<script src="{{ asset('js/librerias/jquery-3.4.1.js') }}"></script>
@extends('layouts.app')
@section('content')
 <style>
   .container{
    padding: 0.5%;
   }
</style>
<ul class="nav">
  <li class="nav-item">
    <a class="nav-link" href="{{ route('servicios')}}">Servicios</a>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('profesiones')}}">Profesiones</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Barrios</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#">Lista de Usuarios</a>
  </li>
</ul>
<div class="container">
    <h2 style="margin-top: 12px;" class="alert alert-dark">Lista Profesiones</h2><br>
    <div class="row">
        <div class="col-12">
          <a href="javascript:void(0)" class="btn btn-dark mb-2" id="create-new-profesion">Agregar Profesion</a>
          <table class="table table-bordered" id="laravel_crud">
           <thead>
              <tr>
                 <th>Id</th>
                 <th>Servicio</th>
                 <th>Profesion</th>
                 <td colspan="2">Acción</td>
              </tr>
           </thead>
           <tbody id="users-crud">
              @foreach($data['profesiones'] as $profesion)
              <tr id="user_id_{{ $profesion->id_profesion }}">
                 <td>{{ $profesion->id_profesion  }}</td>
              	 <td>{{ $profesion->servicio['nombre_servicio'] }}</td>
                 <td>{{ $profesion->nombre_profesion }}</td>
                 <td><a href="javascript:void(0)" id="edit-profesion" data-id="{{ $profesion->id_profesion }}" class="btn btn-dark">Editar</a></td>
                 <td>
                  <a href="javascript:void(0)" id="delete-user" data-id="{{ $profesion->id_profesion }}" class="btn btn-danger delete-user">Eliminar</a></td>
              </tr>
              @endforeach
           </tbody>
          </table>
          {{ $data['profesiones']->links() }}
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
            <form id="profesionForm" name="profesionForm" class="form-horizontal">
               <input type="hidden" name="id_profesion" id="id_profesion">
				<div class="form-group">
				  <label for="servicio" class="col-sm-4 control-label">Seleccione Servicio</label>
				  <select name="id_servicio" class="form-control">
				    <option selected="selected">Seleccione</option>
				    @foreach($data['servicios'] as $servicio)
				    	<option value="{{$servicio->id_servicio}}">{{$servicio->nombre_servicio}}</option>
				    @endforeach
				  </select>
				</div>
                <div class="form-group">
                    <label for="name" class="col-sm-4 control-label">Nombre Profesion</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="name" name="nombre_profesion" placeholder="Ingrese el Profesion" value="" maxlength="50" required="">
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btn-save" value="create-profesion">Guardar Cambios
            </button>
        </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    /*  When user click add user button */
    $('#create-new-profesion').click(function () {
        $('#btn-save').val("create-user");
        $('#profesionForm').trigger("reset");
        $('#userCrudModal').html("Agregar Nuevo Profesion");
        $('#ajax-crud-modal').modal('show');
    });

    $("#btn-save").on('click', function(){
    	var actionType = $('#btn-save').val();
    	$('#btn-save').html('Sending..');
	      $.ajax({
	          data: $('#profesionForm').serialize(),
	          url: `{{ route('profesionesSave')}}`,
	          type: "POST",
	          dataType: 'json',
	          success: function (data) {

	              var user = '<tr id="user_id_' + data.id_profesion + '"><td>' + data.id_profesion + '</td><td>' + data.nombre_profesion + '</td>';
	              user += '<td><a href="javascript:void(0)" id="edit-user" data-id="' + data.id_profesion + '" class="btn btn-dark">Editar</a></td>';
	              user += '<td><a href="javascript:void(0)" id="delete-user" data-id="' + data.id_profesion + '" class="btn btn-danger delete-user">Eliminar</a></td></tr>';

	              if (actionType == "create-profesion") {
	                  $('#users-crud').prepend(user);

	              } else if(actionType == "edit-user"){

	                  $("#user_id_" + data.id_servicio).replaceWith(user);
                    location.reload();
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
    $('body').on('click', '#edit-profesion', function () {
      let profesion_id = $(this).data('id');
	      $.ajax({
	          data: { profesion_id : profesion_id },
	          url: "{{ url('servicios')}}"+'/'+profesion_id+'/edit',
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
        var servicio_id = $(this).data("id");

        confirm("Desea eliminar el registro!");

        $.ajax({
            type: "DELETE",
            url: "{{ url('servicios')}}"+'/'+servicio_id,
            success: function (data) {
                $("#user_id_" + servicio_id).remove()
                location.reload();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
  });
</script>
@endsection