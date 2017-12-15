<?php 
session_start();
include('../html/nav.php'); 
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

  <ul  class="nav navbar_cg navbar-nav navbar-left" style="position: absolute; top: 0px; right: 0; ">
  <li><a style=" color: white;" href="">Examem diagnostico</a></li>
  <li><a style=" color: white;" href="">ejercisios practica</a></li>
  <li><a style=" color: white;" href="">examen de practica unidad</a></li>
  <li><a style=" color: white;" data-toggle="modal" data-target="#modal_registro">Temario</a></li>
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



<?php 

if(isset($_GET['id']))
{ 
$id_curso=$_GET['id'];
}



 ?>


<?php


$query = "SELECT id_curso, nombre FROM curso";
$result = mysqli_query($link, $query);
            while($registro = mysqli_fetch_array($result, MYSQLI_ASSOC)){
      $nombre_curso=$registro['nombre'];
    }

?>

<br>
<br>
 <div class="Container">
<div class="col-xs-2"></div>
<div class="col-xs-10">

<h2>Activacion de cuenta completa</h2>

</div></div>

 <div class="Container">
<div class="col-xs-3"></div>
<div class="col-xs-9">
<h3>Paso 1</h3>
<p>Completa el pago en PayPal</p>

<!-- <form target="_blank" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="TDH9K3Q2BP9KC">
<input  type="image" src="https://www.paypalobjects.com/es_XC/MX/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">
<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
</form> -->

<div id="pago">
<?php

$query = "SELECT * FROM curso where id_curso='$id_curso'";
$result = mysqli_query($link, $query);

            while($registro = mysqli_fetch_array($result, MYSQLI_ASSOC)){

          echo $registro['boton'];
    }
?>

</div>

</div></div>

 <div class="Container">
<div class="col-xs-3"></div>
<div class="col-xs-9">
<h3>Paso 2</h3>
<p>Una vez que hayas pagado el curso, Solicita tu código de confirmación y se enviara a tu correo electronico</p>

<button  type="button" class="btn btn-primary" onclick='solicitar_codigo();'><span class=""></span>Solicitar código</button> 
 <p>Este proceso tardará de 1 a 3 días</p>

</div></div>

 <div class="col-xs-3"></div>
<div class="col-xs-9">
<h3>Paso 3</h3>
<p>Una vez recibido el código, ingresalo en la parte inferior para finalizar la activación</p>
</div>
<br>
<br>
<br>
<div class="container" >

 <div class="row" >

 <div class="col-md-6 col-md-offset-3" >
<br>
<br>
          <div class="panel-heading">Activar Cuenta</div>
          <div class="panel-body"> 
             <div class="alert alert-success text-center" id="exito_activacion" style="display:none;">
        <span class="glyphicon glyphicon-ok"> </span><span></span>
      </div>  
      <div class="alert alert-danger text-center" style="display:none;" id="error">
              </div>                 
              <form role="form">

                  <div class="form-group">
                      <label for="cod">Codigo</label>
                      <div class="input-group">
                          <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                          <input type="text" class="form-control" id="cod"  autocomplete="off" >
                      </div>
                  </div>
    
                  <button  type="button" class="btn btn-primary btn-block" onclick='activar_cuenta();'><span class=""></span> Activar cuenta</button>   
              </form>
          </div>
      
  </div>


        </div>

</div>





</section>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.carousel_m').carousel();
    });
  </script>

<script type="text/javascript">


</script>

   <script type="text/javascript">

        function solicitar_codigo()
        {
              var user="<?php echo $_SESSION['nombre']; ?>";
              var email="<?php echo $_SESSION['email']; ?>";
              var id_curso="<?php echo $_GET['id']; ?>";
              var nombre_curso="<?php $nombre_curso; ?>";

//               alert(
// user+
//               email+
//               id_curso+
//               nombre_curso
//                 );
                  $.ajax({
                    url:'../../Controllers/suscribcion.php',
                    type:'POST',
                    data:'id_curso='+id_curso+'&email='+email+'&user='+user+'&nombre_curso='+nombre_curso+'&boton=codigo'
                }).done(function(respuesta){
                    if (respuesta=='exito') {
                        // $('#exito').html('Su cuenta ha sido registrada').show(200).delay(3000).hide(200);

                          
                        alert("Se ha enviado tu petición");
                    }
                    else{
                        alert(respuesta);
                        // $('#error').html('Codigo Incorrecto').show(200).delay(3000).hide(200);
                    }
                    
                });

        }
    </script>


 <script type="text/javascript">

                function activar_cuenta(){

              var codigo=$('#cod').val();
              var user="<?php echo $_SESSION['nombre']; ?>";
              var email="<?php echo $_SESSION['email']; ?>";
              var id_curso="<?php echo $_GET['id']; ?>";


                                 $.ajax({
                    url:'../../Controllers/act_cuenta.php',
                    type:'POST',
                    data:'id_curso='+id_curso+'&email='+email+'&user='+user+'&codigo='+codigo+'&boton=activar'
                }).done(function(respuesta){
                    if (respuesta=='exito') {
                        // $('#exito').html('Su cuenta ha sido registrada').show(200).delay(3000).hide(200);

                          // alert(respuesta);
                        location.href='tusCursos.php';
                    }
                    else{
                        alert(respuesta);
                        $('#error').html('Codigo Incorrecto').show(200).delay(3000).hide(200);
                    }
                    
                });
                    


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