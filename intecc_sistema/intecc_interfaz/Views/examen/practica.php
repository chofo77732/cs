
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


          <h1 class="bien">Exame de </h1>
          <h1 class="bien">Bloque</h1>
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


           <div class="container">
                <div class="row">
                    
                    <div class="col-xs-12">
                        

            <div class="col-md-2"></div>
            <div class="col-md-8">

  <?php 
if(isset($_GET['id_curso']) and isset($_GET['id_tema']) ){
  

?>

                <div id="ejercisios" class="panel panel-default">

</div>
                             
<!--                             <select id="nivel">  
                              <option disabled> Nivel </option>
                              <option onclick="cargarContenido('xe.php?id_curso=1&nivel=1')" value="1"> 1 </option>
                              <option onclick="cargarContenido('xe.php?id_curso=1&nivel=2')" value="2"> 2 </option>
                              <option onclick="cargarContenido('xe.php?id_curso=1&nivel=3')" value="3"> 3 </option>
                              <option onclick="cargarContenido('xe.php?id_curso=1&nivel=4')" value="4"> 4 </option>

                            </select> -->

<select name="nivel1" id="nivel1">
      <option disabled> Nivel </option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
</select><label for="nivel1">Seleccionar nivel</label>
<!-- <input type="text" name="valor1" size="40" value="Aquí saldrá el valor del select cuando cambie"> -->

<?php 

}else{

  if (isset($_SESSION['nombre']) && $_SESSION['ingreso']=='YES' && $_SESSION['activado']=='1') 
  {



  if(isset($_GET['info']) ){

$id_curso_tema=$_GET['info'];

  echo '  <h2>Temas</h2>
<br>


    <div class="registros" id="tbl_actor">
<br>
        <table class="table table-striped table-condensed table-hover" >
            <tr>

                <th >nombre</th>
                <th >Descripcion</th>
            </tr>';


  
  $sql = "SELECT * from tema where id_curso = '$id_curso_tema'";

            $consulta = mysqli_query($link, $sql);

  while($row = mysqli_fetch_array($consulta)){

    echo "<tr onclick='prac(\"".$id_curso_tema."\",\"".$row['id_tema']."\");'>
                        <td>".$row['nombre']."</td>
                        <td>".$row['descripcion']."</td>
                    </tr>";  
  }
echo "
        </table>
    </div>
";



  }else{

  
  echo '  <h2>Tus Cursos</h2>
<br>


    <div class="registros" id="tbl_actor">
<br>
        <table class="table table-striped table-condensed table-hover" >
            <tr>

                <th >nombre</th>
                <th >Descripcion</th>
            </tr>';

        $user=$_SESSION['nombre'];
        $email=$_SESSION['email'];

  
  $sql = "SELECT curso.id_curso, curso.nombre, curso.descripcion FROM cliente INNER JOIN curso on cliente.id_curso = curso.id_curso where cliente.user='$user' and cliente.email='$email' and cliente.activado = '1'";

            $consulta = mysqli_query($link, $sql);

  while($row = mysqli_fetch_array($consulta)){

    echo "<tr onclick='tuscursos(\"".$row['id_curso']."\");'>
                        <td>".$row['nombre']."</td>
                        <td>".$row['descripcion']."</td>
                    </tr>";  
  }
echo "
        </table>
    </div>
";

}

}else{
    echo '<h1>Registrate o Inicia sesión para una mejor experiencia</h1>';
  }

  
}


 ?>

</div>
</div>
</div>
</div>


<br>
<!-- <section>
<div id="about" class="container">
  
    <div class="col-sm-1"></div>


<div class="col-sm-9" style="">

<div style="font-family: serif; ">
<h1 >
  <strong>
    
Nombre de la categoría
  </strong>
</h1>
<h3>
  <strong>
    
Leer cada una de la preguntas y resolver según lo solicitado 
  </strong>
</h3>
  </div>
  <br>
<div class="container">

<div class="col-sm-4">
  <h3><strong>
Pregunta 1
  </strong>
</h3>
</div>
<div class="col-sm-4" style="border-style: dotted; border-color: lightgreen;">
  <h1>Área de figura</h1>
  <br>
  <br>
  <br>
  <br>

</div>
<div class="col-sm-4">
  <br>
  <br>
  <br>
  <br>
  <br>
  <button class="btn btn_cafe_2" data-toggle="modal" data-target="#modal_registro">ver solución</button>
</div>
  </div>
<br>
<div class="col-sm-12" style="border-bottom-style: dotted; ">
  <a style="color: #512c1d; font-size: 25px; padding: 0 10px 0 10px" href="#">a) Respuesta 1 </a>
  <a style="color: #512c1d; font-size: 25px; padding: 0 10px 0 10px" href="#">b) Respuesta 2 </a>
  <a style="color: #512c1d; font-size: 25px; padding: 0 10px 0 10px" href="#">c) Respuesta 3 </a>
  <a style="color: #512c1d; font-size: 25px; padding: 0 10px 0 10px" href="#">d) Respuesta 4 </a>

</div>
<br>

<div class="col-sm-12" style="margin: 20px; ">
<button class="btn btn_cafe_2 ">Regresar al menú</button>
<button class="btn btn_cafe_2">Cambiar de nivel</button>
<button class="btn btn_cafe_2">Siguiente pregunta</button>
</div>


</div>
</div>

</section> -->
<br>

<section id="modales">

<div class="modal fade" id="modal_registro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <h1 class="bien" style="color: white; text-align: center;">Video</h1>
            <h1 class="bien" style="color: white; text-align: center;">Solución</h1>
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


</section>

      <script type="text/javascript">

  function tuscursos(id){

var dir=$('#dir').val();      
    var url="practica.php?info="+id;
// alert(url);
location.href=url;
// alert(url);
  }

    function prac(curso, tema){

var dir=$('#dir').val();      
    var url="practica.php?id_curso="+curso+"&id_tema="+tema;
// alert(url);
location.href=url;
// alert(url);
  }
      </script>


  <script type="text/javascript">
    $(document).ready(function(){
      $('.carousel_m').carousel();
    });
  </script>

<script type="text/javascript">

$(document).ready(function(){

$("#ejercisios").load("xe.php?id_curso="+<?php echo $_GET['id_curso'];?>+"&nivel=1&id_tema="+<?php echo $_GET['id_tema'];?>);
  $("select[name=nivel1]").change(function(){
            // alert($('select[name=color1]').val());
            // $('input[name=valor1]').val($(this).val());
            var nivel=$(this).val();
            var curso=<?php echo $_GET['id_curso'];?>;
            var tema=<?php echo $_GET['id_tema'];?>;
// alert(curso);
            $("#ejercisios").load("xe.php?id_curso="+curso+"&nivel="+nivel+"&id_tema="+tema);

        });


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