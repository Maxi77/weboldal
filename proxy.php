<?php
// Engedélyezzük, hogy a GitHub Pages oldalad (vagy bármilyen más címed) hívhassa ezt a proxyt
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$apiKey = "08462474c8bc8084edbe918bff5bdadb";

// Meghívjuk a WINOVO API-t a szerver oldalról (itt nincs CORS hiba!)
$ch = curl_init('https://winovo.io/api/creator/users');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'x-creator-auth: ' . $apiKey
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Visszaadjuk a választ a leaderboard.html-nek
http_response_code($httpCode);
echo $response;
?>