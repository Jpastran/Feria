$(document).ready(function() {
    $("#btnlogin").click(login);
    $("#formContacto").submit(function() {
        contacto();
        return false;
    });
    $("#formRegistro").submit(function() {
        registro();
        return false;
    });
    if ($(location).attr('pathname') == "/Feria/datos.php") {
        cargar();
    }
    $("#formDatos").submit(function() {
        actualizar();
        return false;
    });
    negro();
    $("#negro").click(negro);
    $(".linkProg").click(resize);
});

function registro() {
    $("#Resp").removeClass();
    $("#Resp").addClass('alert');
    if ($("#Nombres").val() != "" && $("#Apellidos").val() != "" && $("#Correo").val() != "" && $("#Identificacion").val() != "" && $("#Tel").val() != "" && $("#Celular").val() != "") {
        $("#Resp").addClass('alert-info');
        $("#Resp").html("Espere Por Favor...");
        var parametros = obtenerCampos("registro");
        $.ajax({
            data: parametros,
            url: "./db/solicitud.php",
            type: "POST",
            success: function(resp) {
                $("#Resp").removeClass('alert-info');
                if (resp == "s") {
                    $("#Resp").addClass('alert-success');
                    $("#Resp").html("Registro Completo! Recuerde que su acceso a nuestra feria es su correo electronico");
                    setTimeout("location.href='index.php'", 2000);
                } else {
                    $("#Resp").addClass('alert-waring');
                    $("#Resp").html("No Se Puede Registrar, El Correo Electronico Ya Está Vinculado");
                }
            },
            error: function(resp) {
                $("#Resp").removeClass('alert-info');
                $("#Resp").addClass('alert-danger');
                $("#Resp").html("Error Al Conectarse Al Servidor");
            }
        });
    } else {
        $("#Resp").addClass('alert-danger');
        $("#Resp").html("Llene correctamente los campos");
    }
}

function obtenerCampos(form) {
    if (form == "datos") {
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
            "EnvioBarrio": "",
            "EnvioGrado": $("#Grado").val(),
            "EnvioColegio": $("#Colegio").val(),
            "EnvioPuntaje": $("#Puntaje").val(),
            "EnvioPuesto": "",
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
    } else if (form == "registro") {
        var parametros = {
            "EnvioIdentificacion": $("#Identificacion").val(),
            "EnvioTipo": $("#Tipo").val(),
            "EnvioNombres": $("#Nombres").val(),
            "EnvioApellidos": $("#Apellidos").val(),
            "EnvioTel": $("#Tel").val(),
            "EnvioCelular": $("#Celular").val(),
            "EnvioCorreo": $("#Correo").val(),
            "EnviooCorreo": $("#oCorreo").val(),
            "EnvioDir": "",
            "EnvioBarrio": "",
            "EnvioGrado": "",
            "EnvioColegio": "",
            "EnvioPuntaje": "",
            "EnvioPuesto": "",
            "Enviorecursos": "",
            "EnvioMedio": "",
            "Envioapoyo": "",
            "EnvioNapoyo": "",
            "EnvioTapoyo": "",
            "EnvioCapoyo": "",
            "EnvioMulticulturalidad": "",
            "EnvioSISBEN": "",
            "EnvioPrograma1": "",
            "EnvioPrograma2": "",
            "Enviofortaleza1": "",
            "Enviofortaleza2": ""
        };
    }
    return parametros;
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
            url: "./db/solicitud.php",
            type: "POST",
            success: function(resp) {
                $("#resp").html("Mensaje Enviado, Nos pondremos en contacto con usted");
                $("#Mensaje").val("");
                $("#Correo").val("");
                $("#Nombre").val("");
                $("#Telefono").val("");
            },
            error: function(resp) {
                $("#resp").html("Error al conectarse al servidor");
            }
        });
    } else {
        $("#resp").html("Complete los todos los campos");
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
            url: "./db/solicitud.php",
            type: "POST",
            success: function(resp) {
                if (resp != "n") {
                    $("#resp").html("Bienvenido " + resp);
                    setTimeout("location.href='datos.php'", 2000);
                } else {
                    $("#resp").html("Correo No Registrado");
                }
            },
            error: function(resp) {
                $("#resp").html("Error Al Conectarse Al Servidor");
            }
        });
    } else {

        $("#Correo").focus();
        $("#resp").html("Digite su correo");
    }
}

