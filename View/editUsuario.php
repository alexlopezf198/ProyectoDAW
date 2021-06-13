<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../View/css/estilos.css">
    <link rel="stylesheet" href="../View/css/estilosModal.css">
    <link rel="stylesheet" href="../View/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="../View/css/jquery-3.6.0.min.js"></script>
    <title>Sistema de gestión de incidencias</title>
  </head>
  <body>

            <!-- Banner y logos -->

            <header class="logos-menu mt-3">      
                
                    <img src="../View/img/logo.png" class="img-fluid" alt="...">
                
            </header>
        
            <!-- Cuerpo de la web -->

            <main>
                <div class="container mt-3 mb-3">
                <div class="row justify-content-center align-items-center" style="min-height: 76vh;">

                    <div class="col-md-7 bg-light p-5 rounded">

                        <h2 class="text-center bg-primary text-light text-uppercase py-2">Modificar usuario</h2>

                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre: </label>
                                <input type="text" id="nombre" name="nombre" class="form-control" required placeholder="Escriba el nombre" value="<?=$data['usuarioNombre']?>">
                            </div>

                            <div class="mb-3">
                                <label for="apellidos" class="form-label">Apellidos: </label>
                                <input type="text" id="apellidos" name="apellidos" class="form-control" required placeholder="Escriba los apellidos" value="<?=$data['usuarioApellidos']?>">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email: </label>
                                <input type="email" id="email" name="email" class="form-control" required placeholder="Escriba el email" value="<?=$data['usuarioEmail']?>">
                            </div>

                            <div class="mb-3">
                                <label for="provincia" class="form-label">Provincia: </label>
                                <select required id="provincia" name="provincia" class="form-select">
                                    <option value="">-- Elige Provincia --</option>
                                    <option value="Álava" <?php if($data['usuarioProvincia']=="Álava"): ?> selected="selected" <?php endif ?>>Álava</option>
                                    <option value="Albacete" <?php if($data['usuarioProvincia']=="Albacete"): ?> selected="selected" <?php endif ?>>Albacete</option>
                                    <option value="Alicante" <?php if($data['usuarioProvincia']=="Alicante"): ?> selected="selected" <?php endif ?>>Alicante</option>
                                    <option value="Almería" <?php if($data['usuarioProvincia']=="Almería"): ?> selected="selected" <?php endif ?>>Almería</option>
                                    <option value="Asturias" <?php if($data['usuarioProvincia']=="Asturias"): ?> selected="selected" <?php endif ?>>Asturias</option>
                                    <option value="Ávila" <?php if($data['usuarioProvincia']=="Ávila"): ?> selected="selected" <?php endif ?>>Ávila</option>
                                    <option value="Badajoz" <?php if($data['usuarioProvincia']=="Badajoz"): ?> selected="selected" <?php endif ?>>Badajoz</option>
                                    <option value="Baleares" <?php if($data['usuarioProvincia']=="Baleares"): ?> selected="selected" <?php endif ?>>Baleares</option>
                                    <option value="Barcelona" <?php if($data['usuarioProvincia']=="Barcelona"): ?> selected="selected" <?php endif ?>>Barcelona</option>
                                    <option value="Burgos" <?php if($data['usuarioProvincia']=="Burgos"): ?> selected="selected" <?php endif ?>>Burgos</option>
                                    <option value="Cáceres" <?php if($data['usuarioProvincia']=="Cáceres"): ?> selected="selected" <?php endif ?>>Cáceres</option>
                                    <option value="Cádiz" <?php if($data['usuarioProvincia']=="Cádiz"): ?> selected="selected" <?php endif ?>>Cádiz</option>
                                    <option value="Cantabria" <?php if($data['usuarioProvincia']=="Cantabria"): ?> selected="selected" <?php endif ?>>Cantabria</option>
                                    <option value="Castellón" <?php if($data['usuarioProvincia']=="Castellón"): ?> selected="selected" <?php endif ?>>Castellón</option>
                                    <option value="Ceuta" <?php if($data['usuarioProvincia']=="Ceuta"): ?> selected="selected" <?php endif ?>>Ceuta</option>
                                    <option value="Ciudad Real" <?php if($data['usuarioProvincia']=="Ciudad Real"): ?> selected="selected" <?php endif ?>>Ciudad Real</option>
                                    <option value="Córdoba" <?php if($data['usuarioProvincia']=="Córdoba"): ?> selected="selected" <?php endif ?>>Córdoba</option>
                                    <option value="Cuenca" <?php if($data['usuarioProvincia']=="Cuenca"): ?> selected="selected" <?php endif ?>>Cuenca</option>
                                    <option value="Gerona" <?php if($data['usuarioProvincia']=="Gerona"): ?> selected="selected" <?php endif ?>>Gerona</option>
                                    <option value="Granada" <?php if($data['usuarioProvincia']=="Granada"): ?> selected="selected" <?php endif ?>>Granada</option>
                                    <option value="Guadalajara" <?php if($data['usuarioProvincia']=="Guadalajara"): ?> selected="selected" <?php endif ?>>Guadalajara</option>
                                    <option value="Guipúzcoa" <?php if($data['usuarioProvincia']=="Guipúzcoa"): ?> selected="selected" <?php endif ?>>Guipúzcoa</option>
                                    <option value="Huelva" <?php if($data['usuarioProvincia']=="Huelva"): ?> selected="selected" <?php endif ?>>Huelva</option>
                                    <option value="Huesca" <?php if($data['usuarioProvincia']=="Huesca"): ?> selected="selected" <?php endif ?>>Huesca</option>
                                    <option value="Jaén" <?php if($data['usuarioProvincia']=="Jaén"): ?> selected="selected" <?php endif ?>>Jaén</option>
                                    <option value="La Coruña" <?php if($data['usuarioProvincia']=="La Coruña"): ?> selected="selected" <?php endif ?>>La Coruña</option>
                                    <option value="La Rioja" <?php if($data['usuarioProvincia']=="La Rioja"): ?> selected="selected" <?php endif ?>>La Rioja</option>
                                    <option value="Las Palmas" <?php if($data['usuarioProvincia']=="Las Palmas"): ?> selected="selected" <?php endif ?>>Las Palmas</option>
                                    <option value="León" <?php if($data['usuarioProvincia']=="León"): ?> selected="selected" <?php endif ?>>León</option>
                                    <option value="Lérida" <?php if($data['usuarioProvincia']=="Lérida"): ?> selected="selected" <?php endif ?>>Lérida</option>
                                    <option value="Lugo" <?php if($data['usuarioProvincia']=="Lugo"): ?> selected="selected" <?php endif ?>>Lugo</option>
                                    <option value="Madrid" <?php if($data['usuarioProvincia']=="Madrid"): ?> selected="selected" <?php endif ?>>Madrid</option>
                                    <option value="Málaga" <?php if($data['usuarioProvincia']=="Málaga"): ?> selected="selected" <?php endif ?>>Málaga</option>
                                    <option value="Melilla" <?php if($data['usuarioProvincia']=="Melilla"): ?> selected="selected" <?php endif ?>>Melilla</option>
                                    <option value="Murcia" <?php if($data['usuarioProvincia']=="Murcia"): ?> selected="selected" <?php endif ?>>Murcia</option>
                                    <option value="Navarra" <?php if($data['usuarioProvincia']=="Navarra"): ?> selected="selected" <?php endif ?>>Navarra</option>
                                    <option value="Orense" <?php if($data['usuarioProvincia']=="Orense"): ?> selected="selected" <?php endif ?>>Orense</option>
                                    <option value="Palencia" <?php if($data['usuarioProvincia']=="Palencia"): ?> selected="selected" <?php endif ?>>Palencia</option>
                                    <option value="Pontevedra" <?php if($data['usuarioProvincia']=="Pontevedra"): ?> selected="selected" <?php endif ?>>Pontevedra</option>
                                    <option value="Salamanca" <?php if($data['usuarioProvincia']=="Salamanca"): ?> selected="selected" <?php endif ?>>Salamanca</option>
                                    <option value="Segovia" <?php if($data['usuarioProvincia']=="Segovia"): ?> selected="selected" <?php endif ?>>Segovia</option>
                                    <option value="Sevilla" <?php if($data['usuarioProvincia']=="Sevilla"): ?> selected="selected" <?php endif ?>>Sevilla</option>
                                    <option value="Soria" <?php if($data['usuarioProvincia']=="Soria"): ?> selected="selected" <?php endif ?>>Soria</option>
                                    <option value="Tarragona" <?php if($data['usuarioProvincia']=="Tarragona"): ?> selected="selected" <?php endif ?>>Tarragona</option>
                                    <option value="Tenerife" <?php if($data['usuarioProvincia']=="Tenerife"): ?> selected="selected" <?php endif ?>>Tenerife</option>
                                    <option value="Teruel" <?php if($data['usuarioProvincia']=="Teruel"): ?> selected="selected" <?php endif ?>>Teruel</option>
                                    <option value="Toledo" <?php if($data['usuarioProvincia']=="Toledo"): ?> selected="selected" <?php endif ?>>Toledo</option>
                                    <option value="Valencia" <?php if($data['usuarioProvincia']=="Valencia"): ?> selected="selected" <?php endif ?>>Valencia</option>
                                    <option value="Valladolid" <?php if($data['usuarioProvincia']=="Valladolid"): ?> selected="selected" <?php endif ?>>Valladolid</option>
                                    <option value="Vizcaya" <?php if($data['usuarioProvincia']=="Vizcaya"): ?> selected="selected" <?php endif ?>>Vizcaya</option>
                                    <option value="Zamora" <?php if($data['usuarioProvincia']=="Zamora"): ?> selected="selected" <?php endif ?>>Zamora</option>
                                    <option value="Zaragoza" <?php if($data['usuarioProvincia']=="Zaragoza"): ?> selected="selected" <?php endif ?>>Zaragoza</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="localidad" class="form-label">Localidad: </label>
                                <input type="text" id="localidad" name="localidad" class="form-control" required placeholder="Escriba la localidad" value="<?=$data['usuarioLocalidad']?>">
                            </div>

                            <div class="mb-3">
                                <label for="fechanac" class="form-label">Fecha de nacimiento: </label>
                                <input type="date" id="fechanac" name="fechanac" class="form-control" required placeholder="Escriba la fecha de nacimiento" value="<?=$data['usuarioFecha']?>">
                            </div>

                            <div class="mb-3">
                                <label for="nuevaContrasenia" class="form-label">Nueva contraseña: </label>
                                <input type="text" id="nuevaContrasenia" name="nuevaContrasenia" class="form-control" placeholder="Escriba la contraseña" value="">
                                <small class="form-text text-muted">
                                    Rellena el campo si quieres cambiar la contraseña, en caso contrario déjalo en blanco.
                                </small>
                            </div>

                            <div class="mb-4">
                                <label for="permisos" class="form-label">Permisos: </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="tecnico" name="tecnico" <?php if ($data['usuarioEsTecnico']): ?> checked <?php endif ?>>
                                    <label class="form-check-label" for="tecnico">
                                        Técnico
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="admin" name="admin" <?php if ($data['usuarioEsAdmin']): ?> checked <?php endif ?>>
                                    <label class="form-check-label" for="admin">
                                        Administrador
                                    </label>
                                </div>
                            </div>

                            <input type="hidden" name="dni" value="<?=$data['usuarioId']?>">
                            <input type="hidden" name="estaEliminado" value="<?=$data['usuarioEstaEliminado']?>">
                            <input type="hidden" name="contrasenia" value="<?=$data['usuarioContrasenia']?>">

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" onclick="window.location.href='../Controller/gestionarUsuarios.php'">Volver</button>
                            <input type="submit" class="btn btn-success" value="Enviar">
                        </form>

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

            <!-- Modal HTML -->
            <div id="myModal" class="modal fade">
                <div class="modal-dialog modal-dialog-centered modal-confirm">
                    <div class="modal-content">
                        <div class="modal-header justify-content-center">
                            <div class="icon-box">
                                <i class="material-icons">&#xE876;</i>
                            </div>
                        </div>
                        <div class="modal-body text-center">
                            <h4>Perfecto!</h4>	
                            <p>Los cambios han sido registrados correctamente.</p>
                            <p>No olvides notificar al usuario.</p>
                            <button class="btn btn-success" data-dismiss="modal" onclick="window.location.href='../Controller/gestionarUsuarios.php'"><span>Continuar</span> <i class="material-icons">&#xE5C8;</i></button>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

            <?php if (isset($validacion)): ?>
                <script>
                $(document).ready(function(){
                    $('#myModal').modal('show');
                });
                </script>
            <?php endif ?>

  </body>
</html>