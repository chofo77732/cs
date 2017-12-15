<?php
	
		require_once('../Models/consultas.php');


		$boton=$_POST['boton'];

		switch ($boton) {

			case 'registrar':
					
					$id = $_POST['id'];
					$nombre = $_POST['nombre'];
					$descripcion= $_POST['descripcion'];

						$instancia = new usuario();
					if($instancia->registrar($nombre, $descripcion))
					{
						echo "exito";
					}
					else{
						echo "No se registro";
					}


					
				break;			

				case 'editar':
	
					$id = $_POST['id'];

					$nombre= $_POST['nombre'];
					$descripcion= $_POST['descripcion'];

						$instancia = new usuario();
					if($instancia->editar($id, $nombre, $descripcion))
					{
						echo "exito  ".$id;
					}
					else{
						echo "No se modifico";
					}
				break;

					case 'modificar':
					
include('../Models/conex.php');

$id_categoria = $_POST['id'];



$valores = mysql_query("SELECT * FROM categoria WHERE id_categoria = '$id_categoria'");
$valores2 = mysql_fetch_array($valores);

$datos = array(
				
				0 => $valores2['nombre'], 
				1 => $valores2['descripcion'], 
				
				);
echo json_encode($datos);
					
				break;

		case 'eliminar':
					
					$id_categoria = $_POST['id'];



						$instancia = new usuario();
					if($instancia->eliminar($id_categoria))
					{
						echo "se elimino";
					}
					else{
						echo "no se elimino";
					}


					
				break;

			default:
				# code...
				break;
		}

		
?>