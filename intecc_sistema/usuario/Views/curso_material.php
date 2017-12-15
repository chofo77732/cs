<?php 
session_start();

         include('../Models/conexion2.php');

        $user=$_SESSION['nombre'];
        $email=$_SESSION['email'];

       function encode_this($string) 
{
$string = utf8_encode($string);
$control = "qwerty"; //defino la llave para encriptar la cadena, cambiarla por la que deseamos usar
$string = $control.$string.$control; //concateno la llave para encriptar la cadena
$string = base64_encode($string);//codifico la cadena
return($string);
} 
                            
function decode_get2($string)
{
$cad = split("[?]",$string); //separo la url desde el ?
$string = $cad[1]; //capturo la url desde el separador ? en adelante
$string = base64_decode($string); //decodifico la cadena
$control = "qwerty"; //defino la llave con la que fue encriptada la cadena,, cambiarla por la que deseamos usar
$string = str_replace($control, "", "$string"); //quito la llave de la cadena

//procedo a dejar cada variable en el $_GET
$cad_get = split("[&]",$string); //separo la url por &
foreach($cad_get as $value)
{
$val_get = split("[=]",$value); //asigno los valosres al GET
$_GET[$val_get[0]]=utf8_decode($val_get[1]);
}
}

if($_GET)
{ 
//recibo la url la decodifico y la dejo en la variable $_GET
decode_get2($_SERVER["REQUEST_URI"]); 
$idval=$_GET['id_curso'];
}



 
    $consulta = mysqli_query($link, "SELECT curso.id_curso, curso.nombre, curso.descripcion FROM cliente INNER JOIN curso on cliente.id_curso = curso.id_curso where cliente.id_curso='$idval' AND cliente.user='$user' and cliente.email='$email' and cliente.activado = '1'");
            // $registro=mysqli_fetch_assoc($consulta);

  if (isset($_SESSION['nombre']) && $_SESSION['ingreso']=='YES' && $_SESSION['activado']=='1' && mysqli_num_rows($consulta)==1) 
  {?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Bootstrap Theme The Band</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="../Resources/bootstrap/css/theme.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <link href="http://vjs.zencdn.net/6.2.8/video-js.css" rel="stylesheet">

  <!-- If you'd like to support IE8 -->
  <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
  <script src="http://vjs.zencdn.net/6.2.8/video.js"></script>

    <style type='text/css'>
        .clock      {position:relative;left:50%;top:50%;width:36px;height:36px;padding:20px;}
    </style>

</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50" ondragstart="return false" oncontextmenu="return false" onselectstart="return false" >

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="inicio.php">HOME</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <?php echo $_SESSION['nombre']; ?>
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><li><a href="tusCursos.php" >Mis Cursos</a></li>

                        <!-- <a href="javascript: void(0)" onclick='cerrar();'>Cerrar Session</a> -->
                        <a href="javascript: void(0)" onclick=" location.href='../Controllers/logout.php' ">Cerrar Session</a>

                        </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<br>
<br>

            <div class="container">
                <div class="row">
                    
                    <div class='col-xs-4'>
                        
                        <?php
if($_GET)
{ 
//recibo la url la decodifico y la dejo en la variable $_GET
decode_get2($_SERVER["REQUEST_URI"]); 
$id=$_GET['id_curso'];
}

// $id='1';

          include('../Models/conexion2.php');

    $sql = "SELECT * from curso where id_curso = '$id' ";

            $result = mysqli_query($link, $sql);

            while($registro = mysqli_fetch_array($result)){
          echo "
<h3>".$registro['nombre']."</h3><hr>

                        <p align='justify'>".$registro['descripcion']."</p>
 <h3>Temario</h3>
 <ul>
                        ";

        }

    $temas = "SELECT * from tema where id_curso = '$id' ";

            $result_temas = mysqli_query($link, $temas);

            while($registro_temas = mysqli_fetch_array($result_temas)){
$ho=$registro_temas['id_tema'];
$ho2=$registro_temas['id_curso'];
$img=$registro_temas['imagen'];

$li = encode_this("id_curso=".$ho);
$li2 = encode_this("id_curso=".$ho2);

          
          echo '<li><a href="#" onclick="cargarContenido(\'frame_curso.php?'.$li.'\')">'.$registro_temas['nombre'].'</a></li>
                        ';

        }

echo "
 <ul>
</div>

<div class='col-xs-8'>
<div id='marco'></div>
</div>

";



//      $sql2 = "SELECT * from tema where id_tema = '$id' ";

//             $result2 = mysqli_query($link, $sql2);

//             while($registro2 = mysqli_fetch_array($result2)){


//       echo "
     
// <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
//   <video id='my-video' class='video-js' controls preload='auto' width='640' height='244'
//   poster='MY_VIDEO_POSTER.jpg' data-setup='{}'>
//     <source src=\"../../administrador/Multimedia/temas/video/".$registro2['video']."\" type='video/mp4'>
//     <p class='vjs-no-js'>
//       To view this video please enable JavaScript, and consider upgrading to a web browser that
//       <a href='http://videojs.com/html5-video-support/'' target='_blank'>supports HTML5 video</a>
//     </p>
//   </video>
//                           </video>


//                           </div>

// <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'  STYLE='background-color:#E6E6FA'>
// <br>
// <hr>

//                       <h3>".$registro2['nombre']."</h3>
// <hr>
                     
//                           <p align='justify'>".$registro2['descripcion']." </p>

// <img src='../Multimedia/img/pdf_icon.ico' onclick='hola();' height='40p' width='40p' ><a  target=\"_blank\" href='../../administrador/Multimedia/temas/pdf/".$registro2['pdf']."'> Abrir PDF</a>
// <br>
// <img src='../../administrador/Multimedia/temas/img/".$registro2['imagen']."' height='150' width='200'>

// </div>
                          
//       ";
//     } 

// <img src='../Multimedia/img/pdf.png' onclick='hola();' height='40p' width='40p' ><a href='ver_pdf.php'>Descargar PDF</a>

?>
<hr>


<br>
<br>
<br>

</div></div>

    <script>
    // Funcion para cargar un contenido en un div
    function cargarContenido(pagina)
    {
        // cargamos la pagina pagina.html en el div contenido
        $("#marco").html("<img src='../Multimedia/img/loading.gif' class='clock' border='0' />");
        $("#marco").load(pagina);
    }

    </script>
<script> 
function playVid() { 

  var opc=$('#bb').val();
  if(opc=='1'){
    alert(opc);
$('#bb').val('0');

    
  }else{
    alert(opc);
    $('#bb').val('1');
    
  }
} 

function hola() {

    var url="pdf_view.php?id="+id;
// alert(url);
location.href=url;}

</script> 

<br>


<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->

<!-- Footer -->
<footer class="text-center">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  <p><a href="https://www.w3schools.com" data-toggle="tooltip" title="Visit w3schools">Top</a></p> 
</footer>



<script>
$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip(); 
  
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})
</script>

    <script>
        function cerrar()
        {
            $.ajax({
                url:'../Controllers/usuario.php',
                type:'POST',
                data:"mensaje=mensaje&boton=cerrar"
            }).done(function(resp){
                alert(resp);

            });
        }
    </script>

</body>
</html>

<?php

  }
  else
  {

    if($_GET)
{ 
//recibo la url la decodifico y la dejo en la variable $_GET
decode_get2($_SERVER["REQUEST_URI"]); 
$id=$_GET['id_curso'];
}

    // $ho=$registro_temas['id_tema'];

$li = encode_this("id_curso=".$id);

    echo "<script> window.location='../Views/pago_completo.php?".$li."'; </script>";
  }
 ?>
    