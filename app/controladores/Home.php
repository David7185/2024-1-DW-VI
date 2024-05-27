<?php 
require_once '../app/librerias/jwt_utils.php';
class Home extends Controlador{

    public function __construct(){
        session_start();
        if(!isset($_SESSION['id_usuario'])){
            redireccionar('auth/login');
        }
        $tokenV = $_SESSION['token'] ?? null; // Verificar si el token está definido

        if ($tokenV === null) {
            // Redirigir al login si el token no está definido
            redireccionar('auth/login');
        }

        $this->checkAuth($tokenV);
    }

    private function checkAuth($tokenV) {
        $headers = apache_request_headers();
        
        // Depuración: Mostrar todos los encabezados
        // error_log('Encabezados recibidos: ' . print_r($headers, true));

        // if (isset($headers['Authorization'])) {
            // $token = str_replace('Bearer ', '', $headers['Authorization']);
            $decoded = validateJWT($tokenV);
             // Devolver el token JWT en formato JSON
             echo json_encode(['token' => $decoded]);
            if (!$decoded) {
                // El token es inválido
                http_response_code(401);
                echo json_encode(['message' => 'Acceso denegado: Token inválido']);
                exit();
            }
        // } else {
        //     // No se proporcionó un token
        //     http_response_code(401);
        //     echo json_encode(['message' => 'Acceso denegado: No se proporcionó un token']);
        //     exit();
        // }
    }

    public function index(){
        $datos = [
            'titulo'=>'citas agendadas'
        ];
       return $this->vista('home',$datos);
    }

   
}