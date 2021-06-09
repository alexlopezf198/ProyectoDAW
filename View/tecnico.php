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
                
                    <h1>Sistema de gestión de incidencias (SGI)</h1>
                
            </header>
        
            <!-- Cuerpo de la web -->

            <main>
                <div class="container">
                <div class="row justify-content-center align-items-center" style="min-height: 100vh;">

                    <div class="col-md-12 bg-light p-5">

                        <h2 class="text-center py-2">Bienvenido, <?=$data['nombre']?> <?=$data['apellidos']?>.</h2>

                        <div class="row mt-3">
                            <div class="col d-flex flex-lg-row flex-column justify-content-center">
                                <button type="button" class="btn btn-primary mb-1 mb-lg-0" onclick="window.location.href='../Controller/verIncidenciasRegistradas.php'">Ver incidencias registradas</button>
                                <button type="button" class="btn btn-primary ms-lg-1 mb-1 mb-lg-0" onclick="window.location.href='../Controller/verIncidenciasTecnico.php'">Ver incidencias atendidas</button>

                                <?php if (isset($_SESSION['rol'])): ?>

                                    <form action="" method="post" class="ms-lg-1 mb-1 mb-lg-0 d-grid gap-2">
                                        <input type="hidden" name="cambiarRol" value="">
                                        <button type="submit" class="btn btn-primary">Cambiar rol</button>
                                    </form>
                                    
                                <?php endif ?>

                                <button type="button" class="btn btn-danger ms-lg-1" onclick="window.location.href='cerrarSesion.php'">Cerrar sesión</button>
                            </div>
                        </div>

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

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

  </body>
</html>