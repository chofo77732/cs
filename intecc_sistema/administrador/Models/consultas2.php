<?php 
	class usuario
	{
		private $conexion;
		public function __construct()
		{
			require_once('conexion.php');
			$this->conexion= new conexion();
			$this->conexion->conectar();
		}


		function registrar($nombre, $descripcion, $categoria, $imagen, $video){
			//$pass= sha1($pw);

			$sql2="INSERT INTO `curso`(`nombre`, `descripcion`, `id_categoria`,`imagen`,`video`) VALUES('$nombre','$descripcion', '$categoria', '$imagen', '$video')";
			if($this->conexion->conexion->query($sql2)){
				return true;
			}
			else
			{
				return false;
			}

			$this->conexion->cerrar();
		}

		function editar($id_categoria, $nombre, $descripcion){
			//$pass= sha1($pw);

			$sql2="UPDATE categoria SET  nombre = '$nombre', descripcion = '$descripcion' WHERE id_categoria = '$id_categoria'";
			if($this->conexion->conexion->query($sql2)){
				return true;
			}
			else
			{
				return false;
			}

			$this->conexion->cerrar();
		}





		function eliminar($id_curso)
		{

include('conexion2.php');



$df = "SELECT * from curso  where id_curso='$id_curso'"; 

$res=mysqli_query($link, $df);
            while($dfl = mysqli_fetch_array($res)){
      $img=$dfl['imagen'];
      $video=$dfl['video'];
      $pdf=$dfl['pdf'];

      $imgurl="../Multimedia/cursos/img/" . $img;
      $videourl="../Multimedia/cursos/video/" . $video;
      $pdfurl="../Multimedia/cursos/pdf/" . $pdf;
unlink($imgurl);
unlink($videourl);
unlink($pdfurl);
            }


$dt = "SELECT * from tema  where id_curso='$id_curso'"; 

$res=mysqli_query($link, $dt);
            while($dfl = mysqli_fetch_array($res)){
      $img=$dfl['imagen'];
      $video=$dfl['video'];
      $pdf=$dfl['pdf'];

      $imgurl="../Multimedia/temas/img/" . $img;
      $videourl="../Multimedia/temas/video/" . $video;
      $pdfurl="../Multimedia/temas/pdf/" . $pdf;
unlink($imgurl);
unlink($videourl);
unlink($pdfurl);
            }

//             while($registro = mysqli_fetch_array($sql)){
//       $reg=$registro['id_tema'];

//       $sql3="DELETE FROM tema WHERE id_tema = '$reg'";
// mysqli_query($link, $sql3);
//             }

			if( mysqli_query($link, "DELETE FROM tema WHERE id_curso = '$id_curso'") and mysqli_query($link, "DELETE FROM curso WHERE id_curso = '$id_curso'")){
				return true;
			}
			else
			{
				return false;
			}
			$this->conexion->cerrar();

		}
		

	
	}

	
	
?>