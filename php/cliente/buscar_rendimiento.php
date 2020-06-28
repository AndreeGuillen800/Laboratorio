<div class="container" id="buscar_rendimiento" style="display:none;width:60%;border:2px solid #000;margin-top:20px">
        <h2 class="text-center">B&uacute;squeda por fechas</h2>
        <form class="form-horizontal" action="cliente/graficar_cliente.php" method="post">
            <div class="form-group">
                <label class="control-label col-sm-2" for="nombre">Rango de fechas:</label>
                <br></br>
                <label class="control-label col-sm-2" for="Desde">Desde:</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control" id="Desde" name="desde" placeholder="">
                </div>                
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" id="Hasta" for="Hasta">Hasta:</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control" name="hasta" placeholder="">
                </div>                
            </div>
            <input type="hidden" name="correo" id="correog" value="<?php echo $correo; ?>">
            <input type="hidden" name="codigo" id="codigo" value="<?php echo $codigo; ?>">
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" id="btnn" class="btn btn-default">Ver Grafico </button>
                </div>
            </div>
    </form>
   </div>





