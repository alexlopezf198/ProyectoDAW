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
        
            <!-- Login -->

            <main>
                <div class="container">
                <div class="row justify-content-center align-items-center" style="min-height: 100vh;">

                    <div class="col-md-7 bg-light p-5 rounded">

                        <h2 class="text-center bg-primary text-light text-uppercase py-2">Panel de login</h2>

                        <form action="" method="post">
                            <div class="mb-3">
                            <label for="dni" class="form-label">Usuario: </label>
                            <input type="text" id="dni" name="dni" class="form-control <?php if (isset($dni_error)): ?> is-invalid <?php endif ?>" required placeholder="Escriba su DNI">
                                <?php if (isset($dni_error)): ?>
                                        <div class="invalid-feedback">
                                            <?php echo $dni_error; ?>
                                        </div>
                                <?php endif ?>
                            </div>
                            <div class="mb-3">
                            <label for="password" class="form-label">Contraseña: </label>
                            <input type="password" id="password" name="password" class="form-control <?php if (isset($pass_error)): ?> is-invalid <?php endif ?>" required placeholder="Escriba contraseña">
                                <?php if (isset($pass_error)): ?>
                                        <div class="invalid-feedback">
                                            <?php echo $pass_error; ?>
                                        </div>
                                <?php endif ?>
                            </div>
                            <div class="mb-3">
                            <label for="recordar" class="form-check-label">Recordar</label>
                            <input type="checkbox" id="recordar" name="recordar" class="form-check-input">
                            </div>

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" onclick="window.location.href='registrarse.php'">Registrarse</button>
                            <input type="submit" class="btn btn-success" value="Iniciar sesión">
                        </form>

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