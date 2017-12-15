<?php 
session_start();
  if (isset($_SESSION['nombre']) && $_SESSION['ingreso']=='YES' && $_SESSION['tra']=='1' && $_SESSION['admin']=='1') 
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

  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<!-- 
      <script type="text/javascript" src="../Resources/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="../Resources/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../Resources/bootstrap/js/angular.min.js"></script>
    <script type="text/javascript" src="../Resources/bootstrap/js/jquery.js"></script> -->
  
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
        <li><a href="Principal.php">HOME</a></li><!-- 
         <li><a href="inicio2.php">Categorías</a></li>
        <li><a href="curso2.php">Cursos</a></li>
        <li><a href="tema2.php">Temas</a></li> -->
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <?php echo $_SESSION['nombre']; ?>
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>
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
<br>
<div class="Container">
<div class="col-xs-2"></div>

<h1>Clientes INTECC (Administrador)</h1>


</div>

<div class="container">
<div class="row">

<br>
    <div class="registros" id="tbl_actor">
<br>
        <table class="table table-striped table-condensed table-hover" >
            <tr>
                <!-- <th >id</th> -->
                <th >Nombre</th>
                <th >Descripcion</th>
                <th >Estado</th>
                <th >Opciones</th>
            </tr>
        <?php

include('../Models/conexion2.php');


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
$id_user=$_GET['user'];

}




        $sql = "SELECT * FROM user where user_id='$id_user'";

        $valores = mysqli_query($link, $sql);

    
        $datos;
$row = mysqli_fetch_assoc($valores);
          $datos=$row['cursos'];
          $user=$row['user'];
          $email=$row['email'];

          // echo $datos[$i];
       

$str=$datos;

$split=explode(",", $str);
        
for ($j=0; $j < sizeof($split); $j++) { 
  # code...
$id_curso=$split[$j];


              $registro = mysqli_query($link, "SELECT curso.nombre, curso.descripcion, curso.id_curso, cliente.activado FROM cliente INNER JOIN curso on cliente.id_curso = curso.id_curso where cliente.id_user = '$id_user'"); 
            while($registro2 = mysqli_fetch_array($registro)){
                echo "<tr>
                        <td>".$registro2['nombre']."</td>
                        <td>".$registro2['descripcion']."</td>
                        ";
                        if($registro2['activado']=='1'){
echo "<td style='color:#00FF40';>Activado</td>";
                        }else{
echo "<td style='color:#FF0000';>No Activado</td>";

                        }

                        echo "
                        <td>
<a href='javascript:codigo(".$registro2['id_curso'].");' class='glyphicon '>Envíar codigo</a></td>
                        
                    </tr>";       
            }

}


        ?>
        </table>

<input type="hidden" name="user" id="user" value="<?php echo $user ?>">
<input type="hidden" name="email" id="email" value="<?php echo $email ?>">
</div>
</div>
</div>



<br>
<br>

<br>
<br>
<br>
<br>
<br>
<br>
<br>



<!-- Container (The Band Section) -->

<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->




<br>
<!-- Footer -->
<footer class="text-center">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  <p><a href="#" data-toggle="tooltip">Top</a></p> 
</footer>

<script type="javascript">
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

<script type="text/javascript" src="../Resources/bootstrap/js/cod.js"></script>

</body>
</html>

<?php

  }
  else
  {
    echo '<script> window.location="../Views/index.php"; </script>';
  }
 ?>
    