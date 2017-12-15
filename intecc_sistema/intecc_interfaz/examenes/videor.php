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
  
  <link href="http://vjs.zencdn.net/6.2.8/video-js.css" rel="stylesheet">

  <!-- If you'd like to support IE8 -->
  <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
  <script src="http://vjs.zencdn.net/6.2.8/video.js"></script>

</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50" ondragstart="return false" oncontextmenu="return false" onselectstart="return false" >

<?php 

  $id_reactivo=$_GET['id_reactivo'];
  $video="";
// $id_reactivo="intro.mp4";
  include('../Models/conexion2.php');
 $sql = "SELECT * from reactivos where id_reactivo = '$id_reactivo' ";

            $result = mysqli_query($link, $sql);
            while($registro = mysqli_fetch_array($result)){
$video=$registro['video'];
            }

 ?>

               <video id='my-video' class='video-js' controls preload='auto' width='520' height='244'
  poster='MY_VIDEO_POSTER.jpg' data-setup='{}'>
    <source src="../../administrador/Multimedia/reactivos/video/<?php echo $video; ?>" type='video/mp4'>
    <p class='vjs-no-js'>
      To view this video please enable JavaScript, and consider upgrading to a web browser that
      <a href='http://videojs.com/html5-video-support/'' target='_blank'>supports HTML5 video</a>
    </p>
  </video>   

<script>
$(document).ready(function(){

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

  

</body>
</html>
<?php

  }
  else
  {
    echo '<script> window.location="../Views/noact.php"; </script>';
  }
 ?>
    