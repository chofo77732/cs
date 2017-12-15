<?php
if(isset($_GET['id'])) {

include('../Models/conexion2.php');




$query = "SELECT imagen FROM curso WHERE id_curso='".$_GET['id']."'";

$result = mysqli_query($link, $query);

// $row = $result->fetch_object();

$resultado = mysqli_fetch_assoc($result);

$img = $resultado["imagen"];

   echo $img; 
}
?>