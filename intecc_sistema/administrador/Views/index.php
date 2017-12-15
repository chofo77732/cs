<?php 
session_start();
  if (isset($_SESSION['nombre']) && $_SESSION['ingreso']=='YES' && $_SESSION['tra']=='1' && $_SESSION['admin']=='1') 
  {
        echo '<script> window.location="principal.php"; </script>';
    }
    ?>


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
        <li><a href="#myPage">HOME</a></li>
        <li><a href="#band">Quienes So</a></li>
        <li><a href="#tour">TOUR</a></li>
        <li><a href="#contact">CONTACT</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">MORE
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Merchandise</a></li>
            <li><a href="#">Extras</a></li>
            <li><a href="#">Media</a></li> 
          </ul>
        </li>
        <li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>
      </ul>
    </div>
  </div>
</nav>

   <img src="../Multimedia/img/example.jpg" width="100%" height="250">


<div class="container">

 <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">INTECC</div>
                    <div class="panel-body"> 
                        <div class="alert alert-danger text-center" style="display:none;" id="error">
                        </div> 
                       <div class="alert alert-success text-center" id="exito" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span></span>
                </div>                  
                        <form role="form">
                            <div class="form-group">
                                <label for="user">Usuario o Email</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                    <input type="text" class="form-control" id="user"  autocomplete="off" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-star"></span></span>
                                    <input type="password" class="form-control" id="password" placeholder="Password">
                                </div>
                            </div>  

                            <!-- <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-star"></span></span>
                                    <input type="password" class="form-control" id="password" placeholder="Password">
                                </div>
                            </div>     -->                 
                            <!-- <button type="button" class="btn btn-primary" onclick='registro();'><span class=""></span> Registrar</button>   -->
                            <button type="button" class="btn btn-primary" onclick='confirmar();'><span class=""></span> Entrar</button>   
                        </form>
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
<br>
<br>


<footer class="text-center">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  <p align="left" >Contactos</p> 
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
</script>

    <script>
        function confirmar(){
            var user = $('#user').val();
            var password = $('#password').val();

if(user=='' || password ==''){
$('#error').html('Campos vacios').show(200).delay(3000).hide(200);
}else{

            $.ajax({
                url:'../Controllers/usuario.php',
                type:'POST',
                data:'user='+user+'&password='+password+"&boton=ingresar"
            }).done(function(resp){
                if(resp=='0'){
                    $('#error').html('Usuario o Email no registrados').show(200).delay(3000).hide(200);
                }else{
          location.href='../Views/principal.php';
                  
                  alert(resp);
                  
                }
            });

}


        }

                function registro(){
            var user=$('#user').val();
            var email=$('#email').val();

            if(user=='' || email ==''){
$('#error').html('Campos vacios').show(200).delay(3000).hide(200);
}else{

                $.ajax({
                    url:'../Controllers/usuario.php',
                    type:'POST',
                    data:'user='+user+'&email='+email+'&boton=registrar'
                }).done(function(respuesta){
                    if (respuesta=='exito') {
                        // $('#exito').html('Su cuenta ha sido registrada').show(200).delay(3000).hide(200);

                         // alert('');
                        alert(respuesta);
                         
                        location.href='../Views/inicio2.php';
                    }
                    else{
                        alert(respuesta);
                        $('#error').html('Email ya registrado').show(200).delay(3000).hide(200);
                    }
                    
                });
            
            }
        }



        
    </script>


</body>
</html>
