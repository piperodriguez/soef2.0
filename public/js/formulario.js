 $(document).ready(function() {
    $.ajaxSetup({
            headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
        });
  });


function guardarFormulario(idform) {

	$("#"+ idform).validate({
		errorElement: 'small',
		errorClass: 'form-control-feedback d-block',
        errorPlacement: function (error, element) {
        	error.addClass("invalid-feedback");
	        if(element.parent('.input-group').length) {
	            error.insertAfter(element.parent());
	        } else if(element.prop('type') === 'checkbox') {
	            error.appendTo(element.parent().parent());
	        } else if(element.prop('type') === 'radio') {
	            error.appendTo(element.parent().parent().parent());
	        } else {
	        	console.log(error);
	            error.insertAfter(element);
	        }
            //element.before(error);
        },

		highlight: function(element, errorClass, validClass) {
		$(element).closest('.form-group').addClass('has-danger');
		$(element).addClass("is-invalid").removeClass("is-valid");
		},

		unhighlight: function(element, errorClass, validClass) {
		$(element).closest('.form-group').removeClass('has-danger');
		$(element).addClass("is-valid").removeClass("is-invalid");
		}

    });

   //if ($("#"+ idform).valid() == true) {

		//Alertas con toastr
		toastr.options = {
		  "closeButton": true,
		  "debug": false,
		  "newestOnTop": true,
		  "progressBar": true,
		  "positionClass": "toast-top-right",
		  "preventDuplicates": false,
		  "onclick": null,
		  "showDuration": "300",
		  "hideDuration": "1000",
		  "timeOut": "5000",
		  "extendedTimeOut": "1000",
		  "showEasing": "swing",
		  "hideEasing": "linear",
		  "showMethod": "fadeIn",
		  "hideMethod": "fadeOut"
		}


		$("#"+ idform).submit(function(e) {
		    e.preventDefault();
		    console.log( $( this ).serialize());
		});

		$.ajax({
	       	type: "POST",
	       	url: $("#"+ idform).attr('action'),
	       	data: $("#"+ idform).serialize(),
	       	async: true,
	       	success: function(data) {

	       		if (data[0]['estadoRespuesta'] == 'Nuevo') {
					toastr["success"]("Registro exitoso");
	       			$('input').removeClass('is-valid');
	       			$('select').removeClass('is-valid');
	       			$("#"+ idform).trigger("reset");
	       		}else{
	       			toastr["success"]("Registro Actualizado");
	       			$('input').removeClass('is-valid');
	       			$('select').removeClass('is-valid');
	       		}

			},
			error: function(e) {
				  $.each(e.responseJSON.errors, function(key,value) {
				  	toastr["error"](value);
				     //$('#validation-errors').append('<div class="alert alert-danger">'+value+'</div');
				 });
				//console.log((e.responseJSON.errors));
				/*if (e.status == 422) {
					for (strerror in e.responseJSON.errors) {
	    				message('error', 'ERROR', e.responseJSON.errors[strerror], 5000);
					}
				}*/
  			}
		});

   /* } else {

    }*/

    return;
}