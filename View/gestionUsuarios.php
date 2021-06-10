<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../View/css/estilos.css">
    <script src="../View/css/jquery-3.6.0.min.js"></script>
    <title>Sistema de gestión de incidencias</title>
  </head>
  <body>

            <!-- Banner y logos -->

            <header class="logos-menu mt-3">      
                
                    <h1>Sistema de gestión de incidencias (SGI)</h1>
                
            </header>
        
            <!-- Cuerpo de la web -->

            <main>
                <div class="container">
                <div class="row justify-content-center align-items-center" style="min-height: 100vh;">

                        <div class="col-12 bg-light p-5 rounded">

                            <h2 class="text-center bg-primary text-light text-uppercase py-2">Gestión de usuarios</h2>

                            <div class="row mt-3 mb-3">
                            <form action="" method="post">
                                    
                                    <div class="col d-flex flex-row align-items-center">
                                        <div class="col-lg-1 col-sm-2 col-3">
                                            <label for="dniUsuario" class="form-label">Usuario: </label>
                                        </div>
                                        <div class="col-lg-3 col-sm-5">
                                        <input type="text" id="dniUsuario" name="dniUsuario" class="form-control" required placeholder="Escriba el DNI">
                                        </div>
                                        <div class="col-lg-4 ms-3 col-sm-5">
                                        <input type="submit" class="btn btn-primary" value="Buscar">
                                        </div>
                                    </div>
                                    
                            </form>
                            </div>

                            <div class="row mt-3 mb-3">
                            <form action="" method="post">
                                    
                                    <div class="col d-flex flex-row align-items-center">
                                        <div class="col-lg-1 col-sm-2 col-3">
                                            <label for="grupo" class="form-label">Grupo: </label>
                                        </div>
                                        <div class="col-lg-3 col-sm-5">
                                            <select required id="grupo" name="grupo" class="form-select">
                                                <option value="">-- Elige Grupo --</option>
                                                <option value="clientes">Clientes</option>
                                                <option value="tecnicos">Técnicos</option>
                                                <option value="administradores">Administradores</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 ms-3 col-sm-5">
                                        <input type="submit" class="btn btn-primary" value="Filtrar">
                                        </div>
                                    </div>
                                    
                            </form>
                            </div>
                            

                            <div class="table-responsive mb-2 mb-lg-0">

                                <table class="table table-striped">
                                    <tr>
                                    <th>Nombre</th><th>Apellidos</th><th>DNI</th><th>Email</th><th>Provincia</th><th>Localidad</th><th>Fecha de nacimiento</th><th></th><th></th>
                                    </tr>

                                    <?php
                                    // Añado un if para controlar si hay 1 usuario o más de cara al uso del foreach (cuando se usa el botón Buscar)
                                    if (!isset($usuario)) {

                                    foreach ($data['usuarios'] as $usuario) {

                                    ?>
                                    <tr>
                                        <td><?=$usuario->getNombre()?></td><td><?=$usuario->getApellidos()?></td><td><?=$usuario->getDni()?></td></td><td><?=$usuario->getEmail()?></td><td><?=$usuario->getProvincia()?></td><td><?=$usuario->getLocalidad()?></td><td><?=$usuario->getFechaNacimiento()?></td>
                                        <td>

                                            <form action="../Controller/modificarUsuario.php" method="post">
                                                <input type="hidden" name="usuarioId" value="<?=$usuario->getDni()?>">
                                                <input type="hidden" name="usuarioNombre" value="<?=$usuario->getNombre()?>">
                                                <input type="hidden" name="usuarioApellidos" value="<?=$usuario->getApellidos()?>">
                                                <input type="hidden" name="usuarioEmail" value="<?=$usuario->getEmail()?>">
                                                <input type="hidden" name="usuarioProvincia" value="<?=$usuario->getProvincia()?>">
                                                <input type="hidden" name="usuarioLocalidad" value="<?=$usuario->getLocalidad()?>">
                                                <input type="hidden" name="usuarioFecha" value="<?=$usuario->getFechaNacimiento()?>">
                                                <input type="hidden" name="usuarioContrasenia" value="<?=$usuario->getContrasenia()?>">
                                                <input type="hidden" name="usuarioEsTecnico" value="<?=$usuario->getEsTecnico()?>">
                                                <input type="hidden" name="usuarioEsAdmin" value="<?=$usuario->getEsAdmin()?>">
                                                <input type="hidden" name="usuarioEstaEliminado" value="<?=$usuario->getEstaEliminado()?>">
                                                <input type="submit" class="btn btn-modificar" value="Modificar">
                                            </form>
                                        
                                        </td>

                                        <?php if(!$usuario->getEstaEliminado()): ?>

                                        <td>

                                            <form action="../Controller/eliminarUsuario.php" method="post">
                                                <input type="hidden" name="usuarioId" value="<?=$usuario->getDni()?>">
                                                <input type="hidden" name="p" value="<?=$pagina?>">
                                                <input type="submit" class="btn btn-danger" value="Eliminar">
                                            </form>
                                        
                                        </td>

                                        <?php endif ?>

                                        <?php if($usuario->getEstaEliminado()): ?>

                                        <td>

                                            <form action="../Controller/activarUsuario.php" method="post">
                                                <input type="hidden" name="usuarioId" value="<?=$usuario->getDni()?>">
                                                <input type="hidden" name="p" value="<?=$pagina?>">
                                                <input type="submit" class="btn btn-success" value="Activar">
                                            </form>

                                        </td>

                                        <?php endif ?>
                                    </tr>

                                    <?php
                                        }
                                    } else {
                                    ?>

                                    <tr>
                                        <td><?=$usuario->getNombre()?></td><td><?=$usuario->getApellidos()?></td><td><?=$usuario->getDni()?></td></td><td><?=$usuario->getEmail()?></td><td><?=$usuario->getProvincia()?></td><td><?=$usuario->getLocalidad()?></td><td><?=$usuario->getFechaNacimiento()?></td>
                                        <td>

                                            <form action="../Controller/modificarUsuario.php" method="post">
                                                <input type="hidden" name="usuarioId" value="<?=$usuario->getDni()?>">
                                                <input type="hidden" name="usuarioNombre" value="<?=$usuario->getNombre()?>">
                                                <input type="hidden" name="usuarioApellidos" value="<?=$usuario->getApellidos()?>">
                                                <input type="hidden" name="usuarioEmail" value="<?=$usuario->getEmail()?>">
                                                <input type="hidden" name="usuarioProvincia" value="<?=$usuario->getProvincia()?>">
                                                <input type="hidden" name="usuarioLocalidad" value="<?=$usuario->getLocalidad()?>">
                                                <input type="hidden" name="usuarioFecha" value="<?=$usuario->getFechaNacimiento()?>">
                                                <input type="hidden" name="usuarioContrasenia" value="<?=$usuario->getContrasenia()?>">
                                                <input type="hidden" name="usuarioEsTecnico" value="<?=$usuario->getEsTecnico()?>">
                                                <input type="hidden" name="usuarioEsAdmin" value="<?=$usuario->getEsAdmin()?>">
                                                <input type="hidden" name="usuarioEstaEliminado" value="<?=$usuario->getEstaEliminado()?>">
                                                <input type="submit" class="btn btn-modificar" value="Modificar">
                                            </form>
                                        
                                        </td>

                                        <?php if(!$usuario->getEstaEliminado()): ?>

                                        <td>

                                            <form action="../Controller/eliminarUsuario.php" method="post">
                                                <input type="hidden" name="usuarioId" value="<?=$usuario->getDni()?>">
                                                <input type="hidden" name="p" value="<?=$pagina?>">
                                                <input type="submit" class="btn btn-danger" value="Eliminar">
                                            </form>
                                        
                                        </td>

                                        <?php endif ?>

                                        <?php if($usuario->getEstaEliminado()): ?>

                                        <td>

                                            <form action="../Controller/activarUsuario.php" method="post">
                                                <input type="hidden" name="usuarioId" value="<?=$usuario->getDni()?>">
                                                <input type="hidden" name="p" value="<?=$pagina?>">
                                                <input type="submit" class="btn btn-success" value="Activar">
                                            </form>

                                        </td>

                                        <?php endif ?>
                                    </tr>

                                    <?php
                                    }
                                    ?>


                                </table>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" onclick="window.location.href='../index.php'">Volver</button>
                                </div>

                                <!-- Paginación -->

                                <?php if (!isset($_POST['dniUsuario']) && !isset($_POST['grupo'])): ?>

                                <div class="col">
                                    <nav aria-label="Botones de paginación" class="mt-1">
                                        <ul class="pagination pagination-sm justify-content-end m-0">
                                            <li class="page-item <?php if($pagina <= 1){ echo 'disabled'; } ?>">
                                                <a class="page-link"
                                                    href="<?php if($pagina <= 1){ echo ''; } else { echo "?p=" . ($pagina-1); } ?>">Anterior</a>
                                            </li>

                                            <?php for($i = 1; $i <= $paginas_totales; $i++ ): ?>
                                            <li class="page-item <?php if($pagina == $i) {echo 'active'; } ?>">
                                                <a class="page-link" href="?p=<?= $i; ?>"> <?= $i; ?> </a>
                                            </li>
                                            <?php endfor; ?>

                                            <li class="page-item <?php if($pagina >= $paginas_totales) { echo 'disabled'; } ?>">
                                                <a class="page-link"
                                                    href="<?php if($pagina >= $paginas_totales){ echo ''; } else {echo "?p=". ($pagina+1); } ?>">Siguiente</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>

                                <?php endif ?>
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
                        <a href="#">Ayuda</a>
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