<?php
    // Pongo nombre a la sesión y la inicio
    session_name('juego');
    session_start();

    // Si pulso el botón de reiniciar vacio el array $_SESSION y destruyo la sesión.
    // (Hice $_SESSION = array() porque al hacer var_dump de $_SESSION seguían apareciendo datos, aun habiendo usado session_destroy())
    if (isset($_POST['reiniciar'])) {
        session_destroy();
        header('Location: index.php', true, 302);
    }

    // Si no existen la siguientes variables las crea. Son para llevar el turno y si ya ha ganado alguno.
    if (!isset($_SESSION['jugador1']['turno']) && !isset($_SESSION['jugador2']['turno']) ) {
        $_SESSION['jugador1']['turno'] = true;
        $_SESSION['jugador1']['ganador'] = false;
        $_SESSION['jugador2']['turno'] = false;
        $_SESSION['jugador2']['ganador'] = false;
    }

    // Inicializo esta variable de sesión como Array() porque el nombre de cada botón son números consecutivos.
    if (!isset($_SESSION['posiciones'])) {
        $_SESSION['posiciones'] = array (
            0 => '',
            1 => '',
            2 => '',
            3 => '',
            4 => '',
            5 => '',
            6 => '',
            7 => '',
            8 => ''
        );
    }

    /*
        Compruebo si se ha pulsado algún botón, si se ha pulsado, compruebo que de quién es el turno, guardo en el Array
        de sesión posiciones una 'X', que será la ficha del jugador 1. Luego le quito el turno a ese jugador y se lo doy
        al otro. La parte del else hace lo mismo pero para el jugador 2.
    */
    for ($i=0; $i<9; $i++) {
        if (isset($_POST[$i])) {
            if ($_SESSION['jugador1']['turno']) {
                $_SESSION['posiciones'][$i] = 'X';
                $_SESSION['jugador1']['turno'] = false;
                $_SESSION['jugador2']['turno'] = true;
            } elseif ($_SESSION['jugador2']['turno']) {
                $_SESSION['posiciones'][$i] = 'O';
                $_SESSION['jugador1']['turno'] = true;
                $_SESSION['jugador2']['turno'] = false;
            }
        }
    }


    /*
        Compruebo si hay tres en ralla y de qué jugador, puesto que se le ha asignado una ficha por defecto. Establezco
        que es el ganador y lo redirijo a ganador.php
    */
    // De 0 a 2 ambos jugadores (tres en raya de la primera fila)
    if ($_SESSION['posiciones'][0] === 'X' && $_SESSION['posiciones'][1] === 'X' && $_SESSION['posiciones'][2] === 'X') {
        $_SESSION['jugador1']['ganador'] = true;
        header('Location: ganador.php', true, 302);
    } elseif ($_SESSION['posiciones'][0] === 'O' && $_SESSION['posiciones'][1] === 'O' && $_SESSION['posiciones'][2] === 'O') {
        $_SESSION['jugador2']['ganador'] = true;
        header('Location: ganador.php', true, 302);
    // De 3 a 5 ambos jugadores (tres en raya de la segunda fila)
    } elseif ($_SESSION['posiciones'][3] === 'X' && $_SESSION['posiciones'][4] === 'X' && $_SESSION['posiciones'][5] === 'X') {
        $_SESSION['jugador1']['ganador'] = true;
        header('Location: ganador.php', true, 302);
    } elseif ($_SESSION['posiciones'][3] === 'O' && $_SESSION['posiciones'][4] === 'O' && $_SESSION['posiciones'][5] === 'O') {
        $_SESSION['jugador2']['ganador'] = true;
        header('Location: ganador.php', true, 302);
    // De 6 a 8 ambos jugadores (tres en raya de la tercera fila)
    } elseif ($_SESSION['posiciones'][6] === 'X' && $_SESSION['posiciones'][7] === 'X' && $_SESSION['posiciones'][8] === 'X') {
        $_SESSION['jugador1']['ganador'] = true;
        header('Location: ganador.php', true, 302);
    } elseif ($_SESSION['posiciones'][6] === 'O' && $_SESSION['posiciones'][7] === 'O' && $_SESSION['posiciones'][8] === 'O') {
        $_SESSION['jugador2']['ganador'] = true;
        header('Location: ganador.php', true, 302);
    // De 0, 3 y 6 ambos jugadores (tres en raya de la primera columna)
    } elseif ($_SESSION['posiciones'][0] === 'X' && $_SESSION['posiciones'][3] === 'X' && $_SESSION['posiciones'][6] === 'X') {
        $_SESSION['jugador1']['ganador'] = true;
        header('Location: ganador.php', true, 302);
    } elseif ($_SESSION['posiciones'][0] === 'O' && $_SESSION['posiciones'][3] === 'O' && $_SESSION['posiciones'][6] === 'O') {
        $_SESSION['jugador2']['ganador'] = true;
        header('Location: ganador.php', true, 302);
    // De 1, 4 y 7 ambos jugadores (tres en raya de la segunda columna)
    } elseif ($_SESSION['posiciones'][1] === 'X' && $_SESSION['posiciones'][4] === 'X' && $_SESSION['posiciones'][7] === 'X') {
        $_SESSION['jugador1']['ganador'] = true;
        header('Location: ganador.php', true, 302);
    } elseif ($_SESSION['posiciones'][1] === 'O' && $_SESSION['posiciones'][4] === 'O' && $_SESSION['posiciones'][7] === 'O') {
        $_SESSION['jugador2']['ganador'] = true;
        header('Location: ganador.php', true, 302);
    // De 2, 5 y 8 ambos jugadores (tres en raya de la tercera columna)
    } elseif ($_SESSION['posiciones'][2] === 'X' && $_SESSION['posiciones'][5] === 'X' && $_SESSION['posiciones'][8] === 'X') {
        $_SESSION['jugador1']['ganador'] = true;
        header('Location: ganador.php', true, 302);
    } elseif ($_SESSION['posiciones'][2] === 'O' && $_SESSION['posiciones'][5] === 'O' && $_SESSION['posiciones'][8] === 'O') {
        $_SESSION['jugador2']['ganador'] = true;
        header('Location: ganador.php', true, 302);
    // De 0, 4 y 8 ambos jugadores (tres en raya de la diagonal D1)
    } elseif ($_SESSION['posiciones'][0] === 'X' && $_SESSION['posiciones'][4] === 'X' && $_SESSION['posiciones'][8] === 'X') {
        $_SESSION['jugador1']['ganador'] = true;
        header('Location: ganador.php', true, 302);
    } elseif ($_SESSION['posiciones'][0] === 'O' && $_SESSION['posiciones'][4] === 'O' && $_SESSION['posiciones'][8] === 'O') {
        $_SESSION['jugador2']['ganador'] = true;
        header('Location: ganador.php', true, 302);
    // De 2, 4 y 6 ambos jugadores (tres en raya de la diagonal D2)
    } elseif ($_SESSION['posiciones'][2] === 'X' && $_SESSION['posiciones'][4] === 'X' && $_SESSION['posiciones'][6] === 'X') {
        $_SESSION['jugador1']['ganador'] = true;
        header('Location: ganador.php', true, 302);
    } elseif ($_SESSION['posiciones'][2] === 'O' && $_SESSION['posiciones'][4] === 'O' && $_SESSION['posiciones'][6] === 'O') {
        $_SESSION['jugador2']['ganador'] = true;
        header('Location: ganador.php', true, 302);
    // Si hay empate
    } else {
        /*
            La variable completo trabaja como un flag y la inicio a true indicando que todas las posiciones del tablero
            se han ocupado. Recorro $_SESSION['posiciones'][posicion] y si hay alguna posición que esté vacía cambia el
            flag a false. Si está a true manda la redirección a ganador.php y alli se procesa el caso.
        */
        $completo = true;
        for ($i=0; $i<9; $i++) {
            if ($_SESSION['posiciones'][$i] === '') {
                $completo = false;
            }
        }
        if ($completo)
            header('Location: ganador.php', true, 302);
    }

