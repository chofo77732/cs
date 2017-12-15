
<?php include('../html/nav.php'); 
include('../../Database/conexion.php');
session_start();
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


          <h1 class="bien">Examen de </h1>
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

<!-- Container (About Section) -->
<br>
<section>
<!-- <div id="about" class="container">
  
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

<br><br>
<div class="container">

<div class="col-sm-4">
  <h3><strong>
Pregunta 2
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
<br><br><br>

<div class="container">

<div class="col-sm-4">
  <h3><strong>
Pregunta 3
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

<br>
<br>

<br>
<div class="col-sm-5"></div>
<button class="btn btn_cafe_2">Finalizar examen</button>

</div>
</div>
 -->
</section>
<br>

<!--         <div class="modal fade" id="responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" ondragstart="return false" oncontextmenu="return false" onselectstart="return false">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" ><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h2 class="modal-title">Curso</h2>
              </div>
              <div class="modal-body">
                <div id="videorrr">

                </div>

              </div>
              <div class="modal-footer">  

              </div>
            </div>
          </div>
        </div> -->


<section id="modales">

<div class="modal" id="responsive" tabindex="-1" role="dialog" >
          <div class="modal-dialog">
            
          </div>        
        </div>

</section>


                <div  class="modal fade" id="modal_temario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

          <div class="modal-dialog">
            
            <button style="color: white;" type="button" class="close" data-dismiss="modal"><span style="font-size: 50px" class="glyphicon glyphicon-remove"></span></button>
<div id="videorrr">

                </div>  
        </div>
        </div>





  <?php 
