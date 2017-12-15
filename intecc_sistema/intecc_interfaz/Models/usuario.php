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

		function identificar($email, $pd)
		{
			// $pass=sha1($pd);
			$sql="SELECT * FROM user WHERE (user='$email' || email='$email') && pw='$pd'";
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
		
		function registrar($nombre,$email,$password){
			//$pass= sha1($pw);

			// $sql2="INSERT INTO `user`( `user`, `email`, `cod_s`) VALUES('$user','$email','$cod')";
			// if($this->conexion->conexion->query($sql2)){
			// 	return true;
			// }
			// else
			// {
			// 	return false;
			// }
			$sql="INSERT INTO  `user` (`user`, `email`, `pw`)  VALUES('$nombre','$email','$password')";
			if($this->conexion->conexion->query($sql)){
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