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

     <button href="javascript:void(0)" data-toggle="modal" data-target="#responsive" type="button" class="btn btn-success">Agregar Categoría</button>
<br>
    <div class="registros" id="tbl_actor">
<br>
        <table class="table table-striped table-condensed table-hover" >
            <tr>
                <!-- <th >id</th> -->
                <th >nombre</th>
                <th >Descripcion</th>
                <th >Opciones</th>
            </tr>
        <?php



            include('../Models/conexion2.php');
            $registro = mysqli_query($link, "SELECT * FROM categoria"); 
            while($registro2 = mysqli_fetch_array($registro)){
                echo '<tr>
                        <td>'.$registro2['nombre'].'</td>
                        <td>'.$registro2['descripcion'].'</td>
                        <td><a href="javascript:modificar('.$registro2['id_categoria'].');" class="glyphicon glyphicon-edit">Editar</a> <a href="javascript:eliminar('.$registro2['id_categoria'].');" class="glyphicon glyphicon-remove-circle">Eliminar</a>';

                        echo '</td>
                        <td>
                        <button type="button" class="btn btn-success btn-lg"  
onclick="location=\'curso2.php?\'">agregar curso</button>
                        </td>
                    </tr>';       
            }
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
                <h2 class="modal-title">Categoría</h2>
              </div>
              <div class="modal-body">
                <div class="alert alert-success text-center" id="exito" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span>Categoría Registrada</span>
                </div>
                <form class="form-horizontal" id="formCliente">
                  <div class="form-group">
                    <label for="proceso" class="control-label col-xs-5">proceso :</label>
                    <div class="col-xs-5">
                      <input id="pro" name="pro" type="text" class="form-control" readonly="readonly" value="registrar">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="id" class="control-label col-xs-5">id :</label>
                    <div class="col-xs-5">
                      <input id="id" name="id" type="text" class="form-control" readonly="readonly" value="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="nombre" class="control-label col-xs-5">Nombre:</label>
                    <div class="col-xs-5">
                        <input id="nombre" name="nombre" type="text" required class="form-control" autocomplete="off">

                    </div>
                  </div>


                  <div class="form-group">
                    <label for="desc" class="control-label col-xs-5">Descripción:</label>
                    <div class="col-xs-5">
                        <!-- <input id="desc" name="desc" type="text" class="form-control" > -->
                        <textarea id="desc" name="desc" type="text" required class="form-control" autocomplete="off"></textarea>
                    </div>
                  </div>

                </form>
              </div>
              <div class="modal-footer">  


                <!-- <button onclick="editar();" align="left" type="button" class="btn" data-dismiss="modal">Editar</button> -->
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="location.reload();">Cerrar</button>
                <button onclick="registrar();" type="button" class="btn btn-success">Guardar</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

<!-- fin modal  -->

      <script type="text/javascript">
          
  function registrar(){


             var id=$('#id').val();
            var nombre=$('#nombre').val();
            var desc=$('#desc').val();
            var opc=$('#pro').val();
                $.ajax({
                    url:'../Controllers/control.php',
                    type:'POST',
                    data:'id='+id+'&nombre='+nombre+'&descripcion='+desc+'&boton='+opc

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
    var url = '../Controllers/control.php';
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
                $('#desc').val(datos[1]);
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
    var url = '../Controllers/control.php';
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
    