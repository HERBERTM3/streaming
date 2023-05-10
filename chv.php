<?php
// Obtener el contenido del archivo JavaScript
$jsFile = file_get_contents('https://www.chilevision.cl/ms_player_src_01/live_1/5c928b7f6d6f41084bdae898/1681435537.js');

// Buscar el valor de la variable "token" con una expresión regular
$tokenRegex = '/var token = \'(.*?)\';/';
preg_match($tokenRegex, $jsFile, $matches);
if (isset($matches[1])) {
  $token = $matches[1];
  // Redirigir al stream con el token
  $streamUrl = "https://mdstrm.com/live-stream-playlist-v/5c928b7f6d6f41084bdae898.m3u8?access_token=$token";
  header("Location: $streamUrl");
} else {
  // Si no se pudo encontrar el token, mostrar un mensaje de error
  echo "No se pudo obtener el token de acceso.";
}
?>