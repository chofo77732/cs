<?php 
session_start();
  if (isset($_SESSION['nombre']) && $_SESSION['ingreso']=='YES') 
  {?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Bootstrap Theme The Band</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="../Resources/bootstrap/css/theme.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="inicio.php">HOME</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <?php echo $_SESSION['nombre']; ?>
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><li><a href="tusCursos.php" >Mis Cursos</a></li>
                        <!-- <a href="javascript: void(0)" onclick='cerrar();'>Cerrar Session</a> -->
                        <a href="javascript: void(0)" onclick=" location.href='../Controllers/logout.php' ">Cerrar Session</a>

                        </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>



<!-- Container (The Band Section) -->
<!-- <div id="band" class="container text-center">
  <h3><?php 

echo $_SESSION['activado'];

?></h3>
  <p><em>Activacion de cuenta</em></p>
  <p>Enviamos un código de activación a tu correo</p>
  <br>

      <div >
        <p>hola <?php 

echo $_SESSION['email'];

?></p>
      </div>


</div> -->


<div class="container" >

 <div class="row" >

           <div class="col-md-6 col-md-offset-3" >

                    <div class="panel-heading">Activar Cuenta</div>
                    <div class="panel-body"> 
                       <div class="alert alert-success text-center" id="exito_activacion" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span></span>
                </div>  
                <div class="alert alert-danger text-center" style="display:none;" id="error">
                        </div>                 
                        <form role="form">

                        <div class="form-group">
                                <label for="email">Email:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                                    <input type="text" class="form-control" id="email" readonly="readonly" value="<?php echo $_SESSION['email']; ?>" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="cod">Codigo</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                                    <input type="text" class="form-control" id="cod"  autocomplete="off" >
                                </div>
                            </div>

                            
                            <!-- <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-star"></span></span>
                                    <input type="password" class="form-control" id="password" placeholder="Password">
                                </div>
                            </div>     -->                 
                            <button type="button" class="btn btn-primary btn-block" onclick='activar();'><span class=""></span> Activar cuenta</button>   
                        </form>
                    </div>
                
            </div>


        </div>

</div>



<!-- Footer -->
<footer class="text-center">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  <p>
  <!-- <a href="https://www.w3schools.com" data-toggle="tooltip" title="Visit w3schools">Top</a> -->
  <a href="#" >Top</a>
  </p> 
</footer>

<script>
$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip(); 
  
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})
</script>

    <script>
        function cerrar()
        {
            $.ajax({
                url:'../Controllers/usuario.php',
                type:'POST',
                data:"mensaje=mensaje&boton=cerrar"
            }).done(function(resp){
                alert(resp);

            });
        }
    </script>


    <script>

                function activar(){

              var codigo=$('#cod').val();
              var email=$('#email').val();

            if(codigo==''){
$('#error').html('Campos vacios').show(200).delay(3000).hide(200);
}else{

                $.ajax({
                    url:'../Controllers/activacion.php',
                    type:'POST',
                    data:'codigo='+codigo+'&email='+email+'&boton=activar'
                }).done(function(respuesta){
                    if (respuesta=='exito') {
                        // $('#exito').html('Su cuenta ha sido registrada').show(200).delay(3000).hide(200);

                          alert('Felicidades, tu cuenta ha sido registrada \n Entra de nuevo a tu cuenta');
                          
                        location.href='../Controllers/logout.php';
                    }
                    else{
                        alert(respuesta);
                        $('#error').html('Codigo Incorrecto').show(200).delay(3000).hide(200);
                    }
                    
                });
            
            }
        }



        
    </script>



</body>
</html>

<?php

  }
  else
  {
    header("location: ./");
  }
 ?>
    