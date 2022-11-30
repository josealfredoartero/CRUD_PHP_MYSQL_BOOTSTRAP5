<?php 
// importar modelo
require "../models/Color.php";

class ColorController{
    // metodo para traer lista de colores
    public function getColores(){
        $tallas = new Color();
        // realizando consulta a la base de datos
        $tallas = $tallas->getColor();
        // retornando resultados
        return $tallas;
    }
}


?>