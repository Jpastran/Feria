$(document).ready(function() {
    var url = $(location).attr('pathname');
    url = url.toLowerCase();
    if (url == "/feria/gestor/index.php" || url == "/feria/gestor/") {
        $("#Ingresar").click(login);
    } else if (url == "/feria/gestor/areas.php") {
        cargarSelectOferta();
        cargarAreas();
        $("#btnEditar").hide();
        $("#btnCancelar").hide();
        $("#btnNuevo").click(crearArea);
        $("#btnEditar").click(editarArea);
        $("#btnCancelar").click(ocultarArea);
    } else if (url == "/feria/gestor/institucion.php") {
        cargarInst();
        $("#btnEditar").hide();
        $("#btnCancelar").hide();
        $("#btnNuevo").click(crearInst);
        $("#btnEditar").click(editarInst);
        $("#btnCancelar").click(ocultarInst);
    } else if (url == "/feria/gestor/programas.php") {
        cargarSelectOferta();
        cargarProg();
        $("#btnEditar").hide();
        $("#btnCancelar").hide();
        $("#btnNuevo").click(crearProg);
        $("#btnEditar").click(editarProg);
        $("#btnCancelar").click(ocultarProg);
        $("#Oferta").change(cargarSelectArea);
    } else if (url == "/feria/gestor/usuarios.php") {
        cargarUser();
        $("#btnEditar").hide();
        $("#btnCancelar").hide();
        $("#btnNuevo").click(crearUser);
        $("#btnEditar").click(editarUser);
        $("#btnCancelar").click(ocultarUser);
    } else if (url == "/feria/gestor/imagenes.php") {
        cargarImg();
        $("#btnNuevo").click(crearImg);
    } else if (url == "/feria/gestor/informacion.php") {
        cargarInfo();
        $("#btnEditar").click(editarInfo);
        $("#formInfo").hide();
    } else if (url == "/feria/gestor/visitas.php") {
        generar("Visitas");
    } else if (url == "/feria/gestor/intereses.php") {
        generar("Intereses");
    } else if (url == "/feria/gestor/visitantes.php") {
        generar("Visitantes");
    }
});

//**************Login****************//

function login() {
    $("#Usuario").removeClass('err');
    $("#pass").removeClass('err');
    if ($("#Usuario").val()) {
        if ($("#pass").val()) {
            $("#resul").html("<blink style='color:#000;margin-bottom:-10px;'>Procesando, espere...</blink><br><br>");
            var parametros = {
                "Enteruser": $("#Usuario").val(),
                "Enterpass": $("#pass").val(),
                "Login": "Login"
            };
            $.ajax({
                data: parametros,
                url: "control/login.php",
                type: "POST",
                success: function(resp) {
                    if (resp == "s") {
                        document.location = "Inicio.php"
                    } else {
                        $("#resul").html("Datos Incorrectos");
                        $("#pass").val("");
                    }
                },
                error: function(resp) {
                    $("#resul").html("Error Al Conectarse Al Servidor");
                }
            });
        } else {
            $("#pass").addClass('err');
            $("#resul").html("Complete Los Campos");
        }
    } else {
        $("#Usuario").addClass('err');
        $("#resul").html("Complete Los Campos");
    }
}

//**************Areas****************//

