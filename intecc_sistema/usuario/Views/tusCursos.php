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
<br>
<br>

<div class="col-xs-1"></div>
<div class="col-xs-10">

<br>

<h2>Tus Cursos</h2>
<br>


    <div class="registros" id="tbl_actor">
<br>
        <table class="table table-striped table-condensed table-hover" >
            <tr>
                <!-- <th >id</th> -->
                <th >nombre</th>
                <th >Descripcion</th>
              <!--   <th >De la categoria</th>
                <th >imagen</th>
                <th >video</th>
                <th >costo</th>

                <th >Opciones</th> -->
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

// if($_GET)
// { 
// //recibo la url la decodifico y la dejo en la variable $_GET
// decode_get2($_SERVER["REQUEST_URI"]); 
// $id_curso=$_GET['id_curso'];
// }


        $user=$_SESSION['nombre'];
        $email=$_SESSION['email'];
 
    $consulta = mysqli_query($link, "SELECT curso.id_curso, curso.nombre, curso.descripcion FROM cliente INNER JOIN curso on cliente.id_curso = curso.id_curso where cliente.user='$user' and cliente.email='$email'");
            while($registro=mysqli_fetch_assoc($consulta)){

$ho=$registro['id_curso'];

$li = encode_this($ho);
                echo "<tr onclick='tuscursos(\"".$li."\");'>
                        <td>".$registro['nombre']."</td>
                        <td>".$registro['descripcion']."</td>
                    </tr>";       

            }


 
        ?>
        </table>
    </div></div>

<?php 
$li = encode_this("id_curso=");
 ?>
       
<input type="hidden" name="dir" id="dir" value="<?php echo $li?>">

      <script type="text/javascript">

  function tuscursos(id){

var dir=$('#dir').val();      
    var url="curso_material.php?"+dir+id;
// alert(url);
location.href=url;
// alert(url);
  }
      </script>

     



</body>
</html>

<?php

  }
  else
  {
    echo '<script> window.location="../Views/index.php"; </script>';
  }
 ?>
    