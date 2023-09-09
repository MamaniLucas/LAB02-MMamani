<?php
include('../conexion.php');
//Aqui abrimos la conexion ala bd mysql
$con =  conectar();
//consulta sql
//$sql = 'SELECT id_usuario, nombre, apellido_paterno, apellido_materno, contraseña, correo FROM clientes';
$sql = 'call sp_consulta';
$result = mysqli_query($con, $sql);

#desconectar($con);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="ie=edge">
    <link rel="stylesheet" href="http://localhost/CRUD/boost/css/bootstrap.min.css">
    <title class="text-center">Clientes</title>

</head>

<body>
    <header>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">Datos de Cliente</h4>
                <a href='agregar-cliente.html' class="btn btn-primary btn-block"> NUEVO CLIENTE</a>
            </div>
        </div>
    </header>
    <main>
        <p></p>
        <table class="table" border="1">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Password</th>
                    <th>Correo</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // recoremos el array con los datos de los pdtos
                while ($clientes = mysqli_fetch_array($result)) {
                    $id = $clientes['id_usuario'];
                    $nombre = $clientes['nombre'];
                    $ape_paterno = $clientes['apellido_paterno'];
                    $ape_materno = $clientes['apellido_materno'];
                    $pswd = $clientes['contraseña'];
                    $correo = $clientes['correo'];
                ?>
                    <tr>
                        <td> <?php echo $id ?></td>
                        <td> <?php echo $nombre ?></td>
                        <td> <?php echo $ape_paterno ?></td>
                        <td> <?php echo $ape_materno ?></td>
                        <td> <?php echo $pswd ?></td>
                        <td> <?php echo $correo ?></td>

                        <td><a href="editar.php?id=<?php echo $id ?>" class="btn btn-danger btn-block">Editar</a></td>
                        <td><a href="eliminar.php?id=<?php echo $id ?>" class="btn btn-success btn-block">Eliminar</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>