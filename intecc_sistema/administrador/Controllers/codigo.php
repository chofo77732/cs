<?php



		$boton=$_POST['boton'];

		switch ($boton) {


			case 'enviar':
					
					$user = $_POST['user'];
					$email = $_POST['email'];
					$id_curso = $_POST['id_curso'];
					// $nombre_curso = $_POST['nombre_curso'];

	include('../Models/conexion2.php');

				$sql = "SELECT * FROM user where email = '$email' and user='$user'";
				$valores = mysqli_query($link, $sql);
$id_user='';
				 while ($row = mysqli_fetch_assoc($valores)) {
				 	$id_user[0]=$row['user_id'];

					    }
$user_id=$id_user[0];

					

											function generarCodigo() {
 $key = '';
 $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
 $max = strlen($pattern)-1;
 for($i=0;$i < 10 ;$i++) $key .= $pattern{mt_rand(0,$max)};
 return $key;
}

 $con=generarCodigo();

$cur = "SELECT * FROM curso where id_curso = '$id_curso'";
				$valcurso = mysqli_query($link, $cur);
$row1=mysqli_fetch_assoc($valcurso);
$nombre_curso=$row1['nombre'];
					// echo $email .' : '.$con;
					// echo $email;

					$para      = $email;
					$titulo    = 'Codigo de Activacion';
					$mensaje   = 'Hola, gracias por comprar el curso '.$nombre_curso.' en intecc'. "\r\n" .
								'este es tu codigo de activacion '. $con;

// echo $user .
// 					$email .
// 					$id_curso .
// 					$nombre_curso. " desde";
					

					 $bool = mail($para, $titulo, $mensaje);

					 $valcod="SELECT * FROM cliente where email = '$email' and user='$user' and id_curso='$id_curso'";
$vl='';
				$cr = mysqli_query($link, $valcod);
				 while ($res = mysqli_fetch_assoc($cr)) {
				 	$vl[0]=$res['con_e'];
					    }

$vv=$vl[0];
					
			$sql2="UPDATE `cliente` SET `con_e`='$con' WHERE id_user='$user_id' and email = '$email' and user='$user' and id_curso='$id_curso'";

			if(empty($vv)){
if($valores = mysqli_query($link, $sql2)){
	echo "exito";
}else{
	echo "error";
}
			}else{

echo "Ya enviaste un codigo";
}
					
				break;
			default:
				# code...
				break;
		}

		
?>