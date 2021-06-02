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
  <body class="h-100">

            <!-- Banner y logos -->

            <header class="container logos-menu mt-3">      
                
                    <h1>Sistema de gestión de incidencias (SGI)</h1>
                
            </header>
        
            <!-- Formulario cambio de estado -->

            <div class="container h-100">
            <div class="row h-100 justify-content-center align-items-center">

                <div class="col-md-12 bg-light p-5">

                    <h2 class="text-center py-2">Cambiar estado de la incidencia:</h2>

                    <div class="row mt-3">
                        <div class="col d-flex flex-row justify-content-center">
                            <form action="" method="post">
                                <input type="hidden" name="incidenciaId" value="<?=$_POST['incidenciaId']?>">
                                <select required id="estadoform" name="estadoform" class="form-select">
                                    <option value="1">En proceso</option>
                                    <option value="2">Resuelto</option>
                                </select>
                                <small class="form-text text-muted">
                                Si dejas el estado como Resuelto, no podrás volver a modificar la incidencia.
                                </small><br><br>
                                <button type="button" class="btn btn-primary" onclick="window.location.href='../Controller/verIncidenciasTecnico.php'">Volver</button>
                                <input type="submit" class="btn btn-success" value="Enviar">
                            </form>
                        </div>
                    </div>

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