$(document).ready(function() {
    $('#login-form').submit(function(event) {
      event.preventDefault();
  
      var username = $('#username').val();
      var password = $('#password').val();
  
      var data = {
        username: username,
        password: password
      };
  
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

