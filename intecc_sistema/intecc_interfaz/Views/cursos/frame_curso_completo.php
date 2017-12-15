<?php 
session_start();

         include('../../Database/conexion.php');

        $user=$_SESSION['nombre'];
        $email=$_SESSION['email'];

if($_GET)
{ 
 
$idval=$_GET['id_curso'];
}



 
    $consulta = mysqli_query($link, "SELECT curso.id_curso, curso.nombre, curso.descripcion FROM cliente INNER JOIN curso on cliente.id_curso = curso.id_curso where cliente.id_curso='$idval' AND cliente.user='$user' and cliente.email='$email' and cliente.activado = '1'");
            // $registro=mysqli_fetch_assoc($consulta);

  if (isset($_SESSION['nombre']) && $_SESSION['ingreso']=='YES' && $_SESSION['activado']=='1' && mysqli_num_rows($consulta)==1) 
  {?>

<!DOCTYPE html>
<html lang="en" ondragstart="return false" oncontextmenu="return false" onselectstart="return false">
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
  
  <link href="http://vjs.zencdn.net/6.2.8/video-js.css" rel="stylesheet">

  <!-- If you'd like to support IE8 -->
  <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
  <script src="http://vjs.zencdn.net/6.2.8/video.js"></script>

</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50" ondragstart="return false" oncontextmenu="return false" onselectstart="return false">


                   
                        
                        <?php
if($_GET)
{ 
//recibo la url la decodifico y la dejo en la variable $_GET
$id=$_GET['id_curso'];
}


// $id='1';


          include('../../Database/conexion.php');

         $sql2 = "SELECT * from tema where id_tema = '$id' ";

            $result2 = mysqli_query($link, $sql2);

            while($registro2 = mysqli_fetch_array($result2)){


      echo "
     
<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
  <video id='my-video' class='video-js' controls preload='auto' width='580' height='244'
  poster='MY_VIDEO_POSTER.jpg' data-setup='{}'>
    <source src=\"../../../administrador/Multimedia/temas/video/".$registro2['video']."\" type='video/mp4'>
    <p class='vjs-no-js'>
      To view this video please enable JavaScript, and consider upgrading to a web browser that
      <a href='http://videojs.com/html5-video-support/'' target='_blank'>supports HTML5 video</a>
    </p>
  </video>
                          </video>


                          </div>

<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'  STYLE='background-color:#E6E6FA'>
<br>
<hr>

                      <h3>".$registro2['nombre']."</h3>
<hr>
                     
                          <p align='justify'>".$registro2['descripcion']." </p>

<img src='../Multimedia/img/pdf_icon.ico' onclick='hola();' height='40p' width='40p' ><a  target=\"_blank\" href='../../../administrador/Multimedia/temas/pdf/".$registro2['pdf']."'> Abrir PDF</a>
<br>
    </div>
                      
      ";
    } 


// <img src='../Multimedia/img/pdf.png' onclick='hola();' height='40p' width='40p' ><a href='ver_pdf.php'>Descargar PDF</a>

?>

</div>

                          <hr>
</body>
</html>

<?php

  }
  else
  {


     echo '<script> window.location="pago.php?id='.$_GET["id_curso"].'"; </script>';
  }
 ?>
