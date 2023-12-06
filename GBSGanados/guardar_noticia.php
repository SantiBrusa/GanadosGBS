<?php

// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_ganados";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener datos del formulario
$title = $_POST['title'];
$text = $_POST['text'];

// Procesar la imagen
$image = $_FILES['image']['name'];
$image_tmp = $_FILES['image']['tmp_name'];

// Mover la imagen a un directorio específico
move_uploaded_file($image_tmp, "directorio_de_imagenes/" . $image);

// Insertar datos en la base de datos
$sql = "INSERT INTO tu_tabla_noticias (title, image, text) VALUES ('$title', '$image', '$text')";

if ($conn->query($sql) === TRUE) {
    echo "Noticia guardada correctamente";
} else {
    echo "Error al guardar la noticia: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>