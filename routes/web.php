<?php

$config = $GLOBALS["config"];

return array(	
	"routes" => array(
		"/" => array(
			"route" => $config["site"]["subdomain"]."/",
			"controller" => "index",
			"action" => "index"
		),

		"Historia" => array(
			"route" => $config["site"]["subdomain"]."/historia",
			"controller" => "index",
			"action" => "historia"
		),

		"Jugadores" => array(
			"route" => $config["site"]["subdomain"]."/jugadores",
			"controller" => "index",
			"action" => "jugadores"
		),

		"Jugador" => array(
			"route" => $config["site"]["subdomain"]."/jugador/:idJugador",
			"controller" => "jugador",
			"action" => "datosJugador"
		),
		"Borrar" => array(
			"route" => $config["site"]["subdomain"]."/borrar",
			"controller" => "baseDatos",
			"action" => "borrar"
		),
		"Insertar" => array(
			"route" => $config["site"]["subdomain"]."/insertar",
			"controller" => "baseDatos",
			"action" => "insertar"
		),
		"Actualizar" => array(
			"route" => $config["site"]["subdomain"]."/actualizar",
			"controller" => "baseDatos",
			"action" => "actualizar"
		),

		"Error" => array(
			"route" => $config["site"]["subdomain"]."/error",
			"controller" => "error",
			"action" => "historia"
		)


	),
	"error" => "error.php"
);

