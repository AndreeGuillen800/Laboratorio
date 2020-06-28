<?php
    $usuario="";$clave="";
    date_default_timezone_set("America/Lima");
    include_once('basedatos/conectarbd.php');
    $mysqli = conectarBD();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario=$_POST['usuario'];
        $clave = $_POST['clave'];
        if (strlen ($clave) < 6)
        {
            echo '<script language = javascript>
            alert("Password debe ser mayor a 6 digitos.")
            self.location = "../index.html" </script>';
        }
        $result = $mysqli->query("SELECT *FROM  usuario WHERE usuario='$usuario' and clave=aes_encrypt('$clave','upc')");
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            session_start();
            $_SESSION['id']=$row['id'];
            $_SESSION['hora_ingreso']=date("Y-n-j H:i:s");
            $_SESSION['codig']=$row['codigo'];
            $_SESSION['admin']=$row['administrativo'];
            if($row['administrativo']=='S')
                //header("Location: menuadmin.php");
                header("Location: menu_admin.php");
            else if($row['administrativo']=='N')
                header("Location: menu_cliente.php");
            else
                header("Location: ../index.html");
        }
        else{
            echo '<script language = javascript>
            alert("Usuario o Password errados, por favor verifique sus datos.")
            self.location = "../index.html" </script>';
        }
    }

?>
