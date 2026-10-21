<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INICIAR SESSIÓ</title>
</head>
<body>
    <h1>Iniciar Sessió</h1>

    <?php if (!empty($error)):  ?>
        <p><?=  htmlspecialchars($error) ?></p>
    <?php endif; ?>
    
    <form method = "post" action="index.php">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required>
        <br>
        
        <label for="password">Contraseña:</label>
        <input type= "password" id= "password" name="password" required>
        <br>

        <input type="submit" value="Iniciar Sesión">
    </form>
    
</body>
</html>