if(isset($_GET['id_curso']) and isset($_GET['id_tema']) ){
  

?>

           <div class="container">
                <div class="row">
                    
                    <div class="col-xs-12">
                        

            <div class="col-md-1"></div>
            <div class="col-md-9">
              <div class="panel panel-default"> 
                <!-- <form enctype="multipart/form-data" class="form-horizontal" method="get" id="formCliente" action="validar.php" > -->

                        <?php
if($_GET)
{ 

$id_user=$_SESSION['id'];
$id=$_GET['id_curso'];
$id_tema=$_GET['id_tema'];
$rea="";

}



$sql_ya="SELECT * FROM `historial` WHERE id_usuario = '$id_user' and tipo = \"tipo\" ";

$ya=mysqli_query($link, $sql_ya);

$cadya="0";
$n=0;
          while ($hay=mysqli_fetch_array($ya)) {
$cadya=$cadya.",".$hay['id_pregunta'];

          }



          $ar=array();
$i=0;
$cad="0";
while ($i < 50) {

          $sql_temas="SELECT DISTINCT id_tema FROM `reactivos` WHERE id_tema BETWEEN (SELECT MIN(id_tema) FROM reactivos) and (SELECT MAX(id_tema) FROM reactivos) and id_curso='$id' ORDER BY rand() LIMIT 1";
          $vali=mysqli_query($link, $sql_temas);

          while ($validar=mysqli_fetch_array($vali)) {

$id_t=$validar['id_tema'];

            }


$sql_reactivos="SELECT * FROM reactivos WHERE nivel = ( SELECT MAX( nivel )  FROM reactivos WHERE id_tema='$id_t') and id_tema='$id_t' ORDER BY rand() LIMIT 1";
            
          $pre=mysqli_query($link, $sql_reactivos);

          while ($reactivos=mysqli_fetch_array($pre)) {
            # code...
$ar[$i]= $reactivos['id_reactivo'];

  $cad=$cad.",".$reactivos['id_reactivo'];


 }

  $i++;
}
// echo "----";
// echo $cad;
// echo "<br>";


$orden=array();
$i=0;
      $sql_r="SELECT DISTINCT * FROM reactivos WHERE id_reactivo in ($cad) and NOT id_reactivo in ($cadya) and pregunta!=\"\" and correcto=\"1\"  ORDER BY rand() limit 10";
          $reac=mysqli_query($link, $sql_r);
          while ($registro=mysqli_fetch_array($reac)) {
            // echo "dis".$registro['id_reactivo'] ."<br>";
            $n++;
$orden[$i]=$registro['id_reactivo'];
$i++;
          echo '
 <div class="panel panel-default">
                    <div class="panel-heading">'.$registro['pregunta'].' - '.$registro['id_reactivo'].'</div>
                    <div class="panel-body"> 
                        <div class="alert alert-danger text-center" style="display:none;" id="error">
                        </div> 
                       <div class="alert alert-success text-center" id="exito" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span></span>
                </div>                  
                        
<div>
<div class="col-md-8">
';

$rand = range(6, 9); 
shuffle($rand); 
foreach ($rand as $val) { 
  echo $val. "-";
    echo '<input type="radio" id="res'.$registro['id_reactivo'].'" name="res'.$registro['id_reactivo'].'" value="'.$val.'" required> '.$registro[$val].'<br>';
}


echo '  
  </div>
  <div id="rok'.$registro['id_reactivo'].'" class="col-md-2">
  
</div>
</div>
</div>
</div>
<input type="text" name="valor'.$registro['id_reactivo'].'" id="valor'.$registro['id_reactivo'].'" value="0" hidden>
';

            }

            $jar="";
for ($i=0; $i < sizeof($orden); $i++) { 
            # code...
  if($i==0){
$jar=$orden[$i];
  }else{
$jar=$jar.",".$orden[$i];
  }

          }          

  // echo $jar;
if($n!=0){
echo '<button id="finish" class="btn btn-success right" onclick="mal('.$id_user.','.$id.','.$id_tema.')">Completar</button>';
}else{
  echo '<h1>Sin preguntas disponibles</h1>
<br>
<a href="../Views/tusCursos.php">
                            <button >regresear a tus cursos</button> </a>

';
}




?>
<input type="text" name="valor1" id="valor1" value='0' hidden >


                            
                            </div>
                            </div>
</div>
</div>
</div>

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


<script type="text/javascript">
  function vervideo(id_reactivo){

var id_re=id_reactivo;
$("#videorrr").load("videor.php?id_reactivo="+id_re);

  }

</script>

      <script type="text/javascript">

  function tuscursos(id){

var dir=$('#dir').val();      
    var url="examen_bloque.php?info="+id;
// alert(url);
location.href=url;
// alert(url);
  }

    function prac(curso, tema){

var dir=$('#dir').val();      
    var url="examen_bloque.php?id_curso="+curso+"&id_tema="+tema;
// alert(url);
location.href=url;
// alert(url);
  }
      </script>

<script type="text/javascript">
  var orden=[<?php echo $jar; ?>];
  function mal(user, curso, tema){
// alert(user+curso+tema);
    if(vacio()==0){
$('#finish').attr("disabled", true);

for (var i = 0 ; i < orden.length; i++) {
  // alert(orden[i]);
  var valor=$('#valor'+orden[i]).val();
  if(valor==6){
$('#rok'+orden[i]).html('<h3>bien'+valor+'</h3><br><button id="ver"  onclick="vervideo('+orden[i]+')" href="javascript:void(0)" data-toggle="modal" data-target="#modal_temario" class="btn btn-success">Ver respuesta</button> ');

  $.ajax({
      url:'respuesta.php',
      type:'POST',
      data:'user='+user+'&reactivo='+orden[i]+'&curso='+curso+'&respuesta=1&tipo=tipo&boton=insertar'
  }).done(function(resp){
      if(resp=='error'){
          // alert(resp);
      }else{
        // alert(resp);
        
      }
  });

  }else{
    $('#rok'+orden[i]).html('<h3>mal'+valor+'</h3><br><button id="ver"  onclick="vervideo('+orden[i]+')" href="javascript:void(0)" data-toggle="modal" data-target="#modal_temario" class="btn btn-danger">Ver respuesta</button> ');

      $.ajax({
      url:'respuesta.php',
      type:'POST',
      data:'user='+user+'&reactivo='+orden[i]+'&curso='+curso+'&respuesta=0&tipo=tipo&boton=insertar'
  }).done(function(resp){
      if(resp=='error'){
          // alert(resp);
      }else{
        // alert(resp);
        
      }
  });
  }
    // alert($('#valor'+orden[i]).val());
}




    }else{
alert("Debes llenar todos los reactivos");
    }

  }

function vacio (){
  var v=0;
  for (var i = 0 ; i < orden.length; i++) {

if($('#valor'+orden[i]).val()==0){
v++;
  }

}

return v;
}

</script>

<script type="text/javascript">
  
    function comprobar(user, reactivo, curso, tema)
    {

    }



</script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.carousel_m').carousel();
    });
  </script>


<script>
$(document).ready(function(){

    // Initialize Tooltip
  var orden=[<?php echo $jar; ?>];

  $("input[name=res"+orden[0]+"]").change(function(){
            $('input[name=valor'+orden[0]+']').val($(this).val());
        });
    $("input[name=res"+orden[1]+"]").change(function(){
            $('input[name=valor'+orden[1]+']').val($(this).val());
        });
      $("input[name=res"+orden[2]+"]").change(function(){
            $('input[name=valor'+orden[2]+']').val($(this).val());
        });
        $("input[name=res"+orden[3]+"]").change(function(){
            $('input[name=valor'+orden[3]+']').val($(this).val());
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