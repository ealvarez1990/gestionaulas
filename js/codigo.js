var peticionAjax = null;
var nuser = $('#nuser');
var men = $('#mensajes');
var menU = $('#mensajealta');
var menA = $('#mensaje_aula');
var emailsesion = "";
var personal = 0;
var usuario = 0;
var admin = 0;

var ajaxGET = function (url, funcionRespuesta) {
    peticionAjax = new XMLHttpRequest();
    peticionAjax.open("GET", url, true);
    peticionAjax.onreadystatechange = funcionRespuesta;
    peticionAjax.send();
};

var ajaxPOST = function (url, funcionRespuesta) {
    peticionAjax = new XMLHttpRequest();
    peticionAjax.open("POST", url, true);
    peticionAjax.onreadystatechange = funcionRespuesta;
    peticionAjax.send();
};


//COMPRUEBA SESION Y HACE LOGIN
var respuestaSesion = function () {
    if (peticionAjax.readyState === 4) {
        if (peticionAjax.status === 200) {
            var json = JSON.parse(peticionAjax.responseText);
            if (json.login === true) {
                if (json.activo === 0) {
                    nuser.attr("class", "text-danger");
                    nuser.text("  login incorrecto, o usuario no activo, revise su correo");
                } else {
                    emailsesion = $('#email_profesor').val(json.email);
                    personal = json.personal;
                    admin = json.administrador;
                    $('#user_id_span').text(json.usuario);
                    calendario();

                    if (json.activo === "1" && json.personal === "0" && json.administrador === "0") {
                        $('#formLogin').hide();
                        $('#menu_admin').hide();
                        $('#menu_personal').hide();
                        $('#tablareservas').show();
                        $('#navegador').show();
                        $('#calendario').show();
                        var usuario = JSON.stringify(json.usuario);
                        nuser.attr("class", "");
                        nuser.text(usuario);
                    } else {
                        if (json.activo === "1" && json.personal === "1" && json.administrador === "0") {
                            $('#formLogin').hide();
                            $('#menu_admin').hide();
                            $('#menu_activo').hide();
                            $('#menu_personal').show();
                            $('#tablareservas').show();
                            $('#navegador').show();
                            $('#calendario').show();
                            var usuario = JSON.stringify(json.usuario);
                            nuser.attr("class", "");
                            nuser.text(usuario);
                        }
                        if (json.activo === "1" && json.personal === "1" && json.administrador === "1") {
                            $('#formLogin').hide();
                            $('#menu_admin').show();
                            $('#menu_activo').hide();
                            $('#menu_personal').hide();
                            $('#tablareservas').show();
                            $('#navegador').show();
                            $('#calendario').show();
                            var usuario = JSON.stringify(json.usuario);
                            nuser.attr("class", "");
                            nuser.text(usuario);
                        }
                    }
                }
            }
            else {
                peticionAjax = null;
                $('#formLogin').show();
                $('#tablareservas').hide();
                $('#navegador').hide();
            }
        }
        else {
            //hay algun errorpeticionAjax = null;
            peticionAjax = null;
        }
    }
};

//LOGOUT
var respuestaLogOut = function () {

    if (peticionAjax.readyState === 4) {
        if (peticionAjax.status === 200) {
            var json = JSON.parse(peticionAjax.responseText);
            if (json.logout) {
                $('#formLogin').show();
                $('#tablareservas').hide();
                $('#navegador').hide();
                $('#nuser').hide();
                $('#calendario').hide();
                window.location.replace("?");
            }
            else {

                peticionAjax = null;
                //si bandera false
            }
        }
        else {
            //hay algun errorpeticionAjax = null;
            peticionAjax = null;
        }
    }
};

//ALTAS USUARIO-AULAS
var respuestaAlta = function () {
    if (peticionAjax.readyState === 4) {
        if (peticionAjax.status === 200) {
            var json = JSON.parse(peticionAjax.responseText);
            if (json.altaA || json.altaU) {
                if (json.altaU) {
                    $('#signinform')[0].reset();
                    $('#signinmodal').modal('toggle');
                    nuser.attr("class", "text-info");
                    nuser.text("  USUARIO DADO DE ALTA CORRECTAMENTE");
                }
                if (json.altaA) {
                    $('#aulaform')[0].reset();
                    $('#addaula').modal('toggle');
                    men.attr("class", "text-success");
                    men.text("Aula introducida correctamente");
                }
            } else {

                if (!json.altaA) {
                    menA.attr("class", "text-danger");
                    menA.text("Aula no introducida");
                }
                if (!json.altaU) {
                    menU.attr("class", "text-danger");
                    menU.text("El email que a introducido ya existe, si no recuerda su contraseña pongase en contacto con un administrador");
                }
                peticionAjax = null;
                //si bandera false
            }
        }
        else {
            //hay algun errorpeticionAjax = null;
            peticionAjax = null;
        }
    }
};

//SESIONES, LOGIN, INSERTAR AJAXGET
function comprobarSesion() {
    ajaxGET("php/ajaxSesion.php", respuestaSesion);

}

function loginSesion(email, clave) {
    ajaxPOST("php/ajaxSesion.php?dlogin=true&email=" + email + "&clave=" + clave, respuestaSesion);

}
function altaUsuario(email, clave, alias) {
    ajaxPOST("php/ajaxAltaUsuario.php?email=" + email + "&clave=" + clave + "&alias=" + alias, respuestaAlta);
    activarUsuario(email);
}
function activarUsuario(email) {
    ajaxPOST("activacion/correo.php?email=" + email, respuestaAlta);
}

