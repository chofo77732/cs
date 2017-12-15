<?php 
	class act_cuenta
	{
		private $conexion;
		public function __construct()
		{
			require_once('conexion.php');
			$this->conexion= new conexion();
			$this->conexion->conectar();
		}

		function comprobar($email, $codigo)
		{
		//	$pass=sha1($pd);
			$sql ="SELECT cod_s FROM user WHERE  email='$email' AND cod_s='$codigo'";

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

		
		function activar($email, $codigo)
		{
		//	$pass=sha1($pd);

			$sql2="UPDATE `user` SET `activado`='1', `cod_g`='$codigo' WHERE email='$email' AND cod_s='$codigo'";

			if($this->conexion->conexion->query($sql2)){
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