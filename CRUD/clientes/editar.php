<?php
include("../conexion.php");
$conn = conectar();


if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $sql = "SELECT * FROM clientes WHERE id_usuario=$id";
    //$sql = "call sp_obtener_regcliente ('$id')";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $nomb = $row['nombre'];
        $apellido_paterno = $row['apellido_paterno'];
        $apellido_materno = $row['apellido_materno'];
        $pswd = $row['contraseña'];
        $correo = $row['correo'];
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $nomb = $_POST['nom'];
    $apellido_paterno = $_POST['ape_p'];
    $apellido_materno = $_POST['ape_m'];
    $pswd = $_POST['pw'];
    $correo = $_POST['co'];
// call('$nombre','$nomb','$id_')


    $sql = "UPDATE clientes set nombre = '$nomb', apellido_paterno = '$apellido_paterno',
     apellido_materno = '$apellido_materno', contraseña = '$pswd', correo = '$correo'  WHERE id_usuario = $id;";

    mysqli_query($conn, $sql);

    header('Location: clientes.php');
}

?>

<link rel="stylesheet" href="http://localhost/CRUD/boost/css/bootstrap.min.css"> 

<header>
        <div class="card">
            <div class="card-body">
                <h2>Actualizando Clientes</h2><br>
                <a class="btn btn-primary btn-block" href="clientes.php" /> Regresar al menú</a><br>
            </div>
        </div>
</header>

<form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
    <br>
    <table>
        <tr>
            <td>Nombre</td>
            <td>
                <input required='' name="nom" type="text" class="form-control" value="<?php echo $nomb; ?>" placeholder="Update Title" />
            </td>
        </tr>
        <tr>
            <td>Apellido Paterno</td>
            <td>
                <input required='' name="ape_p" type="text" class="form-control" value="<?php echo $apellido_paterno; ?>" placeholder="Update Title" />
            </td>
        </tr>
        <tr>
            <td>Apellido Materno</td>
            <td>
                <input required='' name="ape_m" type="text" class="form-control" value="<?php echo $apellido_materno; ?>" placeholder="Update Title" />
            </td>
        </tr>
        <tr>
            <td>Contraseña</td>
            <td>
                <input required='' name="pw" type="password" class="form-control" value="<?php echo $pswd; ?>" placeholder="Update Title" />
            </td>
        </tr>
        <tr>
            <td>Correo Electrónico</td>
            <td>
                <input required='' name="co" type="email" class="form-control" value="<?php echo $correo; ?>" placeholder="Update Title" />
            </td>
        </tr>
           
        <tr>
            <td colspan="2">
                <br><br> <input class="btn btn-danger btn-block" type="submit" value="Update" />

            </td>
        </tr>
    </table>
</form>