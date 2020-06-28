<div class="container" id="mis_datos_personales" style="display:none;width:70%;border:2px solid #000;margin-top:20px">
        <h2 class="text-center" style="color:royalblue">Datos Personales</h2>
        <form class="form-horizontal" action="admin/sqlactualizar.php" method="post">
            <div class="form-group">
                <label class="control-label col-sm-2" for="nombres">Nombres:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="nombre" value="<?php echo $row["nombre"]; ?>" placeholder="Ingrese su nombre">
                </div>
                <label class="control-label col-sm-2" for="apellidos">Apellido Parterno:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="apellido_p" value="<?php echo $row["apellido_p"]; ?>" placeholder="Ingrese apellido parterno">
                </div>
                <br></br>
                <label class="control-label col-sm-2" for="apellidos">Apellido Materno:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="apellido_m" value="<?php echo $row["apellido_m"]; ?>" placeholder="Ingrese apellido materno">
                </div>
                <label class="control-label col-sm-2" for="Codigo">Codigo de alumno:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="codigo" value="<?php echo $row["codigo"]; ?>" placeholder="Ingrese codigo">
                </div>
                <br></br>
                <label class="control-label col-sm-2" for="Correo">Correo personal:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="correoo" value= "<?php echo $row["correo_contacto"]; ?>" placeholder="Ingrese correo">
                </div>                           
                <label class="control-label col-sm-2" for="Carrera">Carrera:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="carrera" value="<?php echo $row["carrera"]; ?>" placeholder="Ingrese su carrera">
                </div> 
                <br></br>
                <label class="control-label col-sm-2" for="Campus">Campus:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="campus" value="<?php echo $row["campus"]; ?>" placeholder="Ingrese su campus">
                </div>
                <label class="control-label col-sm-2" for="Direccion">Direccion:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="direccion" value="<?php echo $row["direccion"]; ?>" placeholder="Ingrese su direccion">
                </div>
                <br></br>
                <label class="control-label col-sm-2" for="Distrito">Distrito:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="distrito" value="<?php echo $row["distrito"]; ?>" placeholder="Ingrese su distrito">
                </div>
                <label class="control-label col-sm-2" for="Nacionalidad">Nacionalidad:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="nacionalidad" value="<?php echo $row["nacionalidad"]; ?>" placeholder="Ingrese su nacionalidad">
                </div>
                <br></br>               
                 <br></br>
                 <label class="control-label col-sm-2" for="Deporte">Deporte:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="deporte" value="<?php echo $row["deporte"]; ?>" placeholder="Ingrese su deporte">
                </div>
                <label class="control-label col-sm-2" for="Fecha"  style="color:graytext">Fecha de nacimiento:</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control" name="fecha" value="<?php  echo $fecha; ?>" placeholder="Ingrese Fecha">
                </div>
                
                <br></br>               
                 <br></br>  
                
               <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default ">Actualizar</button>
                </div>
               </div>
    </form>
   </div>
