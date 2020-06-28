<?php

    include_once('../basedatos/conectarbd.php');
 if ($_SERVER["REQUEST_METHOD"] == "POST"){
          $correo=$_POST['correo'];
          $ejercicio=$_POST['ejercicio'];
          $ejercicio=$_POST['entrenador'];
          $recomendacion=$_POST['recomendacion'];
        
        $ncliente=array("id"=>$_POST["idd"],"usuario"=>$_POST["correo"],"ejercicio"=>$_POST["ejercicio"],"fecha_rec"=>$_POST["fecha"],"entrenador"=>$_POST["entrenador"],"recomendacion"=>$_POST["recomendacion"]);
               
        foreach($ncliente as $x=>$valor)
        {
            if($x="usuario") continue;
            if(empty($valor))
            {
                echo '<script language = javascript>
                alert("No ha ingresado todos los campos. No deje campos vacios")
                self.location = "../menu_admin.php"
                </script>';
            }
        }
        $mysqli = conectarBD();

        $sql = "Insert into recomendaciones (id,usuario,ejercicio,fecha_rec,entrenador,recomendaciones) values(";
        $a=0;
        foreach($ncliente as $x=>$valor)
        {
            if($a==0)
            {
                $sql=$sql."'$valor'";
                $a++;
            }
            else{
                $sql=$sql.","."'$valor'";
            }
        }
        $sql=$sql.")";
        
        if($mysqli->query($sql))
        {
            echo '<script language = javascript>
            alert("Se inserto satisfactoriamente el nuevo cliente")
            self.location = "../menu_admin.php" </script>';
        }
        else
        {
             echo '<script language = javascript>
            alert("No se pudo insertar el nuevo registro. Intente nuevamente")
            self.location = "../menu_admin.php" </script>';
        }
        //Ve
        
        
    }

?>
