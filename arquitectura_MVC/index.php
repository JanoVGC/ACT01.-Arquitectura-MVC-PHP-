<?php
session_start();

require_once __DIR__ . '/controller/AuthController.php';
require_once __DIR__ . '/controller/usuariController.php';

$accion = $_GET['accion'] ?? '';

// ---------- TANCAR SESSIÓ ----------
if ($accion === 'logout') {
    session_unset();
    session_destroy();
    header('Location: index.php');
    exit();
}

// ---------- REGISTRE ----------
if ($accion === 'register') {
    $error = null;
    $dades = ['usuario' => '', 'nombre' => '', 'apellido' => '', 'email' => '', 'rol' => 'usuario'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        foreach ($dades as $camp => $valor) {
            $dades[$camp] = trim($_POST[$camp] ?? '');
        }
        $password  = $_POST['password'] ?? '';
        $password2 = $_POST['password2'] ?? '';

        if (in_array('', $dades, true) || $password === '') {
            $error = 'Tots els camps són obligatoris.';
        } elseif (strlen($password) < 6) {
            $error = 'La contrasenya ha de tenir almenys 6 caràcters.';
        } elseif ($password !== $password2) {
            $error = 'Les contrasenyes no coincideixen.';
        } else {
            $usuariController = new usuariController();

            $registrat = $usuariController->registrarUsuari(
                $dades['usuario'], $dades['nombre'], $dades['apellido'],
                $dades['email'], $password, $dades['rol']
            );

            if ($registrat) {
                $_SESSION['missatge'] = 'Registre completat. Ja pots iniciar sessió.';
                header('Location: index.php');
                exit();
            }
            $error = 'No s\'ha pogut registrar: dades no vàlides o usuari/email ja existent.';
        }
    }

    require __DIR__ . '/view/register.php';
    exit();
}

// ---------- USUARI AMB SESSIÓ INICIADA ----------
if (isset($_SESSION['id'])) {
    $usuariController = new usuariController();

    // Administrador: llista d'usuaris
    if ($_SESSION['rol'] === 'admin') {
        $llistaUsuaris = $usuariController->llistarUsuaris();
        require __DIR__ . '/view/admin.php';
        exit();
    }

    // Usuari normal: modificar l'email
    if ($accion === 'modificarEmail' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = trim($_POST['email'] ?? '');

        // El nom d'usuari surt de la sessió, mai del formulari
        if ($usuariController->modificarEmail($_SESSION['usuario'], $email)) {
            $_SESSION['missatge'] = 'Email actualitzat correctament.';
        } else {
            $_SESSION['error'] = 'Email no vàlid o ja en ús per un altre usuari.';
        }
        header('Location: index.php');
        exit();
    }

    // Perfil
    $usuari   = $usuariController->obtenirUsuari($_SESSION['usuario']);
    $missatge = $_SESSION['missatge'] ?? null;
    $error    = $_SESSION['error'] ?? null;
    unset($_SESSION['missatge'], $_SESSION['error']);

    require __DIR__ . '/view/perfil.php';
    exit();
}

// ---------- LOGIN ----------
$error    = null;
$missatge = $_SESSION['missatge'] ?? null;
unset($_SESSION['missatge']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario  = trim($_POST['usuario'] ?? '');
    $password = $_POST['password'] ?? '';

    $authController = new AuthController();

    if ($authController->login($usuario, $password)) {
        header('Location: index.php');
        exit();
    }
    $error = 'Credencials incorrectes';
}

require __DIR__ . '/view/login.php';