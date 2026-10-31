<?php
require 'conexion.php';

$mensajeError = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $password = $_POST['password'];

    $stmtCheck = $pdo->prepare("SELECT id FROM usuarios WHERE correo = ?");
    $stmtCheck->execute([$correo]);
    if ($stmtCheck->rowCount() > 0) {
        $mensajeError = "El correo electrónico ya está registrado.";
    } else {
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, correo, password) VALUES (?, ?, ?)");
        if ($stmt->execute([$nombre, $correo, $passwordHash])) {
            header("Location: index.php?registro=exitoso");
            exit();
        } else {
            $mensajeError = "Hubo un error al registrar el usuario.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" type="text/css" href="Estilos/Estilo_Formulario.css">
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .card { background: white; padding: 25px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); width: 350px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        button { width: 100%; padding: 10px; background: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; }
        button:hover { background: #218838; }
        .error { font-size: 13px; margin-top: 5px; display: block; }
    </style>
</head>
<body>

<div class="card">
    <h2>Registrar Nuevo Usuario</h2>

    <?php if ($mensajeError): ?>
        <span class="error" style="color: red; margin-bottom: 10px;"><?= $mensajeError ?></span>
    <?php endif; ?>

    <form id="registroForm" action="registro.php" method="POST">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="correo">Correo Electrónico:</label>
            <input type="email" id="correo" name="correo" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="re_password">Repetir Contraseña:</label>
            <input type="password" id="re_password" required>
            <span id="errorMsg" class="error"></span>
        </div>
        <button type="submit">Registrarse</button>
    </form>

    <p style="text-align: center; margin-top: 15px;">
        <a href="index.php">Volver al Inicio / Login</a>
    </p>
</div>

<script src="funciones/ValidacionFormulario.js"></script>

</body>
</html>