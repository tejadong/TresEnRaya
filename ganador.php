<?php
    session_name('juego');
    session_start();

    if ($_SESSION['jugador1']['ganador'] && !$_SESSION['jugador2']['ganador']) {
        $ganador = "¡El ganador es jugador 1¡";
    } elseif (!$_SESSION['jugador1']['ganador'] && $_SESSION['jugador2']['ganador']) {
        $ganador = "¡El ganador es jugador 2¡";
    } elseif (!$_SESSION['jugador1']['ganador'] && !$_SESSION['jugador2']['ganador']) {
        $ganador = "Hubo empate :(";
    }

    $_SESSION = array();
    session_destroy();
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $ganador; ?></title>
</head>
<body>
    <h1><?php echo $ganador; ?></h1>
    <a href="index.php">Volver</a>
</body>
</html>
