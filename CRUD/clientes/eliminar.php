<?php

include("../conexion.php");
$con = conectar();

$id = $_GET['id'];
//ver el video
$sql = "call sp_eliminar ('$id')";
$query = mysqli_query($con, $sql);

if ($query) {
    Header("Location: clientes.php");
}
