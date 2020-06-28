<?php
    date_default_timezone_set("America/Lima");
    include_once('basedatos/conectarbd.php');
    $hoy=date('Y-m-d H:i:s');
    $mysqli=conectarBD();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
          
        parse_str(file_get_contents("php://input"),$post_data);
        if(isset($post_data['codigo']) && isset($post_data['ejercicio'])
              && isset($post_data['tiempo_promedio'])  
                && isset($post_data['N_luz_encendido'])
                && isset($post_data['N_color_azul'])
                && isset($post_data['N_apgar_luz'])
                && isset($post_data['Duracion'])
                && isset($post_data['Tiempo_max']))
        {
            $codigo = $post_data['codigo'];
            $ejercicio = $post_data['ejercicio'];
            $tiempo_promedio = $post_data['tiempo_promedio'];
            $N_luz_encendido=$post_data['N_luz_encendido'];
            $N_color_azul=$post_data['N_color_azul'];
            $N_apgar_luz=$post_data['N_apgar_luz'];
            $Duracion=$post_data['Duracion'];
            $Tiempo_max=$post_data['Tiempo_max'];
            $Fecha=$hoy;
            $result1 = $mysqli->query("SELECT id FROM usuario WHERE codigo='$codigo'");
            if ($result1->num_rows == 1) {
            $row1 = $result1->fetch_assoc();
            $idd=$row1['id'];
            
            $sqls="insert into estadistica (id,codigo,ejercicio,tiempo_promedio,N_luz_promedio,N_color_azul,N_apgar_luz,Duracion,Tiempo_max,fecha) values ('$idd','$codigo','$ejercicio','$tiempo_promedio','$N_luz_encendido','$N_color_azul','$N_apgar_luz','$Duracion','$Tiempo_max','$Fecha')";
            if($mysqli->query($sqls))
             {
             header('Content-Type: application/json');     
             $json=array("Respuesta","OK");
             echo json_encode($json);
             $mysqli->close();
             }
             else
             {
             header('Content-Type: application/json');     
             $json=array("Respuesta","No se pudo guardar");
              echo json_encode($json);
              $mysqli->close();
             }         
            }
            else
            {
                header('Content-Type: application/json');     
             $json=array("Respuesta","Codigo erroneo");
              echo json_encode($json);
              $mysqli->close();
            }
        }  
        else
        {   
             header('Content-Type: application/json');
             $json=array("Respuesta","Falta parametros");
             echo json_encode($json);
             $mysqli->close();
        }
       
    }
 else {
     header('Content-Type: application/json');
     $json=array("Respuesta","NO ES POST");     
     echo json_encode($json);
     $mysqli->close();
}

?>
