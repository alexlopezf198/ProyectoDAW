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

                            <h2 class="text-center bg-primary text-light text-uppercase py-2">Gestión de tipos</h2>

                            <div class="row mt-3 mb-3">
                            <form action="" method="post">
                                    
                                    <div class="col d-flex flex-row align-items-center">
                                        <div class="col-lg-1 col-sm-2 col-3">
                                            <label for="nombreTipo" class="form-label">Tipo: </label>
                                        </div>
                                        <div class="col-lg-3 col-sm-5">
                                        <input type="text" id="nombreTipo" name="nombreTipo" class="form-control" required placeholder="Escriba el nombre">
                                        </div>
                                        <div class="col-lg-4 ms-3 col-sm-5">
                                        <input type="submit" class="btn btn-primary" value="Buscar">
                                        </div>
                                    </div>
                                    
                            </form>
                            </div>

                            <div class="table-responsive mb-2 mb-lg-0">

                                <table class="table table-striped">
                                    <tr>
                                    <th>Id</th><th>Nombre</th><th style="width:10%"></th><th style="width:10%"></th><th style="width:10%"></th>
                                    </tr>

                                    <?php
                                    foreach ($data['tipos'] as $tipo) {

                                    ?>
                                        <?php if(!$tipo->getEstaEliminado()): ?>
                                            <tr>
                                                <td><?=$tipo->getId()?></td><td><?=$tipo->getNombre()?></td>
                                                <td>

                                                    <form action="" method="post">
                                                        <input type="hidden" name="nombre" value="<?=$tipo->getNombre()?>">
                                                        <input type="hidden" name="descripcion" value="<?=$tipo->getDescripcion()?>">
                                                        <input type="submit" class="btn btn-dark" value="Detalles">
                                                    </form>
                                                
                                                </td>
                                                <td>

                                                    <form action="../Controller/modificarTipo.php" method="post">
                                                        <input type="hidden" name="tipoId" value="<?=$tipo->getId()?>">
                                                        <input type="hidden" name="tipoNombre" value="<?=$tipo->getNombre()?>">
                                                        <input type="hidden" name="tipoDescripcion" value="<?=$tipo->getDescripcion()?>">
                                                        <input type="hidden" name="tipoEstaEliminado" value="<?=$tipo->getEstaEliminado()?>">
                                                        <input type="submit" class="btn btn-primary" value="Modificar">
                                                    </form>
                                                
                                                </td>

                                                <td>

                                                    <form action="" method="post">
                                                        <input type="hidden" name="tipoIdEliminar" value="<?=$tipo->getId()?>">
                                                        <input type="submit" class="btn btn-danger" value="Eliminar">
                                                    </form>
                                                
                                                </td>
                                            </tr>
                                        <?php endif ?>
                                    <?php
                                    }
                                    ?>

                                </table>

                            </div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" onclick="window.location.href='../index.php'">Volver</button>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" onclick="window.location.href='../Controller/nuevoTipo.php'">Añadir tipo</button>

                        </div>

                </div>
                </div>
            </main>

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

            <!-- Modal de Detalles -->
            <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="revisionIncidenciaLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?php if(isset($_POST['nombre'])) { echo $_POST['nombre']; } ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?php if(isset($_POST['nombre'])) { echo $_POST['descripcion']; } ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal de Eliminar Tipo -->
            <div class="modal fade" id="myModal2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="revisionIncidenciaLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Eliminar tipo</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ¿Estás seguro de que desea eliminar el tipo?
                        </div>
                        <div class="modal-footer">
                            <form action="../Controller/eliminarTipo.php" method="post">
                                <input type="hidden" name="tipoId" value="<?=$_POST['tipoIdEliminar']?>">
                                <input type="submit" class="btn btn-primary" value="Sí">
                            </form>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

            <?php if (isset($_POST['nombre'])): ?>
                <script>
                    $(document).ready(function(){
                        $('#myModal').modal('show');
                    });
                </script>
            <?php endif ?>

            <?php if (isset($_POST['tipoIdEliminar'])): ?>
                <script>
                    $(document).ready(function(){
                        $('#myModal2').modal('show');
                    });
                </script>
            <?php endif ?>
  </body>
</html>