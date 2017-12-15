<?php
	class conexion
	{
		private $servidor;
		private $usuario;
		private $contraseña;
		private $basedatos;
		public  $conexion;

		public function __construct(){
			
			// $this->servidor   = "mysql.hostinger.mx";
			// $this->usuario	  = "u562693414_root";
			// $this->contraseña = "123456";
			// $this->basedatos  = "u562693414_sak";
			
			
				$this->servidor   = "127.0.0.1";
				$this->usuario	  = "root";
				$this->contraseña = "";
				$this->basedatos  = "intecc";

		}

		function conectar(){
			$this->conexion= new mysqli($this->servidor,$this->usuario,$this->contraseña,$this->basedatos);
		}

		function cerrar(){
			$this->conexion->close();
		}
	}

?>