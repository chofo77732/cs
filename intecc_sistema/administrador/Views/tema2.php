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
      <a class="navbar-brand" href="#myPage">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="Principal.php">HOME</a></li><!-- 
         <li><a href="inicio2.php">Categorías</a></li>
        <li><a href="curso2.php">Cursos</a></li>
        <li><a href="tema2.php">Temas</a></li> -->
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
<br>

<div class="col-xs-1"></div>
<div class="col-xs-10">

<br>
     <button href="javascript:void(0)" data-toggle="modal" data-target="#responsive" type="button" class="btn btn-success">Agregar Tema</button>

      
<br>


    <div class="registros" id="tbl_actor">
<br>
        <table class="table table-striped table-condensed table-hover" >
            <tr>
                <!-- <th >id</th> -->
                <th >nombre</th>
                <th >Descripcion</th>
                <th >Del Curso</th>
                <th >imagen</th>
                <th >video</th>
                <th >pdf</th>
                <th >Opciones</th>
            </tr>


        <?php

        function encode_this($string) 
{
$string = utf8_encode($string);
$control = "qwerty"; //defino la llave para encriptar la cadena, cambiarla por la que deseamos usar
$string = $control.$string.$control; //concateno la llave para encriptar la cadena
$string = base64_encode($string);//codifico la cadena
return($string);
} 

function decode_get2($string)
{
$cad = split("[?]",$string); //separo la url desde el ?
$string = $cad[1]; //capturo la url desde el separador ? en adelante
$string = base64_decode($string); //decodifico la cadena
$control = "qwerty"; //defino la llave con la que fue encriptada la cadena,, cambiarla por la que deseamos usar
$string = str_replace($control, "", "$string"); //quito la llave de la cadena

//procedo a dejar cada variable en el $_GET
$cad_get = split("[&]",$string); //separo la url por &
foreach($cad_get as $value)
{
$val_get = split("[=]",$value); //asigno los valosres al GET

$_GET[$val_get[0]]=utf8_decode($val_get[1]);

}
}

if($_GET)
{ 
//recibo la url la decodifico y la dejo en la variable $_GET
decode_get2($_SERVER["REQUEST_URI"]); 
$id_curso=$_GET['id_curso'];

}





include('../Models/conexion2.php');

$query = "SELECT tema.*, curso.nombre as nombre_curso FROM curso INNER JOIN tema on curso.id_curso = tema.id_curso where tema.id_curso = '$id_curso'";

$result = mysqli_query($link, $query);



            while($registro = mysqli_fetch_array($result, MYSQLI_ASSOC)){


                echo "<tr>
                        <td>".$registro['nombre']."</td>
                        <td>".$registro['descripcion']."</td>
                        <td>".$registro['nombre_curso']."</td>


                         <td><img src=\"../Multimedia/temas/img/".$registro['imagen']."\"  width='150' height='100'></td>

                         <td><video controls class='img-responsive' >
                              <source src=\"../Multimedia/temas/video/".$registro['video']."\" ></source>
                          </video></td>
                         <td>

<a target=\"_blank\" href=\"../Multimedia/temas/pdf/".$registro['pdf']."\" title=\"\">Abrir pdf</a>

                         </td>

                         

                        <td><a href='javascript:modificar(".$registro['id_tema'].");' class='glyphicon glyphicon-edit'>Editar</a>
                      
                         <a href='javascript:eliminar(".$registro['id_tema'].");' class='glyphicon glyphicon-remove-circle'>Eliminar</a></td>
                    </tr>

                    ";       


            }

            // <a target=\"_blank\" href=\"pdf_view.php?id=".$registro['id_tema']."\" title=\"\">Texto que ve el usuario</a>

// <embed src=\"ver_pdf.php?id=".$registro['id_tema']."\"  type='application/pdf' width='150' height='100'></embed>

             // <td><img src=\"ver.php?id=".$registro['id_curso']."\"  width='150' height='100'></td>
                         // <td><img src=\"ver.php?id=".$registro['id_curso']."\"  width='150' height='100'></td>

 
        ?>
        </table>
    </div>
    </div>


<!-- Modal      111111111111111111111111111111111111111111111111111111111 -->

        <div class="modal fade" id="responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onclick="location.reload();"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h2 class="modal-title">Tema</h2>
              </div>
              <div class="modal-body">
                <div class="alert alert-success text-center" id="exito" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span>Actor Registrado</span>
                </div>
                <!-- <form enctype="multipart/form-data" class="form-horizontal" method="post" id="formCliente" > -->
                 <form enctype="multipart/form-data" class="form-horizontal" method="post" id="formCliente" action="imgTema.php">
                  <div class="form-group">
                    <label for="proceso" class="control-label col-xs-4">proceso :</label>
                    <div class="col-xs-6">
                      <input id="pro" name="pro" type="text" class="form-control" readonly="readonly" value="registrar">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="id" class="control-label col-xs-4">id :</label>
                    <div class="col-xs-6">
                      <input id="id" name="id" type="text" class="form-control" readonly="readonly" value="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="nombre" class="control-label col-xs-4">Nombre:</label>
                    <div class="col-xs-6">
                        <input id="nombre" name="nombre" type="text" class="form-control" required autocomplete="off">

                    </div>
                  </div>


                  <div class="form-group">
                    <label for="desc" class="control-label col-xs-4">Descripción:</label>
                    <div class="col-xs-6">
                        <!-- <input id="desc" name="desc" type="text" class="form-control" > -->
                        <textarea id="descripcion" name="descripcion" type="text" class="form-control" required autocomplete="off"></textarea>
                    </div>
                  </div>



