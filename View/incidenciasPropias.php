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
        
            <!-- Listado de incidencias -->

            <div class="container h-100">
            <div class="row h-100 justify-content-center align-items-center">

                <div class="col-12 bg-light p-5 rounded">

                    <h2 class="text-center bg-primary text-light text-uppercase py-2">Lista de incidencias</h2>

                    <form action="" method="post">
                        <div class="row mt-3 mb-3">
                            <label for="tipo" class="col-sm-1 col-form-label">Tipo: </label>
                            <div class="col-3">
                                <select required id="tipo" name="tipo" class="form-select">
                                    <option value="">-- Elige Tipo --</option>
                                    <?php
                                        foreach ($data['tipos'] as $tipo) {
                                            echo '<option value="'.$tipo->getId().'">'.$tipo->getNombre().'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col">
                            <input type="submit" class="btn btn-primary" value="Filtrar">
                            </div>
                        </div>
                    </form>

                    <form action="" method="post">
                        <div class="row mt-3 mb-3">
                            <label for="ubicacion" class="col-sm-1 col-form-label">Ubicación: </label>
                            <div class="col-3">
                                <select required id="ubicacion" name="ubicacion" class="form-select">
                                    <option value="">-- Elige Ubicación --</option>
                                    <?php
                                        foreach ($data['ubicaciones'] as $ubicacion) {
                                            echo '<option value="'.$ubicacion->getId().'">'.$ubicacion->getNombre().'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col">
                            <input type="submit" class="btn btn-primary" value="Filtrar">
                            </div>
                        </div>
                    </form>

                    <table class="table table-striped">
                        <tr>
                        <th>Tipo</th><th>Ubicacion</th><th>Título</th><th>Fecha</th><th>Estado</th><th>Usuario</th><th></th>
                        </tr>

                        <?php
                        foreach ($data['incidencias'] as $incidencia) {

                            if ($incidencia->getEstado()==0) {
                                $incidenciaTexto = "Pendiente";
                            } else if ($incidencia->getEstado()==1) {
                                $incidenciaTexto = "En proceso";
                            } else if ($incidencia->getEstado()==2) {
                                $incidenciaTexto = "Resuelto";
                            }

                            $tipo = Tipo::getTipoById($incidencia->getId_tipo());
                            $tipoTexto = $tipo->getNombre();
                            $ubicacion = Ubicacion::getUbicacionById($incidencia->getId_ubicacion());
                            $ubicacionTexto = $ubicacion->getNombre();

                        ?>
                        <tr>
                            <td><?=$tipoTexto?></td><td><?=$ubicacionTexto?></td><td><?=$incidencia->getTitulo()?></td></td><td><?=$incidencia->getFecha()?></td><td><?=$incidenciaTexto?></td><td><?=$incidencia->getId_usuario()?></td>
                            <td>
                            
                            <form action="../Controller/modificarIncidencia.php" method="post" id="myForm">
                                <input type="hidden" name="tipo" value="<?=$incidencia->getId_tipo()?>">
                                <input type="hidden" name="ubicacion" value="<?=$incidencia->getId_ubicacion()?>">
                                <input type="hidden" name="titulo" value="<?=$incidencia->getTitulo()?>">
                                <input type="hidden" name="descripcion" value="<?=$incidencia->getDescripcion()?>">
                                <input type="hidden" name="estado" value="<?=$incidencia->getEstado()?>">
                                <input type="submit" class="btn btn-success" value="Modificar">
                            </form>
                            
                            </td>    
                        </tr>
                        <?php
                        }
                        ?>

                    </table>
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