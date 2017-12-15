<?php
	
		require_once('../Models/act_cuenta.php');


		$boton=$_POST['boton'];

		switch ($boton) {

			case 'activar':

					$id_curso = $_POST['id_curso'];
					$user= $_POST['user'];
					$email = $_POST['email'];

					include('../Models/conexion2.php');

				$sql = "SELECT * FROM user where email = '$email' and user='$user'";
				$valores = mysqli_query($link, $sql);
$id_user='';
				 while ($row = mysqli_fetch_assoc($valores)) {
				 	$id_user[0]=$row['user_id'];

					    }
$user_id=$id_user[0];


$validar="SELECT * FROM cliente where email = '$email' and user='$user' and id_curso='$id_curso'";

$num=mysqli_query($link, $validar);
if(mysqli_num_rows($num) > 0){

echo "Curso ya suscripto";

}else{

$sql2="INSERT INTO `cliente`( `id_user`, `user`, `email`, `id_curso`) VALUES ('$user_id','$user','$email','$id_curso')";

if($valores = mysqli_query($link, $sql2)){
	echo "exito";
}else{
	echo "error";
}

}


break;

			case 'codigo':
					
					$user = $_POST['user'];
					$email = $_POST['email'];
					$id_curso = $_POST['id_curso'];
					$nombre_curso = $_POST['nombre_curso'];

// echo $user .
// 					$email .
// 					$id_curso .
// 					$nombre_curso . " desde suscrip";


// 											function generarCodigo() {
//  $key = '';
//  $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
//  $max = strlen($pattern)-1;
//  for($i=0;$i < 10 ;$i++) $key .= $pattern{mt_rand(0,$max)};
//  return $key;
// }

//  $con=generarCodigo();

					$para      = 'tonahtiuhrendon@hotmail.com';
					$titulo    = 'Peticion de Código';
					$mensaje   = 'Hola, el usuario: <<'.$user.'>> con el correo electronico: <<'.$email.'>> Ha solicitado un codigo de verificación para el curso: <<'.$nombre_curso.'>>';


					
// echo $para. $titulo. $mensaje;
					if($bool = mail($para, $titulo, $mensaje)){
						echo 'exito';
					}else{
						echo 'error al enviar mensaje';
					}
					



					

break;
			default:
				# code...
// 								$id_curso = $_POST['id_curso'];
// 					$user= $_POST['user'];
// 					$email = $_POST['email'];

// 					include('../Models/conexion2.php');

// 				$sql = "SELECT * FROM user where email = '$email' and user='$user'";
// 				$valores = mysqli_query($link, $sql);

// 				$i=0;
// 				$datos;

// 				 while ($row = mysqli_fetch_assoc($valores)) {
// 				 	$datos[$i]=$row['cursos'];
// 				 	// echo $datos[$i];
// 					$i=$i+1;
// 					    }

// // $cursos_ant=$datos[0];
 

// // $str1=json_encode($datos);

// // $str=json_decode($str1);

// $str=$datos[0];

// $split=explode(",", $str);
				
// $res=1;
// $res2=0;

// // echo $id_curso;

// if(empty($str)){

// $sql2 = "UPDATE `user` SET `cursos`='$id_curso' WHERE `email`='$email' and user='$user'";
// mysqli_query($link, $sql2);
// echo "exito";

// }else{

// for ($j=0; $j < sizeof($split); $j++) { 
// 	# code...


// 	if($id_curso==$split[$j]){
// 		// echo "Curso ya registrado";
// 		$res=0;

// 	}else{

// 		$res2=1;

// 	}
// }

// if($res!=0 && $res2==1){

// $act=$str.",".$id_curso;

// 		// echo $act;

// 		$sql3 = "UPDATE `user` SET `cursos`='$act' WHERE `email`='$email' and user='$user'";

// 		if(mysqli_query($link, $sql3)){
// 				echo "exito";
// 		}else{
// 			echo "error";
// 		}


// }else{

// echo "curso ya registrado";

// }

// }





// 						// $activar = new act_cuenta();

// 						// if($activar->activar($email, $id_curso)){
							
// 						// 	echo 'exito';


// 						// }
// 						// else{
// 						// 	echo 'Error en la activacion';
// 						// }
						
				break;
		}



		
?>
