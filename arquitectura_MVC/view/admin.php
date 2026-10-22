<?php
$llistaUsuaris = $llistaUsuaris ?? [];
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panell de l'admin</title>
</head>
<body>
    <h1>Panell de l'admin</h1>

    <a href="index.php?accion=logout">Tancar sessió</a>

    <h2>Llista d'usuaris registrats:</h2>

    <table>
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Rol</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($llistaUsuaris)): ?>
                <?php foreach ($llistaUsuaris as $u): ?>
                    <tr>
                        <td><?= htmlspecialchars($u['usuario']) ?></td>
                        <td><?= htmlspecialchars($u['nombre_usuario']) ?></td>
                        <td><?= htmlspecialchars($u['apellido_usuario']) ?></td>
                        <td><?= htmlspecialchars($u['email_usuario']) ?></td>
                        <td><?= htmlspecialchars($u['rol_usuario']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No hi ha usuaris registrats.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>