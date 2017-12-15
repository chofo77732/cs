<?php
	
		require_once('../Models/usuario.php');


		$boton=$_POST['boton'];

		switch ($boton) {

			case 'registrar':
			include('../Models/conexion2.php');
    

			 $tipo_p=$_POST['tipo_p'];
             $nombres=$_POST['nombres'];
             $apellido_p=$_POST['apellido_p'];
             $apellido_m=$_POST['apellido_m'];
             $email=$_POST['email'];
             $password=$_POST['password'];
             $direccion=$_POST['direccion'];
             $celular=$_POST['celular'];
             $telefono=$_POST['telefono'];

             $valores = "INSERT INTO `participante`(`tipo`, `nombre`, `paterno`, `materno`, `email`, `contra`, `direccion`, `celular`, `telefono`) VALUES ('$tipo_p', '$nombres', '$apellido_p', '$apellido_m', '$email','$password','$direccion','$celular','$telefono')";

             $result = mysqli_query($link, $valores);
             if($result){
					echo "exito";
				
             }else{
             	echo "error";

             }
             // echo $tipo_p.$nombres.$apellido_p.$apellido_m.$email.$password.$direccion.$celular.$telefono;


             break;

case 'editar':
	
				include('../Models/conexion2.php');
    

			 $id_p=$_POST['id_p'];
			 $tipo_p=$_POST['tipo_p'];
             $nombres=$_POST['nombres'];
             $apellido_p=$_POST['apellido_p'];
             $apellido_m=$_POST['apellido_m'];
             $email=$_POST['email'];
             $password=$_POST['password'];
             $direccion=$_POST['direccion'];
             $celular=$_POST['celular'];
             $telefono=$_POST['telefono'];

             $valores = "UPDATE `participante` SET `tipo`='$tipo_p',`nombre`='$nombres',`paterno`='$apellido_p',`materno`='$apellido_m',`email`='$email',`contra`='$password',`direccion`='$direccion',`celular`='$celular',`telefono`='$telefono' WHERE `id_participante`='$id_p'";

             $result = mysqli_query($link, $valores);
             if($result){
					echo "exito";
				
             }else{
             	echo "error";

             }

break;
					case 'modificar':
					
include('../Models/conexion2.php');

$id_participante = $_POST['id_participante'];



$valores = "SELECT * FROM participante WHERE id_participante = '$id_participante'";
$valores2 = mysqli_query($link, $valores);

				$row=mysqli_fetch_array($valores2,MYSQLI_ASSOC);

$datos = array(
				
				0 => $row['tipo'], 
				1 => $row['nombre'], 
				2 => $row['paterno'], 
				3 => $row['materno'], 
				4 => $row['email'], 
				5 => $row['contra'], 
				6 => $row['direccion'], 
				7 => $row['celular'], 
				8 => $row['telefono'], 
				
				);
echo json_encode($datos);
					
				break;

		case 'eliminar':

include('../Models/conexion2.php');
					
					$id=$_POST['id'];

             $valores = "DELETE from participante WHERE `id_participante`='$id'";

             $result = mysqli_query($link, $valores);
             if($result){
					echo "exito";
				
             }else{
             	echo "error";

             }


					
				break;

			default:
				# code...
				break;
		}

		
?>