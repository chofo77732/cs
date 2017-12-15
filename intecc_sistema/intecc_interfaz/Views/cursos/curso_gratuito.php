
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

  <ul  class="nav navbar_cg navbar-nav navbar-left" style="position: absolute; top: 0px; right: 0; left: 0;">
    <li><a style=" color: white;"  class="dropdown-toggle" data-toggle="dropdown" href="#">Seleccionar Tema</a>
          <ul class="dropdown-menu">
              <?php 
if(isset($_GET['id'])){

  $id=$_GET['id'];

          $sql = "SELECT * from tema where id_curso = '$id' ";
            $result = mysqli_query($link, $sql);
            while($row = mysqli_fetch_array($result)){
          
          echo "
          <li ><a class='btn_gris' onclick=\"cargarPagina('frame_cg_tema.php?id_tema=".$row['id_tema']."')\" >".$row['nombre']."</a></li>
                        ";

        }


}else{

}

   ?>

          </ul>
    </li>
  <li><a style=" color: white;" href="curso_gratuito.php">Cursos gratuitos</a></li>
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
  <ul  class="nav navbar_cg navbar-nav navbar-left" style="position: absolute; top: 0px; right: 0; left: 0;">
    <li><a style=" color: white;"  class="dropdown-toggle" data-toggle="dropdown" href="#">Seleccionar Tema</a>
          <ul class="dropdown-menu">
              <?php 
if(isset($_GET['id'])){

  $id=$_GET['id'];

          $sql = "SELECT * from tema where id_curso = '$id' ";
            $result = mysqli_query($link, $sql);
            while($row = mysqli_fetch_array($result)){
          
          echo "
          <li ><a class='btn_gris' onclick=\"cargarPagina('frame_cg_tema.php?id_tema=".$row['id_tema']."')\" >".$row['nombre']."</a></li>
                        ";

        }


}else{

}

   ?>

          </ul>
    </li>
  <li><a style=" color: white;" href="curso_gratuito.php">Cursos gratuitos</a></li>
  </ul>
<br>
<br>
<br>
<br>
<br>
<br>
          <h1 class="bien">Cursos Gratuio</h1>

          <!-- <p>Thank you, Chicago - A night we won't forget.</p> -->
        </div>      
      </div>
    
      <div class="item">
        <img src="../../Resources/img/cafe.png" alt="Los Angeles" width="100%" height="150px">
        <div class="carousel-caption">

  <ul  class="nav navbar_cg navbar-nav navbar-left" style="position: absolute; top: 0px; right: 0; left: 0;">
    <li><a style=" color: white;"  class="dropdown-toggle" data-toggle="dropdown" href="#">Seleccionar Tema</a>
          <ul class="dropdown-menu">
              <?php 
if(isset($_GET['id'])){

  $id=$_GET['id'];

          $sql = "SELECT * from tema where id_curso = '$id' ";
            $result = mysqli_query($link, $sql);
            while($row = mysqli_fetch_array($result)){
          
          echo "
          <li ><a class='btn_gris' onclick=\"cargarPagina('frame_cg_tema.php?id_tema=".$row['id_tema']."')\" >".$row['nombre']."</a></li>
                        ";

        }


}else{

}

   ?>

          </ul>
    </li>
  <li><a style=" color: white;" href="curso_gratuito.php">Cursos gratuitos</a></li>
  </ul>
<br>
<br>
<br>
<br>
<br>
<br>
          <h1 class="bien">Cursos Gratuio</h1>

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
  
    <div class="col-sm-1"></div>


<div class="col-sm-10">
  <div id="marco_cg" ondragstart="return false" oncontextmenu="return false" onselectstart="return false">
    
  </div>
 
  <?php 
if(isset($_GET['id'])){
  



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

$query ="SELECT * FROM curso WHERE costo = 0";
    
$result = mysqli_query($link, $query);

            while($registro = mysqli_fetch_array($result, MYSQLI_ASSOC)){

                echo "<tr>
                        <td>".$registro['nombre']."</td>
                        <td>".$registro['descripcion']."</td>


                         <td><img src=\"../../../administrador/Multimedia/cursos/img/".$registro['imagen']."\"  width='150' height='100'></td>

                       <td> <a type='button' class='btn btn-success btn-lg'  
href=\"curso_gratuito.php?id=".$registro['id_curso']."\">Abrir</a>
                        </td>
                    </tr>


                    ";       

            }

      ?>
        </table>
    </div>
    <?php 

}

   ?>



  </div>

</div>
</section>
<br>

<section id="modales">

<div class="modal fade" id="modal_registro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h2 class="modal-title">Datos de Usuario</h2>
              </div>
              <div class="modal-body">
                <div class="alert alert-success text-center" id="exito" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span> Su cuenta ha sido registrada</span>
                </div>
                <form class="form-horizontal" id="formCliente">
                  <div class="form-group">
                    <label for="nombres" class="control-label col-xs-5">Nombres :</label>
                    <div class="col-xs-5">
                      <input id="nombres" name="nombres" type="text" class="form-control" placeholder="Ingrese sus Nombres">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="apellidos" class="control-label col-xs-5">Apellidos :</label>
                    <div class="col-xs-5">
                      <input id="apellidos" name="apellidos"  type="text" class="form-control" placeholder="Ingrese sus Apellidos">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email2" class="control-label col-xs-5">Email:</label>
                    <div class="col-xs-5">
                        <input id="email2" name="email2" type="email" class="form-control" placeholder="Ingrese su Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pass" class="control-label col-xs-5">Contraseña:</label>
                    <div class="col-xs-5">
                        <input id="pass" name="pass" type="password" class="form-control" placeholder="Ingrese su Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pass2" class="control-label col-xs-5">Repetir Contraseña:</label>
                    <div class="col-xs-5">
                        <input id="pass2" name="pass2" type="password" class="form-control" placeholder="Ingrese su Email">
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">  
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button onclick="registrar();" type="button" class="btn btn-success">Guardar</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


</section>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.carousel_m').carousel();
    });
  </script>

<script type="text/javascript">
  function cargarPagina(pagina){
    $("#marco_cg").load(pagina);
    // alert(1);
  }
</script>

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