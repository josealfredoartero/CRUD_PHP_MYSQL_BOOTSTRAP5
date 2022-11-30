<?php 
// exportando la conexion a la base de datos
require_once 'db/Conexion.php';

class Color extends Conexion{
    // metodo para traer lista de colores
    public function getColor(){
        // consulta a la base de datos
        $query = $this->db->query("SELECT * FROM colores;");
        // realizando consulta y guardando resultados
        $response = $query->fetchAll(PDO::FETCH_OBJ);
        // retornando resultados
        return $response;
    }
}

?>