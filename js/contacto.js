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
                alert("Mensaje Enviado, Nos Pondremos en contacto con usted");
                $("#Mensaje").val("");
                $("#Correo").val("");
                $("#Nombre").val("");
                $("#Telefono").val("");
            },
            error: function(resp) {
                alert("Error Al Conectarse Al Servidor");
            }
        });
    } else {
        alert("Escriba Nombre,Correo,Telefono y Mensaje");
        $("#Nombre").focus();
    }
}

