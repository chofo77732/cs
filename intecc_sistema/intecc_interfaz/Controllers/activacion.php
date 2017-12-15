<?php
	
		require_once('../Models/activacion.php');


		$boton=$_POST['boton'];

		switch ($boton) {

			case 'activar':

					$email = $_POST['email'];
					$codigo = $_POST['codigo'];

					$ins = new activacion();
					$array=$ins->comprobar($email, $codigo);

					$validar=$array[0];
					if ($codigo===$validar) 
					{
						
						$activar = new activacion();

						if($activar->activar($email, $codigo)){
							
							echo 'exito';


						}
						else{
							echo 'Error en la activacion';
						}
						
					}
					else
					{

echo 'Error';

						

					}

						









					// $ins = new activacion();
					// if($ins->enviar_correo($email)){
					// 	echo 'exito';

					// }
					// else{
					// 	echo 'no se envio el correo';
					// }

// 					function generarCodigo() {
//  $key = '';
//  $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
//  $max = strlen($pattern)-1;
//  for($i=0;$i < 10 ;$i++) $key .= $pattern{mt_rand(0,$max)};
//  return $key;
// }

//  $con=generarCodigo();
// // 					echo $email .' : '.$con;
// 					// echo $email;

// 					$para      = $email;
// 					$titulo    = 'Codigo de Activacion';
// 					$mensaje   = 'Hola, gracias por registrarte en intecc'. "\r\n" .
// 								'este es tu codigo de activacion '. $con;


					

// 					$bool = mail($para, $titulo, $mensaje);
// if($bool){
//     echo "exito";
// }else{
//     echo "Mensaje no enviado";
// }


				break;

			default:
				# code...
				break;
		}



		
?>
