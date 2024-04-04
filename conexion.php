<?
$servidor="localhost";
$usuario="root";
$clave="";
$bbdd="formulario_usuarios";

$conn=new mysqli($servidor, $usuario, $clave, $bbdd);

//Veridicar conexion
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
//Obtener lista de todos los registros - todos los usuarios
$sql="SELECT id, Nombre, Correo, pwd FROM usuario";
$result = $conn->query($sql);

//Agregar nuevo registro
if(isset($_POST['subir'])){
        if($conn->query("
            INSERT INTO usuario (Nombre, Correo, pwd) VALUES (
                '".$conn->real_escape_string($_POST['nombre'])."',
                '".$conn->real_escape_string($_POST['correo'])."',
                '".$conn->real_escape_string($_POST['pwd'])."'
            );      
        ")) echo 'Mensaje correctamente registrado';
        else echo 'Hemos tenido dificultades registrando tu mensaje, por favor reinténtalo';
}

// Cerrar la conexión
$conn->close();
?>