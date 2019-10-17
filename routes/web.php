<?php

$subdomain = 'DWS/framework/4';

return array(	
	"routes" => array(
		"/" => array(
			"route" => $subdomain."/",
			"controller" => "index",
			"action" => "index"
		),

		"Historia" => array(
			"route" => $subdomain."/historia",
			"controller" => "index",
			"action" => "historia"
		),

		"Jugadores" => array(
			"route" => $subdomain."/jugadores",
			"controller" => "index",
			"action" => "jugadores"
		),

		"Jugador" => array(
			"route" => $subdomain."/jugador/:idJugador",
			"controller" => "jugador",
			"action" => "datosJugador"
		),

	),
	"error" => "error.php"
);

