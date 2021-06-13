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
                            <li class="list-group-item active" aria-current="true"><a href="?p=2">2. Inicio de sesión</a></li>
                            <li class="list-group-item"><a href="?p=3">3. Uso de la aplicación como cliente</a></li>
                            <li class="list-group-item"><a href="?p=4">4. Uso de la aplicación como técnico</a></li>
                            <li class="list-group-item"><a href="?p=5">5. Uso de la aplicación como administrador</a></li>
                        </ul>

                        <br>
                        <div class="container cuerpoAyuda">
                            <div class="col-12 rounded pt-4 pb-1">
                                <h4 class="text-center"><b><u>Inicio de sesión</u></b></h4><br>
                                <p>Para iniciar sesión, el usuario tan solo debe encontrarse en la pantalla de Login, rellenar sus datos y dar click en “Iniciar sesión”. Si lo desea, puede marcar la casilla “Recordar”, lo cual almacenará una Cookie en su navegador para que la sesión no se cierre cuando cierre el navegador.<br><br>
                                <img src="../View/img/ayuda/captura4.png" class="img-fluid" alt="..."><br><br>
                                Si el usuario posee permisos especiales como el de Técnico o Administrador, le aparecerá la siguiente pantalla donde deberá elegir el rol deseado.<br><br>
                                <img src="../View/img/ayuda/captura5.png" class="img-fluid" alt="..."><br><br>
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