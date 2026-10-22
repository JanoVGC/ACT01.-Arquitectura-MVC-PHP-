<?php
$dades = $dades ?? ['usuario' => '', 'nombre' => '', 'apellido' => '', 'email' => '', 'rol' => 'usuario'];
$error = $error ?? null;
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registre</title>
</head>
<body>
    <h1>Registre d'usuari</h1>

    <?php if (!empty($error)): ?>
        <p><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="post" action="index.php?accion=register">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" value="<?= htmlspecialchars($dades['usuario']) ?>" required>
        <br>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($dades['nombre']) ?>" required>
        <br>

        <label for="apellido">Apellidos:</label>
        <input type="text" id="apellido" name="apellido" value="<?= htmlspecialchars($dades['apellido']) ?>" required>
        <br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($dades['email']) ?>" required>
        <br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <br>

        <label for="password2">Repetir contraseña:</label>
        <input type="password" id="password2" name="password2" required>
        <br>

        <label for="rol">Rol:</label>
        <select id="rol" name="rol">
            <option value="usuario" <?= $dades['rol'] === 'usuario' ? 'selected' : '' ?>>Usuario</option>
            <option value="admin" <?= $dades['rol'] === 'admin' ? 'selected' : '' ?>>Admin</option>
        </select>
        <br>

        <input type="submit" value="Registrar-se">
    </form>

    <p><a href="index.php">Tornar a l'inici de sessió</a></p>
</body>
</html>