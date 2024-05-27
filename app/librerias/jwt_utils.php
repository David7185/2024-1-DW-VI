<?php

require '..\vendor\autoload.php';
use \Firebase\JWT\JWT;

// Define la clave secreta
define('JWT_SECRET_KEY', '12345!');  // Reemplaza esto con tu clave secreta

function generateJWT($user_id, $email) {
    $key = JWT_SECRET_KEY;  // Usa la constante definida
    $payload = [
        "iss" => "http://localhost/acta-reuniones",
        "aud" => "http://localhost/acta-reuniones",
        "iat" => time(),
        "nbf" => time(),
        "exp" => time() + (60*60), // Token válido por 1 hora
        "data" => [
            "id" => $user_id,
            "email" => $email
        ]
    ];

    $jwt = JWT::encode($payload, $key, 'HS256'); // Incluye el algoritmo de firma
    return $jwt;
}

function validateJWT($jwt) {
    $key = JWT_SECRET_KEY;  // Usa la misma constante definida

    try {
        $decoded = JWT::decode($jwt, new \Firebase\JWT\Key($key, 'HS256'));
        return $decoded; // Devuelve el token decodificado
    } catch (Exception $e) {
        // Mensaje de error para depuración
        error_log("JWT Error: " . $e->getMessage());
        return false;
    }
}
?>