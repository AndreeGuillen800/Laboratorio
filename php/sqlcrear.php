<?php
    $usuario="";$clave="";
    date_default_timezone_set("America/Lima");
    include_once('basedatos/conectarbd.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
//        $nombre=$_POST['nombre'];
//        $apellidop=$_POST['apellido_p'];
//        $apellidom=$_POST['apellido_m'];
          $codigo=$_POST['codigo'];
          $correo=$_POST['email'];
          $clave=$_POST['clave'];
//        $fecha=$_POST['fecha'];
//        $carrera=$_POST['carrera'];
//        $distrito=$_POST['distrito'];
//        $direccion=$_POST['direccion'];
//        $campus=$_POST['campus'];
          $deporte=$_POST['deporte'];
        
        
      if (strlen ($clave) < 6)
       {
            echo '<script language = javascript>
            alert("Password debe ser mayor a 6 digitos.")
            self.location = "../registro.html" </script>';
        }
          
        $ncliente=array("id"=>"","nombre"=>$_POST["nombre"],"apellido_p"=>$_POST["apellido_p"],"apellido_m"=>$_POST["apellido_m"],"codigo"=>$_POST["codigo"],"correo_contacto"=>$_POST["email"],"fecha"=>$_POST["fecha"],"carrera"=>$_POST["carrera"],"campus"=>$_POST["campus"],"direccion"=>$_POST["direccion"],"distrito"=>$_POST["distrito"],"nacionalidad"=>$_POST["pais"],"deporte"=>$_POST["deporte"]);
               
        
        
        foreach($ncliente as $x=>$valor)
        {
            if($x="id") continue;
            if(empty($valor))
            {
                echo '<script language = javascript>
                alert("No ha ingresado todos los campos. No deje campos vacios")
                self.location = "../registro.html"
                </script>';
            }
        }
        $mysqli = conectarBD();
        //Verificar que el correo electrónico no sea repetido
        $result = $mysqli->query("select correo_contacto from datos_deportistas where correo_contacto='$correo'");
        if($result->num_rows == 1){
           
            echo '<script language = javascript>
            alert("El correo ya existe y se encuentra registrado en el sistema")
            self.location = "../registro.html" </script>';
        }
        //Verificiar que el la empresa no sea repetida
        $result = $mysqli->query("select codigo from datos_deportistas where codigo='$codigo'");
        $maximo=0;
        $row=$result->fetch_assoc();
        if($result->num_rows == 1){           
            echo '<script language = javascript>
            alert("El codigo ya existe y se encuentra registrado en el sistema")
            self.location = "../registro.html" </script>';
        }
        else {//La empresa es nueva hay que crear idEmpresa nuevo
                $result = $mysqli->query("SELECT id FROM datos_deportistas where 1 group by id desc");
                $row = $result->fetch_assoc();
                $maximo=$row['id'];
                $maximo++;
                $ncliente['id'] = $maximo;
        }
        
        
        $sql = "Insert into datos_deportistas (id,nombre,apellido_p,apellido_m,codigo,correo_contacto,fecha,carrera,campus,direccion,distrito,nacionalidad,deporte) values(";
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
           /*Hay que insertar también el nuevo cliente en la tabla Usuario*/
           
            $sqls="insert into Usuario (id,usuario,clave,codigo,administrativo) values ('$maximo','$correo',aes_encrypt('$clave','upc'),'$codigo','N')";
            $mysqli->query($sqls);
            $sqls="insert into infodeporte (id,usuario,deporte,puesto,entrenador,c_nacional,c_internacional,an_entre) values ('$maximo','$correo','$deporte','','','','','')";
            $mysqli->query($sqls);
            $sqls="insert into entrenamiento (usuario,id,nom_ejercicio,discos_usados,espacio,tiempo_duracion,repeticiones,secuencia,distancia) values ('$correo','$maximo','','','','','','','')";
            $mysqli->query($sqls);
//echo $sqls;
            echo '<script language = javascript>
            alert("Se inserto satisfactoriamente el nuevo cliente")
            self.location = "../index.html" </script>';
        }
        else
        {
             echo '<script language = javascript>
            alert("No se pudo insertar el nuevo registro. Intente nuevamente")
            self.location = "../index.html" </script>';
        }
        //Ve
        
        
    }

?>
