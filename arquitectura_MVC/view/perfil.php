<?php
$usuari   = $usuari ?? ['usuario' => '', 'nombre_usuario' => '', 'apellido_usuario' => '', 'email_usuario' => ''];
$missatge = $missatge ?? null;
$error    = $error ?? null;
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El meu perfil</title>
</head>
<body>
    <h1>La meva informació personal</h1>

    <a href="index.php?accion=logout">Tancar sessió</a>

    <?php if (!empty($missatge)): ?>
        <p><?= htmlspecialchars($missatge) ?></p>
    <?php endif; ?>

    <?php if (!empty($error)): ?>
        <p><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="post" action="index.php?accion=modificarEmail">
        <label>Usuario:</label>
        <input type="text" value="<?= htmlspecialchars($usuari['usuario']) ?>" disabled>
        <br>

        <label>Nombre:</label>
        <input type="text" value="<?= htmlspecialchars($usuari['nombre_usuario']) ?>" disabled>
        <br>

        <label>Apellidos:</label>
        <input type="text" value="<?= htmlspecialchars($usuari['apellido_usuario']) ?>" disabled>
        <br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($usuari['email_usuario']) ?>" required>
        <br>

        <input type="submit" value="Guardar email">
    </form>
</body>
</html>