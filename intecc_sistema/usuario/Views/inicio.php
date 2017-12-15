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
  

<style>
div#video_player_box{ width:550px; background:#000; margin:0px auto;}
div#video_controls_bar{ background: #333; padding:10px; color:#000; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;}
/*button#playpausebtn{
  background:url("../Multimedia/img/play.png");
  border:none;
  width:24px;
  height:26px;
  cursor:pointer;
  opacity:0.5;
}*/
/*button#playpausebtn:hover{ opacity:1; }
input#seekslider{ width:180px; }
input#volumeslider{ width: 80px;}
input[type='range'] {
    -webkit-appearance: none !important;
    background: #000;
  border:#666 1px solid;
    height:4px;
}
input[type='range']::-webkit-slider-thumb {
    -webkit-appearance: none !important;
    background: #FFF;
    height:15px;
    width:15px;
  border-radius:100%;
  cursor:pointer;
}*/
</style>
<script>
var vid, playbtn, seekslider, curtimetext, durtimetext, mutebtn, volumeslider, fullscreenbtn;
function intializePlayer(id){
  // Set object references
  vid = document.getElementById(id);
  playbtn = document.getElementById("playpausebtn");
  seekslider = document.getElementById("seekslider");
  curtimetext = document.getElementById("curtimetext");
  durtimetext = document.getElementById("durtimetext");
  mutebtn = document.getElementById("mutebtn");
  volumeslider = document.getElementById("volumeslider");
  fullscreenbtn = document.getElementById("fullscreenbtn");
  // Add event listeners
  playbtn.addEventListener("click",playPause,false);
  seekslider.addEventListener("change",vidSeek,false);
  vid.addEventListener("timeupdate",seektimeupdate,false);
  mutebtn.addEventListener("click",vidmute,false);
  volumeslider.addEventListener("change",setvolume,false);
  fullscreenbtn.addEventListener("click",toggleFullScreen,false);
}
window.onload = intializePlayer;
function playPause(){
  if(vid.paused){
    vid.play();
    playbtn.style.background = "../Multimedia/img/play.png";
  } else {
    vid.pause();
    playbtn.style.background = "../Multimedia/img/play.png";
  }
}
function vidSeek(){
  var seekto = vid.duration * (seekslider.value / 100);
  vid.currentTime = seekto;
}
function seektimeupdate(){
  var nt = vid.currentTime * (100 / vid.duration);
  seekslider.value = nt;
  var curmins = Math.floor(vid.currentTime / 60);
  var cursecs = Math.floor(vid.currentTime - curmins * 60);
  var durmins = Math.floor(vid.duration / 60);
  var dursecs = Math.floor(vid.duration - durmins * 60);
  if(cursecs < 10){ cursecs = "0"+cursecs; }
  if(dursecs < 10){ dursecs = "0"+dursecs; }
  if(curmins < 10){ curmins = "0"+curmins; }
  if(durmins < 10){ durmins = "0"+durmins; }
  curtimetext.innerHTML = curmins+":"+cursecs;
  durtimetext.innerHTML = durmins+":"+dursecs;
}
function vidmute(){
  if(vid.muted){
    vid.muted = false;
    mutebtn.innerHTML = "Mute";
  } else {
    vid.muted = true;
    mutebtn.innerHTML = "Unmute";
  }
}
function setvolume(){
  vid.volume = volumeslider.value / 100;
}
function toggleFullScreen(){
  if(vid.requestFullScreen){
    vid.requestFullScreen();
  } else if(vid.webkitRequestFullScreen){
    vid.webkitRequestFullScreen();
  } else if(vid.mozRequestFullScreen){
    vid.mozRequestFullScreen();
  }
}
</script>


</head>
<?php include('nav.html') ?>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50" >
<!-- <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50"  ondragstart="return false" oncontextmenu="return false" onselectstart="return false"> -->



<br>
<br>
<br>
<br>
<div class="Container">
  <div class="row">
<div class="col-xs-2"></div>
<div class="col-xs-8">
<h1>Página de inicio, INTECC</h1>
      
</div>


  </div>

</div>



