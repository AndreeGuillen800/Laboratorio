<?php
   
    date_default_timezone_set("America/Lima");
    include_once('../basedatos/conectarbd.php');
        session_start();
    if(!isset($_SESSION['id']) || !isset($_SESSION['admin']))
    {
       header("Location: ../menu_admin.html");
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //session_start();
        $mysqli = conectarBD();
        $correo=$_POST["correo"];
        $result = $mysqli->query("SELECT nom_ejercicio,discos_usados,espacio,tiempo_duracion,repeticiones,secuencia,distancia FROM entrenamiento WHERE usuario='$correo'");
        if($result->num_rows==1)
            {
                $row2 = $result->fetch_assoc();
            }      
        
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
              <form class="contact100-form validate-form" action="sqlentrenamiento.php" method="post">
                  
                  
                    <label class="m-b-4" for="pwd">Nombre de ejercicio:</label>
                    <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
                      <input type="text" class="input100" id="ejercicio" name="ejercicio" value="<?php echo $row2["nom_ejercicio"]; ?>" placeholder="Ingrese el ejercicio">
                      <span class="focus-input100"></span>
                    </div>            
                 
                    <label class="m-b-4" for="user">#discos usados:</label>                    
                    <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
                      <input type="text" class="input100" id="discos" name="discos" value="<?php echo $row2["discos_usados"]; ?>" placeholder="Ingrese cantidad de discos usados">
                      <span class="focus-input100"></span>
                    </div>
              
                    <label class="m-b-4" for="user">Espacio:</label>                    
                    <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
                        <select class="input100" id="cars" name="espacio" value="<?php echo $row2["espacio"]; ?>">
                        <option value="abierto">Abierto</option>
                        <option value="cerrado">Cerrado</option>
                        </select>
                    </div>
                    <br></br>                 
                    <label class="m-b-4" for="user">Tiempo de duracion:</label>                    
                    <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
                      <input type="text" class="input100" id="discos" name="duracion" value="<?php echo $row2["tiempo_duracion"]; ?>" placeholder="Ingrese tiempo de duracion">
                      <span class="focus-input100"></span>
                    </div>
                    <label class="m-b-4" for="user">#Repeticiones por dia:</label>                    
                    <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
                      <input type="text" class="input100" id="discos" name="repeticiones" value="<?php echo $row2["repeticiones"]; ?>" placeholder="Ingrese cantidad de repeticiones">
                      <span class="focus-input100"></span>
                    </div>
                    <label class="m-b-4" for="user">Secuencia del ejercicio:</label>                    
                    <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
                        <select class="input100" id="cars" name="secuencia" value="<?php echo $row2["secuencia"]; ?>">
                        <option value="diario">diario</option>
                        <option value="interdiario">interdiario</option>
                        <option value="1 vez por semana">1 vez por semana</option>
                        </select>
                    </div>
                    <br></br>                 
                    <label class="m-b-4" for="user">Distancia minima entre discos(metros):</label>                    
                    <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
                      <input type="text" class="input100" id="distancia" name="distancia" value="<?php echo $row2["distancia"]; ?>" placeholder="Ingrese distancia en metros">
                      <span class="focus-input100"></span>
                    </div>
                    <input type="hidden" name="correoo" value="<?php echo $correo; ?>">
                    
                    
                     <br></br> 
                    <div class="container-login100-form-btn">
                      <button type="submit" class="login100-form-btn bo1 hov1">Registrar</button>
                  </div>
                  
                 
                  
            </form>
        </div>
    </div>
    <!--===============================================================================================-->
<script src="../../vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="../../js/main.js"></script>
</body>
</html>