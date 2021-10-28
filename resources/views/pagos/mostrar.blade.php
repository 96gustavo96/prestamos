<?php
$conexion=mysqli_connect('localhost','root','','prestamos');
$consulta='SELECT * FROM pagos p where p.id = 1';
$resultado=mysqli_query($conexion,$consulta);
$fila = $resultado ->fetch_assoc();
echo $fila['Monto'];