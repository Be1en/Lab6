<?php

$user = "root";
$pass = "";
$host = "localhost";
$bd= "auto";

//conetamos al base datos
$conn = mysqli_connect($host, $user, $pass, $bd);



$id = $_POST["id"] ;
$nombres = $_POST["nombres"] ;
$apellidos = $_POST["apellidos"] ;
$correo = $_POST["correo"] ;
$dni = $_POST["dni"] ;
$celular = $_POST["celular"] ;
$fecha_nac = $_POST["fecha_nac"] ;

if (!$bd)
{
echo "No se ha podido encontrar la Tabla";
}
else
{
echo "<h3>Tabla seleccionada:</h3>" ;
}
$instruccion_SQL = "INSERT INTO usuario (id_usuario, nombre, apellidos, correo, dni, celular, fecha_nacimiento)
                     VALUES ('$id','$nombres','$apellidos','$correo','$dni', '$celular', '$fecha_nac')";
                   
                    
$resultado = mysqli_query($conn,$instruccion_SQL);
$consulta = "SELECT * FROM usuario";
$result = mysqli_query($conn,$consulta);
if(!$result) 
{
    echo "No se ha podido realizar la consulta";
}
echo "<table>";
echo "<tr>";
echo "<th><h1>id</th></h1>";
echo "<th><h1>Nombre</th></h1>";
echo "<th><h1>Apellidos</th></h1>";
echo "<th><h1>Correo</th></h1>";
echo "<th><h1>DNI</th></h1>";
echo "<th><h1>Celular</th></h1>";
echo "<th><h1>Fecha Nacimiento</th></h1>";
echo "</tr>";

while ($colum = mysqli_fetch_array($result))
 {
    echo "<tr>";
    echo "<td><h2>" . $colum['id_usuario']. "</td></h2>";
    echo "<td><h2>" . $colum['nombre']. "</td></h2>";
    echo "<td><h2>" . $colum['apellidos'] . "</td></h2>";
    echo "<td><h2>" . $colum['correo'] . "</td></h2>";
    echo "<td><h2>" . $colum['dni']. "</td></h2>";
    echo "<td><h2>" . $colum['celular'] . "</td></h2>";
    echo "<td><h2>" . $colum['fecha_nacimiento'] . "</td></h2>";
    echo "</tr>";
}
echo "</table>";

mysqli_close( $conn );
?>
