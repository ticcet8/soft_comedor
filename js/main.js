$(document).ready(function() {
    
    /*** Para obtener valor del formulario AJAX
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
        url: 'php/login.php',
        data: data,
        dataType: 'json',
        success: function(response) {
          if (response.success) {
            //$('#result').html('Inicio de sesión exitoso');
            alert("Inicio exitoso");
            $('#loginModal').modal('hide');
          } else {
            //$('#result').html('Inicio de sesión fallido');
            alert("Inicio fallido");
            $('#loginModal').modal('hide');
          }
        },
        error: function() {
          $('#result').html('Error en la solicitud');
        }
      });
    });
    */
  });

