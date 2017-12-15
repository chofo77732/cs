<?php
	
		require_once('../Models/consultas3.php');


		$boton=$_POST['boton'];

		switch ($boton) {

			case 'registrar':
					
					// $id = $_POST['id'];
					// $nombre = $_POST['nombre'];
					// $descripcion= $_POST['descripcion'];
					// $categoria= $_POST['categoria'];


					// $bin_t_img=$_FILES['imagen']['tmp_name'] ;
     //      $bin_img = addslashes(fread(fopen($bin_t_img, "rb"), filesize($bin_t_img)));

          // $bin_t_video=$_FILES['video']['tmp_name'] ;
          // $bin_video = addslashes(fread(fopen($bin_t_video, "rb"), filesize($bin_t_video)));


// echo $bin_img;


					// 	$instancia = new usuario();
					// if($instancia->registrar($nombre, $descripcion, $categoria, $imagen, $video))
					// {
					// 	echo "exito";
					// }
					// else{
					// 	echo "No se registro";
					// }


					
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

$id_tema = $_POST['id'];



$valores = mysql_query("SELECT * FROM tema WHERE id_tema = '$id_tema'");
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