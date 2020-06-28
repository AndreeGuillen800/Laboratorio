<?php
    /*Hay que modificar el cliente pero primero verificar lo siguiente:
    1. Que no hayan campos vací­os.
    2. Si han cambiado otros datos simplemente se hará un update de la tabla
     * Clientes
    3. Si ha cambiado el correo entonces se hará un update de la tabla Usuario.
    4. Si ha cambiado la empresa se deberá ver si esta existe para asignarle un
    nuevo idempresa o utilizar el de una empresa existente
    */
    date_default_timezone_set("America/Lima");
    session_start();
    include_once('../basedatos/conectarbd.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
        $mysqli = conectarBD();
        $correo = $_POST['correoo'];
        $ncliente=array("correo"=>$correo,"nom_ejercicio"=>$_POST["ejercicio"],"discos_usados"=>$_POST["discos"],
        "espacio"=>$_POST["espacio"],"tiempo_duracion"=>$_POST["duracion"],"repeticiones"=>
        $_POST["repeticiones"],"secuencia"=>$_POST["secuencia"],"distancia"=>$_POST["distancia"]);
        //Verificando que ningún dato sea empty:
        foreach($ncliente as $x=>$valor)
        {
            if(empty($valor))
            {
                echo '<script language = javascript>
                alert("No ha ingresado todos los campos. No deje campos vacios.")
                self.location = "../menu_admin.php"
                </script>';
            }
        }
           $sql="update entrenamiento set  distancia='".$ncliente["distancia"]."',secuencia='".$ncliente["secuencia"]."',repeticiones='".$ncliente["repeticiones"]."',tiempo_duracion='".$ncliente["tiempo_duracion"]."',espacio='".$ncliente["espacio"]."',discos_usados='".$ncliente["discos_usados"]."',nom_ejercicio='".$ncliente["nom_ejercicio"]."' where usuario='".$correo."'";
        //echo $sql;
        //Se actualizan los datos:
 
        if($mysqli->query($sql))
            {
                echo '<script language = javascript>
                alert("Se insertaron satisfactoriamente los cambios.")
                self.location = "../menu_admin.php"
                </script>';
                
            }
            else
            {
                echo '<script language = javascript>
                alert("Hubo un error. No se actualizaron los datos.")
                self.location = "../menu_admin.php"
                </script>';
            }
        }

?>


