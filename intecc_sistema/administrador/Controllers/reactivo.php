<?php
	header("Content-type: text/html; charset=utf8");
		
		$pro = $_POST['pro'];

if($pro=="registrar"){

			include('../Models/conexion2.php');
    

			 $categoria=$_POST['categoria1'];
             $curso=$_POST['curso1'];
             $tema=$_POST['tema'];
             // $file1=$_POST['file1'];
             $nivel=$_POST['nivel'];
             $correcto=$_POST['correcto'];

             
             // $img=$_POST['img'];
             // $video=$_POST['video'];

                 $nombre = $_FILES['file1']['name'];
    $tipo = $_FILES['file1']['type'];
    $tamanio = $_FILES['file1']['size'];
    $ruta = $_FILES['file1']['tmp_name'];
    $destino = "../Multimedia/reactivos/otro/" . $nombre;

    if($_POST['pregunta'] != ""){
    	$pregunta=$_POST['pregunta'];
             $respuesta=$_POST['respuesta'];
             $opcion1=$_POST['opcion1'];
             $opcion2=$_POST['opcion2'];
             $opcion3=$_POST['opcion3'];


 $nombre_img = $_FILES['img']['name'];
    $tipo_img = $_FILES['img']['type'];
    $tamanio_img = $_FILES['img']['size'];
    $ruta_img = $_FILES['img']['tmp_name'];
    $destino_img = "../Multimedia/reactivos/img/" . $nombre_img;

 $nombre_video = $_FILES['video']['name'];
    $tipo_video = $_FILES['video']['type'];
    $tamanio_video = $_FILES['video']['size'];
    $ruta_video = $_FILES['video']['tmp_name'];
    $destino_video = "../Multimedia/reactivos/video/" . $nombre_video;
}

             if($nombre != ""){

$valores = "INSERT INTO `reactivos`( `id_examen`, `id_curso`, `id_tema`, `nivel`, `file`, `correcto`) VALUES ('$categoria', '$curso', '$tema', '$nivel', '$nombre', '$correcto')";

             $result = mysqli_query($link, $valores);

					if (copy($ruta, $destino) && $result) {

                echo '<script> window.location="../Views/reactivos.php"; </script>';

        }
				
             }

             if($nombre_img != "" && $nombre_video != ""){

$valores = "INSERT INTO `reactivos`( `id_examen`, `id_curso`, `id_tema`, `nivel`, `pregunta`, `respuesta`, `opc1`, `opc2`, `opc3`, `img`, `video`, `correcto`) VALUES ('$categoria', '$curso', '$tema', '$nivel', '$pregunta', '$respuesta', '$opcion1', '$opcion2', '$opcion3', '$nombre_img', '$nombre_video', '$correcto')";

             $result = mysqli_query($link, $valores);

					if (copy($ruta_img, $destino_img) && copy($ruta_video, $destino_video) && $result) {

                echo '<script> window.location="../Views/reactivos.php"; </script>';

        }

             }



			}
            if($pro=="editar"){

            include('../Models/conexion2.php');
    

             $id_reactivo=$_POST['id_reactivo'];

                 $bi = mysqli_query($link, "SELECT img, video, file from reactivos  where id_reactivo='$id_reactivo'"); 
            while($registro = mysqli_fetch_array($bi)){
      $imgb[0]=$registro['img'];
      $videob[0]=$registro['video'];
      $file[0]=$registro['file'];

            }
            $e1=$imgb[0];
      $e2=$videob[0];
      $e3=$file[0];
      $u1="../Multimedia/reactivos/img/" . $e1;
      $u2="../Multimedia/reactivos/video/" . $e2;
      $u3="../Multimedia/reactivos/otro/" . $e3;

unlink($u1);
unlink($u2);
unlink($u3);


             $categoria=$_POST['categoria1'];
             $curso=$_POST['curso1'];
             $tema=$_POST['tema'];
             // $file1=$_POST['file1'];
             $nivel=$_POST['nivel'];
             $correcto=$_POST['correcto'];

             
             // $img=$_POST['img'];
             // $video=$_POST['video'];

                 $nombre = $_FILES['file1']['name'];
    $tipo = $_FILES['file1']['type'];
    $tamanio = $_FILES['file1']['size'];
    $ruta = $_FILES['file1']['tmp_name'];
    $destino = "../Multimedia/reactivos/otro/" . $nombre;

    if($_POST['pregunta'] != ""){
        $pregunta=$_POST['pregunta'];
             $respuesta=$_POST['respuesta'];
             $opcion1=$_POST['opcion1'];
             $opcion2=$_POST['opcion2'];
             $opcion3=$_POST['opcion3'];


 $nombre_img = $_FILES['img']['name'];
    $tipo_img = $_FILES['img']['type'];
    $tamanio_img = $_FILES['img']['size'];
    $ruta_img = $_FILES['img']['tmp_name'];
    $destino_img = "../Multimedia/reactivos/img/" . $nombre_img;

 $nombre_video = $_FILES['video']['name'];
    $tipo_video = $_FILES['video']['type'];
    $tamanio_video = $_FILES['video']['size'];
    $ruta_video = $_FILES['video']['tmp_name'];
    $destino_video = "../Multimedia/reactivos/video/" . $nombre_video;
}

             if($nombre != ""){


$valores = "UPDATE `reactivos` SET `id_examen`='$categoria',`id_curso`='$curso',`id_tema`='$tema',`nivel`='$nivel',`pregunta`='',`respuesta`='',`opc1`='',`opc2`='',`opc3`='',`img`='',`video`='', `file`='$nombre', `correcto`='$correcto' WHERE `id_reactivo`='$id_reactivo'";

             $result = mysqli_query($link, $valores);

                    if (copy($ruta, $destino) && $result) {

                echo '<script> window.location="../Views/reactivos.php"; </script>';

        }
                
             }

             if($nombre_img != "" && $nombre_video != ""){

$valores = "UPDATE `reactivos` SET `id_examen`='$categoria',`id_curso`='$curso',`id_tema`='$tema',`nivel`='$nivel',`pregunta`='$pregunta',`respuesta`='$respuesta',`opc1`='$opcion1',`opc2`='$opcion2',`opc3`='$opcion3',`img`='$nombre_img',`video`='$nombre_video', `file`='', `correcto`='$correcto' WHERE `id_reactivo`='$id_reactivo'";

             $result = mysqli_query($link, $valores);

                    if (copy($ruta_img, $destino_img) && copy($ruta_video, $destino_video) && $result) {

                echo '<script> window.location="../Views/reactivos.php"; </script>';

        }

             }



            }

                        if($pro=="eliminar"){

            include('../Models/conexion2.php');
    

             $id_reactivo=$_POST['id_reactivo'];

                 $bi = mysqli_query($link, "SELECT img, video, file from reactivos  where id_reactivo='$id_reactivo'"); 
            while($registro = mysqli_fetch_array($bi)){
      $imgb[0]=$registro['img'];
      $videob[0]=$registro['video'];
      $file[0]=$registro['file'];

            }
            $e1=$imgb[0];
      $e2=$videob[0];
      $e3=$file[0];
      $u1="../Multimedia/reactivos/img/" . $e1;
      $u2="../Multimedia/reactivos/video/" . $e2;
      $u3="../Multimedia/reactivos/otro/" . $e3;

unlink($u1);
unlink($u2);
unlink($u3);

$valores = "DELETE FROM `reactivos` WHERE `id_reactivo`='$id_reactivo'";

             $result = mysqli_query($link, $valores);

             if($result){
                echo 'exito';

             }else{
                echo 'error';
             }

            }
		
?>

