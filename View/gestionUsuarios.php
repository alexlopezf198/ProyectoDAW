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
  <body class="h-100">

            <!-- Banner y logos -->

            <header class="container logos-menu mt-3">      
                
                    <h1>Sistema de gestión de incidencias (SGI)</h1>
                
            </header>
        
            <!-- Listado de usuarios -->

            <div class="container h-100">
                <div class="row h-100 justify-content-center align-items-center">

                    <div class="col-12 bg-light p-5 rounded">

                        <h2 class="text-center bg-primary text-light text-uppercase py-2">Gestión de usuarios</h2>

                        <div class="row mt-3 mb-3">
                        <form action="" method="post">
                                
                                <div class="col d-flex flex-row align-items-center">
                                    <div class="col-lg-1 col-sm-2 col-3">
                                        <label for="dniUsuario" class="form-label">Usuario: </label>
                                    </div>
                                    <div class="col-lg-2 col-sm-4">
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
                                    <div class="col-lg-2 col-sm-4">
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
                                            <input type="submit" class="btn btn-primary" value="Modificar">
                                        </form>
                                    
                                    </td>

                                    <?php if(!$usuario->getEstaEliminado()): ?>

                                    <td>

                                        <form action="../Controller/eliminarUsuario.php" method="post">
                                            <input type="hidden" name="usuarioId" value="<?=$usuario->getDni()?>">
                                            <input type="submit" class="btn btn-danger" value="Eliminar">
                                        </form>
                                    
                                    </td>

                                    <?php endif ?>

                                    <?php if($usuario->getEstaEliminado()): ?>

                                    <td>

                                        <form action="../Controller/activarUsuario.php" method="post">
                                            <input type="hidden" name="usuarioId" value="<?=$usuario->getDni()?>">
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

                                        <form action="" method="post">
                                            <input type="submit" class="btn btn-primary" value="Modificar">
                                        </form>
                                    
                                    </td>

                                    <?php if(!$usuario->getEstaEliminado()): ?>

                                    <td>

                                        <form action="../Controller/eliminarUsuario.php" method="post">
                                            <input type="hidden" name="usuarioId" value="<?=$usuario->getDni()?>">
                                            <input type="submit" class="btn btn-danger" value="Eliminar">
                                        </form>
                                    
                                    </td>

                                    <?php endif ?>

                                    <?php if($usuario->getEstaEliminado()): ?>

                                    <td>

                                        <form action="../Controller/activarUsuario.php" method="post">
                                            <input type="hidden" name="usuarioId" value="<?=$usuario->getDni()?>">
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
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" onclick="window.location.href='../index.php'">Volver</button>

                    </div>

                </div>
            </div>

            <!-- Footer -->

            <footer class="container-fluid text-white elfooter">
                <div class="row align-items-center justify-content-center text-center">
                    <div class="col-sm-12 col-md-6 mt-5 text-warning">
                        <a href="#">Contacto</a>
                    </div>
                    <div class="col-sm-12 col-md-6 mt-5 text-warning">
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

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>