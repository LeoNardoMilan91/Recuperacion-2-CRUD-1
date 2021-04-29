<!DOCTYPE html>
<?php
    session_start();
    require '../vendor/autoload.php';
    use Clases\Articulos;

    function mostrarError($t){
        $_SESSION['error']=$t;
        header("Location:{$_SERVER['PHP_SELF']}");
        die();
    }
?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Articulos</title>
</head>
<body style="background-color: bisque;">
    <h3>Articulos</h3>
    <div class="container mt-3 mb-4">
        <a href="crearArticulo.php" class="btn btn-success my-3"><i class="fas fa-plus"></i>Crear Articulo</a>
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">PVP</th>
                    <th scope="col">Stock</th>
                </tr>
            </thead>
        <tbody>
            <?php
            while($fila = $todos->fetch(PDO::FETCH_OBJ)){
                echo "<tr>";
                echo "<th scope='row'>$fila->Nombre</th>";
                echo "<th scope='text-center'>$fila->PVP</th>";
                echo "<th scope='text-right'>$fila->stock</th>";
                echo <<< TEXTO
                <form name="a= method="POST" action="borrarArticulo.php" class="inline">
                <a href="editarArticulo.php?nombre={$fila->$nombre}" class="btn btn-warning"><i class="far fa-edit"></i>Editar</a>$nbsp;
                <input type="hidden" name="nombre" value="{$fila->nombre}" />
                <button type="submit" class="btn btn-danger" onsubmit="return confirm('Borrar articulo')"><i class="fas fa-trash-alt"></i>Borrar</button>
                </form>
                TEXTO;
                echo "</td>";
                echo "</tr>" . PHP_EOL;
            }
        ?>
        </tbody>
        </table>
    </div>
    
</body>
</html>