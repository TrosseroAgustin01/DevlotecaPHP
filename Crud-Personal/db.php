<?php
    $servidor = "localhost";
    $db="crudEmpleados";
    $dbUser = "root";
    $dbPassword="";

    try {
        $conexion = new PDO("mysql:host:$servidor;dbname:$db;$dbUser;$dbPassword");
    } catch (Throwable $e) {
        echo $e->getMessage()." ".$e->getLine();
    }
?>