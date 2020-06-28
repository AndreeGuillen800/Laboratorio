<?php
session_start();
 if ($_SERVER["REQUEST_METHOD"] == "POST") {         
         
        //$desde=$_POST['desde'];
        //$hasta=$_POST['hasta'];
        ///////////
        $correo=$_POST['correo'];
        $codigo=$_POST['codigo'];
        $desde = date("Y-m-d", strtotime($_POST["desde"]));
        $hasta = date("Y-m-d", strtotime($_POST["hasta"]));  
        $desde = $desde." 00:00:00";
        $hasta = $hasta." 23:59:00";
 include_once('../basedatos/conectarbd.php');
        $mysqli = conectarBD();
        $result = $mysqli->query("select *from estadistica where codigo like '$codigo' and fecha BETWEEN '$desde' AND '$hasta'");   
        $valoresY = array();
        $valoresX = array();
        $valoresY2 = array();
        $valoresY3 = array();
        if ($result->num_rows == 0){
            echo '<script language = javascript>
            alert("No tienes datos.")
            self.location = "../menu_cliente.php" </script>';
        }
         while($row2 = $result->fetch_assoc())
           {       
               $valoresY[] = $row2['tiempo_promedio']; //monto
               $valoresY2[] = $row2['N_color_azul']; //monto
               $valoresY3[] = $row2['N_apgar_luz']; //monto
               $valoresX[] = date("Y-m-d", strtotime($row2["fecha"]));  //fecha
               
               
           }
           
	$datosX = json_encode($valoresX);
	$datosY = json_encode($valoresY);
        $datosY2 = json_encode($valoresY2);
        $datosY3 = json_encode($valoresY3);
        }
?>
<script type="text/javascript">

		function crearCadenaLineal(json){
			var parsed = JSON.parse(json);
			var arr = [];
			for (var x in parsed) {
				arr.push(parsed[x]);
			}

			return arr;
		}

	</script>
<!DOCTYPE html>
<html>
<head>
        <title>Estadistica</title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<script src="librerias/jquery-3.3.1.min.js"></script>
	<script src="librerias/plotly-latest.min.js"></script>
</head>
<body>
	
										
				
<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel panel-heading">
Graficas del deportista
</div>
<div class="panel panel-body">
<div class="col-sm-6">
	<div id="graficaLineal"></div>
        <script type="text/javascript">

		datosX = crearCadenaLineal('<?php echo $datosX; ?>');
		datosY = crearCadenaLineal('<?php echo $datosY; ?>');

		var trace1 = {
			x: datosX,
			y: datosY,
			type: 'scatter',
			line: {
				color: 'red',
				width: 2
			},
			marker: {
				color: 'red',
				size: 12
			}
		}

		var layout = {
			title: 'tiempo prom. de reaccion',
			xaxis: {
				title: 'Fechas'
			},
			yaxis: {
				title: 'Promedio'
			}
		};

		var data = [trace1];
		Plotly.newPlot('graficaLineal', data, layout);
	</script>
</div>
<div class="col-sm-6">
	<div id="graficaLineal1"></div>
	<script type="text/javascript">

		datosX = crearCadenaLineal('<?php echo $datosX; ?>');
		datosY = crearCadenaLineal('<?php echo $datosY2; ?>');

		var trace1 = {
			x: datosX,
			y: datosY,
			type: 'scatter',
			line: {
				color: 'red',
				width: 2
			},
			marker: {
				color: 'red',
				size: 12
			}
		}

		var layout = {
			title: 'Errores de reaccion al color',
			xaxis: {
				title: 'Fechas'
			},
			yaxis: {
				title: 'Cantidad de errores'
			}
		};

		var data = [trace1];
		Plotly.newPlot('graficaLineal1', data, layout);
	</script>
</div>
<div class="col-sm-7">
	<div id="graficaLineal2"></div>
    <script type="text/javascript">

		datosX = crearCadenaLineal('<?php echo $datosX; ?>');
		datosY = crearCadenaLineal('<?php echo $datosY3; ?>');

		var trace1 = {
			x: datosX,
			y: datosY,
			type: 'scatter',
			line: {
				color: 'red',
				width: 2
			},
			marker: {
				color: 'red',
				size: 12
			}
		}

		var layout = {
			title: 'Veces que no reacciono cuando la luz correcta se prendio en el disco',
			xaxis: {
				title: 'Fechas'
			},
			yaxis: {
				title: ' Numero de veces'
			}
		};

		var data = [trace1];
		Plotly.newPlot('graficaLineal2', data, layout);
	</script>
        </div>
    <div class="col-sm-7">
<!--        <form class="form-horizontal" action="ingresar_recomendaciones.php" method="post">
         <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class=" btn-default">Insertar Recomendacion </button>
            </div>
         </div>
        </form>-->
        <form class="form-horizontal" action="../menu_cliente.php" method="post">
         <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class=" btn-default">Volver </button>
            </div>
         </div>
         </form>
    </div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>