<?php

include('../../Database/conexion.php');

		$boton=$_POST['boton'];

		switch ($boton) {
			case 'cerrar':
					session_start();
					session_destroy();
					
				break;
			case 'insertar':

					$user = $_POST['user'];
					$reactivo = $_POST['reactivo'];
					$curso = $_POST['curso'];
					$tema = $_POST['tema'];
					$respuesta = $_POST['respuesta'];
					$tipo = $_POST['tipo'];

					$sql="INSERT INTO `historial`(`id_usuario`, `id_pregunta`, `id_curso`, `id_tema`, `tipo`, `respuesta`, `fecha`) VALUES ('$user', '$reactivo', '$curso', '$tema', '$tipo', '$respuesta', now())";

					if($result = mysqli_query($link, $sql)){
						echo "exito";
					}else{
						echo "error";
					}

				break;
// 			case 'registrar':
					
// 					$user = $_POST['user'];
// 					$email = $_POST['email'];



// 					$com= new usuario();

// 					if($com->comprobar($user, $email)){

// 											function generarCodigo() {
//  $key = '';
//  $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
//  $max = strlen($pattern)-1;
//  for($i=0;$i < 10 ;$i++) $key .= $pattern{mt_rand(0,$max)};
//  return $key;
// }

//  $con=generarCodigo();
// 					// echo $email .' : '.$con;
// 					// echo $email;

// 					$para      = $email;
// 					$titulo    = 'Codigo de Activacion';
// 					$mensaje   = 'Hola, gracias por registrarte en intecc'. "\r\n" .
// 								'este es tu codigo de activacion '. $con;


					

// 					$bool = mail($para, $titulo, $mensaje);
					
// // if($bool){
// //     echo "exito";
// // }else{
// //     echo "Mensaje no enviado";
// // }

// 						$instancia = new usuario();
// 					if($instancia->registrar($user, $email, $con))
// 					{

// 						session_start();
// 						$_SESSION['ingreso']='YES';
// 						$_SESSION['nombre']=$user;
// 						$_SESSION['activado']='0';

// 						$_SESSION['email']=$email;

// 						 echo "exito";



// 					}
// 					else{
// 						echo "No se registro";
// 					}

// 					}else{
// 						echo "Usuario o Email ya Registrado";

// 					}

					
// 				break;
			default:
				# code...
				break;
		}

		
?>