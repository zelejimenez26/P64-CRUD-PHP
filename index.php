<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
</head>
<body>
    <div class="container mt-5">
        <div class="col-lg-8 offset-lg-2">
            <div class="card">
                <div class="card-body text-center">
                    <h2>Usuarios del sistema</h2>
                    <a class="btn btn-primary float-end" href="agregar.html" role="button">Nuevo</a>
                    <table class="table table-striped mt-5">
                        <thead>
                          <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Contraseña</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                                require('conexion.php');
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row["id"] . "</td>";
                                        echo "<td>" . $row["Nombre"] . "</td>";
                                        echo "<td>" . $row["Correo"] . "</td>";
                                        echo "<td>" . $row["pwd"] . "</td>";
                                        echo "<td><button class='editar-btn' data-id='" . $row["id"] . "'>Editar</button> | <button class='elininar-btn' data-id='" . $row["id"] . "'>Eliminar</button></td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='4'>No hay usuarios registrados</td></tr>";
                                }
                            ?>
                        </tbody>
                      </table>
                      <div id="editar-form" style="display: none;">
                            <!-- Aquí se mostrará el formulario de edición -->
                        </div>

                    <script>
                        $(document).ready(function() {
                            $('.editar-btn').click(function() {
                                var id = $(this).data('id');
                                $.ajax({
                                    url: 'editar.php',
                                    type: 'GET',
                                    data: {id: id},
                                    success: function(response) {
                                        $('#editar-form').html(response).show();
                                    }
                                });
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</body>
</html>