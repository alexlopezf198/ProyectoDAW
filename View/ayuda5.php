<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../View/css/estilos.css">
    <title>Sistema de gestión de incidencias</title>
  </head>
  <body>

            <!-- Banner y logos -->

            <header class="logos-menu mt-3">      
                
                    <img src="../View/img/logo.png" class="img-fluid" alt="...">
                
            </header>
        
            <!-- Login -->

            <main>
                <div class="container-fluid mt-3 mb-3">
                <div class="row justify-content-center align-items-center" style="min-height: 76vh;">

                    <div class="col-md-7 bg-light p-5 rounded">

                        <button type="button" class="btn btn-primary mb-5" data-bs-toggle="modal" onclick="window.location.href='../index.php'">Volver</button>

                        <h2 class="text-center text-uppercase py-2 textoAyuda">Ayuda</h2>

                        <ul class="list-group">
                            <li class="list-group-item"><a href="?p=1">1. Registro de usuarios</a></li>
                            <li class="list-group-item"><a href="?p=2">2. Inicio de sesión</a></li>
                            <li class="list-group-item"><a href="?p=3">3. Uso de la aplicación como cliente</a></li>
                            <li class="list-group-item"><a href="?p=4">4. Uso de la aplicación como técnico</a></li>
                            <li class="list-group-item active" aria-current="true"><a href="?p=5">5. Uso de la aplicación como administrador</a></li>
                        </ul>

                        <br>
                        <div class="container cuerpoAyuda">
                            <div class="col-12 rounded pt-4 pb-1">
                                <h4 class="text-center"><b><u>Uso de la aplicación como administrador</u></b></h4><br>
                                <p>Si el usuario ha seleccionado el rol “Admin”, le aparecerá el siguiente menú donde podrá elegir entre las distintas posibilidades que ofrece la aplicación.<br><br>
                                <img src="../View/img/ayuda/captura22.png" class="img-fluid" alt="..."><br><br>
                                Las funcionalidades que ofrecen las distintas opciones son las siguientes:<br>
                                <p style="margin-left:2em">-	<u>Gestionar usuarios:</u> el administrador podrá visualizar los usuarios registrados en la aplicación, pudiendo modificar sus datos o eliminarlos.<br>
                                -	<u>Gestionar tipos:</u> el administrador podrá visualizar los distintos Tipos de incidencia que tendrá la aplicación, pudiéndolos modificar o eliminarlos.<br>
                                -	<u>Gestionar ubicaciones:</u> el administrador podrá visualizar las distintas Ubicaciones donde se podrán presentar las incidencias, pudiéndolas modificar o eliminar.<br>
                                -	<u>Cambiar rol:</u> el usuario podrá cambiar su rol en la aplicación.<br>
                                -	<u>Cerrar sesión:</u> el usuario podrá cerrar su sesión.<br>
                                </p>
                                <span style="color: red;"><b><u>Gestionar usuarios</u></b></span><br><br>
                                Al entrar en esta opción, el administrador verá un listado con todos los usuarios registrados en la aplicación.<br><br>
                                <img src="../View/img/ayuda/captura23.png" class="img-fluid" alt="..."><br><br>
                                Si el administrador desea buscar un usuario en concreto, podrá introducir su DNI en el filtro de “Usuario” y darle clic a “Buscar”.<br><br>
                                Si el administrador desea visualizar un grupo concreto de usuarios, podrá elegirlo en el filtro de “Grupo” y darle al botón “Filtrar”.<br><br>
                                Si el administrador desea dar de baja a un usuario de la aplicación, tan solo tendrá que dar clic en el botón “Eliminar” y el usuario ya no podrá acceder a la aplicación, recibiendo este mensaje en la pantalla de Login:<br><br>
                                <img src="../View/img/ayuda/captura24.png" class="img-fluid" alt="..."><br><br>
                                No obstante, quedará registrado en la base de datos, y si el administrador desea volver a activarlo, tan solo tendrá que hacer clic en “Activar”.<br><br>
                                Si el administrador hace clic en “Modificar”, verá el siguiente formulario con los datos del usuario:<br><br>
                                <img src="../View/img/ayuda/captura25.png" class="img-fluid" alt="..."><br><br>
                                En este formulario podrá modificar sus datos, además de darle permisos especiales.<br><br>
                                También podrá cambiar la contraseña del usuario, para lo cual solo deberá rellenar el campo “Nueva contraseña”.<br><br>
                                Una vez termine con las modificaciones solo debe hacer clic en “Enviar” y le aparecerá el siguiente mensaje:<br><br>
                                <img src="../View/img/ayuda/captura26.png" class="img-fluid" alt="..."><br><br>
                                <span style="color: red;"><b><u>Gestionar tipos</u></b></span><br><br>
                                Al entrar en esta opción, el administrador verá un listado con todos los tipos de incidencia que hay en la aplicación.<br><br>
                                <img src="../View/img/ayuda/captura27.png" class="img-fluid" alt="..."><br><br>
                                Si el administrador desea filtrar los tipos por un nombre en concreto, solo debe rellenar el campo “Tipo” y darle clic a “Buscar”.<br><br>
                                Si el administrador desea ver la descripción del Tipo, solo debe darle clic a “Detalles”.<br><br>
                                Si el administrador desea eliminar un tipo, deberá darle clic a “Eliminar” y recibirá el siguiente aviso:<br><br>
                                <img src="../View/img/ayuda/captura28.png" class="img-fluid" alt="..."><br><br>
                                Si hace clic en “Si”, el Tipo se eliminará y no se volverá a mostrar en la lista ni tampoco a los clientes cuando vayan a presentar una incidencia, aunque permanecerá en la base de datos para las incidencias que ya hayan sido presentadas.<br><br>
                                Si el administrador hace clic en “Añadir tipo”, le aparecerá el siguiente formulario:<br><br>
                                <img src="../View/img/ayuda/captura29.png" class="img-fluid" alt="..."><br><br>
                                Finalmente, si el administrador hace clic en “Modificar” verá el siguiente formulario:<br><br>
                                <img src="../View/img/ayuda/captura30.png" class="img-fluid" alt="..."><br><br>
                                Si hace clic en “Enviar”, los cambios quedarán registrados en el Tipo seleccionado.<br><br>
                                <span style="color: red;"><b><u>Gestionar ubicaciones</u></b></span><br><br>
                                Al entrar en esta opción, el administrador verá un listado con todas las ubicaciones que hay en la aplicación.<br><br>
                                <img src="../View/img/ayuda/captura31.png" class="img-fluid" alt="..."><br><br>
                                Si el administrador desea filtrar las ubicaciones por un nombre en concreto, solo debe rellenar el campo “Ubicación” y darle clic a “Buscar”.<br><br>
                                Si el administrador desea ver la descripción de la Ubicación, solo debe darle clic a “Detalles”.<br><br>
                                Si el administrador desea eliminar una ubicación, deberá darle clic a “Eliminar” y recibirá el siguiente aviso:<br><br>
                                <img src="../View/img/ayuda/captura32.png" class="img-fluid" alt="..."><br><br>
                                Si hace clic en “Si”, la Ubicación se eliminará y no se volverá a mostrar en la lista ni tampoco a los clientes cuando vayan a presentar una incidencia, aunque permanecerá en la base de datos para las incidencias que ya hayan sido presentadas.<br><br>
                                Si el administrador hace clic en “Añadir ubicación”, le aparecerá el siguiente formulario:<br><br>
                                <img src="../View/img/ayuda/captura33.png" class="img-fluid" alt="..."><br><br>
                                Finalmente, si el administrador hace clic en “Modificar” verá el siguiente formulario:<br><br>
                                <img src="../View/img/ayuda/captura34.png" class="img-fluid" alt="..."><br><br>
                                Si hace clic en “Enviar”, los cambios quedarán registrados en la ubicación seleccionada.<br>

                                </p>
                            </div>
                        </div>
                    </div>

                </div>
                </div>
            </main>

            <!-- Footer -->

            <footer class="container-fluid text-white elfooter">
                <div class="row align-items-center justify-content-center text-center">
                    <div class="col-sm-12 col-md-4 order-1 mt-5 text-warning">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalContacto">Contacto</a>
                    </div>
                    <div class="col-sm-12 col-md-4 order-3 order-md-2 mt-5 text-warning">
                        <a href="https://www.facebook.com/"><img width="35px" height="35px" src="../View/img/facebook.png"></a>
                        <a href="https://twitter.com/"><img width="35px" height="35px" src="../View/img/twitter.png"></a>
                        <a href="https://www.pinterest.es/"><img width="35px" height="35px" src="../View/img/pinterest.png"></a>
                        <a href="https://www.instagram.com/"><img width="35px" height="35px" src="../View/img/instagram.png"></a>
                        <a href="https://www.youtube.com/"><img width="35px" height="35px" src="../View/img/youtube.png"></a>
                    </div>
                    <div class="col-sm-12 col-md-4 order-2 order-md-3 mt-5 text-warning">
                        <a href="../Controller/verAyuda.php">Ayuda</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <br>
                        <br>
                        &copy; Copyright 2020 - Todos los derechos reservados
                        <br>
                        <br>
                        <br>
                    </div>
                </div>
            </footer>

             <!-- Modal con el formulario de contacto -->
            <div class="modal fade" id="modalContacto" tabindex="-1" aria-labelledby="modalContactoLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="modalContactoLabel">Contacte con nosotros</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form>
                        <label for="contactoNombre" class="form-label">Nombre</label>
                        <input type="text" name="contactoNombre" id="contactoNombre" class="form-control" placeholder="Escriba su nombre"><br>
                        <label for="contactoEmail" class="form-label">Email</label>
                        <input type="email" name="contactoEmail" id="contactoEmail" class="form-control" placeholder="Escriba su dirección de email"><br>
                        <label for="contactoMensaje" class="form-label">Mensaje</label>
                        <textarea class="form-control" placeholder="Escriba aquí su mensaje" id="contactoMensaje"></textarea><br>
                    </form>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="contactoEnviar">Enviar</button>
                    </div>
                </div>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

  </body>
</html>