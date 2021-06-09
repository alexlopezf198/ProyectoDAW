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
                
                    <h1>Sistema de gestión de incidencias (SGI)</h1>
                
            </header>
        
            <!-- Cuerpo de la web -->

            <main>
                <div class="container">
                <div class="row justify-content-center align-items-center" style="min-height: 100vh;">

                    <div class="col-md-7 bg-light p-5 rounded">

                        <h2 class="text-center bg-primary text-light text-uppercase py-2">REGISTRO DE USUARIOS</h2>

                        <form action="#" method="post" id="myForm">
                            <div class="mb-3">
                                <label for="dni" class="form-label">DNI: </label>
                                <input type="text" id="dni" name="dni" class="form-control <?php if (isset($dni_error)): ?> is-invalid <?php endif ?>" required placeholder="Escriba su DNI" pattern="[0-9]{8}[A-Za-z]{1}" title="Debe poner 8 números y una letra">
                                    <?php if (isset($dni_error)): ?>
                                        <div class="invalid-feedback">
                                            <?php echo $dni_error; ?>
                                        </div>
                                    <?php endif ?>
                            </div>
                            <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre: </label>
                            <input type="text" id="nombre" name="nombre" class="form-control" required placeholder="Escriba su nombre">
                            </div>
                            <div class="mb-3">
                            <label for="apellidos" class="form-label">Apellidos: </label>
                            <input type="text" id="apellidos" name="apellidos" class="form-control" required placeholder="Escriba sus apellidos">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email: </label>
                                <input type="email" id="email" name="email" class="form-control <?php if (isset($email_error)): ?> is-invalid <?php endif ?>" required placeholder="Escriba su dirección de email">
                                    <?php if (isset($email_error)): ?>
                                        <div class="invalid-feedback">
                                            <?php echo $email_error; ?>
                                        </div>
                                    <?php endif ?>
                            </div>
                            <div class="mb-3">
                            <label for="provincia" class="form-label">Provincia: </label>
                            <select required id="provincia" name="provincia" class="form-select">
                                <option value="">-- Elige Provincia --</option>
                                <option value="Álava">Álava</option>
                                <option value="Albacete">Albacete</option>
                                <option value="Alicante">Alicante</option>
                                <option value="Almería">Almería</option>
                                <option value="Asturias">Asturias</option>
                                <option value="Ávila">Ávila</option>
                                <option value="Badajoz">Badajoz</option>
                                <option value="Baleares">Baleares</option>
                                <option value="Barcelona">Barcelona</option>
                                <option value="Burgos">Burgos</option>
                                <option value="Cáceres">Cáceres</option>
                                <option value="Cádiz">Cádiz</option>
                                <option value="Cantabria">Cantabria</option>
                                <option value="Castellón">Castellón</option>
                                <option value="Ceuta">Ceuta</option>
                                <option value="Ciudad Real">Ciudad Real</option>
                                <option value="Córdoba">Córdoba</option>
                                <option value="Cuenca">Cuenca</option>
                                <option value="Gerona">Gerona</option>
                                <option value="Granada">Granada</option>
                                <option value="Guadalajara">Guadalajara</option>
                                <option value="Guipúzcoa">Guipúzcoa</option>
                                <option value="Huelva">Huelva</option>
                                <option value="Huesca">Huesca</option>
                                <option value="Jaén">Jaén</option>
                                <option value="La Coruña">La Coruña</option>
                                <option value="La Rioja">La Rioja</option>
                                <option value="Las Palmas">Las Palmas</option>
                                <option value="León">León</option>
                                <option value="Lérida">Lérida</option>
                                <option value="Lugo">Lugo</option>
                                <option value="Madrid">Madrid</option>
                                <option value="Málaga">Málaga</option>
                                <option value="Melilla">Melilla</option>
                                <option value="Murcia">Murcia</option>
                                <option value="Navarra">Navarra</option>
                                <option value="Orense">Orense</option>
                                <option value="Palencia">Palencia</option>
                                <option value="Pontevedra">Pontevedra</option>
                                <option value="Salamanca">Salamanca</option>
                                <option value="Segovia">Segovia</option>
                                <option value="Sevilla">Sevilla</option>
                                <option value="Soria">Soria</option>
                                <option value="Tarragona">Tarragona</option>
                                <option value="Tenerife">Tenerife</option>
                                <option value="Teruel">Teruel</option>
                                <option value="Toledo">Toledo</option>
                                <option value="Valencia">Valencia</option>
                                <option value="Valladolid">Valladolid</option>
                                <option value="Vizcaya">Vizcaya</option>
                                <option value="Zamora">Zamora</option>
                                <option value="Zaragoza">Zaragoza</option>
                            </select>
                            </div>
                            <div class="mb-3">
                            <label for="localidad" class="form-label">Localidad: </label>
                            <input type="text" id="localidad" name="localidad" class="form-control" required placeholder="Escriba su localidad">
                            </div>
                            <div class="mb-3">
                            <label for="fechanac" class="form-label">Fecha de nacimiento: </label>
                            <input type="date" id="fechanac" name="fechanac" class="form-control" required placeholder="Escriba su fecha de nacimiento">
                            </div>
                            <div class="mb-3">
                            <label for="contrasenia" class="form-label">Contraseña: </label>
                            <input type="password" id="contrasenia" name="contrasenia" class="form-control" required placeholder="Escriba contraseña">
                            </div>

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" onclick="window.location.href='index.php'">Volver</button>
                            <input type="submit" class="btn btn-success" value="Enviar">
                        </form>

                    </div>

                </div>
                </div>
            </main>

            <!-- Footer -->

            <footer class="container-fluid text-white elfooter mt-3">
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
                            <p>Tu cuenta ha sido creada satisfactoriamente.</p>
                            <p>Recuerda usar tu DNI como nombre de usuario.</p>
                            <button class="btn btn-success" data-dismiss="modal" onclick="window.location.href='index.php'"><span>Empezar a explorar</span> <i class="material-icons">&#xE5C8;</i></button>
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