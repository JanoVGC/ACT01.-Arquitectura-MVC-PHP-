<?php
$error    = $error ?? null;
$missatge = $missatge ?? null;
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sessió</title>
</head>
<body>
    <h1>Iniciar sessió</h1>

    <?php if (!empty($missatge)): ?>
        <p><?= htmlspecialchars($missatge) ?></p>
    <?php endif; ?>

    <?php if (!empty($error)): ?>
        <p><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="post" action="index.php">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required>
        <br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <br>

        <input type="submit" value="Iniciar sessió">
    </form>

    <p>No tens compte? <a href="index.php?accion=register">Registra't</a></p>
</body>
</html>