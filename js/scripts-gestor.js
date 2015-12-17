$(document).ready(function() {
    var url = $(location).attr('pathname');
    if (url == "/Feria/Gestor/Areas.php") {
        cargarSelect();
        cargarAreas();
        $("#btnEditar").hide();
        $("#btnCancelar").hide();
        $("#btnNuevo").click(crearArea);
        $("#btnEditar").click(editarArea);
        $("#btnCancelar").click(ocultarArea);
    } else if (url == "/Feria/Gestor/Institucion.php") {
        cargarInst();
        $("#btnEditar").hide();
        $("#btnCancelar").hide();
        $("#btnNuevo").click(crearInst);
        $("#btnEditar").click(editarInst);
        $("#btnCancelar").click(ocultarInst);
    }
});

//**************Areas****************//

function crearArea() {
    if ($("#Nombre").val() != "" && $("#Oferta").val() != "-1") {
        $("#respu").html("Espere Por Favor...");
        var parametros = {
            "NNombre": $("#Nombre").val(),
            "NOferta": $("#Oferta").val(),
            "Crear": "Crear"
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
                    cargarAreas();
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

function editarArea() {
    if ($("#Nombre").val() != "" && $("#Oferta").val() != "-1") {
        $("#respu").html("Espere Por Favor...");
        var parametros = {
            "Codigo": $("#oculto").val(),
            "Nombre": $("#Nombre").val(),
            "Oferta": $("#Oferta").val(),
            "Editar": "Editar"
        };
        $.ajax({
            data: parametros,
            url: "control/Areas.php",
            type: "POST",
            success: function(resp) {
                if (resp == "s") {
                    $("#respu").html("Actualizado Con Exito");
                    ocultarArea();
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

function eliminarArea() {
    if (confirm("¿Esta Seguro Que Desea Eliminar Esta Area?")) {
        var parametros = {
            "Codigo": $(this).val(),
            "Borrar": "Borrar"
        };
        $.ajax({
            data: parametros,
            url: "control/Areas.php",
            type: "POST",
            success: function(resp) {
                if (resp == "s") {
                    $("#respu").html("Eliminado Con Exito");
                    $("#contenido").html("Cargando, Espere Por Favor...");
                    cargarAreas();
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

function buscarArea() {
    var parametros = {
        "Codigo": $(this).val(),
        "Buscar": "Buscar"
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

function cargarAreas() {
    var parametros = {
        "Lista": "Lista"
    };
    $.ajax({
        data: parametros,
        url: "control/Areas.php",
        type: "POST",
        success: function(resp) {
            $("#contenido").html(resp);
            $(".delet").click(eliminarArea);
            $(".edit").click(buscarArea);
        },
        error: function(resp) {
            $("#respu").html("Error Al Conectarse Al Servidor");
        }
    });
}

function ocultarArea() {
    $("#btnEditar").hide();
    $("#btnCancelar").hide();
    $("#btnNuevo").show();
    $("#Nombre").val("");
    $("#Oferta option[value='-1']").attr("selected", true);
    $("#contenido").html("Cargando, Espere Por Favor...");
    cargarAreas();
}

function cargarSelect(){
    var parametros = {
        "SelectOferta": "Select"
    };
    $.ajax({
        data: parametros,
        url: "control/Areas.php",
        type: "POST",
        success: function(resp) {
            $("#Oferta").html(resp);
        },
        error: function(resp) {
            $("#respu").html("Error Al Conectarse Al Servidor");
        }
    });
}

//**************Institucion****************//

function crearInst() {
    if ($("#Nombre").val() != "" && $("#Departamento").val() != "" && $("#Categoria").val() != "" && $("#Logo").val() != "" && $("#Banner").val() != "") {
        $("#respu").html("<img src='../img/gestor/load.gif' style='margin-right:7px;margin-bottom:-10px'><span style='font-size:16px'>Cargando, Espere Por Favor...<span>");
        var parametros = {
            "Nombre": $("#Nombre").val(),
            "Departamento": $("#Departamento").val(),
            "Categoria": $("#Categoria").val(),
            "Banner": $("#Banner").prop('files')[0].name,
            "Logo": $("#Logo").prop('files')[0].name,
            "Crear": "Crear"
        };
        $.ajax({
            data: parametros,
            url: 'control/Institucion.php',
            type: 'POST',
        }).done(function(resp) {
            if (resp == "s") {
                $("#respu").html("<center><blink>Actualizando...</blink></center>");
                 $("#respu").html("Guardado Con Exito");
                document.location = "Institucion.php";
            } else {
                $("#respu").html("");
                 $("#respu").html("no Se Pudo Guardar, Verifique Su Conexion");
            }
        }
        );
    } else {
         $("#respu").html("Complete Todos Los Campos");
    }
}

function editarInst() {
    if ($("#Nombre").val() != "" && $("#Departamento").val() != "" && $("#Categoria").val() != "") {
        var parametros = {
            "Nombre": $("#Nombre").val(),
            "Departamento": $("#Departamento").val(),
            "Categoria": $("#Categoria").val(),
            "Codigo": $("#Codigo").val(),
            "Editar": "Editar",
        };
        $.ajax({
            data: parametros,
            url: "control/Institucion.php",
            type: "POST",
            success: function(resp) {
                if (resp == "s") {
                     $("#respu").html("Actualizado Con Exito");
                    document.location = "Institucion.php"
                } else {
                     $("#respu").html("no Se Pudo Actualizar, Verifique Su Conexion");
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

function buscarInst() {
    var parametros = {
        "Codigo": $(this).val(),
        "Buscar": "Buscar"
    };
    $("#Codigo").val($(this).val());
    $.ajax({
        data: parametros,
        url: "control/Institucion.php",
        type: "POST",
        success: function(resp) {
            $("#btnEditar").show();
            $("#btnCancelar").show();
            $("#btnNuevo").hide();
            var datos = resp.split("ô");
            $("#Nombre").val(datos[0]);
            $("#Departamento").val(datos[1]);
            $("#Categoria").val(datos[2]);
            $("#Contenido").html("");
            $("#Logo").prop('disabled', true);
            $("#Banner").prop('disabled', true);
        },
        error: function(resp) {
             $("#respu").html("Error Al Conectarse Al Servidor");
        }
    });
}

function eliminarInst() {
    if (confirm("¿Esta Seguro Que Desea Eliminar Este Registro?")) {
        var parametros = {
            "Eliminar": $(this).val(),
            "Borrar": "Borrar"
        };
        $.ajax({
            data: parametros,
            url: "control/Institucion.php",
            type: "POST",
            success: function(resp) {
                if (resp == "s") {
                     $("#respu").html("Eliminado Con Exito");
                    document.location = "Institucion.php"
                } else {

                     $("#respu").html("No se Pudo Eliminar, Verifique Su Conexion");
                }
            },
            error: function(resp) {
                 $("#respu").html("Error Al Conectarse Al Servidor");
            }
        });
    }
}

function cargarInst() {
    var parametros = {
        "Lista": "Lista"
    };
    $.ajax({
        data: parametros,
        url: "control/Institucion.php",
        type: "POST",
        success: function(resp) {
            $("#contenido").html(resp);
            $(".delet").click(eliminarArea);
            $(".edit").click(buscarArea);
        },
        error: function(resp) {
            $("#respu").html("Error Al Conectarse Al Servidor");
        }
    });
}

function ocultarInst() {
    $("#btnEditar").hide();
    $("#btnCancelar").hide();
    $("#btnNuevo").show();
    $("#Nombre").val("");
    $("#Logo").val("");
    $("#Banner").val("");
    $("#Departamento option[value='-1']").attr("selected", true);
    $("#Categoria option[value='-1']").attr("selected", true);
    $("#Logo").prop('disabled', false);
    $("#Banner").prop('disabled', false);
    $("#contenido").html("Cargando, Espere Por Favor...");
    cargarInst();
}

//**************--------------****************//