?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tres en raya</title>
    <link rel="stylesheet" href="index.css" />
</head>
<body>
    <h1>El juego del Tres en raya.</h1>
    <?php
        // Muestro un h1 dependiendo de qué jugador sea el turno.
        if ($_SESSION['jugador1']['turno'] && !$_SESSION['jugador2']['turno'])
            echo '<h1>Turno del jugador 1:</h1>';
        elseif (!$_SESSION['jugador1']['turno'] && $_SESSION['jugador2']['turno'])
            echo '<h1>Turno del jugador 2:</h1>';
    ?>
    <form action="index.php" method="post">
        <?php
            /*
                $j lo uso como contador, para saber cuando tengo que meter un salto de linea.
                En el bucle for lo que hago mostrar el botón de una forma u otra (value y clases css diferentes) para
                saber qué ficha ocupa cada casilla.
            */
            $j = 0;
            for ($i=0; $i<9; $i++) {
                if (isset($_SESSION['posiciones']) && $_SESSION['posiciones'][$i] === '') {
                    echo '<input class="casilla" name="'.$i.'" type="submit" value="_">';
                } elseif ($_SESSION['posiciones'][$i] === 'X') {
                    echo '<input class="casilla texto_azul" name="'.$i.'" type="submit" value="'.$_SESSION['posiciones'][$i].'">';
                } elseif ($_SESSION['posiciones'][$i] === 'O') {
                    echo '<input class="casilla texto_rojo" name="'.$i.'" type="submit" value="'.$_SESSION['posiciones'][$i].'">';
                }

                $j++;
                if ($j == 3) {
                    echo '<br>';
                    $j = 0;
                }
            }
        ?>
        <br>
        <input name="reiniciar" type="submit" value="Reiniciar partida">
    </form>
</body>
</html>

