<?php
   
    date_default_timezone_set("America/Lima");
        session_start();
    if(!isset($_SESSION['id']) || !isset($_SESSION['admin']))
    {
       header("Location: ../menu_admin.html");
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //session_start();
        $correo=$_POST["correo"];
          $idd=$_POST["idd"];
       $hora = date("Y-n-j H:i:s");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Entrenamiento</title>
  <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../../images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../../vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../css/util.css">
	<link rel="stylesheet" type="text/css" href="../../css/main.css">
<!--===============================================================================================-->
</head>
<body>
    <div class="container-login100"  style="background-image: url('img/diff4.jpg');">
          <div class="wrap-login100_R">	
            <br>
              <form class="contact100-form validate-form" action="sqlrecomendacion.php" method="post">
                  
                  
                    <label class="m-b-4" for="pwd">Nombre del ejercicio:</label>
                    <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
                      <input type="text" class="input100" id="ejercicio" name="ejercicio"  placeholder="Ingrese el nombre del ejercicio">
                      <span class="focus-input100"></span>
                    </div>            
                 
                    <label class="m-b-4" for="user">Entrenador:</label>                    
                    <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
                      <input type="text" class="input100" id="entrenador" name="entrenador" placeholder="Ingrese nombre del entrenador">
                      <span class="focus-input100"></span>
                    </div>
    
                    <br></br>                 
                    <label class="m-b-4" for="user">Recomendaciones :</label>                    
                    <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
                      <input type="text" class="input100" id="recomendacion" name="recomendacion" placeholder="Ingrese Recomendacion">
                      <span class="focus-input100"></span>
                    </div>                                                   
                    <input type="hidden" name="correo" id="correo" value="<?php echo $correo; ?>">
                    <input type="hidden" name="fecha" id="fecha" value="<?php echo $hora; ?>">
                    <input type="hidden" name="idd" id="fecha" value="<?php echo $idd; ?>">
                     <br></br> 
                    <div class="container-login100-form-btn">
                      <button type="submit" class="login100-form-btn bo1 hov1">Registrar</button>
                  </div>  
              </form>
            <form class="form-horizontal" action="../menu_admin.php" method="post">
         <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="login100-form-btn bo1 hov1">Volver </button>
            </div>
         </div>
         </form>
        </div>
    </div>
    <!--===============================================================================================-->
<script src="../../vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="../../js/main.js"></script>
</body>
</html>