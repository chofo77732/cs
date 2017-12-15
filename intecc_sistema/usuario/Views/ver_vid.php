<?php
if(isset($_GET['id'])) {

include('../Models/conexion2.php');

    $sql = "SELECT video FROM curso WHERE id_curso='".$_GET['id']."'";

$result = mysqli_query($link, $sql);

$resultado = mysqli_fetch_assoc($result);

$img = $resultado["video"];

   echo $img; 

}
?>