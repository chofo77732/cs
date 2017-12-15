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


		function registrar($nombre, $descripcion){
			//$pass= sha1($pw);

			$sql2="INSERT INTO `categoria`(`nombre`, `descripcion`) VALUES('$nombre','$descripcion')";
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





		function eliminar($id_categoria)
		{

include('conex.php');

// select categoria.*, curso.id_curso from categoria LEFT JOIN curso on categoria.id_categoria = curso.id_categoria where categoria.id_categoria='1'

$sql = mysql_query("SELECT categoria.*, curso.id_curso from categoria LEFT JOIN curso on categoria.id_categoria = curso.id_categoria where categoria.id_categoria='$id_categoria'"); 
            while($registro = mysql_fetch_array($sql)){
      $reg=$registro['id_curso'];
      $sql2="DELETE FROM curso WHERE id_categoria = '$reg'";
mysql_query($sql2);

      $sql3="DELETE FROM tema WHERE id_curso = '$reg'";
mysql_query($sql3);
            }

			if(mysql_query("DELETE FROM categoria WHERE id_categoria = '$id_categoria'")){
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