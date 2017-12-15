
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

  <?php 
if(isset($_GET['id'])){
  $id_curso=$_GET['id'];

?>
<ul  class="nav navbar_cg navbar-nav navbar-left" style="position: absolute; top: 0px; right: 0; left: 0;">
<?php  
        $query ="SELECT * FROM curso WHERE NOT costo = 0 and id_curso='$id_curso'";
        $result = mysqli_query($link, $query);
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

echo '  <li><a style=" color: white;" href="javascript:void(0)" onclick="get_temario('.$row["id_curso"].')" data-toggle="modal" data-target="#modal_temario">Temario</a></li>
  <li><a style=" color: white;" target=\"_blank\" href="../../../administrador/Multimedia/temas/pdf/'.$row['pdf'].'" >Imprimir pdf</a></li>
  <li><a style=" color: white;" onclick="suscribirse();" href="#">Suscribirse</a></li>
  <li><a style=" color: white;" href="curso_info.php">Cursos oficiales</a></li>';


            }
}
      ?>

  

  </ul>
<br>
<br>
<br>
<br>
<br>
<br>
          <h1 class="bien">Cursos </h1>
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

<?php 


  if (isset($_SESSION['nombre']) && $_SESSION['ingreso']=='YES' && $_SESSION['activado']=='1') 

  {

    ?>


<section>
<div id="about" class="container">
  
    <div class="col-sm-2"></div>


<div class="col-sm-8">
  <div id="marco_co">
    <!-- <button onclick="suscribirse()"></button> -->
 </div>

   <?php 
if(isset($_GET['id'])){
  



}else{



if(isset($_GET['info'])){

  echo ' <div id="marco_info" ondragstart="return false" oncontextmenu="return false" onselectstart="return false">
<div class="col-sm-3">

<h1>Temario</h1>
 ';

$id_info=$_GET['info'];


$query ="SELECT * FROM tema WHERE id_curso='$id_info'";
$result = mysqli_query($link, $query);
            while($registro = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                echo " <h3>*".$registro['nombre']."</h3>";}


?> 


<button onclick="cargarPagina('frame_curso_info.php?id_curso=<?php echo $id_info; ?>')">Ver video</button>

</div>
<div  class="col-sm-9" id="video_mm">

</div>


<?php
}else{
?>

    <div class="registros" id="tbl_actor">
<br>
        <table class="table table-striped table-condensed table-hover" >
            <tr>
                <!-- <th >id</th> -->
                <th >nombre</th>
                <th >Descripcion</th>
                <th >imagen</th>

                <th >Opciones</th>
            </tr>

<?php 

$query ="SELECT * FROM curso WHERE NOT costo = 0";
    
$result = mysqli_query($link, $query);

            while($registro = mysqli_fetch_array($result, MYSQLI_ASSOC)){

                echo "<tr>
                        <td>".$registro['nombre']."</td>
                        <td>".$registro['descripcion']."</td>


                         <td><img src=\"../../../administrador/Multimedia/cursos/img/".$registro['imagen']."\"  width='150' height='100'></td>

                       <td> <a type='button' class='btn btn-success btn-lg'  
href=\"curso_info.php?id=".$registro['id_curso']."\">Abrir</a>
                        </td>
                    </tr>


                    ";       

            }

      ?>
        </table>
    </div>
    <?php 

}

}

   ?>

<!-- <button href="javascript:void(0)" data-toggle="modal" data-target="#modal_registro">hola</button> -->

  </div>

</div>
</section>

<?php }else{

  echo '<script> window.location="tuscursos.php"; </script>';
} ?>
<br>

<section id="modales">

<div  class="modal fade" id="modal_registro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  
          <div class="modal-dialog">
            <button style="color: white;" type="button" class="close" data-dismiss="modal"><span style="font-size: 50px" class="glyphicon glyphicon-remove"></span></button>
  <div style="text-align: center; color: white; ">  

<h1 style="font-size: 75px;">Matemáticas</h1>
<h3 >Cálculo</h3>
<h3 >Algebra</h3>
<h3 >Geometría</h3>
              
              <button style="font-size: 50px; position: absolute; top: 150%; right: 0; left: 0; " class="btn btn-success">Enter</button>
            
       </div>   
   
       </div>   
        </div><!-- /.modal -->

                <div  class="modal fade" id="modal_temario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

          <div class="modal-dialog">
            
            <button style="color: white;" type="button" class="close" data-dismiss="modal"><span style="font-size: 50px" class="glyphicon glyphicon-remove"></span></button>
  <div style="text-align: center; color: white; ">  
  <div id="tema_curso" style="text-align: center; color: white; ">  