function crearArea() {
    if ($("#Nombre").val() != "" && $("#Oferta").val() != "-1") {
        $("#respu").html("Espere Por Favor...");
        var parametros = {
            "Nombre": $("#Nombre").val(),
            "Oferta": $("#Oferta").val(),
            "Crear": "Crear"
        };
        $.ajax({
            data: parametros,
            url: "control/Areas.php",
            type: "POST",
            success: function(resp) {
                if (resp == "s") {
                    $("#respu").html("Guardado Con Exito");
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

function editarArea() {
    if ($("#Nombre").val() != "" && $("#Oferta").val() != "-1") {
        $("#respu").html("Espere Por Favor...");
        var parametros = {
            "Codigo": $("#Codigo").val(),
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
    $("#Codigo").val($(this).val());
    $.ajax({
        data: parametros,
        url: "control/Areas.php",
        type: "POST",
        success: function(resp) {
            var datos = resp.split("ô");
            $("#Nombre").val(datos[0]);
            $("#Oferta").val(datos[1]);
            $("#btnEditar").show();
            $("#btnCancelar").show();
            $("#btnNuevo").hide();
            $("#respu").html("");
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
    $("#Oferta").val(-1);
    $("#contenido").html("Cargando, Espere Por Favor...");
    cargarAreas();
}

function cargarSelectOferta() {
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
        $("#respu").html("Espere Por Favor...");
        var parametros = new FormData();
        parametros.append('Nombre', $("#Nombre").val());
        parametros.append('Departamento', $("#Departamento").val());
        parametros.append('Categoria', $("#Categoria").val());
        parametros.append('Banner', $("#Banner").prop('files')[0]);
        parametros.append('Logo', $("#Logo").prop('files')[0]);
        parametros.append('Crear', "Crear");
        $.ajax({
            data: parametros,
            url: 'control/Institucion.php',
            type: 'POST',
            contentType: false,
            processData: false
        }).done(function(resp) {
            if (resp == "s") {
                $("#respu").html("Guardado Con Exito");
                ocultarInst();
            } else {
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
                    ocultarInst();
                } else {
                    $("#respu").html("No se pudo Actualizar, Verifique Su Conexion");
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
            $("#Logo").prop('disabled', true);
            $("#Banner").prop('disabled', true);
            $("#contenido").html("");
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
                    ocultarInst();
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
            $(".delet").click(eliminarInst);
            $(".edit").click(buscarInst);
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
    $("#Departamento").val(-1);
    $("#Categoria").val(-1);
    $("#Logo").prop('disabled', false);
    $("#Banner").prop('disabled', false);
    $("#contenido").html("Cargando, Espere Por Favor...");
    cargarInst();
}

//***************Programas*****************//

function crearProg() {
    if ($("#Oferta").val() != "" && $("#Areas").val() != "" && $("#Nombre").val() != "" && $("#Imagen").val() != "" && $("#Descripcion").val() != "") {
        var parametros = new FormData();
        parametros.append('Areas', $("#Areas").val());
        parametros.append('Nombre', $("#Nombre").val());
        parametros.append('Descripcion', $("#Descripcion").val());
        parametros.append('Imagen', $("#Imagen").prop('files')[0]);
        parametros.append('Crear', "Crear");
        $.ajax({
            data: parametros,
            url: 'control/Programas.php',
            type: 'POST',
            contentType: false,
            processData: false
        }).done(function(resp) {
            if (resp == "s") {
                $("#respu").html("Guardado Con Exito");
                ocultarProg();
            } else {
                $("#respu").html("No se pudo Guardar, Verifique Su Conexion");
            }
        }
        );
    } else {
        $("#respu").html("Complete Todos Los Campos");
    }
}

function editarProg() {
    if ($("#Nombre").val() != "" && $("#Oferta").val() != "" && $("#Areas").val() != "" && $("#Descripcion").val() != "") {
        var parametros = {
            "Nombre": $("#Nombre").val(),
            "Oferta": $("#Oferta").val(),
            "Areas": $("#Areas").val(),
            "Descripcion": $("#Descripcion").val(),
            "Codigo": $("#Codigo").val(),
            "Editar": "Editar",
        };
        $.ajax({
            data: parametros,
            url: "control/Programas.php",
            type: "POST",
            success: function(resp) {
                if (resp == "s") {
                    $("#respu").html("Actualizado Con Exito");
                    ocultarProg();
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

function buscarProg() {
    var parametros = {
        "Codigo": $(this).val(),
        "Buscar": "Buscar"
    };
    $("#Codigo").val($(this).val());
    $.ajax({
        data: parametros,
        url: "control/Programas.php",
        type: "POST",
        success: function(resp) {
            $("#btnEditar").show();
            $("#btnCancelar").show();
            $("#btnNuevo").hide();
            var datos = resp.split("ô");
            $("#Nombre").val(datos[0]);
            $("#Oferta").val(datos[1]);
            $("#Descripcion").val(datos[2]);
            $("#Imagen").prop('disabled', true);
            cargarSelectArea(false);
            $("#Areas").val(datos[3]);
            $("#contenido").html("");
        },
        error: function(resp) {
            $("#respu").html("Error Al Conectarse Al Servidor");
        }
    });

}

function eliminarProg() {
    if (confirm("¿Esta Seguro Que Desea Eliminar Este Registro?")) {
        var parametros = {
            "Eliminar": $(this).val(),
            "Borrar": "Borrar"
        };
        $.ajax({
            data: parametros,
            url: "control/Programas.php",
            type: "POST",
            success: function(resp) {
                if (resp == "s") {
                    $("#respu").html("Eliminado Con Exito");
                    ocultarProg();
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

function cargarProg() {
    var parametros = {
        "Lista": "Lista"
    };
    $.ajax({
        data: parametros,
        url: "control/Programas.php",
        type: "POST",
        success: function(resp) {
            $("#contenido").html(resp);
            $(".delet").click(eliminarProg);
            $(".edit").click(buscarProg);
        },
        error: function(resp) {
            $("#respu").html("Error Al Conectarse Al Servidor");
        }
    });
}

function ocultarProg() {
    $("#btnEditar").hide();
    $("#btnCancelar").hide();
    $("#btnNuevo").show();
    $("#Nombre").val("");
    $("#Descripcion").val("");
    $("#Imagen").val("");
    $("#Oferta").val(-1);
    $("#Areas").val(-1);
    $("#Imagen").prop('disabled', false);
    $("#contenido").html("Cargando, Espere Por Favor...");
    cargarProg();
}

function cargarSelectArea(async) {
    if ($("#Oferta").val() != "") {
        $("#Areas").html("<option value='-1' selected='selected'>Cargado, Espere...</option>");
        var parametros = {
            "Oferta": $("#Oferta").val(),
            "SelectArea": "Select"
        };
        $.ajax({
            data: parametros,
            url: "control/Programas.php",
            type: "POST",
            async: async === false ? false : true,
            success: function(resp) {
                $("#Areas").html(resp);
            },
            error: function(resp) {
                $("#respu").html("Error Al Conectarse Al Servidor");
            }
        });
    }
}

//**************Usuarios****************//

function crearUser() {
    if ($("#Nombre").val() != "" && $("#Usuario").val() != "" && $("#pass").val() != "") {
        $("#respu").html("Espere Por Favor...");
        var parametros = {
            "Nombre": $("#Nombre").val(),
            "pass": $("#pass").val(),
            "Usuario": $("#Usuario").val(),
            "Crear": "Crear"
        };
        $.ajax({
            data: parametros,
            url: "control/User.php",
            type: "POST",
            success: function(resp) {
                if (resp == "s") {
                    $("#respu").html("Guardado Con Exito");
                    ocultarUser();
                } else {
                    $("#respu").html("El Documento Ya Está Registrado");
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

function editarUser() {
    if ($("#Nombre").val() != "" && $("#Usuario").val() != "" && $("#pass").val() != "") {
        $("#respu").html("Espere Por Favor...");
        var parametros = {
            "oculto": $("#oculto").val(),
            "Nombre": $("#Nombre").val(),
            "pass": $("#pass").val(),
            "Usuario": $("#Usuario").val(),
            "Editar": "Editar"
        };
        $.ajax({
            data: parametros,
            url: "control/User.php",
            type: "POST",
            success: function(resp) {
                if (resp == "s") {
                    $("#respu").html("Actualizado Con Exito");
                    ocultarUser();
                } else {
                    $("#respu").html("El Usuario Ya Está Registrado");
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

function eliminarUser() {
    if (confirm("¿Esta Seguro Que Desea Eliminar Este Usuario?")) {
        var parametros = {
            "Codigo": $(this).val(),
            "Borrar": "Borrar"
        };
        $.ajax({
            data: parametros,
            url: "control/User.php",
            type: "POST",
            success: function(resp) {
                if (resp == "s") {
                    $("#respu").html("Eliminado Con Exito");
                    $("#contenido").html("Cargando, Espere Por Favor...");
                    cargarUser();
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

function buscarUser() {
    var parametros = {
        "Codigo": $(this).val(),
        "Buscar": "Buscar"
    };
    $("#oculto").val($(this).val());
    $("#contenido").html("Cargando, Espere Por Favor...");
    $.ajax({
        data: parametros,
        url: "control/User.php",
        type: "POST",
        success: function(resp) {
            var datos = resp.split("ô");
            $("#Usuario").val(datos[0]);
            $("#Nombre").val(datos[1]);
            $("#pass").val(datos[2]);
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

function ocultarUser() {
    $("#btnEditar").hide();
    $("#btnCancelar").hide();
    $("#btnNuevo").show();
    $("#Usuario").val("");
    $("#Nombre").val("");
    $("#pass").val("");
    $("#contenido").html("Cargando, Espere Por Favor...");
    cargarUser();
}

function cargarUser() {
    var parametros = {
        "Cargar": "Cargar"
    };
    $.ajax({
        data: parametros,
        url: "control/User.php",
        type: "POST",
        success: function(resp) {
            $("#contenido").html(resp);
            $(".delet").click(eliminarUser);
            $(".edit").click(buscarUser);
        },
        error: function(resp) {
            $("#respu").html("Error Al Conectarse Al Servidor");
        }
    });
}

//**************Imagenes****************//

function crearImg() {
    if ($("#Imagen").val() != "") {
        $("#respu").html("Cargando, Espere Por Favor...");
        var parametros = new FormData();
        parametros.append('Imagen', $("#Imagen").prop('files')[0]);
        parametros.append('Crear', "Crear");
        $.ajax({
            data: parametros,
            url: 'control/Imagenes.php',
            type: 'POST',
            contentType: false,
            processData: false,
            cache: false
        }).done(function(resp) {
            if (resp == "s") {
                $("#respu").html("Guardado Con Exito");
                cargarImg();
            } else {
                $("#respu").html("No se Pudo Guardar, Verifique Su Conexion");
            }
        });
    } else {
        $("#respu").html("Complete Todos Los Campos");
    }
}

function eliminarImg() {
    if (confirm("¿Esta Seguro Que Desea Eliminar Este Registro?")) {
        var parametros = {
            "Eliminar": $(this).val(),
            "Borrar": "Borrar"
        };
        $.ajax({
            data: parametros,
            url: "control/Imagenes.php",
            type: "POST",
            success: function(resp) {
                if (resp == "s") {
                    $("#respu").html("Eliminado Con Exito");
                    cargarImg();
                } else {
                    $("#respu").html("no Se Pudo Eliminar, Verifique Su Conexion");
                }
            },
            error: function(resp) {
                $("#respu").html("Error Al Conectarse Al Servidor");
            }
        });
    }
}

function cargarImg() {
    var parametros = {
        "Cargar": "Cargar"
    };
    $.ajax({
        data: parametros,
        url: "control/Imagenes.php",
        type: "POST",
        success: function(resp) {
            $("#contenido").html(resp);
            $(".delet").click(eliminarUser);
        },
        error: function(resp) {
            $("#respu").html("Error Al Conectarse Al Servidor");
        }
    });
}

//**************Informacion****************//

function editarInfo() {
    if ($("#Mision").val() != "" && $("#Vision").val() != "" && $("#Quienes").val() != "" && $("#Objetivos").val() != "" && $("#Producto").val() != "" && $("#Correos").val()) {
        $("#respu").html("Espere Por Favor...");
        var parametros = {
            "Mision": $("#Mision").val(),
            "Vision": $("#Vision").val(),
            "Quienes": $("#Quienes").val(),
            "Objetivos": $("#Objetivos").val(),
            "Producto": $("#Producto").val(),
            "Correos": $("#Correos").val(),
            "Editar": "Editar"
        };
        $.ajax({
            data: parametros,
            url: "control/Informacion.php",
            type: "POST",
            success: function(resp) {
                if (resp == "s") {
                    $("#respu").html("Actualizado Con Exito");
                    cargarInfo();
                    $("#formInfo").hide();
                } else {
                    $("#respu").html("No Se Pudo Guarda, Verifique Su Conexion");
                }
            },
            error: function(resp) {
                $("#respu").html("Error Al Conectarse Al Servidor");
            }
        });
    } else {
        $("#respu").html("No puede dejar ninguno vacio");
    }
}

function cargarInfo() {
    var parametros = {
        "Cargar": "Cargar"
    };
    $.ajax({
        data: parametros,
        url: "control/Informacion.php",
        type: "POST",
        success: function(resp) {
            $("#contenido").html(resp);
            $("#btnCargar").click(buscarInfo);
        },
        error: function(resp) {
            $("#contenido").html("Error Al Conectarse Al Servidor");
        }
    });

}

function buscarInfo() {
    var parametros = {
        "Buscar": "Buscar"
    };
    $.ajax({
        data: parametros,
        url: "control/Informacion.php",
        type: "POST",
        success: function(resp) {
            var datos = resp.split("ô");
            $("#Mision").val(datos[0]);
            $("#Vision").val(datos[1]);
            $("#Quienes").val(datos[2]);
            $("#Objetivos").val(datos[3]);
            $("#Producto").val(datos[4]);
            $("#Correos").val(datos[5]);
            $("#formInfo").show();
            $("#contenido").html("");
        },
        error: function(resp) {
            alert("Error Al Conectarse Al Servidor");
        }
    });
}

//**************Informes****************//
function generar(archivo) {
    var f = new Date();
    var dia = f.getDate() < 10 ? "0" + f.getDate() : dia = f.getDate();
    var mes = (f.getMonth() + 1) < 10 ? "0" + (f.getMonth() + 1) : (f.getMonth() + 1);

    $("#Final").val(f.getFullYear() + "-" + mes + "-" + dia);

    mes = (f.getMonth() + 1) < 10 ? "0" + (f.getMonth()) : (f.getMonth());

    $("#Inicio").val(f.getFullYear() + "-" + mes + "-" + dia);
    $("#Buscar").click(function() {
        if (archivo === "Visitantes") {
            visitantes();
        } else if (archivo === "Intereses") {
            intereses();
        } else if (archivo === "Visitas") {
            visitas();
        }
    });
}

function visitantes() {
    document.location = "reporte/Visitantes.php?Inicio=" + $("#Inicio").val() + "&Final=" + $("#Final").val();
}

function intereses() {
    document.location = "reporte/Intereses.php?Inicio=" + $("#Inicio").val() + "&Final=" + $("#Final").val();
}

function visitas() {
    document.location = "reporte/Visitas.php?Inicio=" + $("#Inicio").val() + "&Final=" + $("#Final").val();
}
