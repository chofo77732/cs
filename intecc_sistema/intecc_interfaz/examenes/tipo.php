<?php 
session_start();
  if (isset($_SESSION['nombre']) && $_SESSION['ingreso']=='YES' && $_SESSION['activado']=='1') 
  {?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Bootstrap Theme The Band</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="../Resources/bootstrap/css/theme.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <link href="http://vjs.zencdn.net/6.2.8/video-js.css" rel="stylesheet">

  <!-- If you'd like to support IE8 -->
  <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
  <script src="http://vjs.zencdn.net/6.2.8/video.js"></script>

    <style type='text/css'>
        .clock      {position:relative;left:50%;top:50%;width:36px;height:36px;padding:20px;}
    </style>

</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50" ondragstart="return false" oncontextmenu="return false" onselectstart="return false">

<!-- Modal      111111111111111111111111111111111111111111111111111111111 -->

        <div class="modal fade" id="responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" ondragstart="return false" oncontextmenu="return false" onselectstart="return false">
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
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

<!-- fin modal  -->


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


          include('../Models/conexion2.php');

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
while ($i < 20) {

          $sql_temas="SELECT DISTINCT id_tema FROM `reactivos` WHERE id_tema BETWEEN (SELECT MIN(id_tema) FROM reactivos) and (SELECT MAX(id_tema) FROM reactivos) ORDER BY rand() LIMIT 1";
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


  <!-- <button type="submit" class="btn btn-success right">Guardar</button>
                  </form>
 -->


                            
                            <!-- <button href="javascript:void(0)" data-toggle="modal" data-target="#responsive" type="button" class="btn btn-success">Proximo Ejercisio</button>   -->
                            
                            </div>
                            </div>
</div>
</div>
</div>


<script type="text/javascript">
  function vervideo(id_reactivo){

var id_re=id_reactivo;
$("#videorrr").load("videor.php?id_reactivo="+id_re);
$('#responsive').modal({
                    show:true,
                    backdrop:'static'
                });

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
$('#rok'+orden[i]).html('<h3>bien'+valor+'</h3><br><button id="ver"  onclick="vervideo('+orden[i]+')" class="btn btn-success">Ver respuesta</button> ');

  $.ajax({
      url:'respuesta.php',
      type:'POST',
      data:'user='+user+'&reactivo='+orden[i]+'&curso='+curso+'&tema='+tema+'&respuesta=1&tipo=tipo&boton=insertar'
  }).done(function(resp){
      if(resp=='error'){
          // alert(resp);
      }else{
        // alert(resp);
        
      }
  });

  }else{
    $('#rok'+orden[i]).html('<h3>mal'+valor+'</h3><br><button id="ver"  onclick="vervideo('+orden[i]+')" class="btn btn-success">Ver respuesta</button> ');

      $.ajax({
      url:'respuesta.php',
      type:'POST',
      data:'user='+user+'&reactivo='+orden[i]+'&curso='+curso+'&tema='+tema+'&respuesta=0&tipo=tipo&boton=insertar'
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

  


  $('[data-toggle="tooltip"]').tooltip(); 
  
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
})
</script>

    <script>
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

</body>
</html>
<?php

  }
  else
  {
    echo '<script> window.location="../Views/noact.php"; </script>';
  }
 ?>
    