
$(document).ready(function() {
    $("#btnentrar").click(login);
});

function login() {
    if ($("#Correo").val() != "") {
        $("#Resp").html("Espere Por Favor...");
        var parametros = {
            "LogeoCorreo": $("#Correo").val()

        };
        $.ajax({
            data: parametros,
            url: "EnvioSolicitudes.php",
            type: "POST",
            success: function(resp) {
                if (resp != "n") {
                    $("#Resp").html("");
                    alert("Bienvenido " + resp);
                    document.location = "Datos.php";
                } else {
                    $("#Resp").html("Correo No Registrado");
                }
            },
            error: function(resp) {
                alert("Error Al Conectarse Al Servidor");
            }
        });
    } else {

        $("#Correo").focus();
        $("#Resp").html("Escriba Correo");
    }
}

