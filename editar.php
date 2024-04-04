<?php

// Verificar si se recibió un ID válido
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    require('conexion.php');

    // Obtener los datos del usuario a editar
    $sql = "SELECT * FROM usuario WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <!-- Formulario de edición -->
        <form id="editar-usuario-form">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>">
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>">
            </div>
            <button type="submit">Guardar Cambios</button>
        </form>
        <?php
    } else {
        echo "Usuario no encontrado.";
    }

    // Cerrar la conexión
    $conn->close();
} else {
    echo "ID de usuario no proporcionado.";
}
?>
?>