function cargar() {
    var parametros = {
        "Load": $("#Correo").val(),
    };
    $.ajax({
        data: parametros,
        url: "./db/solicitud.php",
        type: "POST",
        success: function(resp) {
            var datos = resp.split("ô");
            $("#Nombres").val(datos[0]);
            $("#Apellidos").val(datos[1]);
            $("#Identificacion").val(datos[2]);
            $("#Tipo option[value='" + datos[3] + "']").attr("selected", true);
            $("#Tel").val(datos[4]);
            $("#Celular").val(datos[5]);
            $("#Correo").val(datos[6]);
            $("#oCorreo").val(datos[7]);
            $("#Dir").val(datos[8]);
            $("#Barrio").val(datos[9]);
            $("#Grado option[value='" + datos[10] + "']").attr("selected", true);
            $("#Colegio").val(datos[11]);
            $("#recursos option[value='" + datos[12] + "']").attr("selected", true);
            $("#Medio option[value='" + datos[13] + "']").attr("selected", true);
            $("#apoyo option[value='" + datos[14] + "']").attr("selected", true);
            $("#Napoyo").val(datos[15]);
            $("#Tapoyo").val(datos[16]);
            $("#Capoyo").val(datos[17]);
            $("#Programa1 option[value='" + datos[18] + "']").attr("selected", true);
            $("#Programa2 option[value='" + datos[19] + "']").attr("selected", true);
            $("#fortaleza1 option[value='" + datos[20] + "']").attr("selected", true);
            $("#fortaleza2 option[value='" + datos[21] + "']").attr("selected", true);
            $("#Puntaje").val(datos[22]);
            $("#Puesto").val(datos[23]);
            $("#Multiculturalidad option[value='" + datos[24] + "']").attr("selected", true);
            $("#SISBEN").val(datos[25]);
        },
        error: function(resp) {
        }
    });
}

function actualizar() {
    if ($("#Nombres").val() != "" && $("#Apellidos").val() != "" && $("#Correo").val() != "" && $("#Identificacion").val() != "") {
        $("#Resp").html("Espere Por Favor...");
        var parametros = obtenerCampos("datos");
        $.ajax({
            data: parametros,
            url: "./db/datos.php",
            type: "POST",
            success: function(resp) {
                if (resp == "s") {
                    $("#Resp").html("Datos Actualizados Correctamente");
                } else {
                    $("#Resp").html("No Se Puede Actualizar, Verifique Sus Datos");
                }
            },
            error: function(resp) {
                $("#Resp").html("Error Al Conectarse Al Servidor");
            }
        });
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

var global = "";

function negro() {
    $("#gris").hide(500);
}

function press() {
    $("#blanco").html('<center><img src="img/cargando.gif" ><br><img src="img/Mensaje.jpg" ></center>');
    var parametros = {
        "MyCorreo": $("#MyCorreo").val(),
        "Programa": global,
        "Tipo": "Universidades",
        "Keysave": "#f7641"
    };
    negro();
    $.ajax({
        data: parametros,
        url: "db/solicitud.php",
        type: "POST",
        success: function(resp) {         
            if (resp == "s") {
                alert("Ha Sido Registrado Su Interes Hacia Este Programa");
            } else {
                alert("No se pudo guardar, verifique su conexión");
            }
        }
    });
}

function resize() {
    global = $(this).attr("title");
    $("#gris").show(800);
    $("#blanco").html('<img src="img/' + $(this).attr("name") + '" width="500"><br><center><img src="img/Interes.png" id="press" style="cursor:pointer"></center>');
    $('html, body').animate({scrollTop: 10}, 650);
    $("#press").click(press);
}
