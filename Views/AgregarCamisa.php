
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
        $camisa = new CamisaController();
    // consultas para mostror en los select
        $tallas = new TallaController();
        $tallas = $tallas->getTallas();

        $colores = new ColorController();

        $colores = $colores->getColores();
 
    ?>
  <div class="container text-center" >
      <h1>Agregar Camisa</h1>
      <!-- ---------------- FORMULARIO PARA INSERTAR NUEVO REGISTRO --------------------------- -->
      <form class='form' action="" method="post">
          <div class="mb-3 form-group">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" name="precio" id="precio" min="0" step="0.01" class="form-control" aria-describedby="helpId">
          </div>
          <div class="mb-3">
            <label for="existencias" class="form-label">Existencias</label>
            <input type="number" name="existencias" id="existencias" class="form-control" aria-describedby="helpId">
          </div>
          <div class="mb-3">
            <label for="color" class="form-label">Color</label>
            <select name="color" id="color" class='form-control'>
              <?php foreach($colores as $item){?>
              <option value='<?php echo $item->id ?>'><?php echo $item->nombre ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="talla" class="form-label">Talla</label>
            <select name="talla" id="talla" class='form-control'>
              <?php foreach($tallas as $value){?>
              <option value='<?php echo $value->id ?>'><?php echo $value->nombre ?></option>
              <?php } ?>
            </select>
          </div>
          <div>
              <input type='submit' class="btn btn-success" Value='agregar'>
              <a href="../Views/index.php" class="btn btn-danger">Cancelar</a>
          </div>
      </form>
      <!-- iniciando funcion para guardar registro -->
      <?php $camisa->create(); ?>
  </div>
</body>
</html>