<!--                   <div class="form-group">
                    <label for="curso" class="control-label col-xs-4">Curso:</label>
                    <div class="col-xs-6">
                    <select name='curso' required id='curso' >
                    <option disabled selected value=''>Cursos</option>

<?php

include('../Models/conexion2.php');

$query = "SELECT id_curso, nombre FROM curso where id_curso='$id_curso'";
$result = mysqli_query($link, $query);

            while($registro = mysqli_fetch_array($result, MYSQLI_ASSOC)){

          echo "    
      
      <option value='".$registro['id_curso']."'
      >".$registro['nombre']."</option>";
    }
?>

 </select>



                    </div>
                  </div>
 -->


<div class="form-group">
                    <label for="categoria" class="control-label col-xs-4">Curso :</label>
                    <div class="col-xs-6">

                    <?php


include('../Models/conexion2.php');

$query = "SELECT id_curso, nombre FROM curso where id_curso='$id_curso'";
$result = mysqli_query($link, $query);

            while($registro = mysqli_fetch_array($result, MYSQLI_ASSOC)){

          echo "    
          <label  class='control-label col-xs-4'>".$registro['nombre']."</label>
          <input id='curso' name='curso' type='hidden' class='form-control' readonly='readonly' value='".$registro['id_curso']."'>";
    }
?>

                    </div>
                  </div>    


<div class="form-group">
                    <label for="imagen" class="control-label col-xs-4">Imagen:</label>
                    <div class="col-xs-6">
                        <INPUT type="file" id="imagen" required name="imagen" size="30">

                    </div>
                  </div>

<div class="form-group">
                    <label for="video" class="control-label col-xs-4">Video:</label>
                    <div class="col-xs-6">
                         <INPUT type="file" name="video" required size="30">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="pdf" class="control-label col-xs-4">pdf:</label>
                    <div class="col-xs-6">
                         <INPUT type="file" name="pdf" required size="30">
                    </div>
                  </div>

<input type="button" onclick="limpiar()" value="limpiar">
<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="location.reload();">Cerrar</button>
                <!-- <button onclick="registrar();" type="button" class="btn btn-success">Guardar</button> -->
                <button type="submit" class="btn btn-success">Guardar</button>
                </form>
              </div>
              <div class="modal-footer">  
                <!-- <button onclick="editar();" align="left" type="button" class="btn" data-dismiss="modal">Editar</button> -->
                <!-- <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="location.reload();">Cerrar</button>
                <button onclick="registrar();" type="button" class="btn btn-success">Guardar</button>
                <button type="submit" class="btn btn-success">Guardar</button> -->
              
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
<!-- fin modal  -->

<script type="text/javascript">
       function limpiar() {
$('#pro').val('registrar');
                $('#id').val('');
                $('#nombre').val('');
                $('#descripcion').val('');
                $('#imagen').val('');
                $('#video').val('');
                $('#pdf').val('');

  }    
</script>
      <script type="text/javascript">
          
  function registrar(){



             var id=$('#id').val();
            var nombre=$('#nombre').val();
            var desc=$('#desc').val();
            var categoria=$('#categoria').val();
            var imagen=$('#imagen').val();
            var video=$('#video').val();
            var opc=$('#pro').val();

alert(imagen);


                $.ajax({
                    url:'../Controllers/control2.php',
                    type:'POST',
                    data:'id='+id+'&nombre='+nombre+'&descripcion='+desc+'&categoria='+categoria+'&imagen='+imagen+'&video='+video+'&boton='+opc
                }).done(function(respuesta){
                    if (respuesta=='exito') {
                        $('#exito').show();

                    }
                    else{
                        alert(respuesta);
                    }
                    
                })  .always(function(data) {

    location.reload();
  });
}

function modificar(id){
    //$('#responsive')[0].reset();
    var id_categoria=id;
    var url = '../Controllers/control3.php';
        $.ajax({
        type:'POST',
        url:url,
        data:'id='+id_categoria+'&boton=modificar',
        success: function(valores){
                var datos = eval(valores);
                $('#reg').hide();
                $('#edi').show();
                $('#pro').val('editar');
                 $('#id').val(id);
                $('#nombre').val(datos[0]);
                $('#descripcion').val(datos[1]);
                $('#responsive').modal({
                    show:true,
                    backdrop:'static'
                });
            return false;

        }
    });
    return false;
}

function eliminar(id){
    //$('#responsive')[0].reset();

    alert(id);
    var url = '../Controllers/control3.php';
        $.ajax({
        type:'POST',
        url:url,
        data:'id='+id+'&boton=eliminar'
    }).done(function(respuesta){
                    if (respuesta=='exito') {
                        $('#exito').show();

                    }
                    else{
                        alert(respuesta);
                    }
                    
                })  .always(function(data) {

    location.reload();
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
    