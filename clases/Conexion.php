<?php
namespace Clases;
use PDO;
use PDOException;

class Conexion{
    protected static $conexion;

    public function __construct(){
        if(self::$conexion==null){
            self::crearConexion();
        }
    }
    private static function crearConexion(){
        $opciones=parse_ini_file("../.config");
        $base=$opciones["base"];
        $pass=$opciones["pass"];
        $user=$opciones["usuario"];
        $host=$opciones["host"];
        //creamos el dns con los parametros adecuados
        $dns="mysql:host=$host;dbname=$base;charset=utf8mb4";
        try{
            self::$conexion=new PDO($dns, $user, $pass);
            self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $ex){
            die("Error al conectar con la BBDD, ".$ex->getMessage());
        }
    }

    public static function getConexion(){
        return self::$conexion;
    }
}