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

});
