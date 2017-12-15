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
  <!-- <link href="../Resources/bootstrap/css/nav.css" rel="stylesheet" type="text/css"> -->
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

<?php 
include('../Views/nav.html');
 ?>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50" >



<br>
<br>

           <div class="container">
                <div class="row">
                    
                    <div class="col-xs-12">
                        

            <div class="col-md-2"></div>
            <div class="col-md-8">

                <div id="ejercisios" class="panel panel-default">

</div>
                             
<!--                             <select id="nivel">  
                              <option disabled> Nivel </option>
                              <option onclick="cargarContenido('xe.php?id_curso=1&nivel=1')" value="1"> 1 </option>
                              <option onclick="cargarContenido('xe.php?id_curso=1&nivel=2')" value="2"> 2 </option>
                              <option onclick="cargarContenido('xe.php?id_curso=1&nivel=3')" value="3"> 3 </option>
                              <option onclick="cargarContenido('xe.php?id_curso=1&nivel=4')" value="4"> 4 </option>

                            </select> -->

<select name="nivel1" id="nivel1">
      <option disabled> Nivel </option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
</select><label for="nivel1">Seleccionar nivel</label>
<!-- <input type="text" name="valor1" size="40" value="Aquí saldrá el valor del select cuando cambie"> -->

<?php 
// echo $id=$_GET['id_curso'];
// echo $_GET['id_curso'];
 ?>

</div>
</div>
</div>
</div>
<script type="text/javascript">
  

</script>

<script type="text/javascript">
var select = document.getElementById('nivel');
select.addEventListener('nivel',
  function(){
    var selectedOption = this.options[select.selectedIndex];
    console.log(selectedOption.value + ': ' + selectedOption.text);
  });
</script>


<footer class="text-center">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  <p><a href="https://www.w3schools.com" data-toggle="tooltip" title="Visit w3schools">Top</a></p> 
</footer>

    <script>
    // Funcion para cargar un contenido en un div
    function cargarContenido(pagina)
    {
        // cargamos la pagina pagina.html en el div contenido
        $("#ejercisios").html("<img src='../Multimedia/img/loading.gif' class='clock' border='0' />");
        $("#ejercisios").load(pagina);
    }

    </script>

<script>
$(document).ready(function(){

$("#ejercisios").load("xe.php?id_curso="+<?php echo $_GET['id_curso'];?>+"&nivel=1&id_tema="+<?php echo $_GET['id_tema'];?>);
  $("select[name=nivel1]").change(function(){
            // alert($('select[name=color1]').val());
            // $('input[name=valor1]').val($(this).val());
            var nivel=$(this).val();
            var curso=<?php echo $_GET['id_curso'];?>;
            var tema=<?php echo $_GET['id_tema'];?>;
// alert(curso);
            $("#ejercisios").load("xe.php?id_curso="+curso+"&nivel="+nivel+"&id_tema="+tema);

        });


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
    echo '<script> window.location="../Views/noact.php"; </script>';
  }
 ?>
    