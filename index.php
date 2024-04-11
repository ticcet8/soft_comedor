<?php
  session_start();
  include 'php/lib/ddbb.php';
  include 'php/models/estudiante.php';
  include 'php/models/diasacomer.php';
  include 'php/models/curso.php';
  include 'php/models/usuario.php';
  
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
          <?php if (!isset($_SESSION['usuario'])) {  ?>
          <a href="" class="nav-link" data-bs-toggle="modal" data-bs-target="#loginModal"><i class="bi bi-person"></i>Ingresar</a>
          <?php }else{ ?>
          <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
              aria-expanded="false"><?php echo $_SESSION['usuario'];?></a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Cambiar contraseña</a></li>
              <li><a class="dropdown-item" href="#">Ajustes</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="php/logout.php">Salir</a></li>
            </ul>
          </div>
          <?php }?>
        </div>
      </div>
    </div>
  </nav>
  <div class="container mt-3">
    <?php if(!isset($_SESSION['usuario'])){?>
    <div class="col-md-12 col-sm-12s">
        <div class="card card-h">
          <div class="card-body">
            <h5 class="card-title">Menú del Día</h5>
            <p class="card-text my-5">Pizza</p>
          </div>
        </div>
      </div>
    </div><?php }?>
    <!--- Vista de Estudiante -->
    <?php if(isset($_SESSION['rol']) && $_SESSION['rol']==0){?>
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
    <?php }elseif(isset($_SESSION['rol']) && $_SESSION['rol']==1){ ?>
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
    <!-- Vista de admin-->
    <?php }elseif(isset($_SESSION['rol']) && $_SESSION['rol']==2){ ?>
    <div class="row mt-2">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            Listado de estudiantes
            <div class="barraderecha float-right">
              <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#gestionar_cursos">Gestionar Cursos</button>
              <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregar_estudiante"><i class="bi bi-person-fill-add"></i></button>
              
            </div>
          </div>
          <div class="text-center mt-2">
          <form>
              <div class="form-group form-inline">
                <label for="buscador">Buscar</label>
                <input type="text" class="form-inline" id="buscador" name="buscador" placeholder="Ingrese nombre, apellido o dni" style="width:50%;"/>
                <button id="buscar" class="btn btn-primary">Buscar</button>
              </div>
            </form>
          </div>
          <div class="card-body">
            
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Nombre</th>
                  <th scope="col">Apellido</th>
                  <th scope="col">Nombre de Usuario</th>
                  <th scope="col">Habilitado</th>
                  <th scope="col">Días a comer</th>
                  <th scope="col">Acción</th>
                </tr>
              </thead>
              <tbody id="estudiantes-body">
                <!-- Aquí se mostrarán los estudiantes -->
              </tbody>
              
            </table>
            
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php }?>
  <?php if(isset($_SESSION['rol']) && $_SESSION['rol']==0){ ?>
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
  <?php }elseif(isset($_SESSION['rol']) && $_SESSION['rol']==2){ ?>

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
          <form class="form" id="agregarEstudiante">
            
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
              <div class="row mt-2">
                <div class="col-md-3">
                <label for="nombre">Nombre de Usuario</label>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="nombre_usuario" id="nombre_usuario">
                </div>
                <div class="col-md-3">
                  <button class="btn btn-primary" id="verificar">Verificar</button>
                </div>
              </div>
            </div>
            <div id="verificar_usuario"></div>
            <div class="form-group">
              <label for="curso">Curso</label>         
              <select name="curso" class="form-select" id="curso">

                <option value="-1" selected>Elije...</option>
                <?php
                  $cursos = Curso::getCursos();
                  foreach($cursos as $curso){
                    echo "<option value='".$curso->getIdcurso()."'>".$curso->getCurso()."</option>";
                  }
                  
                ?>
              </select>
        
            </div>
            <div class="form-group">
              <label for="alergias">Alergias</label>
              <textarea name="alergias" id="alergias" class="form-control" cols="30" rows="5"></textarea>
            </div>
            <h6 class="mt-2">Días que se queda a comer</h6>
            <div class="form-group form-inline">
              <label for="lunes">Lunes</label>
              <select class="form-select" id="lunes" name="lunes">
                <option value="0" selected>No come este día</option>
                <option value="1">11.15hs</option>
                <option value="2">12.20hs</option>
                <option value="3">13.00hs</option>
              </select>
            </div>
            <div class="form-group form-inline">
              <label for="martes">Martes</label>
              <select class="form-select" id="martes" name="martes">
                <option value="0" selected>No come este día</option>
                <option value="1">11.15hs</option>
                <option value="2">12.20hs</option>
                <option value="3">13.00hs</option>
              </select>
            </div>
            <div class="form-group form-inline">
              <label for="miercoles">Miércoles</label>
              <select class="form-select" id="miercoles" name="miercoles">
                <option value="0" selected>No come este día</option>
                <option value="1">11.15hs</option>
                <option value="2">12.20hs</option>
                <option value="3">13.00hs</option>
              </select>
            </div>
            <div class="form-group form-inline">
              <label for="jueves">Jueves</label>
              <select class="form-select" id="jueves" name="jueves">
                <option value="0" selected>No come este día</option>
                <option value="1">11.15hs</option>
                <option value="2">12.20hs</option>
                <option value="3">13.00hs</option>
              </select>
            </div>
            <div class="form-group form-inline">
              <label for="viernes">Viernes</label>
              <select class="form-select" id="viernes" name="viernes">
                <option value="0" selected>No come este día</option>
                <option value="1">11.15hs</option>
                <option value="2">12.20hs</option>
                <option value="3">13.00hs</option>
              </select>
            </div>
            <div class="form-group mt-2">
              <label for="habilitado" >Habilitado</label>
              <input type="checkbox" name="habilitado" id="habilitado">
            </div>
            <input type="submit" class="btn btn-primary" value="Agregar">
            <button class="btn btn-danger" type="reset">Borrar</button>
            <button class="btn btn-secondary" type="reset" data-bs-dismiss="modal">Volver</button>
          </form>
        </div>
  
      </div>
    </div>
  </div>
  <?php } ?>
  <!--- Modal ver estudiante -->
  <div class="modal" id="verEstudiante">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title">Estudiante</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div id="detallesEstudiante"></div>
          </div>
          <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
  </div>
   <!-- Modal login -->
   <div class="modal" id="loginModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Iniciar Sesión</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form id="login-form" method="POST" action="php/login.php">
            <div class="form-group">
              <label for="username">Usuario:</label>
              <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
              <label for="password">Contraseña:</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Iniciar Sesión</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal para confirmar eliminación de estudiante -->

  <div class="modal fade" id="eliminarEstudiante" tabindex="-1" role="dialog" aria-labelledby="eliminarEstudianteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="eliminarEstudianteLabel">Confirmar Eliminación</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ¿Estás seguro de que deseas eliminar este estudiante?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-danger" id="btnConfirmarEliminar">Eliminar</button>
        </div>
      </div>
    </div>
  </div>
  <!--Modal para gestionar cursos -->
  
  <div class="modal" id="gestionar_cursos">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Gestionar Cursos</h4>
          
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <table class="table" id="tablaCursos">
              <thead>
                <tr>
                  <th scope="col">Nombre del Curso</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody id="listado_cursos">

              </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <form class="form">
              <div class="row align-items-center">
              <div class="col-auto">
                  <label for="nombreCurso" class="col-form-label">Nombre del Curso:</label>
              </div>
              <div class="col">
                  <input type="text" class="form-control" id="nombreCurso" name ="nombreCurso" placeholder="Ingrese el nombre del curso">
              </div>
              <div class="col-auto">
                  <button type="button" class="btn btn-primary" id="btnAgregarCurso">Agregar</button>
              </div>
          </div>
              
            </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="eliminarCurso" tabindex="-1" role="dialog" aria-labelledby="eliminarCursoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="eliminarCursoLabel">Confirmar Eliminación</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ¿Estás seguro de que deseas eliminar este estudiante?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-danger" id="btnConfirmarEliminarCurso">Eliminar</button>
        </div>
      </div>
    </div>
  </div>               
  <!--Modal para modificar estudiante-->
  <div class="modal" id="modificarEstudiante">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modificar Estudiante</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
          <form class="form" id="modEstudiante">
            
            <div class="form-group">
              <label for="mod_nombre">Nombre</label>
              <input type="text" class="form-control" name="mod_nombre" id="mod_nombre">
            </div>
            <div class="form-group">
              <label for="mod_apellido">Apellido</label>
              <input type="text" class="form-control" name="mod_apellido" id="mod_apellido">
            </div>
            <div class="form-group">
              <label for="mod_dni">DNI</label>
              <input type="text" class="form-control" name="mod_dni" id="mod_dni">
            </div>
            
            <div class="form-group">
              <label for="mod_curso">Curso</label>         
              <select name="mod_curso" class="form-select" id="mod_curso">

                <option value="-1" selected>Elije...</option>
                <?php
                  $cursos = Curso::getCursos();
                  foreach($cursos as $curso){
                    echo "<option value='".$curso->getIdcurso()."'>".$curso->getCurso()."</option>";
                  }
                  
                ?>
              </select>
        
            </div>
            <div class="form-group">
              <label for="mod_alergias">Alergias</label>
              <textarea name="mod_alergias" id="mod_alergias" class="form-control" cols="30" rows="5"></textarea>
            </div>
            <h6 class="mt-2">Días que se queda a comer</h6>
            <div class="form-group form-inline">
              <label for="mod_lunes">Lunes</label>
              <select class="form-select" id="mod_lunes" name="mod_lunes">
                <option value="0" selected>No come este día</option>
                <option value="1">11.15hs</option>
                <option value="2">12.20hs</option>
                <option value="3">13.00hs</option>
              </select>
            </div>
            <div class="form-group form-inline">
              <label for="mod_martes">Martes</label>
              <select class="form-select" id="mod_martes" name="mod_martes">
                <option value="0" selected>No come este día</option>
                <option value="1">11.15hs</option>
                <option value="2">12.20hs</option>
                <option value="3">13.00hs</option>
              </select>
            </div>
            <div class="form-group form-inline">
              <label for="mod_miercoles">Miércoles</label>
              <select class="form-select" id="mod_miercoles" name="mod_miercoles">
                <option value="0" selected>No come este día</option>
                <option value="1">11.15hs</option>
                <option value="2">12.20hs</option>
                <option value="3">13.00hs</option>
              </select>
            </div>
            <div class="form-group form-inline">
              <label for="mod_jueves">Jueves</label>
              <select class="form-select" id="mod_jueves" name="mod_jueves">
                <option value="0" selected>No come este día</option>
                <option value="1">11.15hs</option>
                <option value="2">12.20hs</option>
                <option value="3">13.00hs</option>
              </select>
            </div>
            <div class="form-group form-inline">
              <label for="mod_viernes">Viernes</label>
              <select class="form-select" id="mod_viernes" name="mod_viernes">
                <option value="0" selected>No come este día</option>
                <option value="1">11.15hs</option>
                <option value="2">12.20hs</option>
                <option value="3">13.00hs</option>
              </select>
            </div>
            <div class="form-group mt-2">
              <label for="mod_habilitado" >Habilitado</label>
              <input type="checkbox" name="mod_habilitado" id="mod_habilitado">
            </div>
            <input type="text" name="mod_idCurso" id="mod_idCurso" style="display:none;">
            <input type="text" name="mod_idDias" id="mod_idDias" style="display:none;">
            
          </form>
        </div>
        <div class="modal-footer">
          <!-- Botón "Volver" fuera del formulario -->
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>
          <!-- Botón "Guardar" dentro del formulario -->
          <button type="submit" class="btn btn-primary" id="btnGuardarCambios" >Guardar cambios</button>
      </div>
      </div>
    </div>
  </div>


  <script src="js\bootstrap.bundle.min.js"></script>
  
  <script src="js\jquery-3.6.0.min.js"></script>
  <script src="js/jquery-validation.js"></script>
  <script>
    $(document).ready(function() {
        // Realiza una solicitud AJAX para obtener los datos de los estudiantes
        $.ajax({
            url: 'php/controlers/obtener_estudiantes.php',
            type: 'GET',
            success: function(response) {
                // Actualiza el contenido de la tabla con los datos de los estudiantes
                $('#estudiantes-body').html(response);
            },
            error: function() {
                // Maneja cualquier error en la solicitud AJAX
                alert('Error al obtener los datos de los estudiantes.');
            }
        });
       /**  $('.cambiarVistaCursos').click(function(event){
        var id = $(this).data('id');
        console.log('Ingresando a cambiar vista cursos con ID: ' + id);
        console.log('ingreso a cambiar vista cursos');
        $.ajax({
                    url: 'php/controlers/obtener_cursos.php',
                    type: 'GET',
                    data: { id: id },
                    success: function (data) {
                        //console.log(data);
                        // Coloca los detalles del estudiante en el contenido del modal
                        $('#listado_cursos').html(data);
                    },
                    error: function () {
                        alert('Error al obtener datos del cursos.');
                    }
        });
    });*/
    $(document).on('click', '.cambiarVistaCursos', function(event) {
        //console.log('El evento click se activó en un elemento con la clase cambiarVistaCursos');
        var id = $(this).data('id');
        //console.log('El ID del elemento clickeado es: ' + id);
        $.ajax({
                    url: 'php/controlers/obtener_cursos.php',
                    type: 'GET',
                    data: { id: id },
                    success: function (data) {
                        //console.log(data);
                        // Coloca los detalles del estudiante en el contenido del modal
                        $('#listado_cursos').html(data);
                    },
                    error: function () {
                        alert('Error al obtener datos del cursos.');
                    }
        });
    });

    });
    $("#buscar").click(function(){
      event.preventDefault();
      var buscador = $('#buscador').val();
      $.ajax({
            url: 'php/controlers/obtener_estudiantes.php',
            type: 'GET',
            data: { buscador: buscador },
            success: function(response) {
                // Actualiza el contenido de la tabla con los datos de los estudiantes
                $('#estudiantes-body').html(response);
            },
            error: function() {
                // Maneja cualquier error en la solicitud AJAX
                alert('Error al obtener los datos de los estudiantes.');
            }
        });
    });
      $('#verificar').click(function(){
        event.preventDefault();

        var nombre_usuario = $('#nombre_usuario').val();
        $.ajax({
                    url: 'php/controlers/verificar_nusuario.php',
                    type: 'POST',
                    data: { nombre_usuario: nombre_usuario },
                    success: function (data) {
                        // Coloca los detalles del estudiante en el contenido del modal
                        var mensaje = data;
                        //console.log(mensaje);
                        if(mensaje == "1"){                          
                          $('#verificar_usuario').html("Usuario Aprobado");
                          $('#verificar_usuario').css('color','green');
                        }else{
                          $('#verificar_usuario').html("Usuario Existente");
                          $('#verificar_usuario').css('color','red');
                        }
                        
                    },
                    error: function () {
                        alert('Error a verificar el estudiante.');
                    }
                });
      });


     $('#nombre, #apellido, #dni').on('input', function() {
        var nombre = $('#nombre').val().toLowerCase();
        var apellido = $('#apellido').val().toLowerCase();
        var dni = $('#dni').val().substring(5,8);
        var nombre_usuario = nombre.substring(0, 1) + apellido+ dni;
        $('#nombre_usuario').val(nombre_usuario);
    });
    
    $('#agregarEstudiante').validate({
        rules: {
            nombre: 'required',
            apellido: 'required',
            dni:'required',
            nombre_usuario: 'required',
            curso: {
              min:1
            },

            // Define reglas para otros campos aquí
        },
        messages: {
            nombre: 'Por favor, ingresa el nombre',
            apellido: 'Por favor, ingresa el apellido',
            dni: 'Por favor, ingresa el dni',
            nombre_usuario: 'Por favor, ingresa el nombre de usuario',
            curso: {
              min: 'Por favor, ingresa el curso'
            },
            // Define mensajes para otros campos aquí
        },
        submitHandler: function (form) {
          $.post('php/controlers/agregar_estudiante.php', $(form).serialize(), function (respuesta) {
              // Manejar la respuesta del servidor
             
              //console.log(respuesta);
              var respJson = JSON.parse(respuesta);
              alert(respJson.mensaje);
              // Recargar la página
              location.reload();
          });
            // Esta función se ejecuta cuando el formulario es válido
            // Aquí puedes enviar el formulario mediante AJAX o realizar otras acciones
            // Ejemplo:
            // $.post('tu_archivo_php.php', $(form).serialize(), function (respuesta) {
            //     // Manejar la respuesta del servidor
            // });
        }
    });
    $('#gestionar_cursos').on('show.bs.modal', function (event) {
      //console.log("ingreso a gestionar");   
      var id=1;   
      $.ajax({
            url: 'php/controlers/obtener_cursos.php',
            type: 'GET',
            data: { id: id },
            success: function (data) {
                //console.log(data);
                // Coloca los detalles del estudiante en el contenido del modal
                $('#listado_cursos').html(data);
            },
            error: function () {
                alert('Error al obtener datos del cursos.');
            }
        });         
    });
    
    $('#verEstudiante').on('show.bs.modal', function (event) {
                // Puedes obtener el ID del estudiante desde algún lugar, por ejemplo, un botón o un enlace
                var boton = $(event.relatedTarget); // Botón que activó el modal
                var idEstudiante = boton.data('id'); // Obtiene el valor del atributo data-id

                // Hacer una solicitud AJAX para obtener los detalles del estudiante
                $.ajax({
                    url: 'php/controlers/obtener_datos_estudiante.php',
                    type: 'POST',
                    data: { dni: idEstudiante },
                    success: function (data) {
                        // Coloca los detalles del estudiante en el contenido del modal
                        $('#detallesEstudiante').html(data);
                    },
                    error: function () {
                        alert('Error al obtener datos del estudiante.');
                    }
                });
    });
    $('#modificarEstudiante').on('show.bs.modal', function (event) {
                // Puedes obtener el ID del estudiante desde algún lugar, por ejemplo, un botón o un enlace
                var boton = $(event.relatedTarget); // Botón que activó el modal
                var idEstudiante = boton.data('id'); // Obtiene el valor del atributo data-id

                // Hacer una solicitud AJAX para obtener los detalles del estudiante
                 
                $.ajax({
                    url: 'php/controlers/obtener_datos_estudiante_pmod.php',
                    type: 'POST',
                    data: { dni: idEstudiante },
                    dataType: 'json', // Indica que esperas una respuesta en formato JSON
                    success: function (data) {
                        // Coloca los detalles del estudiante en el contenido del modal
                        //console.log(data);
                        $('#mod_nombre_usuario').val(data['nombre_usuario']);
                        $('#mod_nombre').val(data['nombre']);
                        $('#mod_apellido').val(data['apellido']);
                        $('#mod_dni').val(data['dni']);
                        $('#mod_curso').val(data['curso']);
                        $('#mod_alergias').val(data['alergias']);
                        $('#mod_lunes').val(data['dias'][0]);
                        $('#mod_martes').val(data['dias'][1]);
                        $('#mod_miercoles').val(data['dias'][2]);
                        $('#mod_jueves').val(data['dias'][3]);
                        $('#mod_viernes').val(data['dias'][4]);
                        $("#mod_habilitado").prop('checked', data['habilitado'] === "1");
                        
                        $('#mod_curso').val(data['id_curso']);
                        $('#mod_idDias').val(data['id_dias']);
                        $('#mod_idUsuario').val(data['id_usuario']);
                        
                    },
                    error: function () {
                        alert('Error al obtener datos del estudiante.');
                    }
                });
    });
    $("#modEstudiante").validate({
        rules: {
            mod_nombre_usuario: 'required',
            mod_nombre: 'required',
            mod_apellido: 'required',
            mod_dni:'required',
            mod_curso: {
              min:1
            },

            // Define reglas para otros campos aquí
        },
        messages: {
            nombre: 'Por favor, ingresa el nombre',
            apellido: 'Por favor, ingresa el apellido',
            dni: 'Por favor, ingresa el dni',
            curso: {
              min: 'Por favor, ingresa el curso'
            },
            // Define mensajes para otros campos aquí
        },
        /**submitHandler: function (form) {
          $.post('php/controlers/modificar_estudiante.php', $(form).serialize(), function (respuesta) {
              // Manejar la respuesta del servidor
              console.log(respuesta);
              alert('El estudiante se ha modificado correctamente.');
            // Recargar la página
            location.reload();
          });*/
            // Esta función se ejecuta cuando el formulario es válido
            // Aquí puedes enviar el formulario mediante AJAX o realizar otras acciones
            // Ejemplo:
            // $.post('tu_archivo_php.php', $(form).serialize(), function (respuesta) {
            //     // Manejar la respuesta del servidor
            // });
          //}
        
    });
    $('#btnGuardarCambios').click(function() {
      if($("#modEstudiante").valid()) {
          $.post('php/controlers/modificar_estudiante.php', $("#modEstudiante").serialize(), function (respuesta) {
              // Manejar la respuesta del servidor
              console.log(respuesta);
              alert('El estudiante se ha modificado correctamente.');
              // Recargar la página
              location.reload();
              });
          }
    });
    //$('#modificarEstudiante').on('show.bs.modal', function (event) {
    $('#eliminarEstudiante').on('show.bs.modal', function(event){
      //var dni = $(this).data('id');
      var boton = $(event.relatedTarget); // Botón que activó el modal
      var dni = boton.data('id');
      $('#btnConfirmarEliminar').click(function() {
            // Aquí puedes realizar la eliminación del estudiante utilizando AJAX o cualquier otra lógica
            //eliminarEstudiante(idEstudiante);
            $.ajax({
              url: 'php/controlers/eliminar_estudiante.php',
              type: 'POST',
              data: { dni: dni },
              success: function (data) {
                  // Coloca los detalles del estudiante en el contenido del modal
                  //$('#detallesEstudiante').html(data);
                  //alert("Estudiante eliminado");
                  location.reload();
              },
              error: function () {
                  alert('Error al obtener datos del estudiante.');
              }
            });
        });
    });

    $('#eliminarCurso').on('show.bs.modal', function(event){
      //var dni = $(this).data('id');
      var boton = $(event.relatedTarget); // Botón que activó el modal
      var id_curso = boton.data('id');
      $('#btnConfirmarEliminarCurso').click(function() {
            // Aquí puedes realizar la eliminación del estudiante utilizando AJAX o cualquier otra lógica
            //eliminarEstudiante(idEstudiante);
            $.ajax({
              url: 'php/controlers/eliminar_curso.php',
              type: 'POST',
              data: { id_curso: id_curso },
              success: function (data) {
                  // Coloca los detalles del estudiante en el contenido del modal
                  //$('#detallesEstudiante').html(data);
                  console.log(data);
                  alert(data);
                  location.reload();
              },
              error: function () {
                  alert('Error al obtener datos del estudiante.');
              }
            });
        });
    });
    $("#btnAgregarCurso").click(function(){
      var nombreCurso = $("#nombreCurso").val();
      $.ajax({
              url: 'php/controlers/agregar_curso.php',
              type: 'POST',
              data: { nombreCurso: nombreCurso },
              dataType: 'json', // Indica que esperas una respuesta en formato JSON
              success: function (data) {
                  // Coloca los detalles del estudiante en el contenido del modal
                  //$('#detallesEstudiante').html(data);
                  alert(data['mensaje']);
                  $("#nombreCurso").val("");
                    $.ajax({
                      url: 'php/controlers/obtener_cursos.php',
                      data: {id:1},
                      type: 'GET',
                      success: function (data) {
                          //console.log(data);
                          // Coloca los detalles del estudiante en el contenido del modal
                          $('#listado_cursos').html(data);
                      },
                      error: function () {
                          alert('Error al obtener datos del cursos.');
                      }
                    });
                  
              },
              error: function () {
                  alert('Error al obtener datos del estudiante.');
              }
            });
    });
  </script>
  <script>
    /** Bloque de programación Para calificar la comida */
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