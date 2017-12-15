<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Bootstrap Theme Company Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="../../Resources/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../../Resources/bootstrap/css/bootstrap.css.map">
  <link rel="stylesheet" href="../../Resources/bootstrap/css/tema.css">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Vibur" />
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Sacramento' rel='stylesheet'>
  <script src="../../Resources/bootstrap/js/jquery.js"></script>
  <script src="../../Resources/bootstrap/js/bootstrap.js"></script>
  

</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<!-- <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation"> -->
  <style type="text/css">
    #con_nav {
      padding: 60px 50px;
      background-color: #d3d3d3;
  }
  </style>
<nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
  <div  class="container-fluid2">
    <div class="navbar-header rela_nav">
      <a  class="navbar-brand" href="#myPage">
        <!-- <img width="50px" height="50px" src="../Resources/img/len.png"> -->
        <h1 class="neg">INTECC</h1>
        <p>Instituto de Tecnología</p><br>
        <p>Educación Ciencía y Cultura</p>
      </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul  class="nav navbar-nav navbar-right ">
        <li class="li_es"><a href="#">HOME</a></li>
        <li class="li_es"><a href="#">Agenda Cultural</a></li>
        <li class="li_es"><a href="#">Cursos y Talleres</a></li>
        <li  class="dropdown li_es">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">MORE</a>
          <ul class="dropdown-menu">
            <li ><a href="#" >BaseScout</a></li>
            <li><a href="#" >Colaboradores</a></li>
            <li><a href="#" >Servicio Social</a></li>
            <li><a href="#" >Curso oficial_información</a></li>
            <li><a href="#" >Curso_Alumno</a></li>
            <li><a href="#" >Página alumnnos_cursos</a></li>
            <li><a href="#" >Curso Gratuito</a></li>
            <li><a href="#" >Contacto</a></li>
            <li><a href="#" >Exámen Práctica</a></li>
            <li><a href="#" >Interfaz Examen</a></li>


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


<!-- inicio - carusel -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="../../Resources/img/manos.png" alt="New York" width="100%" height="150px">
        <div class="carousel-caption">
          <h1 class="bien">INTECC</h1>
          <h1 class="bien">!Bienvenido¡</h1>
          <!-- <p>The atmosphere in New York is lorem ipsum.</p> -->
        </div>      
      </div>

      <div class="item">
        <img src="../../Resources/img/lib.png" alt="Chicago" width="100%" height="150px">
        <div class="carousel-caption">
          <h1 class="bien">INTECC</h1>
          <h1 class="bien">!Bienvenido¡</h1>

          <!-- <p>Thank you, Chicago - A night we won't forget.</p> -->
        </div>      
      </div>
    
      <div class="item">
        <img src="../../Resources/img/cafe.png" alt="Los Angeles" width="100%" height="150px">
        <div class="carousel-caption">
          <h1 class="bien">INTECC</h1>
          <h1 class="bien">!Bienvenido¡</h1>

          <!-- <p>Even though the traffic was a mess, we had the best time playing at Venice Beach!</p> -->
        </div>      
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>

<!-- fin carusel  -->

<!-- Container (About Section) -->
<br>
<section>
<div id="about" class="container">
  <div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-8">
      <div class="col-sm-6">
<h1 class="agenda_c">Programación anual</h1>
</div>
<div class="col-sm-6">
  <h1>**********</h1>
  <?php include('carusel.html');  ?>
  
</div>
 
  </div>
</div>
</div>
</section>

<script>
$(document).ready(function(){
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
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>


</body>
</html>