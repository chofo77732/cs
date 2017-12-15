<?php 
session_start();
  if (isset($_SESSION['nombre']) && $_SESSION['ingreso']=='YES' && $_SESSION['tra']=='1' && $_SESSION['admin']=='1') 
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
  <!-- <link href="../Resources/bootstrap/css/nav.css" rel="stylesheet" type="text/css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<!-- 
      <script type="text/javascript" src="../Resources/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="../Resources/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../Resources/bootstrap/js/angular.min.js"></script>
    <script type="text/javascript" src="../Resources/bootstrap/js/jquery.js"></script> -->
  
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="Principal.php">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="Principal.php">HOME</a></li>
         <li><a href="categoria.php">Categorías</a></li>
        <li><a href="curso.php">Cursos</a></li>
        <li><a href="tema.php">Temas</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <?php echo $_SESSION['nombre']; ?>
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>
                        <!-- <a href="javascript: void(0)" onclick='cerrar();'>Cerrar Session</a> -->
                        <a href="javascript: void(0)" onclick=" location.href='../Controllers/logout.php' ">Cerrar Session</a>

                        </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>




<br>
<br>
<br>
<div class="Container">
<div class="col-xs-2"></div>

<h1>Reactivos</h1>
<br>



</div>

<div class="modal fade" id="responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onclick="location.reload();"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h2 class="modal-title">Reactivo</h2>
              </div>
              <div class="modal-body">
                <div class="alert alert-success text-center" id="exito" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span>Reactivo Registrado</span>
                </div>


<div id="formulario" >
<!-- <div class="col-xs-1"></div>
<div class="col-xs-9"> -->
<div class="Container">
<div class="row">

<form class="form-horizontal" method="POST" id="formReactivo" action="../Controllers/reactivo.php" enctype="multipart/form-data">

<div class="col-xs-5">
  <input id="pro" name="pro" type="text"  readonly="readonly" value="registrar" hidden>
  <input id="id_reactivo" name="id_reactivo" type="text"  readonly="readonly" value="" hidden>
  <input id="categoria1" name="categoria1" type="text"  readonly="readonly" value="" hidden>
  <input id="curso1" name="curso1" type="text"  readonly="readonly" value="" hidden>
                 <div class="form-group">

                    <label for="categoria" class="control-label col-xs-0">Categoria :</label>
                    <select id="categoria" name="categoria" class="form-control col-xs-1">
                      <option selected disabled>Selecciona una opción</option>
                    </select>

                </div>
                <div class="form-group">
                    <label for="curso" class="control-label col-xs-0">Curso :</label>
                    <select id="curso" name="curso" class="form-control col-xs-1">
                      <option selected disabled>Selecciona una opción</option>


                </select>
                </div>
                <div class="form-group">
                    <label for="tema" class="control-label col-xs-0">Tema :</label>
                    <select id="tema" name="tema" class="form-control col-xs-1">
                      <option selected disabled> Selecciona una opción</option>
           
            </select>
            </div>

   


<div class="form-group" id="prov" style='display:none;'>

                  <div class="form-group">
                    <div class="col-xs-6" >
                      <label for="nivel"  class="control-label col-xs-0">Nivel :</label>
                    <select id="nivel" name="nivel" class="form-control col-xs-1">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
</select>
</div>

                    <div class="col-xs-6" >
                    <label for="correcto" class="control-label col-xs-0">Correcto :</label>
                    <select id="correcto" name="correcto" class="form-control col-xs-1">
  <option value="1">Correcto</option>
  <option value="2">Incorrecto</option>
</select>
</div>

</div>

  <input type="radio" name="res" value="1" onclick="mostrar(1)"> Otro tipo
<input type="radio" name="res" value="2" onclick="mostrar(2)"> Reactivo


</div>
<div>
  <!-- <button  onclick="location.reload();" >Limpiar</button>  -->

</div>
</div>
<div class="col-xs-7">

<div id='oculto' style='display:none;'>

                <div class="form-group">
                    <label for="file1" class="control-label col-xs-3">Cargar Archivo:</label>
                    <div class="col-xs-6">
                         <INPUT type="file" id="file1" name="file1" size="30">
                    </div>
                  </div>

                  <button type="submit"  class="btn btn-success right">Guardar</button>

