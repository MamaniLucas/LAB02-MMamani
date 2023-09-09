<?php
//obtenemos la inforamcion del producto
include('../conexion.php');


$nombre = $_POST['nombre'];
$apellido_paterno = $_POST['ape_paterno'];
$apellido_materno = $_POST['ape_materno'];
$pswd = $_POST['contraseña'];
$correo = $_POST['correo'];

//abrimos la conexion l bd
$connection =  conectar();

//$sql = "INSERT INTO productos(nombre, descripcion, stock, precioVenta) VALUES ('$nombre', '$des', '$stock', '$prev');";
$sql = "call sp_registro ('$nombre','$apellido_paterno','$apellido_materno','$pswd','$correo')";
$result = mysqli_query($connection, $sql);

desconectar($connection);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgregarCliente</title>
</head>

<body>
    <header>
        <h1>Agregar Cliente</h1>
    </header>
    <main>
        <p>
            <?php
            if (!$result) {
                echo 'No se pudo registrar al cliente';
            } else {
                echo 'cliente registrado';
            }
            ?>
        </p>
    </main>
    <a href="clientes.php"> Ver la inserción
</body>

</html>