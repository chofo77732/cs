<?php 
session_start();
  if (isset($_SESSION['nombre']) && $_SESSION['ingreso']=='YES' && $_SESSION['activado']=='1') 
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
  <link href="../Resources/bootstrap/css/theme2.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

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
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Categorias
          <span class="caret"></span></a>
          <ul class="dropdown-menu">

<?php 



          include('../Models/conexion2.php');

            $sql = "SELECT * FROM categoria"; 

            $result = mysqli_query($link, $sql);

            while($registro = mysqli_fetch_array($result)){


          echo "
<li><a href='#".$registro['id_categoria']."'>".$registro['nombre']."</a></li>
          "; }

?>
  <!--             <li><a href="#Categoria1">Categoria 1</a></li>
          <li><a href="#Categoria2">Categoria 2</a></li>
          <li><a href="#Categoria3">Categoria 3</a></li> -->



          </ul>
        </li>

        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <?php echo $_SESSION['nombre']; ?>
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="tusCursos.php" >Mis Cursos</a></li>
            <li>
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
<br>

<?php 
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

// if($_GET)
// { 
// //recibo la url la decodifico y la dejo en la variable $_GET
// decode_get2($_SERVER["REQUEST_URI"]); 
// $id_categoria=$_GET['id_categoria'];
// }



          include('../Models/conexion2.php');

            $sql = "SELECT * FROM categoria"; 

            $result = mysqli_query($link, $sql);

            while($registro = mysqli_fetch_array($result)){

          echo "


<h2 align='center' id='".$registro['id_categoria']."'>".$registro['nombre']."</h2>
<div class='Container'>
<div class='row'>
<div class='col-md-1'></div>
<div class='col-md-10'>

<div id='".$registro['id_categoria'].$registro['nombre']."' class='carousel slide' data-ride='carousel'>
    <ol class='carousel-indicators'>";

$var=$registro['id_categoria'];


    $sql2 = "SELECT * FROM curso WHERE id_categoria= '$var'";
   $result2 = mysqli_query($link, $sql2);
    $c='0';
     while($registro2 = mysqli_fetch_array($result2)){
          echo "
<li data-target='#".$registro['id_categoria'].$registro['nombre']."' data-slide-to=".$c."></li>
          "; 
          $c++;

        }

echo "
    </ol>
    <div class='carousel-inner' role='listbox'>";


        $sql3 = "SELECT * FROM curso WHERE id_categoria= '$var'
        ";

$act=0;

  $result3 = mysqli_query($link, $sql3);
     while($registro3 = mysqli_fetch_array($result3)){

$ho=$registro3['id_curso'];

$li = encode_this("id_curso=".$ho);


          
if($act==0){
   echo "
      <div class='item active'>
        <a href=\"curso_info.php?".$li."\"  ><img src=\"../../administrador/Multimedia/cursos/img/".$registro3['imagen']."\" alt='Image no found' width='1200p' height='700p'></a>
        <div class='carousel-caption'>
          <h3>".$registro3['nombre']."</h3>
          <p>".$registro3['descripcion']."</p>
        </div>      
      </div>

          ";
          $act=1;
}else{
     echo "
      <div class='item'>
        <a href=\"curso_info.php?".$li."\" ><img src=\"../../administrador/Multimedia/cursos/img/".$registro3['imagen']."\" alt='Image no found' width='1200' height='700'></a>
        <div class='carousel-caption'>
          <h3>".$registro3['nombre']."</h3>
          <p>".$registro3['descripcion']."</p>
        </div>      
      </div>

          ";
}

        }

echo "
    <a class='left carousel-control' href='#".$registro['id_categoria'].$registro['nombre']."' role='button' data-slide='prev'>
      <span class='glyphicon glyphicon-chevron-left' aria-hidden='true'></span>
      <span class='sr-only'>Previous</span>
    </a>
    <a class='right carousel-control' href='#".$registro['id_categoria'].$registro['nombre']."' role='button' data-slide='next'>
      <span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span>
      <span class='sr-only'>Next</span>
    </a>
</div>
</div>
</div>
</div>
<br>
<br>
<br>
<br>
";
          ; }

?>

<!--   <h2 id="Categoria1">categoria 1</h2>
  <div class="Container">
  <div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-10">

  <div id="myCarouselz" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarouselz" data-slide-to="0" ></li>
        <li data-target="#myCarouselz" data-slide-to="1"></li>
        <li data-target="#myCarouselz" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <a href="curso_info.php"><img src="../Multimedia/img/example.jpg" alt="Image no found" width="1200" height="700"></a>
          <div class="carousel-caption">
            <h3>Nombre del curso 1</h3>
            <p>Pequeña descripcion del curso.</p>
          </div>      
        </div>

        <div class="item">
         <a href="curso_info.php"><img src="../Multimedia/img/example.jpg" alt="Image no found" width="1200" height="700"></a>
          <div class="carousel-caption">
            <h3>Nombre del curso 2</h3>
            <p>Pequeña descripcion del curso.</p>
          </div>      
        </div>
      
        <div class="item">
          <a href="curso_info.php"><img src="../Multimedia/img/example.jpg" alt="Image no found" width="1200" height="700"></a>
          <div class="carousel-caption">
            <h3>Nombre del curso 3</h3>
            <p>Pequeña descripcion del curso.</p>
          </div>      
        </div>
      </div>

      <a class="left carousel-control" href="#myCarouselz" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarouselz" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
  </div>
  </div>
  </div>
  </div>
  <br>
  <br>

 -->
<!-- <h2 id="Categoria2">categoria 2</h2>
<div class="Container">
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">

<div id="myCarousel2" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel2" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel2" data-slide-to="1"></li>
      <li data-target="#myCarousel2" data-slide-to="2"></li>
    </ol>

    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <a href="curso_info.php"><img src="../Multimedia/img/example.jpg" alt="Image no found" width="1200" height="700"></a>
        <div class="carousel-caption">
          <h3>Nombre del curso 1</h3>
          <p>Pequeña descripcion del curso.</p>
        </div>      
      </div>

      <div class="item">
       <a href="curso_info.php"><img src="../Multimedia/img/example.jpg" alt="Image no found" width="1200" height="700"></a>
        <div class="carousel-caption">
          <h3>Nombre del curso 2</h3>
          <p>Pequeña descripcion del curso.</p>
        </div>      
      </div>
    
      <div class="item">
        <a href="curso_info.php"><img src="../Multimedia/img/example.jpg" alt="Image no found" width="1200" height="700"></a>
        <div class="carousel-caption">
          <h3>Nombre del curso 3</h3>
          <p>Pequeña descripcion del curso.</p>
        </div>      
      </div>
    </div>

    <a class="left carousel-control" href="#myCarousel2" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel2" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
</div>
</div>
</div>
<br>
<br>

<h2 id="Categoria3">categoria 3</h2>
<div class="Container">
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">

<div id="myCarousel3" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel3" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel3" data-slide-to="1"></li>
      <li data-target="#myCarousel3" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <a href="curso_info.php"><img src="../Multimedia/img/example.jpg" alt="Image no found" width="1200" height="700"></a>
        <div class="carousel-caption">
          <h3>Nombre del curso 1</h3>
          <p>Pequeña descripcion del curso.</p>
        </div>      
      </div>

      <div class="item">
       <a href="curso_info.php"><img src="../Multimedia/img/example.jpg" alt="Image no found" width="1200" height="700"></a>
        <div class="carousel-caption">
          <h3>Nombre del curso 2</h3>
          <p>Pequeña descripcion del curso.</p>
        </div>      
      </div>
    
      <div class="item">
        <a href="curso_info.php"><img src="../Multimedia/img/example.jpg" alt="Image no found" width="1200" height="700"></a>
        <div class="carousel-caption">
          <h3>Nombre del curso 3</h3>
          <p>Pequeña descripcion del curso.</p>
        </div>      
      </div>
    </div>


    <a class="left carousel-control" href="#myCarousel3" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel3" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
</div>
</div>
</div> -->
<br>
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
    echo '<script> window.location="../Views/noact.php"; </script>';
  }
 ?>
    