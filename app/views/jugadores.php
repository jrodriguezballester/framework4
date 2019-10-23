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
            <?php
            $tabla = '<table border="1">';
            $primeraFila = true;
            foreach ($jugadores as $jugador) {
             //   imprimir::imprime("jugador", $jugador);
                $tabla .= '<tr>';
                if ($primeraFila) {
                    echo "primera fila";
                    foreach ($jugador as $key => $value) {
                        imprimir::imprime("key", $key);
                        $tabla .= '<td>' . $key . '</td>';
                    }
                    $tabla .= '<tr>'; 
                }
                $primeraFila=false;
                foreach ($jugador as $key => $valor) {
                    // $tabla .= '<td>' . $key . '</td>';
                    $tabla .= '<td>' . $valor . '</td>';
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