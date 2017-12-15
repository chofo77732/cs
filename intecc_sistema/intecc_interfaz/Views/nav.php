<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Bootstrap Theme Company Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="../Resources/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../Resources/bootstrap/css/bootstrap.css.map">
  <link rel="stylesheet" href="../Resources/bootstrap/css/tema.css">

  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Pompiere' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Open Sans Condensed:300' rel='stylesheet'>

  <link href='https://fonts.googleapis.com/css?family=Open Sans Condensed:300' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
  <script src="../Resources/bootstrap/js/jquery.js"></script>
  <script src="../Resources/bootstrap/js/bootstrap.js"></script>
  

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
        <p class="opsa">Instituto de Tecnología</p><br>
        <p class="opsa">Educación Ciencía y Cultura</p>
      </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul  class="nav navbar-nav navbar-right ">
        <li class="li_es"><a href="index.php">HOME</a></li>
        <li class="li_es"><a href="agenda/">Agenda Cultural</a></li>
        <li class="li_es"><a href="cursos/">Cursos y Talleres</a></li>
        <li  class="dropdown li_es">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">MORE</a>
          <ul class="dropdown-menu">
            <li ><a href="#" >BaseScout</a></li>
            <li><a href="colaboradores/" >Colaboradores</a></li>
            <li><a href="#" >Servicio Social</a></li>
            <li><a href="cursos/curso_info.php" >Curso oficial_información</a></li>
            <li><a href="cursos/curso_alumno.php" >Curso_Alumno</a></li>
            <li><a href="cursos/tuscursos.php" >Página alumnnos_cursos</a></li>
            <li><a href="cursos/curso_gratuito.php" >Curso Gratuito</a></li>
            <li><a href="#" >Contacto</a></li>
            <li><a href="examen/practica.php" >Exámen Práctica</a></li>
            <li><a href="examen/examen_bloque.php" >Interfaz Examen</a></li>


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

<script type="text/javascript">
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