</div>
<div id='oculto2' style='display:none;'>

                      <div class="form-group">
                    <label for="pregunta" class="control-label col-xs-3">Pregunta:</label>
                    <div class="col-xs-8">
                      <input id="pregunta" name="pregunta"  type="text" class="form-control" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="respuesta" class="control-label col-xs-3">Respuesta:</label>
                    <div class="col-xs-8">
                      <input id="respuesta" name="respuesta"  type="text" class="form-control" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="opcion1" class="control-label col-xs-3">Opción 1:</label>
                    <div class="col-xs-8">
                      <input id="opcion1" name="opcion1"  type="text" class="form-control" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="opcion2" class="control-label col-xs-3">Opción 2:</label>
                    <div class="col-xs-8">
                      <input id="opcion2" name="opcion2"  type="text" class="form-control" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="opcion3" class="control-label col-xs-3">Opción 3:</label>
                    <div class="col-xs-8">
                      <input id="opcion3" name="opcion3"  type="text" class="form-control" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="img" class="control-label col-xs-3">Cargar Imagen:</label>
                    <div class="col-xs-6">
                         <INPUT type="file" id="img" name="img"  size="30">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="video" class="control-label col-xs-3">Cargar Video:</label>
                    <div class="col-xs-6">
                         <INPUT type="file" id="video" name="video"  size="30">
                    </div>
                  </div>




<button type="submit" class="btn btn-success right">Guardar</button>
</div>

</div>



<!-- <input type="text" name="id_ca" id="id_ca" value="0" >
<input type="text" name="id_cu" id="id_cu" value="0" >
<input type="text" name="id_te" id="id_te" value="0" >




<input type="button" value="Mostrar" onclick="cargarCategoria(1)"> -->


</form>


</div></div>
<!-- </div> -->
</div>

</div>
              <div class="modal-footer">  
              
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


<!-- final del formulario -->
<div id="lista_preguntas">
<div class="Container">
  <div class="row">
    
<div class="col-xs-1"></div>
<div class="col-xs-10">

     <button href="javascript:void(0)" data-toggle="modal" data-target="#responsive" type="button" class="btn btn-success">Agregar Reactivo</button>
<br>
    <div class="registros" id="tbl_actor">
<br>
        <table class="table table-striped table-condensed table-hover" >
            <tr>
                <!-- <th >id</th> -->
                <th >Categoria</th>
                <th >Curso</th>
                <th >Tema</th>
                <th >nivel</th>
                <th >Pregunta</th>
                <th >Respuesta</th>
                <th >Opción 1</th>
                <th >Opción 2</th>
                <th >Opción 3</th>
                <th >Imagen</th>
                <th >Video</th>
                <th >Archivo</th>
                <th >Tipo</th>
                <th >Opciones</th>
            </tr>
            
        <?php



            include('../Models/conexion2.php');
            $registro = mysqli_query($link, "SELECT categoria.nombre as categoria, curso.nombre as curso, tema.nombre as tema, reactivos.* FROM `reactivos` INNER join categoria on reactivos.id_examen = categoria.id_categoria INNER JOIN curso on reactivos.id_curso = curso.id_curso INNER JOIN tema on reactivos.id_tema = tema.id_tema"); 
            while($registro2 = mysqli_fetch_array($registro)){
                echo '<tr>
                        <td>'.$registro2['categoria'].'</td>
                        <td>'.$registro2['curso'].'</td>
                        <td>'.$registro2['tema'].'</td>
                        <td>'.$registro2['nivel'].'</td>
                        <td>'.$registro2['pregunta'].'</td>
                        <td>'.$registro2['respuesta'].'</td>
                        <td>'.$registro2['opc1'].'</td>
                        <td>'.$registro2['opc2'].'</td>
                        <td>'.$registro2['opc3'].'</td>
                        <td><img src="../Multimedia/reactivos/img/'.$registro2['img'].'"  width="150" height="100"></td>
                        <td><video controls class="img-responsive" >
                              <source src="../Multimedia/reactivos/video/'.$registro2['video'].'" type="video/mp4"></source>
                              
                          </video></td>';
                          echo "

                        <td><a target=\"_blank\" href=\"../Multimedia/reactivos/otro/".$registro2['file']."\" title=\"\">Abrir Archivo</a></td>
                        ";
                        if($registro2['correcto']=="1"){
                          echo'
                        <td>Correcto</td>';
                        }else{
                          echo'
                        <td>Incorrecto</td>';
                        }

                        echo'

                        <td><a href="javascript:modificar('.$registro2['id_reactivo'].');" class="glyphicon glyphicon-edit">Editar</a> <a href="javascript:eliminar('.$registro2['id_reactivo'].');" class="glyphicon glyphicon-remove-circle">Eliminar</a>
                        </tr> ';


                       
            }
        ?>
          
        </table>
    </div>
