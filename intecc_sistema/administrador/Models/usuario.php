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

		function identificar($user, $password)
		{
		//	$pass=sha1($pd);
			$sql="SELECT * FROM admin WHERE (user='$user' OR email='$user') && password='$password'";
			$resulatdos = $this->conexion->conexion->query($sql);
			if ($resulatdos->num_rows > 0) {
				$r=$resulatdos->fetch_array();
			}
			else{
				$r[0]=0;
			}
			return $r;
			$this->conexion->cerrar();


		}
		
		function registrar($user,$email, $cod){
			//$pass= sha1($pw);

			$sql2="INSERT INTO `user`( `user`, `email`, `cod_s`) VALUES('$user','$email','$cod')";
			if($this->conexion->conexion->query($sql2)){
				return true;
			}
			else
			{
				return false;
			}



			$this->conexion->cerrar();
		}



				function comprobar($user,$email)
		{
		//	$pass=sha1($pd);
			$sql="SELECT * FROM user WHERE  email='$email'";

			$resulatdos = $this->conexion->conexion->query($sql);
			if ($resulatdos->num_rows == 0) {
				return true;
			}
			else{
				return false;
			}

			$this->conexion->cerrar();
		}


	
	}

	
	
?>