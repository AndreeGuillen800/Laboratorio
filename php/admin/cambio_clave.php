<div class="container" id="cambio_clave" style="display:none;width:70%;border:2px solid #000;margin-top:20px">
        <h2 class="text-center">Cambie su clave</h2>
        <br>
      <form class="form-horizontal" action="admin/sqlcambiarclave.php" method="post">
      <div class="form-group">
        <label class="control-label col-sm-2" for="user">Clave antigua:</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="user" name="oldclave" placeholder="Ingrese la clave antigua">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Clave nueva:</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="pwd" name="clave" placeholder="Ingrese la contrasena">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Repita la clave nueva:</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="pwd" name="claver" placeholder="Ingrese la contrasena">
        </div>
      </div>    
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Confirmar</button>
        </div>
      </div>
    </form> 
   </div>  
