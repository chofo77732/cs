<?php ?>
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
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50" ondragstart="return false" oncontextmenu="return false" onselectstart="return false"  >

      
                        
                        <?php

if($_GET)
{ 
//recibo la url la decodifico y la dejo en la variable $_GET
$id=$_GET['id_curso'];
}


// $id='1';


          include('../../Database/conexion.php');

         $sql2 = "SELECT * from curso where id_curso = '$id' ";

            $result2 = mysqli_query($link, $sql2);

            while($registro2 = mysqli_fetch_array($result2)){


      echo "
     
<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>

  <video id='my-video' class='video-js' controls preload='auto' width='640' 
  poster='MY_VIDEO_POSTER.jpg' data-setup='{}'>
    <source src=\"../../../administrador/Multimedia/cursos/video/".$registro2['video']."\" type='video/mp4'>
    <p class='vjs-no-js'>
      To view this video please enable JavaScript, and consider upgrading to a web browser that
      <a href='http://videojs.com/html5-video-support/'' target='_blank'>supports HTML5 video</a>
    </p>
  </video>

                          </div>
      ";
    } 

// <img src='../Multimedia/img/pdf.png' onclick='hola();' height='40p' width='40p' ><a href='ver_pdf.php'>Descargar PDF</a>

?>

</body>
</html>
