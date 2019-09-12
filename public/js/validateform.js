//metodo solo para que la caja reciba texto solo una palabra sin espacios
$.validator.addMethod("soloLetras", function(value, element) {
    return this.optional(element) || /^[a-z]+$/i.test(value);
});
//metodo solo para que la caja reciba texto espacios, comas y comillas en el cuadro de entrada
$.validator.addMethod("soloParrafos", function(value, element) {
    return this.optional(element) || /^[a-z," "]+$/i.test(value);
});

$.validator.addMethod("ValidarSelect", function(elementValue, element, param) {
    return elementValue != param;
});

$.validator.addMethod("date", function(value, element) {
    var bits = value.match(/([0-9]+)/gi),
        str;
    if (!bits)
        return this.optional(element) || false;
    str = bits[1] + '/' + bits[0] + '/' + bits[2];
    return this.optional(element) || !/Invalid|NaN/.test(new Date(str));
});

$("#formulario").validate({
    debug: true,
    rules: {
        fecha: {
            required: true,
            date: true,
        },
        inputTexto: {
            required: true,
            soloLetras: true,
        },
        correo: {
            required: true,
            email: true,
        },
        numero: {
            required: true,
            number: true,
            minlength: 10,
            maxlength: 10
        },
        textolargo: {
            required: true,
            soloParrafos: true,
        },
        seleccion: {
            required: true,
            ValidarSelect: 0
        },
        acepto: {
            required: true,
        },
    },
    messages: {
        fecha: {
            required: "Campo Fecha es obligatorio",
            date: "Por favor ingrese una fecha en el formato dd/mm/yyyy"
        },
        inputTexto: {
            required: "Campo obligatorio",
            soloLetras: "Solo caracateres alfabeticos sin espacios, ni comas, ni puntos etc.."
        },
        correo: "Por favor, introduce una dirección de correo electrónico válida",
        numero: {
            required: "Por favor ingrese el numero celular",
            minlength: "El número no puede ser menor a 10 digitos",
            maxlength: "El número maximo permitido es de 10 digitos",
            number: "Por favor ingrese un número valido",
        },
        textolargo: {
            required: "Campo obligatorio",
            soloParrafos: "Caracteres Numericos no permitidos"
        },
        seleccion: {
            required: "Campo obligatorio",
            ValidarSelect: "Seleccione un valor diferente al inicial"
        }
    },
    /*Funcion para errorres*/
    errorElement: "span",
    errorPlacement: function(error, element) {

        // Añadir la clase `help-block` al elemento de error
        error.addClass("invalid-feedback");

        // Add `has-feedback` class to the parent div.form-group
        // in order to add icons to inputs
        element.parents(".contenedorCampo").addClass("has-feedback");

        if (element.prop("type") === "checkbox") {
            error.insertAfter(element);
        } else {
            error.insertAfter(element);
        }
    },
    highlight: function(element, errorClass, validClass) {
        $(element).addClass("is-invalid").removeClass("is-valid");
    },
    unhighlight: function(element, errorClass, validClass) {
        $(element).addClass("is-valid").removeClass("is-invalid");
    }
});