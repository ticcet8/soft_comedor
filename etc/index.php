<?php
  /**
   * Roles
   * Estudiante 1
   * Cocinera 2
   * Admin 3
   */
  $rol = $_GET['rol']
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Comedor</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark navbar bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Comedor</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">

          <a class="nav-link"><i class="bi bi-person"></i>Ingresar</a>
          <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
              aria-expanded="false">Nombre_Usuario</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Cambiar contraseña</a></li>
              <li><a class="dropdown-item" href="#">Ajustes</a></li>
              <li><a class="dropdown-item" href="#">Salir</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Salir</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <div class="container mt-3">
    <?php if($rol == 1){
    ?>
    <!--- Vista de Estudiante -->
    <div class="row">
      <div class="col-md-6 col-sm-12">

        <div class="card card-h">
          <div class="card-body">
            <h5 class="card-title">Anotarse al comedor</h5>
            <p class="my-5">
              <button type="button" class="btn btn-lg btn-primary">Anotarse</button>
              <button type="button" class="btn btn-danger btn-lg">Desanotarse</button>
              <button type="button" class="btn btn-secondary btn-lg" disabled>Anotado</button>
              <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#valorar">Comer</button>
            </p>
          </div>
        </div>

      </div>
      <div class="col-md-6 col-sm-12s">
        <div class="card card-h">
          <div class="card-body">
            <h5 class="card-title">Menú del Día</h5>
            <p class="card-text my-5">Pizza</p>
          </div>
        </div>
      </div>
    </div>
    <?php }
    if ($rol == 2){ ?>
    <!-- Vista Cocineras-->
    <div class="row mt-3">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Comidas</h5>
            <p class="card-text">Comidas de la semana</p>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Día de la semana</th>
                  <th scope="col">Comida</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th>Lunes</th>
                  <th></th>
                </tr>
                <tr>
                  <th>Martes</th>
                  <th></th>
                </tr>
                <tr>
                  <th>Miércoles</th>
                  <th></th>
                </tr>
                <tr>
                  <th>Jueves</th>
                  <th></th>
                </tr>
                <tr>
                  <th>Viernes</th>
                  <th></th>
                </tr>
              </tbody>
            </table>
            <h5>Ingrese Comida</h5>
            <form class="form-inline">

              <div class="form-group">
                <label for="comida">Comida</label>
                <input type="text" class="form-control" id="comida" aria-describedby="comidaHelp">
                <small id="comidaHelp" class="form-text text-muted">Ingrese una comida apropiada</small>
              </div>

              <div class="form-group">
                <label for="fecha">Fecha</label>
                <div class="input-group date" id="datepicker">
                  <input type="date" class="form-control" id="fecha" />
                  <span class="input-group-append">
                    <span class="input-group-text bg-light d-block">
                      <i class="bi bi-calendar"></i>
                    </span>
                  </span>
                </div>
              </div>

              <button class="btn btn-primary mt-2" style="width:100%">Agregar Comida</button>
            </form>
          </div>
        </div>
      </div>
      <div class=" row mt-3">
        <div class="col-md-5">
          <div class="card">
            <div class="card-body div-tabla">
              <h5 class="card-title">Listado de estudiantes a Comiendo</h5>
              <table class="table mt-2">
                <thead>
                  <tr>
                    <th scope="col">Estudiante</th>
                    <th scope="col">Anotado</th>
                    <th scope="col">Acción</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      Fulanito de Tal
                    </td>
                    <td>
                      No comio
                    </td>
                    <td>
                      <button class="btn btn-danger">Eliminar</button>
                      <button class="btn btn-primary">Comio</button>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      Fulanito de Tal
                    </td>
                    <td>
                      No comio
                    </td>
                    <td>
                      <button class="btn btn-danger">Eliminar</button>
                      <button class="btn btn-primary">Comio</button>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      Fulanito de Tal
                    </td>
                    <td>
                      No comio
                    </td>
                    <td>
                      <button class="btn btn-danger">Eliminar</button>
                      <button class="btn btn-primary">Comio</button>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      Fulanito de Tal
                    </td>
                    <td>
                      No comio
                    </td>
                    <td>
                      <button class="btn btn-danger">Eliminar</button>
                      <button class="btn btn-primary">Comio</button>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      Fulanito de Tal
                    </td>
                    <td>
                      No comio
                    </td>
                    <td>
                      <button class="btn btn-danger">Eliminar</button>
                      <button class="btn btn-primary">Comio</button>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      Fulanito de Tal
                    </td>
                    <td>
                      No comio
                    </td>
                    <td>
                      <button class="btn btn-danger">Eliminar</button>
                      <button class="btn btn-primary">Comio</button>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      Fulanita
                    </td>
                    <td>
                      Comio
                    </td>
                    <td>
                      <button class="btn btn-danger" disabled>Eliminar</button>
                      <button class="btn btn-primary" disabled>Comio</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

        </div>

        <div class="col-md-4">
          <div class="d-flex flex-row">
            <div class="card card-h2 p-6">
              <div class="card-body ">
                <h5 class="card-title">Cantidad Anotados</h5>
                <h1 class="numero">36</h1>
              </div>
            </div>
            <div class="card card-h2 mx-2 p-6">
              <div class="card-body">
                <div class="card-title">
                  <h5 class="card-title">Restantes por comer</h5>
                  <h1 class="numero_danger">10</h1>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <div class="card-title">
                <h5 class="card-title">Estudiantes aproximados por día</h5>
                <p class="card-text">
                  <b>Lunes: </b>21 <br />
                  <b>Martes: </b>19 <br />
                  <b>Miércoles: </b>21 <br />
                  <b>Jueves: </b>12 <br />
                  <b>Viernes: </b>15 <br />
                </p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <?php } 
    if($rol == 3){
    ?>
    <!-- Vista de admin-->
    <div class="row mt-2">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            Listado de estudiantes
            <button class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#agregar_estudiante"><i class="bi bi-person-fill-add"></i></button>
          </div>
          <div class="card-body div-tabla">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Nombre</th>
                  <th scope="col">Apellido</th>
                  <th scope="col">Días que come</th>
                  <th scope="col">Acción</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Leonardo</td>
                  <td>da Vinci</td>
                  <td>Lunes;Martes;Miércoles</td>
                  <td>
                    <button class="btn btn-primary">Ver</button>
                    <button class="btn btn-warning">Modificar</button>
                    <button class="btn btn-danger">Eliminar</button>
                  </td>
                </tr>
                <tr>
                  <td>Leonardo</td>
                  <td>da Vinci</td>
                  <td>Lunes;Martes;Miércoles</td>
                  <td>
                    <button class="btn btn-primary">Ver</button>
                    <button class="btn btn-warning">Modificar</button>
                    <button class="btn btn-danger">Eliminar</button>
                  </td>
                </tr>
                <tr>
                  <td>Leonardo</td>
                  <td>da Vinci</td>
                  <td>Lunes;Martes;Miércoles</td>
                  <td>
                    <button class="btn btn-primary">Ver</button>
                    <button class="btn btn-warning">Modificar</button>
                    <button class="btn btn-danger">Eliminar</button>
                  </td>
                </tr>
                <tr>
                  <td>Leonardo</td>
                  <td>da Vinci</td>
                  <td>Lunes;Martes;Miércoles</td>
                  <td>
                    <button class="btn btn-primary">Ver</button>
                    <button class="btn btn-warning">Modificar</button>
                    <button class="btn btn-danger">Eliminar</button>
                  </td>
                </tr>
                <tr>
                  <td>Leonardo</td>
                  <td>da Vinci</td>
                  <td>Lunes;Martes;Miércoles</td>
                  <td>
                    <button class="btn btn-primary">Ver</button>
                    <button class="btn btn-warning">Modificar</button>
                    <button class="btn btn-danger">Eliminar</button>
                  </td>
                </tr>
                <tr>
                  <td>Leonardo</td>
                  <td>da Vinci</td>
                  <td>Lunes;Martes;Miércoles</td>
                  <td>
                    <button class="btn btn-primary">Ver</button>
                    <button class="btn btn-warning">Modificar</button>
                    <button class="btn btn-danger">Eliminar</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } 
  if($rol == 1){?>
  <!-- Modals de estudiante-->
  <div class="modal" id="valorar">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Valorar Comida</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
          <div class="estrellas">
            <span class="bi bi-star-fill" onclick="calificar(this)" style="cursor: pointer;" id="1estrella"></span>
            <span class="bi bi-star-fill" onclick="calificar(this)" style="cursor: pointer;" id="2estrella"></span>
            <span class="bi bi-star-fill" onclick="calificar(this)" style="cursor: pointer;" id="3estrella"></span>
            <span class="bi bi-star-fill" onclick="calificar(this)" style="cursor: pointer;" id="4estrella"></span>
            <span class="bi bi-star-fill" onclick="calificar(this)" style="cursor: pointer;" id="5estrella"></span>
          </div>
          <form class="form">
            <div class="form-group">
              <label for="mensaje"></label>
              <textarea name="mensaje" id="mensaje" class="form-control" cols="30" rows="10"></textarea>
            </div>
          </form>
          <button class="btn btn-primary mt-2" style="width:100%" onclick="mensaje()">Calificar</button>
        </div>  
      </div>
    </div>
  </div>
    <?php }
    if($rol ==3){
    ?>

  <!--Modals de admin-->
  <div class="modal" id="agregar_estudiante">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Agregar Estudiante</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
          <form class="form">
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input type="text" class="form-control" name="nombre" id="nombre">
            </div>
            <div class="form-group">
              <label for="apellido">Apellido</label>
              <input type="text" class="form-control" name="apellido" id="apellido">
            </div>
            <div class="form-group">
              <label for="dni">DNI</label>
              <input type="text" class="form-control" name="dni" id="dni">
            </div>
            <div class="form-group">
              <label for="curso">Curso</label>
              <select class="form-select" id="curso">
                <option selected>Choose...</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
            <div class="form-group">
              <label for="alergias">Alergias</label>
              <textarea name="alergias" id="mensaje" class="form-control" cols="30" rows="5"></textarea>
            </div>
            <h6 class="mt-2">Días que se queda a comer</h6>
            <div class="form-group form-inline">
              <label for="lunes">Lunes</label>
              <select class="form-select" id="lunes">
                <option value="0" selected>No come este día</option>
                <option value="1">11.15hs</option>
                <option value="2">12.20hs</option>
                <option value="3">13.00hs</option>
              </select>
            </div>
            <div class="form-group form-inline">
              <label for="martes">Martes</label>
              <select class="form-select" id="martes">
                <option value="0" selected>No come este día</option>
                <option value="1">11.15hs</option>
                <option value="2">12.20hs</option>
                <option value="3">13.00hs</option>
              </select>
            </div>
            <div class="form-group form-inline">
              <label for="miercoles">Miércoles</label>
              <select class="form-select" id="miercoles">
                <option value="0" selected>No come este día</option>
                <option value="1">11.15hs</option>
                <option value="2">12.20hs</option>
                <option value="3">13.00hs</option>
              </select>
            </div>
            <div class="form-group form-inline">
              <label for="jueves">Jueves</label>
              <select class="form-select" id="jueves">
                <option value="0" selected>No come este día</option>
                <option value="1">11.15hs</option>
                <option value="2">12.20hs</option>
                <option value="3">13.00hs</option>
              </select>
            </div>
            <div class="form-group form-inline">
              <label for="viernes">Viernes</label>
              <select class="form-select" id="viernes">
                <option value="0" selected>No come este día</option>
                <option value="1">11.15hs</option>
                <option value="2">12.20hs</option>
                <option value="3">13.00hs</option>
              </select>
            </div>
            <div class="form-group mt-2">
              <label for="habilitado">Habilitado</label>
              <input type="checkbox">
            </div>
            <button class="btn btn-primary">Agregar</button>
            <button class="btn btn-danger" type="reset">Borrar</button>
          </form>
        </div>
  
      </div>
    </div>
  </div>

    <?php } ?>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
  <script>
    var contador = 0;
    function calificar(item) {

      console.log(item);
      contador = item.id[0]; //captura el primer digito
      let nombre = item.id.substring(1);

      for (let i = 0; i < 5; i++) {
        if (i < contador) {
          document.getElementById((i + 1) + nombre).style.color = "orange";
        } else {
          document.getElementById((i + 1) + nombre).style.color = "black";
        }

      }

    }
    function mensaje() {
      alert("Gracias por calificar con " + contador + " estrellas");
    }
  </script>
</body>
</html>