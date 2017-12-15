<?php
session_start();
session_destroy();
$parametros_cookies = session_get_cookie_params(); 
setcookie(session_name(),0,1,$parametros_cookies["path"]);
echo '<script> window.location="../Views/index.php"; </script>';
?>


  <!DOCTYPE html>
  <html>
    <head>
      <meta charset = "utf-8"> 

<script language="javascript">location.href = "index.php";</script>
</body>
</html>