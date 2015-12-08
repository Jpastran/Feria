$(document).ready(function() {
    $("#btnlogin").click(login);
    $("#btncontacto").click(contacto);
    $("#btnregistro").click(registro);
});

function registro() {
    if ($("#Nombres").val() != "" && $("#Apellidos").val() != "" && $("#Correo").val() != "" && $("#Identificacion").val() != "" && $("#Tel").val() != "" && $("#Celular").val() != "") {
        if ($("#Terminos").is(':checked')) {
            $("#Resp").html("Espere Por Favor...");
            var parametros = {
                "EnvioIdentificacion": $("#Identificacion").val(),
                "EnvioTipo": $("#Tipo").val(),
                "EnvioNombres": $("#Nombres").val(),
                "EnvioApellidos": $("#Apellidos").val(),
                "EnvioTel": $("#Tel").val(),
                "EnvioCelular": $("#Celular").val(),
                "EnvioCorreo": $("#Correo").val(),
                "EnviooCorreo": $("#oCorreo").val(),
                "EnvioDir": $("#Dir").val(),
                "EnvioBarrio": $("#Barrio").val(),
                "EnvioGrado": $("#Grado").val(),
                "EnvioColegio": $("#Colegio").val(),
                "EnvioPuntaje": $("#Puntaje").val(),
                "EnvioPuesto": $("#Puesto").val(),
                "Enviorecursos": $("#recursos").val(),
                "EnvioMedio": $("#Medio").val(),
                "Envioapoyo": $("#apoyo").val(),
                "EnvioNapoyo": $("#Napoyo").val(),
                "EnvioTapoyo": $("#Tapoyo").val(),
                "EnvioCapoyo": $("#Capoyo").val(),
                "EnvioMulticulturalidad": $("#Multiculturalidad").val(),
                "EnvioSISBEN": $("#SISBEN").val(),
                "EnvioPrograma1": $("#Programa1").val(),
                "EnvioPrograma2": $("#Programa2").val(),
                "Enviofortaleza1": $("#fortaleza1").val(),
                "Enviofortaleza2": $("#fortaleza2").val()
            };
            $.ajax({
                data: parametros,
                url: "EnvioSolicitudes.php",
                type: "POST",
                success: function(resp) {
                    if (resp == "s") {
                        alert("Registro Completo! Recuerde que su acceso a nuestra feria es su correo electronico");
                        document.location = "Index.php";
                    } else {
                        $("#Resp").html("No Se Puede Registrar, El Correo Electronico Ya Está Vinculado");
                    }
                },
                error: function(resp) {
                    alert("Error Al Conectarse Al Servidor");
                }
            });
        } else {
            $("#Resp").html("Acepte Terminos y Condiciones");
        }
    } else {
        $("#Resp").html("Campos Obligatorios Pendientes");
    }
}

function MM_findObj(n, d) {
    var p, i, x;
    if (!d)
        d = document;
    if ((p = n.indexOf("?")) > 0 && parent.frames.length) {
        d = parent.frames[n.substring(p + 1)].document;
        n = n.substring(0, p);
    }
    if (!(x = d[n]) && d.all)
        x = d.all[n];
    for (i = 0; !x && i < d.forms.length; i++)
        x = d.forms[i][n];
    for (i = 0; !x && d.layers && i < d.layers.length; i++)
        x = MM_findObj(n, d.layers[i].document);
    if (!x && d.getElementById)
        x = d.getElementById(n);
    return x;
}
function MM_swapImage() { //v3.0
    var i, j = 0, x, a = MM_swapImage.arguments;
    document.MM_sr = new Array;
    for (i = 0; i < (a.length - 2); i += 3) {
        if ((x = MM_findObj(a[i])) != null) {
            document.MM_sr[j++] = x;
            if (!x.oSrc)
                x.oSrc = x.src;
            x.src = a[i + 2];
        }
    }
}

function MM_swapImgRestore() { //v3.0
    var i, x, a = document.MM_sr;
    for (i = 0; a && i < a.length && (x = a[i]) && x.oSrc; i++) {
        x.src = x.oSrc;
    }
}

function MM_preloadImages() { //v3.0
    var d = document;
    if (d.images) {
        if (!d.MM_p)
            d.MM_p = new Array();
        var i, j = d.MM_p.length, a = MM_preloadImages.arguments;
        for (i = 0; i < a.length; i++) {
            if (a[i].indexOf("#") != 0) {
                d.MM_p[j] = new Image;
                d.MM_p[j++].src = a[i];
            }
        }
    }
}

function contacto() {
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

function login() {
    if ($("#Correo").val() != "") {
        $("#resp").html("Espere Por Favor...");
        var parametros = {
            "LogeoCorreo": $("#Correo").val()
        };
        $.ajax({
            data: parametros,
            url: "EnvioSolicitudes.php",
            type: "POST",
            success: function(resp) {
                if (resp != "n") {
                    $("#resp").html("");
                    alert("Bienvenido " + resp);
                    document.location = "Datos.php";
                } else {
                    $("#resp").html("Correo No Registrado");
                }
            },
            error: function(resp) {
                alert("Error Al Conectarse Al Servidor");
            }
        });
    } else {

        $("#Correo").focus();
        $("#resp").html("Digite su correo");
    }
}