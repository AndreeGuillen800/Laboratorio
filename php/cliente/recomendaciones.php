<?php
   
    date_default_timezone_set("America/Lima");
    include_once('../basedatos/conectarbd.php');
        session_start();
    if(!isset($_SESSION['id']) || !isset($_SESSION['admin']))
    {
       header("Location: ../menu_admin.php");
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //session_start();
        $mysqli = conectarBD();
        $correo=$_POST["correo"];
     
      
    }
    require('fechaCastellano.php');
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
                               
                  
                    
                    
                   <?php
                  // $result = $mysqli->query("select *from recomendaciones where usuario like '$correo' and 1 group by fecha_rec desc ");
                   $result = $mysqli->query("select *from recomendaciones where usuario like '$correo' ORDER by fecha_rec desc");
                  
                   if($result->num_rows>=1)
                {
                       
                    while($row = $result->fetch_assoc())
                    {
                        
                        $fecha = date("Y-m-d", strtotime($row["fecha_rec"]));
                        //echo "<form class='contact100-form validate-form' action='sqlentrenamiento.php'>";
                        echo "<h4><label class='m-b-4' >Nombre de ejercicio  :   </label>";
                        echo '<label class="m-b-4" >';
                        echo $row['ejercicio'];
                        echo '</label></h4>';   
                        echo "<br>";
                        echo "<label class='m-b-4'>Dia :   </label>";
                        echo "<label class='m-b-4'  >";
                        echo fechaCastellano($fecha);
                        echo "</label>";
                        echo "</br>";
                        echo '<label class="m-b-4" >Nombre de entrenador  :   </label>';
                        echo '<label class="m-b-4">';
                        echo $row['entrenador'];
                        echo '</label>';  
                        echo "<br>";
                        echo '<label class="m-b-4">Recomendaciones  :   </label>';
                        echo '<p class="text" style="color:black;">';
                        echo $row["recomendaciones"]; 
                        echo "</p>";
                        echo "</br>";
                        echo "</form>";
                        
                    }
                }
                  else
                {
            echo '<script language = javascript>
                alert("No existe recomendaciones. No hay busqueda posible")
                self.location = "../menu_cliente.php"
                </script>';
                    
                }
                    ?>
            
        </div>
    </div>
    <!--===============================================================================================-->
<script src="../../vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="../../js/main.js"></script>
</body>
</html>