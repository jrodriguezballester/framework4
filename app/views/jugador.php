<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Portada</title>
    <link rel="stylesheet" type="text/css" media="screen" href="../public/css/main.css" />
</head>

<body>
    <?php

    use core\MVC\imprimir;

    include "menu.php";
    ?>
    <div id="content">
        <?php

        $tabla = '<table border="1">';
        $primeraFila = true;
        //   $i=0;$j=0;$k=0;
        //   imprimir::imprime("jugador", $jugador);

        $tabla .= '<tr>';
    //    if ($primeraFila) {
            //  echo "primera fila";
            foreach ($jugador[0] as $key => $value) {
                //    imprimir::imprime("key-value", $key);
                $tabla .= '<td>' . $key . '</td>';
            }
            $tabla .= '<tr>';
     //   }
     //   $primeraFila = false;

        foreach ($jugador[0] as $key => $value) {
            // echo "k".$k."<br>";
            //  $k=$k+1;
            $tabla .= '<td>';
            //  imprimir::imprime("value---------", $value);
            $tabla .=   $value . '</a></td>';
        }
        $tabla .= '</tr>';
        $tabla .= '</table>';
        echo $tabla;
        ?>
    </div>
</body>

</html>