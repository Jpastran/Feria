$(document).ready(function() {
    console.log("Entro");
    if ($(location).attr('pathname') == "/Feria/Gestor/Areas.php") {
        cargar();
        $("#btnEditar").hide();
        $("#btnCancelar").hide();
        $("#btnNuevo").click(nuevo);
        $("#btnEditar").click(editar);
        $("#btnCancelar").click(ocultar);
        $(".delet").click(eliminar);
        $(".edit").click(buscar);
    } else if (true) {

    }
});


function editar() {
    if ($("#Nombre").val() != "" && $("#Oferta").val() != "-1") {
        $("#respu").html("Espere Por Favor...");
        var parametros = {
            "Eoculto": $("#oculto").val(),
            "ENombre": $("#Nombre").val(),
            "EOferta": $("#Oferta").val()
        };
        $.ajax({
            data: parametros,
            url: "control/Areas.php",
            type: "POST",
            success: function(resp) {
                if (resp == "s") {
                    $("#respu").html("Actualizado Con Exito");
                    ocultar();
                } else {
                    $("#respu").html("No Se Pudo Guarda, Verifique Su Conexion");
                }
            },
            error: function(resp) {
                $("#respu").html("Error Al Conectarse Al Servidor");
            }
        });
    } else {
        $("#respu").html("Complete Todos Los Campos");
    }
}

function ocultar() {
    $("#btnEditar").hide();
    $("#btnCancelar").hide();
    $("#btnNuevo").show();
    $("#Nombre").val("");
    $("#Oferta option[value='-1']").attr("selected", true);
    $("#contenido").html("Cargando, Espere Por Favor...");
    cargar();
}

function cargar() {
    console.log("Carga");
    var parametros = {
        "Lista": "carga"
    };
    $.ajax({
        data: parametros,
        url: "control/Areas.php",
        type: "POST",
        success: function(resp) {
            $("#contenido").html(resp);
            $(".delet").click(eliminar);
            $(".edit").click(buscar);
        },
        error: function(resp) {
            $("#respu").html("Error Al Conectarse Al Servidor");
        }
    });
}

function nuevo() {
    if ($("#Nombre").val() != "" && $("#Oferta").val() != "-1") {
        $("#respu").html("Espere Por Favor...");
        var parametros = {
            "NNombre": $("#Nombre").val(),
            "NOferta": $("#Oferta").val()
        };
        $.ajax({
            data: parametros,
            url: "control/Areas.php",
            type: "POST",
            success: function(resp) {
                if (resp == "s") {
                    $("#respu").html("Guardado Con Exito");
                    $("#Nombre").val("");
                    $("#Oferta option[value='-1']").attr("selected", true);

                    cargar();
                } else {
                    $("#respu").html("No Se Pudo Guarda, Verifique Su Conexion");
                }
            },
            error: function(resp) {
                $("#respu").html("Error Al Conectarse Al Servidor");
            }
        });
    } else {
        $("#respu").html("Complete Todos Los Campos");
    }
}

function buscar() {
    var parametros = {
        "Buscar": $(this).val()
    };
    $("#oculto").val($(this).val());
    $("#contenido").html("Cargando, Espere Por Favor...");
    $.ajax({
        data: parametros,
        url: "control/Areas.php",
        type: "POST",
        success: function(resp) {
            var datos = resp.split("ô");
            $("#Nombre").val(datos[0]);
            $("#Oferta option[value='" + datos[1] + "']").attr("selected", true);

            $("#btnEditar").show();
            $("#btnCancelar").show();

            $("#btnNuevo").hide();
            $("#contenido").html("");
        },
        error: function(resp) {
            $("#respu").html("Error Al Conectarse Al Servidor");
        }
    });
}

function eliminar() {
    if (confirm("¿Esta Seguro Que Desea Eliminar Esta Area?")) {
        var parametros = {
            "CodArea": $(this).val()
        };
        $.ajax({
            data: parametros,
            url: "control/Areas.php",
            type: "POST",
            success: function(resp) {
                if (resp == "s") {
                    $("#respu").html("Eliminado Con Exito");
                    $("#contenido").html("Cargando, Espere Por Favor...");
                    cargar();
                } else {
                    $("#respu").html("No Se Pudo Eliminar");
                }
            },
            error: function(resp) {
                $("#respu").html("Error Al Conectarse Al Servidor");
            }
        });
    }
}

