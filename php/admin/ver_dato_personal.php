<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="ISO-8859-1">
  <title>Editar cliente</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/tabla.css">
  
  <script src="../../js/jquery-3.3.1.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <script src="../../js/menuadmin.js"></script>
</head>
<body>
<?php
        include_once('../basedatos/conectarbd.php');
        session_start();
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $correo=$_POST["correo"];
            $nombre=$_POST['nombre_d'];
            $apellidop=$_POST['apellido_d'];
            $codigo = $_POST['codigo_d'];
            $deporte = $_POST['deporte_d'];
            $mysqli = conectarBD();
            $result = $mysqli->query("SELECT id,nombre,apellido_p,apellido_m,codigo,fecha,carrera,correo_contacto,campus,direccion,distrito,nacionalidad,deporte FROM datos_deportistas WHERE correo_contacto='$correo'");
    
            if($result->num_rows==1)
            {
                $row2 = $result->fetch_assoc();
                $fecha = date("Y-m-d", strtotime($row2["fecha"]));  
            }           
        }
        
?>
    <form class="form-group" action="sqlactualizar.php" method="post" >
            <div class="container-login100" > <!--ventana de emergencia -->   
                      
                    <h1 style="color:Tomato;">Datos personales</h1>
                    <div class="form-group">
                    <label class="col-sm-2 control-label" >Nombre:</label>
                    <div class="col-sm-4">
                          <input type="text" class="form-control" name="nombre" value="<?php echo $row2["nombre"]; ?>" placeholder="Ingrese su nombre">
                    </div>                      
                    <label class="col-sm-2 control-label" >Apellido parterno:</label>
                    <div class="col-sm-4">
                     <input type="text" class="form-control" name="apellido_p" value="<?php echo $row2["apellido_p"]; ?>" placeholder="Ingrese apellido parterno">
                    </div>  
                    <br></br>
                    <label class="col-sm-2 control-label" >Apellido materno:</label>
                    <div class="col-sm-4">
                     <input type="text" class="form-control" name="apellido_m" value="<?php echo $row2["apellido_m"]; ?>" placeholder="Ingrese apellido materno">
                    </div>  
                    <label class="col-sm-2 control-label" >Codigo de alumno:</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="codigo" value="<?php echo $row2["codigo"]; ?>" placeholder="Ingrese codigo">
                    </div>  
                    <br></br>
                    <label class="col-sm-2 control-label" >Correo Personal:</label>
                    <div class="col-sm-4">
                     <input type="text" class="form-control" name="correoo" value= "<?php echo $row2["correo_contacto"]; ?>" placeholder="Ingrese correo">
                    </div>  
                    <label class="col-sm-2 control-label" >Carrera:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="carrera" value="<?php echo $row2["carrera"]; ?>" placeholder="Ingrese su carrera">
                    </div>  
                    <br></br>
                    <label class="col-sm-2 control-label" >Campus:</label>
                    <div class="col-sm-4">
                       <input type="text" class="form-control" name="campus" value="<?php echo $row2["campus"]; ?>" placeholder="Ingrese su campus">
                    </div>  
                    <label class="col-sm-2 control-label">Direccion:</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="direccion" value="<?php echo $row2["direccion"]; ?>" placeholder="Ingrese su direccion">
                    </div>
                    <br></br>
                    <label class="col-sm-2 control-label" >Distrito:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="distrito" value="<?php echo $row2["distrito"]; ?>" placeholder="Ingrese su distrito">
                    </div>  
                    <label class="col-sm-2 control-label" >Nacionalidad:</label>
                    <div class="col-sm-4">
                         <input type="text" class="form-control" name="nacionalidad" value="<?php echo $row2["nacionalidad"]; ?>" placeholder="Ingrese su nacionalidad">
                    </div>  
                    <br></br>
                    <label class="col-sm-2 control-label" >Deporte:</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="deporte" value="<?php echo $row2["deporte"]; ?>" placeholder="Ingrese su deporte">
                    </div>  
                    <label class="col-sm-2 control-label" >Fecha de nacimiento:</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" name="fecha" value="<?php  echo $fecha; ?>" placeholder="Ingrese Fecha">
                        <input type="hidden" name="id" value="<?php echo $row2["id"]; ?>">
                    </div>  
                    </div>
            </div>
    </form>
    <div class="container-login100" >
                    <form class="form-group" action="listado_deportista.php" method="post" >
                    <div class="container-login100">
                        <input type="hidden" name="nombre_d" value="<?php echo $nombre; ?>">
                        <input type="hidden" name="apellido_d" value="<?php echo $apellidop; ?>">
                        <input type="hidden" name="codigo_d" value="<?php echo $codigo; ?>">
                        <input type="hidden" name="deporte_d" value="<?php echo $deporte; ?>">
                        <h3><button type="submit" class="btn-link">Volver</button></h3>
		    </div>
                    </form>
    </div>
                 
               
          
</body>
</html>