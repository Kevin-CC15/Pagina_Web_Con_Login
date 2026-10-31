<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

require 'conexion.php';

$stmt = $pdo->query("SELECT * FROM usuarios");
$usuarios = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
    <link rel="stylesheet" type="text/css" href="Estilos/Estilo_Formulario.css">
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f9; padding: 20px; margin: 0; }
        .container { max-width: 800px; background: white; padding: 25px; margin: 40px auto; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background: #007bff; color: white; }
        .btn { padding: 6px 12px; text-decoration: none; border-radius: 4px; color: white; font-size: 14px; margin-right: 5px; }
        .btn-edit { background: #ffc107; color: black; font-weight: bold; }
        .btn-delete { background: #dc3545; }
        .header-flex { display: flex; justify-content: space-between; align-items: center; }
        .btn-logout { background: #6c757d; color: white; padding: 6px 12px; text-decoration: none; border-radius: 4px; }
    </style>
</head>
<body>

<div class="container">
    <div class="header-flex">
        <h2>Bienvenido, <?= htmlspecialchars($_SESSION['user_name']) ?></h2>
        <a href="logout.php" class="btn-logout">Cerrar Sesión</a>
    </div>

    <hr style="margin: 20px 0; border: 0; border-top: 1px solid #eee;">

    <h3>Usuarios Registrados en el Sistema</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Fecha de Registro</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($usuarios as $u): ?>
            <tr>
                <td><?= $u['id'] ?></td>
                <td><?= htmlspecialchars($u['nombre']) ?></td>
                <td><?= htmlspecialchars($u['correo']) ?></td>
                <td><?= $u['fecha_registro'] ?></td>
                <td>
                    <a href="actualizar.php?id=<?= $u['id'] ?>" class="btn btn-edit">Modificar</a>
                    <a href="eliminar.php?id=<?= $u['id'] ?>" class="btn btn-delete" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

</body>
</html>