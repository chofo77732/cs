<?php 


				include('../../../Database/conexion.php');
				$id=$_POST['id'];
				$i=0;
				$datos;

				$sql = "SELECT * FROM curso where id_curso='$id'";
				$valores = mysqli_query($link, $sql);

				 while ($row = mysqli_fetch_assoc($valores)) {
				 	$datos[0][0]=$row['nombre'];
					    }

				$sql = "SELECT * FROM tema where id_curso='$id'";
				$valores = mysqli_query($link, $sql);

				 while ($row = mysqli_fetch_assoc($valores)) {
				 	$datos[1][$i]=$row['nombre'];
				 	$i++;
					    }



				echo json_encode($datos);

 ?>