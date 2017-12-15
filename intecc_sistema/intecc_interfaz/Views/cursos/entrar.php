
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

  <ul  class="nav navbar-nav navbar-left" style="position: absolute; top: 0px; right: 0; left: 0;">
    <li><a style="background-color: #512c1d; color: white;"  data-toggle="modal" data-target="#modal_registro">Registrarse</a></li>
  <li><a style="background-color: #512c1d; color: white;"  data-toggle="modal" data-target="#modal_login">iniciar sesion</a></li>
  </ul>
<br>
<br>
<br>
<br>
<br>
<br>
          <h1 class="bien">tus cursos</h1>
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

  <style type="text/css">
  h3:hover, h4:hover {
    font-size: 35px;
    color: #f19b60;
}
</style>

<div id="about" class="container">
  
    <div class="col-sm-1"></div>


<div class="col-sm-5">

<?php  
$id_user=$_SESSION['id'];
        $query ="SELECT categoria.nombre as ca_nombre, categoria.descripcion as ca_descripcion, curso.*  FROM `cliente` INNER JOIN curso on cliente.id_curso = curso.id_curso INNER JOIN categoria on categoria.id_categoria = curso.id_categoria where cliente.id_user = '$id_user'";
        $result = mysqli_query($link, $query);
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

echo '<div class="row">
<div class="col-sm-5" style="text-align: right;"  >
  

  <br>
  <br>
  <h1 style="border:2px; border-top-style: solid;  ">'.$row["ca_nombre"].'</h1>
  <p>'.$row["ca_descripcion"].'</p>
  <br>
  <br>

  
</div>
<div class="col-sm-7" style="border:2px #f19b60; border-left-style: dotted;  ">
<a href="#" style="color: #f19b60;"><h3  class="hover_descripcion" title="'.$row["descripcion"].'" style="border-top-style: solid; ">'.$row["nombre"].' </h3></a>';

$id_curso=$row['id_curso'];
      $query1 ="SELECT tema.* FROM `curso` INNER JOIN tema on curso.id_curso = tema.id_curso WHERE tema.id_curso = '$id_curso'";
        $result1 = mysqli_query($link, $query1);
            while($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)){
              echo '<a href="#" onclick="cargarContenido(\'frame_curso_completo.php?id_curso='.$row1["id_tema"].'\')"><h4>'.$row1["nombre"].'</h4></a>';
        }


echo '</div>

  </div>';
}

      ?>
</div>

<div id="marco" style="border-top: solid;" class="col-sm-6" ondragstart="return false" oncontextmenu="return false" onselectstart="return false">
 
</div>
</section>

<?php }else{
// echo '<script> window.location="entrar.php"; </script>';
  echo '<h1>Registrate o Inicia sesión para una mejor experiencia</h1>';
} ?>
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

        <div class="modal fade" id="modal_login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h2 class="modal-title">Log in</h2>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" id="formLog">
                  <div class="form-group">
                    <label for="nombres" class="control-label col-xs-5">Email-User :</label>
                    <div class="col-xs-5">
                      <input id="nombre2" name="nombre2" type="text" class="form-control" placeholder="Ingrese su nombre de usuario o email">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="pass" class="control-label col-xs-5">Contraseña:</label>
                    <div class="col-xs-5">
                        <input id="pass3" name="pass3" type="password" class="form-control" placeholder="Ingrese su Contraseña">
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">  
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button onclick="confirmar();" type="button" class="btn btn-success">Entrar</button>
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
    // Funcion para cargar un contenido en un div
    function cargarContenido(pagina)
    {
        $("#marco").load(pagina);
    }

    </script>

    <script type="text/javascript">
  
        function confirmar(){
            var email = $('#nombre2').val();
            var pass3 = $('#pass3').val();
            $.ajax({
                url:'../../Controllers/usuario.php',
                type:'POST',
                data:'email='+email+'&password='+pass3+"&boton=ingresar"
            }).done(function(resp){
                if(resp=='0'){
                    alert("adios");
                }else{
                  // alert("hola");
                    location.href='tuscursos.php';
                }
            });
        }

        function registrar(){
            var nombres=$('#nombres').val();
            var email=$('#email2').val();
            var password=$('#pass').val();
            var password2=$('#pass2').val();


            if (password===password2) {

                $.ajax({
                    url:'../../Controllers/usuario.php',
                    type:'POST',
                    data:'nombres='+nombres+'&email='+email+'&password='+password+'&boton=registrar'
                }).done(function(respuesta){
                    if (respuesta=='exito') {
                        $('#exito').show();
                    }
                    else{
                        alert(respuesta);
                    }
                    
                });
            }
            else{
                alert('Debe introducir la misma contraseña');
            }
            
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