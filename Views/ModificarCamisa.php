
<?php require '../controllers/TallaController.php'; ?>
<?php require '../controllers/ColorController.php'; ?>
<?php require '../controllers/CamisaController.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    <?php 
    //  consultando el registro seleccionado y traer los datos a modifiacar
        $camisa = new CamisaController();
        $datosCamisa = $camisa->camisaById();
        // metodos para traer listas a mostrar en los select
        $tallas = new TallaController();

        $tallas = $tallas->getTallas();

        $colores = new ColorController();

        $colores = $colores->getColores();
    ?>
  <div class="container text-center" >
      <h1>Modificar Camisa</h1>
      <!-- ----- RECORRIENDO ARREGLO DEL REGISTRO A MODIFICAR Y MOSTRAR DAOTS -->
      <?php foreach($datosCamisa as $dato){ ?>
      <form class='form' action="" method="post">
            <input type="hidden" name="id" value="<?php echo $dato->id ?>">
          <div class="mb-3 form-group">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" name="precio" id="precio" min="0" step="0.01"
                    value='<?php echo $dato->precio ?>' class="form-control" aria-describedby="helpId">
          </div>
          <div class="mb-3">
            <label for="existencias" class="form-label">Existencias</label>
            <input type="number" name="existencias" id="existencias" class="form-control" 
                    value='<?php echo $dato->existencias ?>' aria-describedby="helpId">
          </div>
          <div class="mb-3">
            <label for="color" class="form-label">Color</label>
            <select name="color" id="color" class='form-control'>
              <?php foreach($colores as $item){?>
              <option <?php if($item->id === $dato->id_color) echo 'selected'?> value='<?php echo $item->id ?>'><?php echo $item->nombre ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="talla" class="form-label">Talla</label>
            <select name="talla" id="talla" class='form-control'>
              <?php foreach($tallas as $value){?>
              <option <?php if($value->id === $dato->id_talla) echo 'selected'?> value='<?php echo $value->id ?>'><?php echo $value->nombre ?></option>
              <?php } ?>
            </select>
          </div>
          <div>
              <input type='submit' class="btn btn-success" Value='Modificar'>
              <a href="../Views/index.php" class="btn btn-danger">Cancelar</a>
          </div>
      </form>
      <?php } ?>
      <!-- inicializando funcion de modificar registro -->
      <?php $camisa->ModificarCamisa(); ?>
  </div>
</body>
</html>