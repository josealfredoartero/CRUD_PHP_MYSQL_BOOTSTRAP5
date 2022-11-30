<?php 
class Conexion{
    protected $db;
    // iniciando nexion a la base de datos
    function __construct(){
        $namedb = 'crud_venta';
        $user = 'root';
        $password = '';

        $this->db = new PDO(
            'mysql:host=localhost;
            dbname='.$namedb,
            $user, $password
            );

    }
}

?>