<?php 
// importando modelo
require_once '../Models/Camisa.php';

class CamisaController{
    // metodo para la lista de camisas 
    public function index(){
        $camisas = new Camisa();
        // realizando consulta a la base de datos
        $camisas = $camisas->getCamisas();
        // retornando resultados
        return $camisas;
    }
    // metodo para guardar los datos en la base de datos
    public function Create(){
        // condicion que todos los campos esten seteados
        if(isset($_POST['precio'],$_POST['existencias'],$_POST['color'],$_POST['talla'])){
            // nueva instancia del modelo
            $camisa = new Camisa;
            // insertando datos a guardar
            $camisa->setPrecio($_POST['precio']);
            $camisa->setExistencias($_POST['existencias']);
            $camisa->setColor($_POST['color']);
            $camisa->setTalla($_POST['talla']);
            // iniciando el metodo para guardar los datos
            $response = $camisa->setCamisa();
            // condicion si se guardo correctamente los datos
            if($response){
                header("location: index.php");
            }else{
                echo "error!!! Su registro ha fallado";
            }
        }
    }
    // metodo para consultar un registro
    public function camisaById(){
        // creando nueva instancia del modelo
        $camisa = new Camisa();
        // insertando el id a consultar
        $camisa->setId($_POST['id']);
        // iniciando consulta a la base de datos
        $response = $camisa->getCamisa();
        // retornando resultado
        return $response;
    }
    // metodo para modificar registro 
    public function ModificarCamisa(){
        // condicion que todos los campos esten seteados 
        if(isset($_POST['id'],$_POST['precio'],$_POST['existencias'], $_POST['color'],$_POST['talla'])){
            // creando nueca instancia del modelo
            $camisa = new Camisa();
            // guardando datos a modificar
            $camisa->setId($_POST['id']);
            $camisa->setPrecio($_POST['precio']);
            $camisa->setExistencias($_POST['existencias']);
            $camisa->setColor($_POST['color']);
            $camisa->setTalla($_POST['talla']);
            // iniciando consulta para modificar los datos de la base de datos
            $response = $camisa->update();
            // condicion si se realizo conrrectamente
            if($response){
                header("location: index.php");
            }else{
                echo "error!!! Su modificacion ha fallado";
            }
        }
    }
    // metodo para eliminar registro
    public function eliminar(){
        // condicion que el id del registro este seteado
        if(isset($_POST['id'])){
            // creando nueva instancia
            $camisa = new Camisa();
            // enviando id a eliminar
            $camisa->setId($_POST['id']);
            // iniciar consulta para eliminar registro
            $response = $camisa->delete();
            // condicion que si se realizo correctamente
            if($response){
                header("location: index.php");
            }else{
                echo "error!!! Su registro ha fallado";
            }
        }
    }
}

?>