<?php include('../html/nav.php'); 
include('../../Database/conexion.php');
?>
<!-- <nav class="navbar navbar-toggleable-md navbar-light bg-faded">

    <div class="collapse navbar-collapse" id="myNavbar">
      <ul  class="nav navbar-nav navbar-right ">
        <li class="li_es"><a href="#">HOME</a></li>
        <li class="li_es"><a href="#">Agenda Cultural</a></li>
        <li class="li_es"><a href="#">Cursos y Talleres</a></li>
      </ul>
    </div>

</nav> -->


<?php session_start(); ?>

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
          
<!--   <button class="btn_cafe" style="position: absolute; top: 0px; right: 0; left: 0;">Registrarse</button>
  <button class="btn_cafe" style="position: absolute; top: 0px; right: 0; left: 100px;">iniciar sesion</button> -->

  <ul  class="nav navbar_cg navbar-nav navbar-left" style="position: absolute; top: 0px; left: 0; ">
  <li><a style=" color: white;" href="">Examem diagnostico</a></li>
  <li><a style=" color: white;" href="">ejercisios practica</a></li>
  <li><a style=" color: white;" href="">examen de practica unidad</a></li>
  <li><a style=" color: white;" data-toggle="modal" data-target="#modal_registro">Temario</a></li>
  </ul>
  <ul  class="nav navbar_cg navbar-nav navbar-left" style="position: absolute; top: 0px; right: 0; ">
  <li><a style=" background-color: #512c1d;" href="">Tus cursos</a></li>
  <li><a style=" background-color: #512c1d;" href="">usuario</a></li>
  <li><a style=" background-color: #512c1d;" href="">User</a></li>

  </ul>
<br>
<br>
<br>
<br>
<br>
<br>
          <h1 class="bien">Cursos Gratuio</h1>
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
  
<div class="col-xs-1"></div>
<div class="col-xs-10">

<br>

<h2>Tus Cursos</h2>
<br>


    <div class="registros" id="tbl_actor">
<br>
        <table class="table table-striped table-condensed table-hover" >
            <tr>
                <!-- <th >id</th> -->
                <th >nombre</th>
                <th >Descripcion</th>
              <!--   <th >De la categoria</th>
                <th >imagen</th>
                <th >video</th>
                <th >costo</th>

                <th >Opciones</th> -->
            </tr>




        <?php


        $user=$_SESSION['nombre'];
        $email=$_SESSION['email'];
 
    $consulta = mysqli_query($link, "SELECT curso.id_curso, curso.nombre, curso.descripcion FROM cliente INNER JOIN curso on cliente.id_curso = curso.id_curso where cliente.user='$user' and cliente.email='$email'");
            while($registro=mysqli_fetch_assoc($consulta)){


                echo "<tr onclick='tuscursos(\"".$registro['id_curso']."\");'>
                        <td>".$registro['nombre']."</td>
                        <td>".$registro['descripcion']."</td>
                    </tr>";       

            }


 
        ?>
        </table>
    </div></div>




  </div>

</div>
</section>
<br>

<section id="modales">

<div  class="modal fade" id="modal_registro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <div class="modal-dialog">
  <div style="text-align: center; color: white; ">  

<h1 style="font-size: 75px;">Matemáticas</h1>
<h3 >Cálculo</h3>
<h3 >Algebra</h3>
<h3 >Geometría</h3>
              
              <button style="font-size: 50px; position: absolute; top: 150%; right: 0; left: 0; " class="btn btn-success">Enter</button>
            
       </div>   
   
       </div>   
        </div><!-- /.modal -->


</section>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.carousel_m').carousel();
    });
  </script>

<script type="text/javascript">


</script>

      <script type="text/javascript">

  function tuscursos(id){

 
    var url="pago.php?id="+id+"";
// alert(url);
location.href=url;

  }
      </script>


<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  // $("#modal_registro").modal('show':true);

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