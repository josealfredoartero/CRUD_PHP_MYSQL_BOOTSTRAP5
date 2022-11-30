<?php 
// exportando la conexion a la base de datos
require_once 'db/Conexion.php';

class Talla extends Conexion{
    // metodo para mostrar lista de tallas 
    public function getTalla(){
        // consulta a la base de datos
        $query = $this->db->query("SELECT * FROM tallas;");
        // realizando consulta y traer resultados
        $response = $query->fetchAll(PDO::FETCH_OBJ);
        // retornando resultaodos
        return $response;
    }
}

?>