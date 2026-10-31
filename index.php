<?php
session_start();
require 'conexion.php';

$error = '';
$exito = '';

if (isset($_GET['registro']) && $_GET['registro'] == 'exitoso') {
    $exito = "¡Registro exitoso! Ya puedes iniciar sesión.";
}

if (isset($_SESSION['user_id'])) {
    header("Location: principal.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = trim($_POST['correo']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE correo = ?");
    $stmt->execute([$correo]);
    $usuario = $stmt->fetch();

    if ($usuario && password_verify($password, $usuario['password'])) {
        $_SESSION['user_id'] = $usuario['id'];
        $_SESSION['user_name'] = $usuario['nombre'];

        header("Location: principal.php");
        exit();
    } else {
        $error = "Correo o contraseña incorrectos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión - Mi Página</title>
    <link rel="stylesheet" type="text/css" href="Estilos/Estilo_Formulario.css">
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-card { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); width: 350px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        button { width: 100%; padding: 10px; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; }
        button:hover { background: #0056b3; }
        .error { color: red; font-size: 13px; margin-bottom: 10px; display: block; }
        .exito { color: green; font-size: 13px; margin-bottom: 10px; display: block; }
    </style>
</head>
<body>

<div class="login-card">
    <h2>Iniciar Sesión</h2>

    <?php if ($exito): ?><span class="exito"><?= $exito ?></span><?php endif; ?>
    <?php if ($error): ?><span class="error"><?= $error ?></span><?php endif; ?>

    <form method="POST">
        <div class="form-group">
            <label for="correo">Correo Electrónico:</label>
            <input type="email" id="correo" name="correo" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Entrar</button>
    </form>

    <p style="text-align: center; margin-top: 15px;">
        ¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a>
    </p>
</div>

</body>
</html>