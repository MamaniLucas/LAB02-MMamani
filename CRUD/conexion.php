<?php
function conectar()
{
    $conn = mysqli_connect('localhost', 'root', '', 'crud_clientes');
    return $conn;
}
function desconectar($conexion)
{
    mysqli_close($conexion);
}