<!-- <h1 style="font-size: 75px;">Matemáticas</h1>
<h3 >Cálculo</h3>
<h3 >Algebra</h3>
<h3 >Geometría</h3>
              
              <button style="background-color: #18c0c0; padding: 0 70px 0 70px;
    font-size: 50px; position: absolute; top: 150%; right: 0; left: 0; " class="btn btn-success">Conoce más</button> -->
            
       </div>   
   
       </div>   
        </div>


        <div class="modal fade" id="modal_video" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

          <div class="modal-dialog">
            <button style="color: white;" type="button" class="close" data-dismiss="modal"><span style="font-size: 50px" class="glyphicon glyphicon-remove"></span></button>

<h1>Video</h1>
                <div ondragstart="return false" oncontextmenu="return false" onselectstart="return false" id="marco"></div>

<div class="modal-footer">  
                <button style="background-color: #18c0c0; padding: 0 70px 0 70px;
    font-size: 50px; position: absolute; top: 100%; right: 0; left: 0; " class="btn btn-success">Suscribirse</button>
              </div>

          </div><!-- /.modal-dialog -->
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
  function cargarContenido(pagina)
    {
        // cargamos la pagina pagina.html en el div contenido

        $("#marco").load(pagina);
        // $('#modal_video').modal({
        //             show:true,
        //         });
        // $('#modal_temario').modal({
        //             show:false,
        //         });
    }

    function get_temario(id) {
    
var url = 'temario/get_temario.php';

        $.ajax({
        type:'POST',
        url:url,
        data:'id='+id,
        success: function(valores){

        var datos =    JSON.parse(valores);
       
c = 0;
document.getElementById("tema_curso").innerHTML = "";
    var text = "";
    var i, j;
    text+= "<h1 style='font-size: 75px;'>"+datos[0][0]+"</h1>";
         for (j = 0; j < datos[1].length; j++) {

text +="<h3 >"+datos[1][j]+"</h3> ";

    }

    text += "<br><a style='background-color: #18c0c0;  \
    font-size: 50px; position: absolute; top: 150%; right: 0; left: 0; ' class='btn \
    btn-success' href='curso_info.php?info="+id+"'\
    >Conoce más</a>";
    document.getElementById("tema_curso").innerHTML = text;
        
        }


    });
}
</script>

<script type="text/javascript">
  function cargarPagina(pagina){
    $("#video_mm").load(pagina);
    // alert(1);
  }
</script>

<script type="text/javascript">
  
      function suscribirse(){

  var user="<?php echo $_SESSION["nombre"]; ?>";
  var email="<?php echo $_SESSION["email"]; ?>";
  var id_curso="<?php echo $_GET["id"]; ?>";   

// alert(user+email+id_curso);

                     $.ajax({
        url:'../../Controllers/suscribcion.php',
        type:'POST',
        data:'id_curso='+id_curso+'&email='+email+'&user='+user+'&boton=activar'
    }).done(function(respuesta){
        if (respuesta=='exito') {
            // $('#exito').html('Su cuenta ha sido registrada').show(200).delay(3000).hide(200);
       
            location.href='tuscursos.php';
        }
        else{
alert(respuesta);
          // if(respuesta=='Curso ya suscripto'){

          //   // location.href='pago_completo.php?'+dir;
          // }else{
          //   alert(respuesta);
          // }
        }
        
    });           

}
</script>

<!-- text += "<br><a style='background-color: #18c0c0;  \
    font-size: 50px; position: absolute; top: 150%; right: 0; left: 0; ' class='btn \
    btn-success' href='javascript:void(0)' data-toggle='modal' data-target='#modal_video' \
    onclick=\"cargarContenido('frame_curso_info.php?id_curso="+id+"')\"\
    >Conoce más</a>";
    document.getElementById("tema_curso").innerHTML = text; -->
<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  // $("#modal_registro").modal('show':true);
  // $('#modal_temario').modal({
  //                   show:true,
  //                   backdrop:'static'
  //               });

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