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
          //  imprimir::imprime("jugador", $params);
            foreach ($jugador[0] as $key=>$value) {               
                $tabla .= '<tr>';            
                
                        $tabla .= '<td>' .$key . '</td>';
                 
                        $tabla .= '<td>' . $value . '</td>';
                
                    $tabla .= '</tr>'; 
                   
                }
                $primeraFila = false;
          
            $tabla .= '</table>';
            echo $tabla;
            ?>
        </div>    
    </body>
</html>