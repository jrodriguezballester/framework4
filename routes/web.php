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
		"Error" => array(
			"route" => $config["site"]["subdomain"]."/error",
			"controller" => "error",
			"action" => "historia"
		)


	),
	"error" => "error.php"
);

