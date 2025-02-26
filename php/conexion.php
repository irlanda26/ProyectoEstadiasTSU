<?php
    class ConexionBD {
        public static function cBD() {
        $servidor = "localhost";
        $dbname = "consultorio";
        $usuario = "root";
        $pass = "";

        $BD = new PDO("mysql:host=".$servidor.";dbname=".$dbname, $usuario, $pass);
        $BD -> exec("set names utf8");
        return $BD;
        }
    }
  /* try {
        $conexion = ConexionBD::cBD();
        echo "Conexión exitosa";
    } catch (PDOException $e) {
        echo "Error al conectar: " . $e->getMessage();
    }*/
?>

