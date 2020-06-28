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
    if ($result1->num_rows == 1) {
            $row1 = $result1->fetch_assoc();
            $_SESSION['admin']=$row1['administrativo'];
    }
    $result = $mysqli->query("SELECT nombre,apellido_p,apellido_m,codigo,fecha,carrera,correo_contacto,campus,direccion,distrito,nacionalidad,deporte FROM datos_deportistas WHERE id='$id'");
    if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $_SESSION['nombre']=$row['nombre'];
             $_SESSION['correo']=$row['correo_contacto'];
             $codigo=$row['codigo'];
             $correo=$row['correo_contacto'];
            $_SESSION['apellidop']=$row['apellido_p'];
            $_SESSION['apellidom']=$row['apellido_m'];
            $fecha = date("Y-m-d", strtotime($row["fecha"]));
    }
    $a=0;
    include "timeout.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="ISO-8859-1">
  <title>Men&uacute; administrativo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../JQUERY/menuadmin.js"></script>
</head>
<body>
    <style>
        body {
	background-image: url("../img/dep.jpg");
        background-repeat:no-repeat;
        background-size:cover;
        } 
</style>
  <nav class="navbar navbar-inverse navbar-collapse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Modo Administrador</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">DEPORTISTA<span class="caret"></a>
          <ul class="dropdown-menu">
            <li><a href="#" id="datospersonales">Datos personales</a></li>
            <li><a href="#" id="definirentrenamiento">Definir entranamiento</a></li>
            
        </ul>
      </li>
      
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">ESTADISTICA<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#" id="buscardeportista">Buscar deportista</a></li>
        </ul>
      </li>
      <li><a href="#" id="cambiarclave">Cambio de clave</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a><span class="glyphicon glyphicon-user"></span> <?php echo "Bienvenido ".$_SESSION['nombre']." ".$_SESSION['apellidop']." ".$_SESSION['apellidom'];?></a></li>
      <li><a href="salir_sesion.php"><span class="glyphicon glyphicon-log-in"></span> Cerrar Sesi&oacute;n</a></li>
    </ul>
  </div>
</nav>

<div class="container" id="titulo" style="display:table">
  <h3>Seleccione una opci&oacute;n para ver o modificar datos</h3>
  <p>Haga <i>click<i/> en cada opci&oacute;n para abrir la ventana de men&uacute; de opciones
     respectiva.</p>
  <img src="../img/upc.jpg" alt="Logo UPC" id="logo" style="display:none"/>
</div>
<?php
    
    include_once('admin/busqueda_deportista_estadistica.php');   
    include_once('admin/cambio_clave.php');     //Menu para buscar a los clientes
    include_once('admin/busqueda_deportista_2.php');      //Menu para cambiar la clave del administrador
    include_once('admin/busqueda_deportista.php'); //Menu para activar o desactivar al cliente
    include_once('admin/mis_datos_personales.php');      //Ingresar nuevo producto
    ?>
</body>
</html>

