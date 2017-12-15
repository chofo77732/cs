<?php

if(isset($_GET['id'])) {

	header("Content-type:application/pdf");

include('../Models/conexion2.php');

$query = "SELECT pdf FROM tema WHERE id_tema='".$_GET['id']."'";
$result = mysqli_query($link, $query);


$resultado = mysqli_fetch_assoc($result);

$img = $resultado["pdf"];

   // echo $img; 
   echo $img;

// echo "<embed type=\"application/pdf\" width='100%' height='100%' >".$img."</embed>";

}



?>



