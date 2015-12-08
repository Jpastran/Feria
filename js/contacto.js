
$(document).ready(function() {
    $("#Enviar").click(enviar);
});

function enviar() {
    if ($("#Mensaje").val() != "" && $("#Nombre").val() != "" && $("#Correo").val() != "" && $("#Telefono").val() != "") {
        var parametros = {
            "SendMensaje": $("#Mensaje").val(),
            "SendCorreo": $("#Correo").val(),
            "SendTelefono": $("#Telefono").val(),
            "SendNombre": $("#Nombre").val()
        };
        $.ajax({
            data: parametros,
            url: "EnvioSolicitudes.php",
            type: "POST",
            success: function(resp) {
                $("#resp").html("Mensaje Enviado, Nos Pondremos en contacto con usted");
            },
            error: function(resp) {
                $("#resp").html("Error Al Conectarse Al Servidor");
            }
        });
    } else {
        if ($("#Nombre").val() == "") {
            $("#Nombre").val("");
        }
        if ($("#Mensaje").val() == "") {
            $("#Mensaje").val("");
        }
        if ($("#Correo").val() == "") {
            $("#Correo").val("");
        }
        if ($("#Telefono").val() == "") {
            $("#Telefono").val("");
        }
        $("#resp").html("Complete los campos resaltados");
    }
}

