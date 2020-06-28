<?php
//Vamos a cambiar la clave del usuario administrador
session_start();
if(!isset($_SESSION['id']) || !isset($_SESSION['admin']))
{
       header("Location: ../index.html");
}
include_once('../basedatos/conectarbd.php');
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $mysqli = conectarBD();
     $id = $_SESSION['id'];
     $clave_vieja = trim($_POST["oldclave"]);
     $clave_nueva = trim($_POST["clave"]);
     $clave_nueva_rep = trim($_POST["claver"]);
              
     
     /*Primero debemos saber si la clave vieja es la correcta, de no serlo
        no se puede cambiar de contraseña*/
     $result1 = $mysqli->query("SELECT administrativo, usuario FROM usuario WHERE id='$id'");
     $row1 = $result1->fetch_assoc();
     $sql = "select usuario from usuario where usuario='".$row1['usuario']."' and clave=aes_encrypt('$clave_vieja','upc')";
     $result = $mysqli->query($sql);
     if (strlen ($clave_vieja) < 6 || strlen ($clave_nueva) < 6 || strlen ($clave_nueva_rep) < 6)
        {
             if($row1['administrativo']=='S')
         {
         echo '<script language = javascript>
            alert("Password debe ser mayor a 6 digitos.")
            self.location = "../menu_admin.php" </script>';
         }
         else
             {
             echo '<script language = javascript>
            alert("Password debe ser mayor a 6 digitos.")
            self.location = "../menu_cliente.php" </script>';
         }            
        }
     if ($result->num_rows == 0 ) {//Si no coincide el usuario con su contraseña actual
         if($row1['administrativo']=='S')
         {
         echo '<script language = javascript>
            alert("Su clave actual es errada")
            self.location = "../menu_admin.php" </script>';
         }
         else
             {
         echo '<script language = javascript>
            alert("Su clave actual es errada")
            self.location = "../menu_cliente.php" </script>';
         }
     }    
     else if($result->num_rows==1){//Si la clave actual es correcta vamos a cambiarla
         /*Primero hay que verificar que ambas contraseñas nuevas sean iguales*/
         if($clave_nueva!=$clave_nueva_rep)//No coinciden la clave nueva con la clave nueva repetida
         {
             if($row1['administrativo']=='S')
         {
             echo '<script language = javascript>
            alert("La clave nueva repetida debe ser igual a la clave nueva")
            self.location = "../menu_admin.php" </script>';
         }
         else
         {
             echo '<script language = javascript>
            alert("La clave nueva repetida debe ser igual a la clave nueva")
            self.location = "../menu_cliente.php" </script>';
         }
         }
         else{//La clave nueva y la repetida son iguales
             $sql="update Usuario set clave=aes_encrypt('$clave_nueva','upc') where id='$id' and
                 clave=aes_encrypt('$clave_vieja','upc')";
              if($mysqli->query($sql))
              {
                  if($row1['administrativo']=='S')
                {
                echo '<script language = javascript>
            alert("Se modific\u00F3 la contrase\u00F1a satisfactoriamente.")
            self.location = "../menu_admin.php" </script>';
              }
              else
                  {
                echo '<script language = javascript>
            alert("Se modific\u00F3 la contrase\u00F1a satisfactoriamente.")
            self.location = "../menu_cliente.php" </script>';
              }
              
              }
              else
              {
                  if($row1['administrativo']=='S')
                {
                  echo '<script language = javascript>
            alert("Hubo un error. No se actualizaron los datos.")
            self.location = "../menu_admin.php" </script>';
                }
                else
                    {
                  echo '<script language = javascript>
            alert("Hubo un error. No se actualizaron los datos.")
            self.location = "../menu_cliente.php" </script>';
                }
              }
        }
         
     }
     
 }

?>
