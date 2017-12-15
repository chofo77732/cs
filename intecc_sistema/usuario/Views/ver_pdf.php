<?php


if(isset($_GET['id'])) {

	// header("Content-type:application/pdf");

// header("Content-Disposition:attachment;filename='downloaded.pdf'");

include('../Models/conexion2.php');

  $sql = "SELECT * FROM tema WHERE id_tema='".$_GET['id']."'";

$result = mysqli_query($link, $sql);

            while($registro = mysqli_fetch_array($result, MYSQLI_ASSOC)){

        // echo "<embed src=\"pdf_view.php?id=".$registro['id_tema']."\"  type='application/pdf' width='100%' height='100%' ></embed>";
        // echo "<object src=\"pdf_view.php?id=".$registro['id_tema']."\"  type=\"application/pdf\"  width='100%' height='100%' ></object>";


        echo "<embed src=\"pdf_view.php?id=".$registro['id_tema']."\"  type='application/pdf' width='800' height='600' ></embed>";



    }
    }
    
?>