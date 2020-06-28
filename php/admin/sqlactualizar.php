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
        $id = $_SESSION['id'];
        $result1 = $mysqli->query("SELECT administrativo FROM usuario WHERE id='$id'");
        $row1 = $result1->fetch_assoc();
        $ncliente=array("id"=>$id,"nombre"=>$_POST["nombre"],"apellido_p"=>$_POST["apellido_p"],
        "apellido_m"=>$_POST["apellido_m"],"codigo"=>$_POST["codigo"],"correo_contacto"=>
        $_POST["correoo"],"fecha"=>$_POST["fecha"],"carrera"=>$_POST["carrera"],
        "campus"=>$_POST["campus"],"direccion"=>$_POST["direccion"],"distrito"=>$_POST["distrito"],
        "nacionalidad"=>$_POST["nacionalidad"],"deporte"=>$_POST["deporte"]);
        //Verificando que ningún dato sea empty:
        foreach($ncliente as $x=>$valor)
        {
            if(empty($valor))
            {
                if($row1['administrativo']=='S')
                {
                echo '<script language = javascript>
                alert("No ha ingresado todos los campos. No deje campos vacios.")
                self.location = "../menu_admin.php"
                </script>';
                }
                else
                {
                echo '<script language = javascript>
                alert("No ha ingresado todos los campos. No deje campos vacios.")
                self.location = "../menu_cliente.php"
                </script>';
                }
            }
        }
            $sql="update datos_deportistas set id='".$id."',nombre='".
            $ncliente["nombre"]."',apellido_p='".$ncliente["apellido_p"]."',apellido_m='".$ncliente["apellido_m"]."',codigo='".$ncliente["codigo"]."',correo_contacto='".$ncliente["correo_contacto"]."',fecha='".$ncliente["fecha"]."',
            carrera='".$ncliente["carrera"]."',campus='".$ncliente["campus"]."',direccion='".
            $ncliente["direccion"]."',distrito='".$ncliente["distrito"]."',nacionalidad='".$ncliente["nacionalidad"]."',deporte='".$ncliente["deporte"]."'
            where id='".$id."'";
        //echo $sql;
        //Se actualizan los datos:
 
        if($mysqli->query($sql))
            {
            $sqls="update usuario set usuario='".$ncliente["correo_contacto"]."',codigo='".$ncliente["codigo"]."' where id='".$id."'";
            $mysqli->query($sqls);  
            $sqls="update infodeporte set  usuario='".$ncliente["correo_contacto"]."',deporte='".$ncliente["deporte"]."' where id='".$id."'";
            $mysqli->query($sqls);
            $sqls="update entrenamiento set  usuario='".$ncliente["correo_contacto"]."' where id='".$id."'";
            $mysqli->query($sqls);
            $sqls="update estadistica set  codigo='".$ncliente["codigo"]."' where id='".$id."'";
            $mysqli->query($sqls);
            $sqls="update recomendaciones set  usuario='".$ncliente["correo_contacto"]."' where id='".$id."'";
            $mysqli->query($sqls);
            if($row1['administrativo']=='S')
                {
                echo '<script language = javascript>
                alert("Se insertaron satisfactoriamente los cambios.")
                self.location = "../menu_admin.php"
                </script>';
                }
                else
                {
                echo '<script language = javascript>
                alert("Se insertaron satisfactoriamente los cambios.")
                self.location = "../menu_cliente.php"
                </script>';
                }
            }
            else
            {
                if($row1['administrativo']=='S')
                {
                echo '<script language = javascript>
                alert("Hubo un error. No se actualizaron los datos.")
                self.location = "../menu_admin.php"
                </script>';
                }
                else
                    {
                echo '<script language = javascript>
                alert("Hubo un error. No se actualizaron los datos.")
                self.location = "../menu_cliente.php"
                </script>';
                }
            }
        }

?>

