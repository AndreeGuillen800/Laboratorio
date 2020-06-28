<?php
function conectarBD()
{
    $servername = "localhost:8080";
    $username = "root";
    $password = "";
    $database   = "sotr";
    // Create connection
    $mysqli = new mysqli($servername, $username, $password,$database);
    // Check connection
    if ($mysqli->connect_error) {
        die("Fallo de conexion: " . $mysqli->connect_error);
    }
    else
        return $mysqli;
}

?>