function altaAula(aula) {
    ajaxPOST("php/ajaxAltaAula.php?nombreaula=" + aula, respuestaAlta);
}

//CIERRES Y BORRADOS AJAXGET
function cerrarSesion() {
    ajaxGET("php/ajaxLogout.php", respuestaLogOut);
}


//FUNCION DE CARGA!!!!!---------------------------------------------------------
$(document).ready(function () {
    comprobarSesion();
    $('#formLogin').show();
    $('#tablareservas').hide();
    $('#navegador').hide();
    $('#calendario').hide();

    //BOTON LOGIN
    $('#btlogin').on("click", function (event) {
        event.preventDefault();
        var email = $('#email').val();
        var clave = $('#clave').val();
        loginSesion(email, clave);
    });
    //BOTON ALATA USUARIO
    $('#btalta').on("click", function (event) {
        event.preventDefault();
        var email = $('#email_r').val();
        var clave = $('#clave_r').val();
        var repiteclave = $('#repiteclave').val();
        var alias = $('#alias').val();
        if (clave != repiteclave) {
            $('#mensajealta').text("Las claves no coinciden");
            return;
        }
        else {
            altaUsuario(email, clave, alias);
        }

    });

    //BOTON ALTA AULA
    $('#btaddaula').on("click", function (event) {
        event.preventDefault();
        var nombreaula = $('#nombreaula').val();
        if (nombreaula.length < 3) {
            $('#mensaje_aula').text("Se han introducido menos de 3 caracteres");
            return;
        }
        else {
            altaAula(nombreaula);
        }

    });
    //BOTON LOGOUT
    $('#btlogout').on("click", function (event) {
        event.preventDefault();
        cerrarSesion();
    });

});









//-----------------------------------------------------------------------------
//CALENDARIO DE RESERVAS

var respuestaAJAX = function () {

    if (peticionAjax.readyState === 4) {
        if (peticionAjax.status === 200) {
            var json = JSON.parse(peticionAjax.responseText);
            console.info(json);
            if (json.r) {
                $('#mensajereservas').attr("class", "text-success");
                $('#mensajereservas').text("Reserva realizada con exito");
            }
            else {
                $('#mensajereservas').text("Su reserva ha sido puesta a la cola");
                peticionAjax = null;
                //si bandera false
            }
        }
        else {
            //hay algun errorpeticionAjax = null;
            peticionAjax = null;
        }
    }
};







//LLAMADAS A PHP
function insertarReserva(idaula, idusuario, fecha, hora, respuesta) {
    ajaxGET("php/ajaxInsertar.php?idaula=" + idaula + "&idusuario=" + idusuario +
            "&fecha=" + fecha + "&hora=" + hora + "&respuesta=" + respuesta,
            respuestaAJAX);

}
function borrarReserva(idreserva) {
    ajaxGET("php/ajaxBorrar.php?idreserva=" + idreserva, respuestaAJAX);

}

//CONFIRMACION DE BORRADO
function confirmar(idreserva) {

    confirmar = confirm("Aula ocupada, desea borrar?");
    if (confirmar) {
        // si pulsamos en aceptar
        borrarReserva(idreserva);
        alert('BORRADO');
    }
    else {
        // si pulsamos en cancelar
        alert('NO SE HA BORRADO');
    }
}


function comprobarNivel() {
    if (admin == 1 || personal == 1) {
        return true;
    }
    return false;
}

function comprobar_identidad(evt) {
    if (evt.toElement.getAttribute("datans") != emailsesion.val()) {
        alert('No puede borrar una reserva que no es suya');
        return false;
    }
    return true;
}





//FUNCION AUTOEJECUTABLE PARA CALENDARIO
function calendario() {
    insertarReserva;
    $("#actualizar").on("click", function () {
        location.reload();
    });
    $("#fm7").on("click", function () {
        var valor = $("#cuentaFecha");
        valor.val(valor.val() - 7);
    });
    $("#f0").on("click", function () {
        var valor = $("#cuentaFecha");
        valor.val("0");
    });
    $("#fM7").on("click", function () {
        var valor = $("#cuentaFecha");
        valor.val(Number(valor.val()) + 7);
    });
    var array = $(".casilla");
    for (var a = 0; a < array.length; a++) {
        array[a].addEventListener("click", function (evt) {
            var idaula, idusuario, fecha, hora, respuesta, idreserva;
            idaula = evt.toElement.getAttribute("datap");
            idusuario = emailsesion.val();
            fecha = evt.toElement.getAttribute("dataf");
            hora = evt.toElement.getAttribute("datah");
            respuesta = evt.toElement.getAttribute("datar");
            idreserva = evt.toElement.getAttribute("dataid");
            if (idaula === "-1") {
                alert("selecciona un aula antes de continuar");
            } else {
                if (respuesta) {
                    if (comprobarNivel()) {
                        confirmar(idreserva);
                        location.reload();
                    } else {
                        if (comprobar_identidad(evt)) {
                            confirmar(idreserva);
                            location.reload();
                        }
                    }

                } else {
                    respuesta = true;
                    evt.toElement.setAttribute("datar", "1");
                    this.innerText = "RESERVADO " + evt.toElement.getAttribute("datah");
                    this.setAttribute("style", "background-color:#5cb85c");
                    insertarReserva(idaula, emailsesion.val(), fecha, hora, respuesta);
                }
            }
        });
    }
}

