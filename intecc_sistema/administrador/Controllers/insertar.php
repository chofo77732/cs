

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

  <link href="../Resources/bootstrap/css/nav.css" rel="stylesheet" type="text/css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
  <!-- 
      <script type="text/javascript" src="../Resources/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="../Resources/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../Resources/bootstrap/js/angular.min.js"></script>
    <script type="text/javascript" src="../Resources/bootstrap/js/jquery.js"></script>
   -->
</head>
<body >


<?php
          $id = $_POST['id'];
          $nombre = $_POST['nombre'];
          $descripcion= $_POST['desc'];
          $categoria= $_POST['categoria'];

          $bin_t_img=$_FILES['imagen']['tmp_name'] ;
          $bin_img = addslashes(fread(fopen($bin_t_img, "rb"), filesize($bin_t_img)));

          $bin_t_video=$_FILES['video']['tmp_name'] ;
          $bin_video = addslashes(fread(fopen($bin_t_video, "rb"), filesize($bin_t_video)));

          include('../Models/conex.php');

      if(mysql_query("INSERT INTO `curso`(`nombre`, `descripcion`, `id_categoria`,`imagen`,`video`) VALUES('$nombre','$descripcion', '$categoria', '$bin_img', '$bin_video')")){
        echo '<script> window.location="../Views/inicio.php"; </script>';
        return true;
      }
      else
      {
        return false;
      }

?>

</body>
</html>
