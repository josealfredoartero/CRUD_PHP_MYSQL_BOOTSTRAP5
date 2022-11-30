<?php 
// exportando conexion a la base de datos
require_once 'db/Conexion.php';
//  modelo para la tabla de camisas
class Camisa extends Conexion{
    protected $id;
    protected $precio;
    protected $existencias;
    protected $id_talla;
    protected $id_color;
    // insertar id
    public function setId($id){
        $this->id = $id;
    }
    // insertar precio
    public function setPrecio($precio){
        $this->precio = $precio;
    }
    // insertar existencias
    public function setExistencias($existencias){
        $this->existencias = $existencias;
    }
    // insertar el id de la talla
    public function setTalla($id_talla){
        $this->id_talla = $id_talla;
    }
    // insertar el id del color
    public function setColor($id_color){
        $this->id_color = $id_color;
    }
    // metodo para mostrar la lista de camisas
    public function getCamisas(){
        // consulta para la base de datos
        $query = $this->db->query("SELECT camisas.*, colores.nombre AS color, tallas.nombre AS talla FROM camisas INNER JOIN colores ON camisas.id_color = colores.id INNER JOIN 
        tallas ON camisas.id_talla = tallas.id;");
        // realizando peticion
        $response = $query->fetchAll(PDO::FETCH_OBJ);
        //retornando resultado de la consulta
        return $response;

    }
    // metodo para insertar nueva camisa
    public function setCamisa(){
        // consulta para la base de datos
        $query = $this->db->prepare("INSERT INTO camisas(precio,existencias,id_talla, id_color) VALUES(?,?,?,?)");
        // insertando los datos a enviar a la base de datos
        $response = $query->execute([$this->precio, $this->existencias ,$this->id_talla ,$this->id_color]);
        // retornar resultado
        return $response;
    }
    // mistrar 1 registro con el id 
    public function getCamisa(){
        // consulta para la base de datos
        $query = $this->db->prepare("SELECT * FROM camisas WHERE id = ?");
        // insertando el id a la consulta
        $query->execute([$this->id]);
        // guardando el resultaod de la consulta a la base de datos
        $response = $query->fetchAll(PDO::FETCH_OBJ);
        // retornando el resultado 
        return $response;
    }
    // metodo para modificar el registro en la base de datos
    public function update(){
        // consulta para la base de datos
        $query = $this->db->prepare("UPDATE camisas SET precio = ?, existencias = ?, id_talla = ?, id_color = ? WHERE id = ?");
        // insertando datos a la consulta para modificarlos
        $response = $query->execute([$this->precio, $this->existencias, $this->id_talla, $this->id_color, $this->id]);
        // retornando el resultado
        return $response;
    }
    // metodo para eliminar registro
    public function delete(){
        // consulta para eliminar registro
        $query = $this->db->prepare("DELETE FROM camisas WHERE id = ?");
        // insertando id para eliminar registro
        $response = $query->execute([$this->id]);
        // retornando resultado
        return $response;

    }
}

?>