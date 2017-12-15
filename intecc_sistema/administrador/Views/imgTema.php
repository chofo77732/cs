<?php
header("Content-type: text/html; charset=utf8");
//Primero, arranca el bloque PHP y checkea si el archivo tiene nombre.  Si no fue asi, te remite de nuevo al formulario de inserción:
// No se comprueba aqui si se ha subido correctamente.
include('../Models/conexion2.php');

          $pro = $_POST['pro'];

if($pro=="registrar"){

            // $id = $_POST['id'];
          $nombre_curso = $_POST['nombre'];
          $descripcion_curso= $_POST['descripcion'];
          $categoria= $_POST['curso'];

    $nombre_img = $_FILES['imagen']['name'];
    $tipo_img = $_FILES['imagen']['type'];
    $tamanio_img = $_FILES['imagen']['size'];
    $ruta_img = $_FILES['imagen']['tmp_name'];
    $destino_img = "../Multimedia/temas/img/" . $nombre_img;

    if ($nombre_img != "") {
        if (copy($ruta_img, $destino_img)) {
           
        //     $sql = "INSERT INTO `file_img`(`tama`, `tipo`, `nombre`, `dependencia`) VALUES ( '$tamanio_img','$tipo_img','$nombre_img' ,'$nombre_curso' )";

        //     $query = mysqli_query($link, $sql);;
        //     if($query){
                echo "Se guardo correctamente";
        //     }
        // } else {
        //     echo "Error";
        }
    }


    $nombre_video = $_FILES['video']['name'];
    $tipo_video = $_FILES['video']['type'];
    $tamanio_video = $_FILES['video']['size'];
    $ruta_video = $_FILES['video']['tmp_name'];
    $destino_video = "../Multimedia/temas/video/" . $nombre_video;

    if ($nombre_video != "") {
        if (copy($ruta_video, $destino_video)) {
            
        //     $sql = "INSERT INTO `file_video`(`tama`, `tipo`, `nombre`, `dependencia`) VALUES ( '$tamanio_video','$tipo_video','$nombre_video' ,'$nombre_curso' )";

        //     $query = mysqli_query($link, $sql);;
        //     if($query){
                echo "Se guardo correctamente";
        //     }
        // } else {
        //     echo "Error";
        }
    }

        $nombre_pdf = $_FILES['pdf']['name'];
    $tipo_pdf = $_FILES['pdf']['type'];
    $tamanio_pdf = $_FILES['pdf']['size'];
    $ruta_pdf = $_FILES['pdf']['tmp_name'];
    $destino_pdf = "../Multimedia/temas/pdf/" . $nombre_pdf;

    if ($nombre_pdf != "") {
        if (copy($ruta_pdf, $destino_pdf)) {
            
        //     $sql = "INSERT INTO `file_pdf`(`tama`, `tipo`, `nombre`, `dependencia`) VALUES ( '$tamanio_video','$tipo_video','$nombre_video' ,'$nombre_curso' )";

        //     $query = mysqli_query($link, $sql);;
        //     if($query){
                echo "Se guardo correctamente";
        //     }
        // } else {
        //     echo "Error";
        }
    }

          
$query = "INSERT INTO `tema`(`nombre`, `descripcion`, `id_curso`, `imagen`, `video`, `pdf`) VALUES('$nombre_curso','$descripcion_curso', '$categoria'  , '$nombre_img', '$nombre_video', '$nombre_pdf')";

// $consulta_insertar = "INSERT INTO `curso`(`nombre`, `descripcion`, `id_categoria`) VALUES('$nombre','$descripcion', '$categoria')";


$result = mysqli_query($link, $query);
   

echo '<script> window.location="tema2.php?id_curso='.$categoria.'"; </script>';


}else{


            $id = $_POST['id'];
          $nombre_curso = $_POST['nombre'];
          $descripcion_curso= $_POST['descripcion'];
          $categoria= $_POST['curso'];

              $bi = mysqli_query($link, "SELECT * from tema  where id_tema='$id'"); 
            while($registro = mysqli_fetch_array($bi)){
      $imgb[0]=$registro['imagen'];
      $videob[0]=$registro['video'];
      $pdfb[0]=$registro['pdf'];

            }
            $e1=$imgb[0];
      $e2=$videob[0];
      $e3=$pdfb[0];
      $u1="../Multimedia/temas/img/" . $e1;
      $u2="../Multimedia/temas/video/" . $e2;
      $u3="../Multimedia/temas/pdf/" . $e3;

unlink($u1);
unlink($u2);
unlink($u3);


    $nombre_img = $_FILES['imagen']['name'];
    $tipo_img = $_FILES['imagen']['type'];
    $tamanio_img = $_FILES['imagen']['size'];
    $ruta_img = $_FILES['imagen']['tmp_name'];
    $destino_img = "../Multimedia/temas/img/" . $nombre_img;

    if ($nombre_img != "") {
        if (copy($ruta_img, $destino_img)) {
           
        //     $sql = "UPDATE `file_img` SET `tama`='$tamanio_img',`tipo`='$tipo_img',`nombre`='$nombre_img',`dependencia`='$nombre_curso' WHERE `id_imagen`='$id'";

        //     $query = mysqli_query($link, $sql);;
        //     if($query){
                echo "Se guardo correctamente";
        //     }
        // } else {
        //     echo "Error";
        }
    }


    $nombre_video = $_FILES['video']['name'];
    $tipo_video = $_FILES['video']['type'];
    $tamanio_video = $_FILES['video']['size'];
    $ruta_video = $_FILES['video']['tmp_name'];
    $destino_video = "../Multimedia/temas/video/" . $nombre_video;

    if ($nombre_video != "") {
        if (copy($ruta_video, $destino_video)) {
            
        //     $sql = "UPDATE `file_video` SET `tama`='$tamanio_video',`tipo`='$tipo_video',`nombre`='$nombre_video',`dependencia`='$nombre_curso' WHERE `id_video`='$id'";

        //     $query = mysqli_query($link, $sql);;
        //     if($query){
                echo "Se guardo correctamente";
        //     }
        // } else {
        //     echo "Error";
        }
    }

        $nombre_pdf = $_FILES['pdf']['name'];
    $tipo_pdf = $_FILES['pdf']['type'];
    $tamanio_pdf = $_FILES['pdf']['size'];
    $ruta_pdf = $_FILES['pdf']['tmp_name'];
    $destino_pdf = "../Multimedia/temas/pdf/" . $nombre_pdf;

    if ($nombre_pdf != "") {
        if (copy($ruta_pdf, $destino_pdf)) {
            
        //     $sql = "UPDATE `file_pdf` SET `tama`='$tamanio_pdf',`tipo`='$tipo_pdf',`nombre`='$nombre_pdf',`dependencia`='$nombre_pdf' WHERE `id_pdf`='$id'";

        //     $query = mysqli_query($link, $sql);;
        //     if($query){
                echo "Se guardo correctamente";
        //     }
        // } else {
        //     echo "Error";
        }
    }




$query = "UPDATE `tema` SET `nombre`='$nombre_curso',`descripcion`='$descripcion_curso',`imagen`='$nombre_img',`video`='$nombre_video' ,`pdf`='$nombre_pdf' WHERE `id_tema`='$id'";

// $consulta_insertar = "INSERT INTO `curso`(`nombre`, `descripcion`, `id_categoria`) VALUES('$nombre','$descripcion', '$categoria')";

$result = mysqli_query($link, $query);
           
echo '<script> window.location="tema2.php?id_curso='.$categoria.'"; </script>';


}






?>
