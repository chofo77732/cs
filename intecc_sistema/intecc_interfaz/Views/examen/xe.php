<?php 
include('../../Database/conexion.php');
session_start(); ?>
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
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50" ondragstart="return false" oncontextmenu="return false" onselectstart="return false" >

<!-- Modal      111111111111111111111111111111111111111111111111111111111 -->

<div  class="modal fade" id="responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

          <div class="modal-dialog">
            
            <button style="color: white;" type="button" class="close" data-dismiss="modal"><span style="font-size: 50px" class="glyphicon glyphicon-remove"></span></button>
<div id="videorrr">

                </div>  
        </div>
        </div>
<!-- fin modal  -->




                        <?php
if($_GET)
{ 
//recibo la url la decodifico y la dejo en la variable $_GET

$id_user=$_SESSION['id'];
$id=$_GET['id_curso'];
$id_tema=$_GET['id_tema'];
$nivel=$_GET['nivel'];
$rea="";

}

          
$id_pregunta="";
          $inf="SELECT historial.*, reactivos.nivel as nivel FROM `historial` INNER JOIN reactivos on historial.id_pregunta=reactivos.id_reactivo where historial.id_usuario = '$id_user' and  historial.id_curso = '$id' and nivel='$nivel' and reactivos.id_tema='$id_tema' ORDER by historial.id_historial DESC LIMIT 1 ";
          $vali=mysqli_query($link, $inf);
          while ($validar=mysqli_fetch_array($vali)) {
            # code...

            $id_pregunta=$validar['id_pregunta'];
            
            }

    $sql = "SELECT * from reactivos where id_examen = '$id' and  nivel= '$nivel' and  id_tema= '$id_tema' and id_reactivo > '$id_pregunta' limit 1";

            $result = mysqli_query($link, $sql);

            if ($result) {
              # code...
            while($registro = mysqli_fetch_array($result)){

              if($registro['pregunta']!=""){

          echo '
 <div class="panel panel-default">
                    <div class="panel-heading">'.$registro['pregunta'].' - '.$registro['id_reactivo'].'</div>
                    <div class="panel-body"> 
                        <div class="alert alert-danger text-center" style="display:none;" id="error">
                        </div> 
                       <div class="alert alert-success text-center" id="exito" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span></span>
                </div>                  
                        
<div>';

$rand = range(6, 9); 
shuffle($rand); 
foreach ($rand as $val) { 
  echo $val. "-";
    echo '<input type="radio" name="res" value="'.$val.'"> '.$registro[$val].'<br>';
}


// $alea[];

// while(){
// $alea[$i]=rand(4,7);

// }
// echo(rand(4,7));

  // <input type="radio" name="example'.$registro['id_reactivo'].'" value="male"> '.$registro['opc1'].'<br>
  // <input type="radio" name="example'.$registro['id_reactivo'].'" value="male"> '.$registro['opc2'].'<br>
  // <input type="radio" name="example'.$registro['id_reactivo'].'" value="male"> '.$registro['opc3'].'<br>
echo '  
  
</div>

<button id="comp" onclick="comprobar('.$id_user.','.$registro['id_reactivo'].','.$registro['id_curso'].','.$id_tema.')">Comprobar</button>

</div>
</div>
<button id="ver" disabled="true" onclick="vervideo(\''.$registro['id_reactivo'].'\')" class="btn btn-success">Ver respuesta</button> 
';
$rea=$registro['id_reactivo'];

            }else{

              echo '

<embed width="100%" height="100%" src="../../../administrador/Multimedia/reactivos/otro/'.$registro['file'].'"></embed>
<br>
<textarea type="text" placeholder="Escribe tu respues aquí" name="abierta" id="abierta"  ></textarea>
<br>

<button id="comp2" onclick="comprobar2('.$id_user.','.$registro['id_reactivo'].','.$registro['id_curso'].','.$id_tema.')">Comprobar</button>
          <br>
          <br>
          <br>
          
          ';

            }

              }


            }else{

            }

          



?>

<input type="text" name="valor1" id="valor1" value="0" hidden >
<button id="sig" disabled="true"  onclick="location.reload();" >Siguiente Pregunta</button>  


                            
                            <!-- <button href="javascript:void(0)" data-toggle="modal" data-target="#responsive" type="button" class="btn btn-success">Proximo Ejercisio</button>   -->
                            <a href="../Views/tusCursos.php">
                            <button >regresear a tus cursos</button> </a>

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


  
    function comprobar(user, reactivo, curso, tema)
    {
      // alert(user+" - "+reactivo+" - "+curso);

      var valor=$('#valor1').val();

      if(valor=="0"){

$('#error').html('<h3>Seleccione una opción</h3>').show(200).delay(3000).hide(200);
      }else{


        if(valor=="6"){
$('#exito').html('<h3>Exito</h3>').show(200).delay(20000).hide(200);
$('#comp').attr("disabled", true);
$('#ver').attr("disabled", false);
$('#sig').attr("disabled", false);

            $.ajax({
                url:'respuesta.php',
                type:'POST',
                data:'user='+user+'&reactivo='+reactivo+'&curso='+curso+'&tema='+tema+'&respuesta=1&tipo=practica&boton=insertar'
            }).done(function(resp){
                if(resp=='error'){
                    // alert(resp);
                }else{
                  // alert(resp);
                  
                }
            });




        }else{
          $('#error').html('<h3>Respuesta incorrecta</h3><button onclick="vervideo(\'<?php echo $rea ?>\')">Ver video</button>').show(200).delay(10000).hide(200);
$('#ver').attr("disabled", false);
          $('#comp').attr("disabled", true);
          $('#sig').attr("disabled", false);

                      $.ajax({
                url:'respuesta.php',
                type:'POST',
                data:'user='+user+'&reactivo='+reactivo+'&curso='+curso+'&tema='+tema+'&respuesta=0&tipo=practica&boton=insertar'
            }).done(function(resp){
                if(resp=='error'){
                    // alert(resp);
                }else{
                  // alert(resp);
                  
                }
            });
        }


      



      }
  
    }

function comprobar2(user, reactivo, curso, tema){



var valor=$('#abierta').val();

if(valor!=""){


          $('#ver').attr("disabled", false);
          $('#comp2').attr("disabled", true);
          $('#sig').attr("disabled", false);

        $.ajax({
                url:'respuesta.php',
                type:'POST',
                data:'user='+user+'&reactivo='+reactivo+'&curso='+curso+'&tema='+tema+'&respuesta='+valor+'&tipo=practica&boton=insertar'
            }).done(function(resp){
                if(resp=='error'){
                    // alert(resp);
                }else{
                  // alert(resp);
                  
                }
            }).always(function(data) {

    location.reload();
  });

}else{
  alert("Debes escribir una respuesta");
}

      

}

</script>


<script>
$(document).ready(function(){
  // Initialize Tooltip
  $("input[name=res]").change(function(){
            // alert($('select[name=color1]').val());
            var nivel=$(this).val();
            $('input[name=valor1]').val($(this).val());
            // var curso=<?php echo $_GET['id_curso'];?>;
// alert(curso);
            // $("#valor1").load(nivel);
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
