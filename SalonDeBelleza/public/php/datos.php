<?php
session_start();
$conexion = mysqli_connect('127.0.0.1', 'root', '', 'salon_lis');
$fecha = '';
$fecha = $_POST['fecha'];
$horario = ['08:00-10:00', '10:00-12:00', '12:00-14:00', '14:00-16:00', '16:00-18:00'];
$sql = "Select Hora from citas where Fecha='$fecha'";
$result = mysqli_query($conexion, $sql);
$cadena = [];
while ($ver = mysqli_fetch_row($result)) {
    $cadena[] = $ver[0];
}
$nuevo = array_diff($horario, $cadena);
foreach ($nuevo as $dato) {
    echo '<option value=' . $dato . '>' . $dato . '</option>';
}
//echo $cadena;
