<?php 
session_start();
  if (isset($_SESSION['nombre']) && $_SESSION['ingreso']=='YES' && $_SESSION['activado']=='1') 
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
            <li><a href="tusCursos.php" >Mis Cursos</a></li>
            <li>

                        <a href="javascript: void(0)" onclick=" location.href='../Controllers/logout.php' ">Cerrar Session</a>

                        </li>

          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<?php 

$id_curso=$_GET['id_curso']; ?>


<?php


include('../Models/conexion2.php');

$query = "SELECT id_curso, nombre FROM curso";
$result = mysqli_query($link, $query);

            while($registro = mysqli_fetch_array($result, MYSQLI_ASSOC)){

      $nombre_curso=$registro['nombre'];
    }



?>

<br>
<br>
 <div class="Container">
<div class="col-xs-2"></div>
<div class="col-xs-10">
<h2>Activacion de cuenta completa</h2>

</div></div>

 <div class="Container">
<div class="col-xs-3"></div>
<div class="col-xs-9">
<h3>Paso 1</h3>
<p>Completa el pago en PayPal</p>

<!-- <form target="_blank" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="TDH9K3Q2BP9KC">
<input  type="image" src="https://www.paypalobjects.com/es_XC/MX/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">
<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
</form> -->

<div id="pago">
<?php

include('../Models/conexion2.php');

$query = "SELECT * FROM curso where id_curso='$id_curso'";
$result = mysqli_query($link, $query);

            while($registro = mysqli_fetch_array($result, MYSQLI_ASSOC)){

          echo $registro['boton'];
    }
?>

</div>

</div></div>

 <div class="Container">
<div class="col-xs-3"></div>
<div class="col-xs-9">
<h3>Paso 2</h3>
<p>Una vez que hayas pagado el curso, Solicita tu código de confirmación y se enviara a tu correo electronico</p>

<button  type="button" class="btn btn-primary" onclick='solicitar_codigo();'><span class=""></span>Solicitar código</button> 
 <p>Este proceso tardará de 1 a 3 días</p>

</div></div>

 <div class="col-xs-3"></div>
<div class="col-xs-9">
<h3>Paso 3</h3>
<p>Una vez recibido el código, ingresalo en la parte inferior, junto con una contraseña para finalizar la activación</p>
</div>

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
                                <label for="email">User:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                    <input type="text" class="form-control" id="user" readonly="readonly" value="<?php echo $_SESSION['nombre']; ?>" autocomplete="off">
                                </div>
                            </div>
                             <div class="form-group">
                                <label for="email">Email:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                                    <input type="text" class="form-control" id="email" readonly="readonly" value="<?php echo $_SESSION['email']; ?>" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email">Curso:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                                    <input type="text" class="form-control" id="xxx" readonly="readonly" value="<?php echo $nombre_curso;?>" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password">contraseña</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                                    <input type="password" class="form-control" id="password"  autocomplete="off" >
                                </div>
                            </div>


                                <label for="password2">Repite contraseña</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                                    <input type="password" class="form-control" id="password2"  autocomplete="off" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="cod">Codigo</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                                    <input type="text" class="form-control" id="cod"  autocomplete="off" >
                                </div>
                            </div>

<input type="hidden" name="id_curso" id="id_curso" value="<?php echo $id_curso;?>">
<input type="hidden" name="nombre_curso" id="nombre_curso" value="<?php echo $nombre_curso;?>">
                            

                            <!-- <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-star"></span></span>
                                    <input type="password" class="form-control" id="password" placeholder="Password">
                                </div>
                            </div>     -->                 
                            <button  type="button" class="btn btn-primary btn-block" onclick='activar_cuenta();'><span class=""></span> Activar cuenta</button>   
                        </form>
                    </div>
                
            </div>


        </div>

</div>


<div class="col-xs-6"></div>
</span><a href="tusCursos.php" >si ya te registraste da click aqui</a>
<br>
<br>
<br>
<br>
<br>
<br>



<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->

<!-- Footer -->
<footer class="text-center">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  <p><a href="https://www.w3schools.com" data-toggle="tooltip" title="Visit w3schools">Top</a></p> 
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

        function solicitar_codigo()
        {
              var user=$('#user').val();
              var email=$('#email').val();
              var id_curso=$('#id_curso').val();
              var nombre_curso=$('#nombre_curso').val();

//               alert(
// user+
//               email+
//               id_curso+
//               nombre_curso
//                 );
                  $.ajax({
                    url:'../Controllers/suscribcion.php',
                    type:'POST',
                    data:'id_curso='+id_curso+'&email='+email+'&user='+user+'&nombre_curso='+nombre_curso+'&boton=codigo'
                }).done(function(respuesta){
                    if (respuesta=='exito') {
                        // $('#exito').html('Su cuenta ha sido registrada').show(200).delay(3000).hide(200);

                          
                        alert("Se ha enviado tu petición");
                    }
                    else{
                        alert(respuesta);
                        // $('#error').html('Codigo Incorrecto').show(200).delay(3000).hide(200);
                    }
                    
                });

        }
    </script>


  <script>

                function activar_cuenta(){

              var codigo=$('#cod').val();
              var user=$('#user').val();
              var email=$('#email').val();
              var password=$('#password').val();
              var password2=$('#password2').val();
              var id_curso=$('#id_curso').val();

              // alert(
              //                 codigo+
              // user+
              // email+
              // password+
              // password2+
              // id_curso
              // );

            if(codigo=='' || password=="" || password2==""){
$('#error').html('Campos vacios').show(200).delay(3000).hide(200);


}else{

  if(password===password2){



  // alert("confirmacion del pago pendiente");

                 

                                 $.ajax({
                    url:'../Controllers/act_cuenta.php',
                    type:'POST',
                    data:'id_curso='+id_curso+'&email='+email+'&password='+password+'&user='+user+'&codigo='+codigo+'&boton=activar'
                }).done(function(respuesta){
                    if (respuesta=='exito') {
                        // $('#exito').html('Su cuenta ha sido registrada').show(200).delay(3000).hide(200);

                          // alert(respuesta);
                        location.href='tusCursos.php';
                    }
                    else{
                        alert(respuesta);
                        $('#error').html('Codigo Incorrecto').show(200).delay(3000).hide(200);
                    }
                    
                });
                    
         
        }else{
$('#error').html('Contraseña incorrecta').show(200).delay(3000).hide(200);

        }
        }


        }
    </script>


</body>
</html>

<?php

  }
  else
  {
    echo '<script> window.location="../Views/noact.php"; </script>';
  }
 ?>
    