<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../View/css/estilos.css">
    <link rel="stylesheet" href="../View/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="../View/css/jquery-3.6.0.min.js"></script>
    <title>Sistema de gestión de incidencias</title>
    <style>
        .modal-confirm {		
            color: #434e65;
            width: 525px;
        }
        .modal-confirm .modal-content {
            padding: 20px;
            font-size: 16px;
            border-radius: 5px;
            border: none;
        }
        .modal-confirm .modal-header {
            background: #47c9a2;
            border-bottom: none;   
            position: relative;
            text-align: center;
            margin: -20px -20px 0;
            border-radius: 5px 5px 0 0;
            padding: 35px;
        }
        .modal-confirm h4 {
            text-align: center;
            font-size: 36px;
            margin: 10px 0;
        }
        .modal-confirm .form-control, .modal-confirm .btn {
            min-height: 40px;
            border-radius: 3px; 
        }
        .modal-confirm .close {
            position: absolute;
            top: 15px;
            right: 15px;
            color: #fff;
            text-shadow: none;
            opacity: 0.5;
        }
        .modal-confirm .close:hover {
            opacity: 0.8;
        }
        .modal-confirm .icon-box {
            color: #fff;		
            width: 95px;
            height: 95px;
            display: inline-block;
            border-radius: 50%;
            z-index: 9;
            border: 5px solid #fff;
            padding: 15px;
            text-align: center;
        }
        .modal-confirm .icon-box i {
            font-size: 64px;
            margin: -4px 0 0 -4px;
        }
        .modal-confirm.modal-dialog {
            margin-top: 80px;
        }
        .modal-confirm .btn, .modal-confirm .btn:active {
            color: #fff;
            border-radius: 4px;
            background: #eeb711 !important;
            text-decoration: none;
            transition: all 0.4s;
            line-height: normal;
            border-radius: 30px;
            margin-top: 10px;
            padding: 6px 20px;
            border: none;
        }
        .modal-confirm .btn:hover, .modal-confirm .btn:focus {
            background: #eda645 !important;
            outline: none;
        }
        .modal-confirm .btn span {
            margin: 1px 3px 0;
            float: left;
        }
        .modal-confirm .btn i {
            margin-left: 1px;
            font-size: 20px;
            float: right;
        }
        .trigger-btn {
            display: inline-block;
            margin: 100px auto;
        }
    </style>
  </head>
  <body class="h-100">

            <!-- Banner y logos -->

            <header class="container logos-menu mt-3">      
                
                    <h1>Sistema de gestión de incidencias (SGI)</h1>
                
            </header>
        
            <!-- Login -->

            <div class="container h-100">
            <div class="row h-100 justify-content-center align-items-center">

                <div class="col-md-7 bg-light p-5 rounded">

                    <h2 class="text-center bg-primary text-light text-uppercase py-2"><?=$data['textoTitulo']?></h2>

                    <form action="" method="post" id="myForm">
                        <div class="mb-3">
                            <label for="tipo" class="form-label">Tipo: </label>
                            <select required id="tipo" name="tipo" class="form-select">
                                <option value="">-- Elige Tipo --</option>
                                <?php
                                    foreach ($data['tipos'] as $tipo) {

                                        if (isset($data['tipoId'])) {
                                            if ($tipo->getId()==$data['tipoId']) {
                                                echo '<option value="'.$tipo->getId().'" selected="selected">'.$tipo->getNombre().'</option>';
                                            } else {
                                                echo '<option value="'.$tipo->getId().'">'.$tipo->getNombre().'</option>';
                                            }
                                        } else {
                                            echo '<option value="'.$tipo->getId().'">'.$tipo->getNombre().'</option>';
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="ubicacion" class="form-label">Ubicación: </label>
                            <select required id="ubicacion" name="ubicacion" class="form-select">
                                <option value="">-- Elige Ubicacion --</option>
                                <?php
                                    foreach ($data['ubicaciones'] as $ubicacion) {

                                        if (isset($data['ubicacionId'])) {

                                            if ($ubicacion->getId()==$data['ubicacionId']) {
                                                echo '<option value="'.$ubicacion->getId().'" selected="selected">'.$ubicacion->getNombre().'</option>';
                                            } else {
                                                echo '<option value="'.$ubicacion->getId().'">'.$ubicacion->getNombre().'</option>';
                                            }

                                        } else {
                                            echo '<option value="'.$ubicacion->getId().'">'.$ubicacion->getNombre().'</option>';
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Titulo: </label>
                            <?php

                                if (isset($data['titulo'])) {
                                    echo '<input type="text" id="titulo" name="titulo" class="form-control" required placeholder="Escriba el título" value="'.$data['titulo'].'">';
                                } else {
                                    echo '<input type="text" id="titulo" name="titulo" class="form-control" required placeholder="Escriba el título">';
                                }

                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción: </label>
                            <?php

                                if (isset($data['descripcion'])) {
                                    echo '<textarea class="form-control" id="descripcion" name="descripcion" rows="3" required placeholder="Escriba la descripción">'.$data['descripcion'].'</textarea>';
                                } else {
                                    echo '<textarea class="form-control" id="descripcion" name="descripcion" rows="3" required placeholder="Escriba la descripción"></textarea>';
                                }
                            ?>
                        </div>

                        <?php if (isset($data['estado'])): ?>

                            <div class="mb-3">

                                <label for="estado" class="form-label">Estado: </label>
                                <select required id="estado" name="estado" class="form-select">
                                    <option value="0">Pendiente</option>
                                    <option value="2">Resuelto</option>
                                </select>
                                <small class="form-text text-muted">
                                Si dejas el estado como Resuelto, no podrás volver a modificar la incidencia.
                                </small>

                            </div>

                            <input type="hidden" name="id" value="<?=$data['incidenciaId']?>">
                            <input type="hidden" name="fecha" value="<?=$data['fecha']?>">

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" onclick="window.location.href='../Controller/listarIncidenciasPropias.php'">Volver</button>

                        <?php endif ?>

                        <?php if (!isset($data['estado'])): ?>

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" onclick="window.location.href='../index.php'">Volver</button>

                        <?php endif ?>

                        <input type="submit" class="btn btn-success" value="Enviar">
                    </form>

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
                            <p>Tu solicitud ha sido tramitada con éxito.</p>
                            <p>Un técnico lo revisará lo antes posible.</p>
                            <button class="btn btn-success" data-dismiss="modal" onclick="window.location.href='index.php'"><span>Continuar</span> <i class="material-icons">&#xE5C8;</i></button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal HTML de Modificación -->
            <div id="myModalMod" class="modal fade">
                <div class="modal-dialog modal-dialog-centered modal-confirm">
                    <div class="modal-content">
                        <div class="modal-header justify-content-center">
                            <div class="icon-box">
                                <i class="material-icons">&#xE876;</i>
                            </div>
                        </div>
                        <div class="modal-body text-center">
                            <h4>Perfecto!</h4>	
                            <p>Los cambios se han guardado correctamente.</p>
                            <button class="btn btn-success" data-dismiss="modal" onclick="window.location.href='../Controller/listarIncidenciasPropias.php'"><span>Continuar</span> <i class="material-icons">&#xE5C8;</i></button>
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

            <?php if (isset($validacionMod)): ?>
                <script>
                $(document).ready(function(){
                    $('#myModalMod').modal('show');
                });
                </script>
            <?php endif ?>

  </body>
</html>