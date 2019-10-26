<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Portada</title>
    <link rel="stylesheet" type="text/css" media="screen" href="public/css/main.css" />
</head>

<body>
    <?php

    use core\MVC\imprimir;

    include "menu.php";
    ?>
    <div id="content">
        <div id="players">
        <h1>Jugadores de los Lakers</h1>
            <?php
            $tabla = '<table border="1" style="margin:auto">';
            $primeraFila = false;
            foreach ($jugadores as $jugador) {
                //   imprimir::imprime("jugador", $jugador);
                $tabla .= '<tr>';
                if ($primeraFila) {
             //       echo "primera fila";
                    foreach ($jugador as $key => $value) {
             //           imprimir::imprime("key", $key);
                        $tabla .= '<td>' . $key . '</td>';
                    }
                    $tabla .= '<tr>';
                }
                $primeraFila = false;//////////////cambiar ruta 
                foreach ($jugador as $key => $value) {
                    $tabla .= '<td>';
                    $tabla .= ' <a href="'.$config['site']['root'].'/jugador/' . $jugador['codigo'] . '">';
                    $tabla .=   $value . '</a></td>';
                }
                $tabla .= '</tr>';
            }
            $tabla .= '</table>';
            echo $tabla;
            ?>
        </div>
    </div>
</body>

</html>