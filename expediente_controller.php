<?php
	ini_set('display_errors','On');
    ini_set('display_errors',1);
	
	// Datos de entrada
	$numero = $_POST["numero"];
	$anio = $_POST["anio"];
	$letra = $_POST["letra"];
	$muni = $_POST["muni"];

	// URL del webservice
	$url = "https://www.municipioonline.com.ar/WS/WebServiceTO/BuscaExpte.php?numero=" . $numero . "&anio=" . $anio . "&letra=" . $letra . "&enti=" .$muni;

	/// Inicializa cURL
	$ch = curl_init();

	// Configura opciones de cURL
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10); // Timeout para la solicitud
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Desactivar verificación SSL para pruebas (no recomendado en producción)


	// Ejecuta la solicitud
	$response = curl_exec($ch);

	// Maneja errores de cURL
	if (curl_errno($ch)) {
		$error_msg = curl_error($ch);
		curl_close($ch);
		die("cURL error: $error_msg");
	}

	// Verificar el código de respuesta HTTP
	$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	if ($http_code !== 200) {
		curl_close($ch);
		die("Error HTTP: $http_code");
	}

	// Cierra cURL
	curl_close($ch);

	// Decodifica la respuesta JSON
	$datos = json_decode($response, true);

	// Verifica si la respuesta JSON está vacía
	if (json_last_error() !== JSON_ERROR_NONE) {
		die('Error decodificando JSON: ' . json_last_error_msg());
	}

	// Devuelve la respuesta JSON
	header('Content-Type: application/json');
	echo json_encode($datos);
?>