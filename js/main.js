$(document).ready(function() {
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
    /*** Para obtener valor del formulario */
    $('#login-form').submit(function(event) {
      event.preventDefault();
  
      var username = $('#username').val();
      var password = $('#password').val();
  
      var data = {
        username: username,
        password: password
      };
      console.log(data);
      $.ajax({
        type: 'POST',
        url: 'login.php',
        data: data,
        dataType: 'json',
        success: function(response) {
          if (response.success) {
            $('#result').html('Inicio de sesión exitoso');
          } else {
            $('#result').html('Inicio de sesión fallido');
          }
        },
        error: function() {
          $('#result').html('Error en la solicitud');
        }
      });
    });
  });

