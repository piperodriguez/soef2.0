@extends('layouts.app')
@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('css/default.css') }}">
<style type="text/css">
.copy_right.p-3.d-flex {
    position: inherit !important;
    margin-bottom: 0;
    width: 100%;
    margin-top: 4%;
}
</style>
<ul class="nav">
  <li class="nav-item">
    <a class="nav-link" href="{{ route('servicios')}}">Servicios</a>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('profesiones')}}">Profesiones</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('ciudades.index')}}">Ciudades</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('barrios.index')}}">Barrios</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#">Lista de Usuarios</a>
  </li>
</ul>
<div class="container">
    <h2 style="margin-top: 12px;" class="alert alert-dark">Lista Servicios</h2><br>
    <div class="row">
        <div class="col-12">
          <a href="javascript:void(0)" class="btn btn-dark mb-2" id="create-new-servicio">Agregar Servicio</a>
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
                 <td><a href="javascript:void(0)" id="edit-user" data-id="{{ $servicio->id_servicio }}" class="btn btn-dark">Editar</a></td>
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
	              user += '<td><a href="javascript:void(0)" id="edit-user" data-id="' + data.id_servicio + '" class="btn btn-dark">Editar</a></td>';
	              user += '<td><a href="javascript:void(0)" id="delete-user" data-id="' + data.id_servicio + '" class="btn btn-danger delete-user">Eliminar</a></td></tr>';

	              if (actionType == "create-user") {
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
    $('body').on('click', '#edit-user', function () {
      let servicio_id = $(this).data('id');
	      $.ajax({
	          data: { servicio_id : servicio_id },
	          url: "{{ url('servicios')}}"+'/'+servicio_id+'/edit',
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