<?php require_once '../controllers/CamisaController.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    <?php 
        // iniciando consulta de los registros en la base de datos
        $camisas = new CamisaController();
        $listCamisas = $camisas->index();
    ?>

    <div class="container">
        <h1 class="text-center">Lista de Camisas</h1>
        <!-- BOTON PARA IR A EL FORMULARIO DE INGRESAR REGISTRO -->
        <a href='AgregarCamisa.php' class="btn btn-success mt-3 mb-3">Agregar Nueva Camiseta</a>
        <!-- ------------------------ TABLA DE REGISTRO DE LA BASE DE DATOS -->
        <table class="table table-hover table-striped table-dark">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Talla</th>
                    <th>color</th>
                    <th>Precio</th>
                    <th>Existencias</th>
                    <th class='col-2'>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($listCamisas as $index => $item){ ?>
                    <tr>
                        <td><?php echo $index+1?></td>
                        <td><?php echo $item->talla ?></td>
                        <td><?php echo $item->color ?></td>
                        <td><?php echo $item->precio ?></td>
                        <td><?php echo $item->existencias ?></td>
                        <td class='opciones'>
                            <!-- ----BOTONES PARA MODIFICAR Y ELIMINAR REGIGISTROS -->
                            <form action="./ModificarCamisa.php" method='POST'>
                                <input type="hidden" name="id" value='<?php echo $item->id; ?>'>
                                <button class='btn btn-warning'>Editar</button>
                            </form>
                            <form action="" method='POST'>
                                <input type="hidden" name="id" value='<?php echo $item->id; ?>'>
                                <input class="btn btn-danger" type="submit" name='eliminar' value="eliminar">
                            </form>
                        </td>
                    </tr>
                <?php } ?>
                <!-- iniciando funcion de eliminacion si esta seteado el id -->
                <?php $camisas->eliminar(); ?>
            </tbody>
        </table>
    </div>
</body>
</html>