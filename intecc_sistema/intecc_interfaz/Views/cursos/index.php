
<?php include('../html/nav.php') ?>

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
  
    <div class="col-sm-1"></div>


<div class="col-sm-11">

  <h1 class="agenda_c">Cursos Gratuitos</h1>

<div id="anual" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">

    <?php 
    include('../../Database/conexion.php');

 $sql = "SELECT * FROM curso WHERE costo = 0 ORDER BY rand() LIMIT 5";
   $result = mysqli_query($link, $sql);
    $act=0;

    // $registro = mysqli_fetch_array($result, MYSQLI_ASSOC);
    // $registro = mysqli_fetch_array($result, MYSQLI_ASSOC);

     while($registro = mysqli_fetch_array($result, MYSQLI_ASSOC)){
if ($act==0) {
  # code...
  echo '
      <li data-target="#anual" data-slide-to="0" class="active"></li>';
      $act=1;
}else{

echo '<li data-target="#anual" data-slide-to="'.$act.'"></li>';
$act++;
}
      
     }

echo '</ol><div class="carousel-inner" role="listbox">';
$act=0;

$result = mysqli_query($link, $sql);
while($registro = mysqli_fetch_array($result, MYSQLI_ASSOC)){
if ($act==0) {
  # code...
 //  echo '<div class="item active ">
 //        <a href="javascript:void(0)" data-toggle="modal" data-target="#modal_video" onclick="cargarContenido(\'frame_curso_info.php?id_curso='.$registro["id_curso"].'\')">
 // <img class="fondo"  src="../../../administrador/Multimedia/cursos/img/'.$registro["imagen"].'" width="600px" height="200px"></a>

 //        <div class="car_cap marco_blanco" >
 //    <h3>'.$registro["nombre"].'</h3>
 //    <p>'.$registro["descripcion"].' </p>
 //    <button href="javascript:void(0)" data-toggle="modal" data-target="#modal_login" type="button" class="btn btn-success">Iniciar Sesion</button>
 //    <br>
 //    <br>
 //    <button href="javascript:void(0)" data-toggle="modal" data-target="#modal_registro" type="button" class="btn btn-success">Registrarse</button>
 //  </div>      
 //      </div>';
  echo '<div class="item active ">
        <a href="curso_gratuito.php?id='.$registro["id_curso"].'">
 <img class="fondo"  src="../../../administrador/Multimedia/cursos/img/'.$registro["imagen"].'" width="600px" height="200px"></a>

        <div class="car_cap marco_blanco" >
    <h3>'.$registro["nombre"].'</h3>
    <p>'.$registro["descripcion"].' </p>
    <button href="javascript:void(0)" data-toggle="modal" data-target="#modal_login" type="button" class="btn btn-success">Iniciar Sesion</button>
    <br>
    <br>
    <button href="javascript:void(0)" data-toggle="modal" data-target="#modal_registro" type="button" class="btn btn-success">Registrarse</button>
  </div>      
      </div>';
      $act=1;
}else{

// echo '<div class="item ">
// <a href="javascript:void(0)" data-toggle="modal" data-target="#modal_video" onclick="cargarContenido(\'frame_curso_info.php?id_curso='.$registro["id_curso"].'\')">
//         <img class="fondo" src="../../../administrador/Multimedia/cursos/img/'.$registro["imagen"].'" alt="Chicago" width="600px" height="200px"  ></a>
//         <div class="car_cap marco_blanco" >
//     <h3>'.$registro["nombre"].'</h3>
//     <p>'.$registro["descripcion"].' </p>
//     <button href="javascript:void(0)" data-toggle="modal" data-target="#modal_login" type="button" class="btn btn-success">Iniciar Sesion</button>
//     <br>
//     <br>
//     <button href="javascript:void(0)" data-toggle="modal" data-target="#modal_registro" type="button" class="btn btn-success">Registrarse</button>
//   </div>      
//       </div>';
  echo '<div class="item ">
<a href="curso_gratuito.php?id='.$registro["id_curso"].'">
        <img class="fondo" src="../../../administrador/Multimedia/cursos/img/'.$registro["imagen"].'" alt="Chicago" width="600px" height="200px"  ></a>
        <div class="car_cap marco_blanco" >
    <h3>'.$registro["nombre"].'</h3>
    <p>'.$registro["descripcion"].' </p>
    <button href="javascript:void(0)" data-toggle="modal" data-target="#modal_login" type="button" class="btn btn-success">Iniciar Sesion</button>
    <br>
    <br>
    <button href="javascript:void(0)" data-toggle="modal" data-target="#modal_registro" type="button" class="btn btn-success">Registrarse</button>
  </div>      
      </div>';

$act++;
}
      
     }

