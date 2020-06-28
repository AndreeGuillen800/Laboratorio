<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="ISO-8859-1">
  <title>Listado de clientes</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/tabla.css">
  <link rel="stylesheet" href="../../css/ventana.css">
  <script src="../../js/jquery-3.3.1.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <script src="../../js/menuadmin.js"></script>
</head>
<body>
    <div class ="container">
        <div class="panel-heading">
        <h2 class="text-center">Resultados de b&uacute;squeda</h2>
        </div>
    <?php
    /*Hay que buscar al cliente a partir de 4 campos:
    1.Nombres, apellidos, empresa o distrito.
    2.Puede que solo uno de ellos esté lleno. Se usará ese campo para la búsqueda.
    3.Si más de un campo NO se encuentra vací­o entonces se hará la búsqueda con esos
      campos
   */
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
        $nombre=$_POST['nombre_d'];
        $apellidop=$_POST['apellido_d'];
        $codigo = $_POST['codigo_d'];
        $deporte = $_POST['deporte_d'];
        /*Buscando cuantos campos están vacíos*/
        $vacios=0;
        $contador=0;
        foreach($_POST as $x=>$valor)
        {
            if(empty($valor))
            {
                $vacios++;
            }
        }
        if($vacios==4){
            
             echo '<script language = javascript>
                alert("Todos los campos estan vacios. No hay busqueda posible")
                self.location = "../menu_admin.php"
                </script>';
        }
        else{
            /*Le damos prioridad al deporte. Si el deporte existe se devolverá un campo*/
            if(!empty($deporte))
            {
                $result = $mysqli->query("select *from datos_deportistas where deporte like '$deporte'");
                if($result->num_rows>=1)
                {
                    ?>
                    <h4 class="text-center">Se han encontrado: <?php echo $result->num_rows;?>
                      registros</h4>
                        <table class="container table-bordered">
                            <tr>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Apellido Parterno</th>
                                <th>Deporte</th>
                                <th>Ver detalle</th>                               
                            </tr>
                    <?php
                    while($row = $result->fetch_assoc())
                    {
                        echo "<tr>";
                        echo "<form action='ver_dato_personal.php' method='post'>";
                        echo "<td>".$row['codigo']."</td>";
                        echo "<td>".$row['nombre']."</td>";
                        echo "<td>".$row['apellido_p']."</td>";
                        echo "<td>".$row['deporte']."</td>";
                        echo '<input type="hidden" name="correo" value='.$row['correo_contacto'].'></td>';
                        echo '<input type="hidden" name="nombre_d" value='.$nombre.'></td>';
                        echo '<input type="hidden" name="apellido_d" value='.$apellidop.'></td>';
                        echo '<input type="hidden" name="codigo_d" value='.$codigo.'></td>';
                        echo '<input type="hidden" name="deporte_d" value='.$deporte.'></td>'; 
                        echo "<td><button class='btn-link' type=submit>Ver</button></td>";
                        echo "</form>";
                        echo "</tr>";
                    }
                   echo "<br>";
                    echo "<tr>";
                   echo "<form class='form-group' action='../../php/menu_admin.php'>";
                   echo "<td><button type='submit' class='btn-link'>Volver</button></td>";
                   echo "</form>";
                   echo "</tr>";
                   echo "</br>";
                }
                else
                {
                    echo "No existe ning&uacute;n registro con ese deporte.";
                }
            }
            /*Entonces podemos buscar por distrito,nombres o apellidos
            son 7 posibles combinaciones, ya que al menos 2 de 3 variables podrÃ­an
            estar empty.*/
            else{
                if(empty($nombre) && empty($apellidop))//Solo ingresa el codigo
                {
                    $result = $mysqli->query("select *from datos_deportistas where codigo like '$codigo'");
                }
                else if(empty($nombre) && empty($codigo))//Solo ingresa los apellidos
                {
                    $result = $mysqli->query("select *from datos_deportistas where apellido_p like '$apellidop'");                    
                }
                else if(empty($apellidop) && empty($codigo))//Solo ingresa el nombre
                {
                    $result = $mysqli->query("select *from datos_deportistas where nombre like '$nombre'");
                }
                else if(empty($nombre))//Ingresa apellidos y distrito
                {
                    $result = $mysqli->query("select *from datos_deportistas where codigo like '$codigo' and apellido_p like '$apellidop'");
                }
                else if(empty($codigo))//Ingresa nombre y apellidos
                {
                    $result = $mysqli->query("select *from datos_deportistas where nombre like '$nombre' and apellido_p like '$apellidop'");
                }
                else if(empty($apellidop))//Ingres< nombre y distrito
                {
                    $result = $mysqli->query("select *from datos_deportistas where nombre like '$nombre' and codigo like '$codigo'");
                }
                else//Ingresa los tres
                {
                    $result = $mysqli->query("select *from datos_deportistas where codigo like '$codigo' and nombre like '$nombre' and apellido_p like '$apellidop'");
                }
                if($result->num_rows>0)
                {
                    /*Hay datos para mostrar*/
                    ?>
                        <h4 class="text-center">Se han encontrado: <?php echo $result->num_rows;?>
                        registros</h4>
                        <table class="table table-hover table-bordered">
                            <tr>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Apellido Parterno</th>
                                <th>Deporte</th>
                                <th>Ver detalle</th>                               
                            </tr>
                    <?php
                    while($row = $result->fetch_assoc())
                    {
                        echo "<tr>";
                        echo "<form action='ver_dato_personal.php' method='post'>";
                        echo "<td>".$row['codigo']."</td>";
                        echo "<td>".$row['nombre']."</td>";
                        echo "<td>".$row['apellido_p']."</td>";
                        echo "<td>".$row['deporte']."</td>";
                        echo '<input type="hidden" name="correo" value='.$row['correo_contacto'].'></td>';
                        echo '<input type="hidden" name="nombre_d" value='.$nombre.'></td>';
                        echo '<input type="hidden" name="apellido_d" value='.$apellidop.'></td>';
                        echo '<input type="hidden" name="codigo_d" value='.$codigo.'></td>';
                        echo '<input type="hidden" name="deporte_d" value='.$deporte.'></td>';                       
                        echo "<td><button class='btn-link' type=submit>Ver</button></td>";
                        echo "</form>";
                        echo "</tr>";
                    }
                    echo "<br>";
                    echo "<tr>";
                   echo "<form class='form-group' action='../../php/menu_admin.php'>";
                   echo "<td><button type='submit' class='btn-link'>Volver</button></td>";
                   echo "</form>";
                   echo "</tr>";
                   echo "</br>";
                }
                else{
                    echo "No existen registros con los valores ingresados";
                }
            }
        }
    }

?>
            </table>
        </div>      
    
    </body>
</html>

