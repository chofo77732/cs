<?php
	
		require_once('../Models/act_cuenta.php');


		$boton=$_POST['boton'];

		switch ($boton) {

			case 'activar':

					$id_curso = $_POST['id_curso'];
					$password = $_POST['password'];
					$email = $_POST['email'];
					$user = $_POST['user'];
					$codigo = $_POST['codigo'];

					// echo $id_curso .
					// $password .
					// $email .
					// $user .
					// $codigo . "  dewsde cuaaaa";

					include('../Models/conexion2.php');


				$sql = "SELECT * FROM cliente where email = '$email' and user='$user' and id_curso='$id_curso'";
				$valores = mysqli_query($link, $sql);

				 $row = mysqli_fetch_assoc($valores);

				$con_e=$row['con_e'];

				if($con_e===$codigo){

$cliente = "UPDATE `cliente` SET `cod_r`='$codigo',`activado`='1' WHERE email = '$email' and user='$user' and id_curso='$id_curso'";

$usuario = "UPDATE `user` SET `pw`='$password', `cursos`='1' WHERE email = '$email' and user='$user'";

				 if (mysqli_query($link, $cliente) and mysqli_query($link, $usuario)) {

				 	echo 'exito';

				 }else{

				 	echo 'error';

				 }

				}else{

					echo 'error';

				}


break;

			case 'codigo':
					
					$user = $_POST['user'];
					$email = $_POST['email'];
					$id_curso = $_POST['id_curso'];
					$nombre_curso = $_POST['nombre_curso'];




// 											function generarCodigo() {
//  $key = '';
//  $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
//  $max = strlen($pattern)-1;
//  for($i=0;$i < 10 ;$i++) $key .= $pattern{mt_rand(0,$max)};
//  return $key;
// }
//  $con=generarCodigo();

// 					$para      = $email;
// 					$titulo    = 'Codigo de Activacion';
// 					$mensaje   = 'Hola, gracias por registrarte en intecc'. "\r\n" .
// 								'este es tu codigo de activacion '. $con;

// 					$bool = mail($para, $titulo, $mensaje);
// 				$instancia = new usuario();
// 					if($instancia->registrar($user, $email, $con))
// 					{

// 						session_start();
// 						$_SESSION['ingreso']='YES';
// 						$_SESSION['nombre']=$user;
// 						$_SESSION['email']=$email;

// 						 echo "exito";



// 					}
// 					else{
// 						echo "No se registro";
// 					}

					

					

break;
			default:
				# code...
				break;
		}



		
?>
