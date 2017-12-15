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
  <script src="../Resources/bootstrap/js/jquery.js"></script>
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

        <div class="modal fade" id="responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h2 class="modal-title">Datos del Participante</h2>
              </div>
              <div class="modal-body">
                <div class="alert alert-success text-center" id="exito" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span> Su cuenta ha sido registrada</span>
                </div>
                <form class="form-horizontal" id="formParticipante">
                  <input id="id_p" name="id_p" hidden  >
                  <div class="form-group">
                    <!-- <label for="proceso" class="control-label col-xs-4">proceso :</label> -->
                    <div class="col-xs-6">
                      <input id="pro" name="pro" type="text" hidden value="registrar">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="tipo_p" class="control-label col-xs-5">Participante :</label>
                    <select id="tipo_p" name="tipo_p" class="col-xs-5">
  <option disabled> Participante </option>
  <option value="1">Colaborador</option>
  <option value="2">Revisor</option></select>
                  </div>
                  <div class="form-group">
                    <label for="nombres" class="control-label col-xs-5">Nombres :</label>
                    <div class="col-xs-5">
                      <input id="nombres" name="nombres" type="text" class="form-control" placeholder="Ingrese sus Nombres">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="apellidos" class="control-label col-xs-5">Apellido Paterno:</label>
                    <div class="col-xs-5">
                      <input id="apellido_p" name="apellido_p"  type="text" class="form-control" placeholder="Ingrese su Apellido Paterno">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="apellidos" class="control-label col-xs-5">Apellido Materno:</label>
                    <div class="col-xs-5">
                      <input id="apellido_m" name="apellido_m"  type="text" class="form-control" placeholder="Ingrese su Apellido Materno">
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
                        <input id="pass" name="pass" type="password" class="form-control" placeholder="Ingrese su password">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pass2" class="control-label col-xs-5">Repetir Contraseña:</label>
                    <div class="col-xs-5">
                        <input id="pass2" name="pass2" type="password" class="form-control" placeholder="Ingrese su password">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="direccion" class="control-label col-xs-5">Dirección :</label>
                    <div class="col-xs-5">
                      <input id="direccion" name="direccion" type="text" class="form-control" placeholder="Ingrese su dirección">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="celular" class="control-label col-xs-5">Célular :</label>
                    <div class="col-xs-5">
                      <input id="celular" name="celular" type="number" class="form-control" placeholder="Ingrese su celular">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="telefono" class="control-label col-xs-5">Teléfono fijo :</label>
                    <div class="col-xs-5">
                      <input id="telefono" name="telefono" type="number" class="form-control" placeholder="Ingrese su celular">
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">  
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="location.reload();">Cerrar</button>
                <button onclick="registrar();" type="button" class="btn btn-success">Guardar</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->




<br>
<br>
<br>
<div class="Container">
<div class="col-xs-2"></div>

<h1>Participantes</h1>


</div>


<div class="col-xs-1"></div>
<div class="col-xs-10">

<br>
     <button href="javascript:void(0)" data-toggle="modal" data-target="#responsive" type="button" class="btn btn-success">Agregar Participante</button>
     <!-- <button OnClick="location.href='inicio2.php'" type="button" class="btn btn-success">Regresar</button>
       -->
    
<br>


    <div class="registros" id="tbl_actor">
<br>
        <table class="table table-striped table-condensed table-hover" >
            <tr>
                <!-- <th >id</th> -->
                <th >tipo</th>
                <th >nombres</th>
                <th >apellido paterno</th>
                <th >apellido materno</th>
                <th >email</th>
                <th >password</th>
                <th >direccion</th>
                <th >celular</th>
                <th >telefono</th>

                <th >Opciones</th>
            </tr>





        <?php
         

include('../Models/conexion2.php');

$query ="SELECT * from participante";
    
$result = mysqli_query($link, $query);



            while($registro = mysqli_fetch_array($result, MYSQLI_ASSOC)){
              if($registro['tipo']==1){
                $tipo="Colaborador";
              }else{
                $tipo="Revisor";
              }

                echo "<tr>
                        
                        <th >".$tipo."</th>
                        <th >".$registro['nombre']."</th>
                        <th >".$registro['paterno']." </th>
                        <th >".$registro['materno']." </th>
                        <th >".$registro['email']."</th>
                        <th >".$registro['contra']."</th>
                        <th >".$registro['direccion']."</th>
                        <th >".$registro['celular']."</th>
                        <th >".$registro['telefono']."</th>


                        <td><a href='javascript:modificar(".$registro['id_participante'].");' class='glyphicon glyphicon-edit'>Editar</a>
                      
                         <a href='javascript:eliminar(".$registro['id_participante'].");' class='glyphicon glyphicon-remove-circle'>Eliminar</a></td>

                               <td>
                    </tr>
                    ";       

            }

             // <td><img src=\"ver.php?id=".$registro['id_curso']."\"  width='150' height='100'></td>
                         // <td><img src=\"ver.php?id=".$registro['id_curso']."\"  width='150' height='100'></td>

 
        ?>
        </table>
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



<!-- Container (The Band Section) -->

<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->




<br>
<!-- Footer -->
<footer class="text-center">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  <p><a href="#" data-toggle="tooltip">Top</a></p> 
</footer>

<script>
$(document).ready(function(){

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


function registrar(){
            var id_p=$('#id_p').val();
            var tipo_p=$('#tipo_p').val();
            var nombres=$('#nombres').val();
            var apellido_p=$('#apellido_p').val();
            var apellido_m=$('#apellido_m').val();
            var email=$('#email2').val();
            var password=$('#pass').val();
            var password2=$('#pass2').val();
            var direccion=$('#direccion').val();
            var celular=$('#celular').val();
            var telefono=$('#telefono').val();
            var opc=$('#pro').val();
// alert(
//              tipo_p+" - "+
//              nombres+" - "+
//              apellido_p+" - "+
//              apellido_m+" - "+
//              email+" - "+
//              password+" - "+
//              password2+" - "+
//              direccion+" - "+
//              celular+" - "+
//              telefono);

            if (password===password2) {

                $.ajax({
                    url:'../Controllers/participante.php',
                    type:'POST',
                    data:'id_p='+id_p+'&tipo_p='+tipo_p+'&nombres='+nombres+'&apellido_p='+apellido_p+'&apellido_m='+apellido_m+'&email='+email+'&password='+password+'&direccion='+direccion+'&celular='+celular+'&telefono='+telefono+'&boton='+opc
                }).done(function(respuesta){
                    if (respuesta=='exito') {
                        location.reload();
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

        function modificar(id){
    //$('#responsive')[0].reset();
    var id_participante=id;
    var url = '../Controllers/participante.php';
        $.ajax({
        type:'POST',
        url:url,
        data:'id_participante='+id_participante+'&boton=modificar',
        success: function(valores){
                // alert(valores);
                var datos =    JSON.parse(valores);
                $('#reg').hide();
                $('#edi').show();
                $('#pro').val('editar');
                 $('#id_p').val(id);

                $('#tipo_p').val(datos[0]);
                $('#nombres').val(datos[1]);
                $('#apellido_p').val(datos[2]);
                $('#apellido_m').val(datos[3]);
                $('#email2').val(datos[4]);
                $('#direccion').val(datos[6]);
                $('#celular').val(datos[7]);
                $('#telefono').val(datos[8]);

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

    // alert(id);
    var url = '../Controllers/participante.php';
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
    