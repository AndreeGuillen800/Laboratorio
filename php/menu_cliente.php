<?php
    session_start();
    if(!isset($_SESSION['id']) || !isset($_SESSION['admin']))
    {
       header("Location: ../index.html");
    }
    include_once('basedatos/conectarbd.php');
    $id = $_SESSION['id'];
    $mysqli = conectarBD();
    $result1 = $mysqli->query("SELECT administrativo FROM usuario WHERE id='$id'");
    $result2 = $mysqli->query("SELECT deporte,puesto,entrenador,c_nacional,c_internacional,an_entre FROM infodeporte WHERE id='$id'");
    if ($result1->num_rows == 1) {
            $row1 = $result1->fetch_assoc();
            $admin=$row1['administrativo'];
    }
    if ($result2->num_rows == 1) {
            $row2 = $result2->fetch_assoc();
    }
    $result = $mysqli->query("SELECT nombre,apellido_p,apellido_m,codigo,fecha,carrera,correo_contacto,campus,direccion,distrito,nacionalidad,deporte FROM datos_deportistas WHERE id='$id'");
    if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $_SESSION['nombre']=$row['nombre'];
            $_SESSION['apellidop']=$row['apellido_p'];
            $_SESSION['apellidom']=$row['apellido_m'];
            $correo=$row['correo_contacto'];
            $codigo=$row['codigo'];
            $fecha = date("Y-m-d", strtotime($row["fecha"]));    }

    include "timeout.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Modo cliente</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/ventana.css">  
  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../JQUERY/menucliente.js"></script>
</head>
<body>
    <style>
        body {
	background-image: url("../img/dep.jpg");
        background-repeat:no-repeat;
        background-size:cover;
        } 
       a {
        color: #16c616;
        }
        h2 {
            text-align: center;
        }
</style>
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Menu para clientes</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" >DEPORTISTA<span class="caret"></a>
          <ul class="dropdown-menu">
            <li><a href="#" id="datospersonales">Datos personales</a></li>
            <li><a href="#miModall" id="Informaciondesudeporte">Informacion de su deporte</a></li>                    
        </ul>
      </li>
      
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">ESTADISTICA<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#" id="mirendimiento">Mi rendimiento</a></li>
          <li>
          <form class="form-horizontal" action="cliente/recomendaciones.php" method="post">
              <input type="hidden" name="correo" value="<?php echo $row["correo_contacto"];?>"></td>
          <button  class="btn" type="submit">Recomendacion del entrenador</button>
            </form></li>
        </ul>
      </li>
      <li><a href="#" id="cambiarclave">Cambio de clave</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a><span class="glyphicon glyphicon-user"></span>  <?php echo "Bienvenido ".$_SESSION['nombre']." ".$_SESSION['apellidop']." ".$_SESSION['apellidom'];?></a></li>
      <li><a href="salir_sesion.php"><span class="glyphicon glyphicon-log-in"></span> Cerrar Sesi&oacute;n</a></li>
    </ul>
  </div>
</nav>
<!--                        mi_deporte.php-->
                <div id="miModall" class="modall container-login100" > <!--ventana de emergencia -->
                  <div class="modall-contenido">                    
                    <h2>Deporte</h2>
                    
                    <label class="m-b-4" for="pwd">Deporte:</label>
                    <div class="wrap-input100">
                      <input type="text" class="input100 form-control" value="<?php echo $row2["deporte"]; ?>" placeholder="El entrenador no ha ingresado datos">
                    </div>  
                    <label class="m-b-4" for="pwd">Puesto/posicion:</label>
                    <div class="wrap-input100">
                      <input type="text" class="input100 form-control" value="<?php echo $row2["puesto"]; ?>" placeholder="El entrenador no ha ingresado datos">
                    </div>  
                    <label class="m-b-4" for="pwd">Nombre de su Entrenador:</label>
                    <div class="wrap-input100">
                      <input type="text" class="input100 form-control" value="<?php echo $row2["entrenador"]; ?>" placeholder="El entrenador no ha ingresado datos">
                    </div>  
                    <label class="m-b-4" for="pwd">#Competencias nacionales:</label>
                    <div class="wrap-input100">
                      <input type="text" class="input100 form-control" value="<?php echo $row2["c_nacional"]; ?>" placeholder="El entrenador no ha ingresado datos">
                    </div>  
                    <label class="m-b-4" for="pwd">#competencias internaciones:</label>
                    <div class="wrap-input100">
                      <input type="text" class="input100 form-control" value="<?php echo $row2["c_internacional"]; ?>" placeholder="El entrenador no ha ingresado datos">
                    </div>  
                    <label class="m-b-4" for="pwd">A&ntilde;os de entrenamiento:</label>
                    <div class="wrap-input100">
                      <input type="text" class="input100 form-control" value="<?php echo $row2["an_entre"]; ?>" placeholder="El entrenador no ha ingresado datos">
                    </div>  
                    
                    <div class="container-login100-form-btn">
                        <h3><a href="#">Regresar</a></h3>
                    </div>
                  </div>  
                </div>

<!--                                 FINNNNNNNNNNNNNNNNNNNNNNN-->
        <div class="container" id="titulo" style="display:table">
          <h3>Seleccione una opci&oacute;n para ver o modificar datos</h3>
          <p>Haga <i>click<i/> en cada opci&oacute;n para abrir la ventana de men&uacute; de opciones
             respectiva.</p>
          <img src="../img/upc.jpg" alt="Logo UPC" id="logo" style="display:none"/>
        </div>

<?php
     
    include_once('cliente/buscar_rendimiento.php');
    include_once('admin/cambio_clave.php');     //
    include_once('admin/mis_datos_personales.php');      //      
    ?>

</body>
</html>
