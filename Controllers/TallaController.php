<?php 
// importar modelo
require "../models/Talla.php";

class TallaController{
    // metoto para traer losta de tallas
    public function getTallas(){
        $tallas = new Talla();
        // realizando consulta de las tallas
        $tallas = $tallas->getTalla();
        // retornando resultados
        return $tallas;
    }
}


?>