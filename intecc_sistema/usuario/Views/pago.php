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

<br>
<br>
 <div class="Container">
<div class="col-xs-2"></div>
<div class="col-xs-10">
<h2>Suscripción</h2>
</div></div>


    <form method="post" action="act_cuenta.php">

                            <?php

function encode_this($string) 
{
$string = utf8_encode($string);
$control = "qwerty"; //defino la llave para encriptar la cadena, cambiarla por la que deseamos usar
$string = $control.$string.$control; //concateno la llave para encriptar la cadena
$string = base64_encode($string);//codifico la cadena
return($string);
} 
                            
function decode_get2($string)
{
$cad = split("[?]",$string); //separo la url desde el ?
$string = $cad[1]; //capturo la url desde el separador ? en adelante
$string = base64_decode($string); //decodifico la cadena
$control = "qwerty"; //defino la llave con la que fue encriptada la cadena,, cambiarla por la que deseamos usar
$string = str_replace($control, "", "$string"); //quito la llave de la cadena

//procedo a dejar cada variable en el $_GET
$cad_get = split("[&]",$string); //separo la url por &
foreach($cad_get as $value)
{
$val_get = split("[=]",$value); //asigno los valosres al GET
$_GET[$val_get[0]]=utf8_decode($val_get[1]);
}
}

if($_GET)
{ 
//recibo la url la decodifico y la dejo en la variable $_GET
decode_get2($_SERVER["REQUEST_URI"]); 
$id=$_GET['id_curso'];
}



 include('../Models/conexion2.php');
    $sql = "SELECT * from curso where id_curso = '$id' ";


            $result = mysqli_query($link, $sql);

$registro = mysqli_fetch_array($result);



?>

 <div class="Container">
 <div class="row">
<div class="col-xs-2"></div>
<div class="col-xs-10">
     <div class="form-group">
                    <label for="nombre"  class="control-label col-xs-1">Usuario:</label>
                    <div class="col-xs-3">
                        <input id="user" name="user" type="text" class="form-control" readonly value="<?php echo $_SESSION['nombre']; ?>">

                    </div>
                  </div>


</div></div></div>
<br>
 <div class="Container">
 <div class="row">
<div class="col-xs-2"></div>
<div class="col-xs-10">
     <div class="form-group">
                    <label for="nombre"  class="control-label col-xs-1">Email:</label>
                    <div class="col-xs-3">
                        <input id="email" name="email" type="text" class="form-control" readonly value="<?php echo $_SESSION['email']; ?>" >

                    </div>
                  </div>
                  

</div></div></div>
<br>
 <div class="Container">
 <div class="row">
<div class="col-xs-2"></div>
<div class="col-xs-10">
     <div class="form-group">
                    <label for="nombre"  class="control-label col-xs-1">Curso:</label>
                    <div class="col-xs-3">
                        <input id="curso" name="curso" type="text" class="form-control" readonly value="<?php echo $registro['nombre']; ?>">

                    </div>
                  </div>
                  

</div></div></div>
<br>
 <div class="Container">
 <div class="row">
<div class="col-xs-2"></div>
<div class="col-xs-10">
     <div class="form-group">
                    <label for="nombre"  class="control-label col-xs-1">Costo:</label>
                    <div class="col-xs-3">
                        <input id="costo" name="costo" type="text" class="form-control" readonly value="<?php echo $registro['costo']; ?>">

                    </div>
                  </div>
                  

</div></div></div>


  
<br>
<br>
<br>




<input type="hidden" name="id_curso" id="id_curso" value="<?php echo $id?>">



</form>

            <div class="Container">
<div class="row">
<div class='col-sm-6 '>
</div>
<div class='col-sm-6'>
 <button  type="button" class="btn btn-primary" onclick='suscribirse();'><span class=""></span>Suscribirse</button> 
</div>
</div></div>


<br>
<br>
<br>

<!-- <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="TDH9K3Q2BP9KC">
<input type="image" src="https://www.paypalobjects.com/es_XC/MX/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">
<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
</form> -->

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

<?php 
$ho=$id;

$li = encode_this("id_curso=".$ho);
 ?>
       
<input type="hidden" name="dir" id="dir" value="<?php echo $li?>">
  <script>

                function suscribirse(){

              var user=$('#user').val();
              var email=$('#email').val();
              var id_curso=$('#id_curso').val();       
              var dir=$('#dir').val();       

                                 $.ajax({
                    url:'../Controllers/suscribcion.php',
                    type:'POST',
                    data:'id_curso='+id_curso+'&email='+email+'&user='+user+'&boton=activar'
                }).done(function(respuesta){
                    if (respuesta=='exito') {
                        // $('#exito').html('Su cuenta ha sido registrada').show(200).delay(3000).hide(200);
                   
                        location.href='pago_completo.php?'+dir;
                    }
                    else{

                      if(respuesta=='Curso ya suscripto'){

                        location.href='pago_completo.php?'+dir;
                      }else{
                        alert(respuesta);
                      }
                    }
                    
                });           
         
        }
    </script>




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

</body>
</html>

<?php

  }
  else
  {
    echo '<script> window.location="../Views/noact.php"; </script>';
  }
 ?>
    