</div>


  </div>
</div>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>



<!-- Container (The Band Section) -->

<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->




<br>
<!-- Footer -->
<div class="footer">
<footer class="text-center">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  <p><a href="#" data-toggle="tooltip">Top</a></p> 
</footer>
</div>
<script type="text/javascript">

  function desplegar(){
    document.getElementById('formulario').style.display = 'block';
    document.getElementById('lista_preguntas').style.display = 'none';
  }

  function modificar(id){
    //$('#responsive')[0].reset();

        $('#reg').hide();
        $('#edi').show();
        $('#pro').val('editar');
         $('#id_reactivo').val(id);

        $('#responsive').modal({
            show:true,
            backdrop:'static'
        });

}


function eliminar(id){
    //$('#responsive')[0].reset();

    // alert("");
    var url = '../Controllers/reactivo.php';
        $.ajax({
        type:'POST',
        url:url,
        data:'id_reactivo='+id+'&pro=eliminar'
    }).done(function(respuesta){
                    // if (respuesta=='exito') {
                    //     $('#exito').show();

                    // }
                    // else{
                    //     alert(respuesta);
                    // }
                    
                })  .always(function(data) {

    location.reload();
  });
}




function mostrar(opc){

  var valor=$('#valor1').val();
  // alert(valor);
  if(opc==1){

document.getElementById('oculto').style.display = 'block';
document.getElementById('oculto2').style.display = 'none';

  }
  if(opc==2){

document.getElementById('oculto').style.display = 'none';
document.getElementById('oculto2').style.display = 'block';

  }
  }

</script>


<script>
$(document).ready(function(){
//*********
    var url = '../Controllers/contenido.php';
        $.ajax({
        type:'POST',
        url:url,
        data:'boton=categoria',
        success: function(valores){
                var data = JSON.parse(valores);

              $.each(data,function(key, registro) {
             
        $("#categoria").append('<option  value='+registro.id_categoria+'>'+registro.nombre+'</option>');
      });  

        }
    });

//**********


  $("select[name=categoria]").change(function(){
            // alert($('select[name=categoria]').val());
            var cat=($('select[name=categoria]').val());
            // alert(cat);
            $('input[name=categoria1]').val($(this).val());
                var url = '../Controllers/contenido.php';
                if(cat!=0){

        $.ajax({
        type:'POST',
        url:url,
        data:'id_categoria='+cat+'&boton=curso',
        success: function(valores){
          $('#categoria').attr("disabled", true);
                var data = JSON.parse(valores);


              $.each(data,function(key, registro) {
             
        $("#curso").append('<option value='+registro.id_curso+'>'+registro.nombre+'</option>');
      });  

        }
    });

                }

        });

    $("select[name=curso]").change(function(){
            // alert($('select[name=categoria]').val());
            var cur=($('select[name=curso]').val());
            // alert(cur);
            $('input[name=curso1]').val($(this).val());
                var url = '../Controllers/contenido.php';
                if(cur!=0){

        $.ajax({
        type:'POST',
        url:url,
        data:'id_curso='+cur+'&boton=tema',
        success: function(valores){
          $('#curso').attr("disabled", true);
                var data = JSON.parse(valores);
                // alert(data);
              $.each(data,function(key, registro) {
             
        $("#tema").append('<option value='+registro.id_tema+'>'+registro.nombre+'</option>');
      });  

        }
    });

                }

        });

    $("select[name=tema]").change(function(){
            // alert($('select[name=categoria]').val());
            var cur=($('select[name=tema]').val());
            // alert(cur);
            // $('input[name=id_ca]').val($(this).val());

                if(cur!=0){
document.getElementById('prov').style.display = 'block';

                }

        });

//     $("select[name=categoria]").change(function(){

//             var nivel=$(this).val();
            
// document.getElementById("curso").innerHTML = "<input name='cacu'>"+nivel;

//         });



  // Initialize Tooltip
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
    echo '<script> window.location="../Views/index.php"; </script>';
  }
 ?>
    