<div class="container" id="busqueda_deportista_2" style="display:none;width:60%;border:2px solid #000;margin-top:20px">
        <h2 class="text-center">B&uacute;squeda de deportista</h2>
        <form class="form-horizontal" action="admin/listado_deportista_entreno.php" method="post">
            <div class="form-group">
                <label class="control-label col-sm-2" for="nombre">Nombre:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="nombre_d" placeholder="">
                </div>
                <label class="control-label col-sm-2" for="deporte">Deporte:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="deporte_d" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="codigo">Codigo:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="codigo_d" placeholder="">
                </div>
                <label class="control-label col-sm-2" for="apellido">Apellido:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="apellido_d" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Buscar </button>
                </div>
            </div>
    </form>
   </div>