echo '</div> ';


     ?>
    

    <!-- Wrapper for slides -->

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#anual" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#anual" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>

  </div>

</div>
</section>


</style>
<section id="carusel_cursos">
  <div class="container"   >
    <div class="col-sm-1"></div>
  <h1 class="agenda_c">Cursos Oficiales</h1>
  <div class="col-sm-10">
<div class="carousel_m center" >

<?php 

 $sql = "SELECT * FROM curso WHERE NOT costo = 0 ORDER BY rand() LIMIT 5";
   $result = mysqli_query($link, $sql);
    $act=0;

    // $registro = mysqli_fetch_array($result, MYSQLI_ASSOC);
    // $registro = mysqli_fetch_array($result, MYSQLI_ASSOC);

     while($registro = mysqli_fetch_array($result, MYSQLI_ASSOC)){
// echo '<div class="carousel-item  href="#1!" >
//     <a href="javascript:void(0)" onclick="get_temario('.$registro["id_curso"].')" data-toggle="modal" data-target="#modal_temario" "><img src="../../../administrador/Multimedia/cursos/img/'.$registro["imagen"].'"></a>

//   </div>';
      echo '<div class="carousel-item  href="#1!" >
    <a href="curso_info.php?id='.$registro["id_curso"].'" ><img src="../../../administrador/Multimedia/cursos/img/'.$registro["imagen"].'"></a>

  </div>';
     }

 ?>
  

  </div>
</div>
  </div>

  </section>
  <br>
  <br>
  <br>
  <br>
  <br>

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
                    <label for="nombres" class="control-label col-xs-5">USER :</label>
                    <div class="col-xs-5">
                      <input id="nombres" name="nombres" type="text" class="form-control" placeholder="Ingrese sus Nombre">
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
                        <input id="pass" name="pass" type="password" class="form-control" placeholder="Ingrese su contraseña">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pass2" class="control-label col-xs-5">Repetir Contraseña:</label>
                    <div class="col-xs-5">
                        <input id="pass2" name="pass2" type="password" class="form-control" placeholder="Repita contraseña">
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

        <div class="modal fade" id="modal_video" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

          <div class="modal-dialog">

<h1>Video</h1>
                <div ondragstart="return false" oncontextmenu="return false" onselectstart="return false" id="marco"></div>

<div class="modal-footer">  
                <button style="background-color: #18c0c0; padding: 0 70px 0 70px;
    font-size: 50px; position: absolute; top: 100%; right: 0; left: 0; " class="btn btn-success">Suscribirse</button>
              </div>

          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div  class="modal fade" id="modal_temario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <div class="modal-dialog">
  <div id="tema_curso" style="text-align: center; color: white; ">  

<!-- <h1 style="font-size: 75px;">Matemáticas</h1>
<h3 >Cálculo</h3>
<h3 >Algebra</h3>
<h3 >Geometría</h3>
              
              <button style="background-color: #18c0c0; padding: 0 70px 0 70px;
    font-size: 50px; position: absolute; top: 150%; right: 0; left: 0; " class="btn btn-success">Conoce más</button> -->
            
       </div>   
   
       </div>   
        </div><!-- /.modal -->



  <script type="text/javascript">
    $(document).ready(function(){
      $('.carousel_m').carousel();

autoplay()   
function autoplay() {
    $('.carousel_m').carousel('next');
    setTimeout(autoplay, 4500);
}

    });
  </script>

<script type="text/javascript">
  function cargarContenido(pagina)
    {
        // cargamos la pagina pagina.html en el div contenido

        $("#marco").load(pagina);
        $('#modal_video').modal('open');
        $('#modal_temario').modal('close');
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
    btn-success' href='javascript:void(0)' data-toggle='modal' data-target='#modal_video' \
    onclick=\"cargarContenido('frame_curso_info.php?id_curso="+id+"')\"\
    >Conoce más</a>";
    document.getElementById("tema_curso").innerHTML = text;
        
        }


    });
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