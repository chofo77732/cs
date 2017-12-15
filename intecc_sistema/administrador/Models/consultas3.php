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





		function eliminar($id_tema)
		{

include('conexion2.php');

$dt = "SELECT * from tema  where id_tema='$id_tema'"; 
$i=0;
$res=mysqli_query($link, $dt);
            $dfl = mysqli_fetch_array($res);
      $img=$dfl['imagen'];
      $video=$dfl['video'];
      $pdf=$dfl['pdf'];

      $imgurl="../Multimedia/temas/img/" . $img;
      $videourl="../Multimedia/temas/video/" . $video;
      $pdfurl="../Multimedia/temas/pdf/" . $pdf;
unlink($imgurl);
unlink($videourl);
unlink($pdfurl);


			if(mysqli_query($link, "DELETE FROM tema WHERE id_tema = '$id_tema'")){
				return true;
			}
			else
			{
				return false;
			}
			

		}
		

	}

	
	
?>