<!-- <div class="Container">
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="../Multimedia/img/example.jpg" alt="New York" width="1200" height="700">
        <div class="carousel-caption">
          <h3>New York</h3>
          <p>The atmosphere in New York is lorem ipsum.</p>
        </div>      
      </div>

      <div class="item">
        <img src="../Multimedia/img/example.jpg"alt="Chicago" width="1200" height="700">
        <div class="carousel-caption">
          <h3>Chicago</h3>
          <p>Thank you, Chicago - A night we won't forget.</p>
        </div>      
      </div>
    
      <div class="item">
        <img src="../Multimedia/img/example.jpg" alt="Los Angeles" width="1200" height="700">
        <div class="carousel-caption">
          <h3>LA</h3>
          <p>Even though the traffic was a mess, we had the best time playing at Venice Beach!</p>
        </div>      
      </div>
    </div>

    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
</div>
</div>
</div> -->



<!-- <div id="marco" class="container ">
<div class="embed-responsive embed-responsive-16by9">
  <video id="myVideo" class="img-responsive" autoplay="true" controls="true">
                            <source src="../Multimedia/videos/video.mp4" type="video/mp4"></source>
                        </video>

</div>
                      
</div> -->

<!-- <div id="video_player_box">
<video id="my_video" class='img-responsive' >
                              <source src="../../administrador/Multimedia/cursos/video/intro.mp4" type='video/mp4'></source>
                          </video> 

                           <div id="video_controls_bar">
    <button id="playpausebtn">Play/Pause</button><button style="text-align:right" id="fullscreenbtn">Pantalla completa</button>
    <input id="seekslider" type="range" min="0" max="100" value="0" step="1">
    <button id="mutebtn">Volumen</button>
    <span id="curtimetext">00:00</span> / <span id="durtimetext">00:00</span>
    
    <input id="volumeslider" type="range" min="0" max="100" value="100" step="1">
    
  </div>
</div> -->
<!-- <script> 
var vid = document.getElementById("myVideo"); 


function playVid() { 

  var opc=$('#bb').val();
  if(opc=='1'){
vid.play(); 
$('#bb').val('0');
    
  }else{
    vid.pause(); 
    $('#bb').val('1');
    
  }
} 


</script>  -->




                        <br>
<!--                         <input type="text" name="bb" id="bb" value="1">
                        <button  onclick="playVid()" type="button">Play Video</button>
<button onclick="pauseVid()" type="button">Pause Video</button><br> 
 -->

<br>
<br>
<br>



<div  class="Container"  ondragstart="return false" oncontextmenu="return false" onselectstart="return false">
<div class="row">
<div class="col-xs-2"></div>
<div class="col-xs-6">

<video class='img-responsive' >
<source src="#" type='video/mp4'>Video de presentación</source>
</video>

<?php

// header("Content-type: " . 'video/mp4');

//             include('../Models/conexion2.php');

//             $sql = "SELECT * FROM curso"; 

//             $result = mysqli_query($link, $sql);

//             while($row = mysqli_fetch_array($result)){
             

//           echo "
// <video id='".$row['nombre']."' class='img-responsive' >
//                               <source src=\"../../administrador/Multimedia/cursos/video/".$row['video']."\" type='video/mp4'></source>
//                           </video>
//                                                      <div id='video_controls_bar'>
//     <button id='playpausebtn' onclick=\"javascript:intializePlayer('".$row['nombre']."')\" >Play/Pause</button><button style='text-align:right' id='fullscreenbtn'>Pantalla completa</button>
//     <input id='seekslider' type='range' min='0' max='100' value='0' step='1'>
//     <button id='mutebtn'>Mute</button>
//     <span id='curtimetext'>00:00</span> / <span id='durtimetext'>00:00</span>
    
//     <input id='volumeslider' type='range' min='0' max='100' value='100' step='1'>
    
//   </div>
//                           <br>

//           ";
//     }


?> 

    <!-- <button type="button" class="btn btn-info btn-lg" onclick="cargarpag('video.html')">video 1</button> -->

<!-- <button type="button" class="btn btn-info btn-lg" onclick="cargarpag('video2.html')">video 2</button>

<button type="button" class="btn btn-info btn-lg" onclick="cargarpag('video.html')">video 3</button> -->

</div>
</div>

</div>

<!-- <script> 


document.getElementById('block').style.display = 'block';

</script>  -->


<br>
<br>
<br>
<br>
<br>
<br>

<div class="Container">
<div class="row">
<div class="col-xs-10"></div>
<button type="button" class="btn btn-primary btn-lg"  onclick="location='categorias.php'">Conoce más</button>
</div></div>
<!-- Container (The Band Section) -->

<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->


<script type="text/javascript">
$(document).ready(function(){
  
});
  function cargarpag(opc){
    //swicht con opc
    
    $("#marco").load(opc);
  }
</script>


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
    