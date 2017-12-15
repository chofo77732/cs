<?php
	
		require_once('../Models/usuario.php');


		$boton=$_POST['boton'];

		switch ($boton) {

					case 'categoria':
					
include('../Models/conexion2.php');

// $id_categoria = $_POST['id_categoria'];



$valores = "SELECT * FROM categoria ";

$valores2 = mysqli_query($link, $valores);

$rawdata = array();

    $i=0;


				while($row=mysqli_fetch_array($valores2,MYSQLI_ASSOC)){

$rawdata[$i] = $row;
        $i++;
}

echo json_encode($rawdata);
					
				break;

					case 'curso':
					
include('../Models/conexion2.php');

$id_categoria = $_POST['id_categoria'];

$valores = "SELECT id_curso, nombre FROM curso where id_categoria='$id_categoria' ";

$valores2 = mysqli_query($link, $valores);

$rawdata = array();

    $i=0;


				while($row=mysqli_fetch_array($valores2,MYSQLI_ASSOC)){

$rawdata[$i] = $row;
        $i++;
}

echo json_encode($rawdata);
					
				break;

				case 'tema':
					
include('../Models/conexion2.php');

$id_curso = $_POST['id_curso'];

$valores = "SELECT id_tema, nombre FROM tema where id_curso='$id_curso' ";

$valores2 = mysqli_query($link, $valores);

$rawdata = array();

    $i=0;


				while($row=mysqli_fetch_array($valores2,MYSQLI_ASSOC)){

$rawdata[$i] = $row;
        $i++;
}

echo json_encode($rawdata);
					
				break;
			default:
				# code...
				break;
		}

		
?>

