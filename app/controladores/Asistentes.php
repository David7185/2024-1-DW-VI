<?php
require_once '../app/librerias/jwt_utils.php';

class Asistentes extends Controlador {
    public function __construct() {
        $this->asistenteModel = $this->modelo('AsistentesModel');
        
        // Iniciar sesión si no está iniciada
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Verificar si hay un token JWT válido
        // $this->checkAuth();
    }

    // private function checkAuth() {
    //     $headers = apache_request_headers();
        
    //     // Depuración: Mostrar todos los encabezados
    //     error_log('Encabezados recibidos: ' . print_r($headers, true));

    //     if (isset($headers['Authorization'])) {
    //         $token = str_replace('Bearer ', '', $headers['Authorization']);
    //         $decoded = validateJWT($token);
    //         if (!$decoded) {
    //             // El token es inválido
    //             http_response_code(401);
    //             echo json_encode(['message' => 'Acceso denegado: Token inválido']);
    //             exit();
    //         }
    //     } else {
    //         // No se proporcionó un token
    //         http_response_code(401);
    //         echo json_encode(['message' => 'Acceso denegado: No se proporcionó un token']);
    //         exit();
    //     }
    // }

    public function index() {
        $asistentes = $this->asistenteModel->obtenerAsistentes();
        $datos = [
            'titulo' => 'Listado de asistentes',
            'asistentes' => $asistentes,
        ];
        $this->vista('asistentes/index', $datos);
    }

    public function registro() {
        return $this->vista('asistentes/registro');
    }

    public function insertar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = [];
            $datos = [
                'id_reunion' => trim($_POST['id_reunion']),
                'id_usuario' => trim($_POST['id_usuario'])
            ];

            if (empty($datos['id_reunion'])) {
                $errors[] = "El campo id_reunion es requerido";
            }
            if (empty($datos['id_usuario'])) {
                $errors[] = "El campo id_usuario es requerido";
            }

            if (count($errors) == 0) {
                if ($this->asistenteModel->agregarAsistente($datos)) {
                    redireccionar('asistentes');
                } else {
                    echo "algo salio mal";
                    die('algo salio mal');
                }
            } else {
                $this->vista('asistentes/registro', $datos, $errors);
            }
        } else {
            $this->vista('asistentes/registro');
        }
    }

    public function editar($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = [];
            $datos = [
                'id' => $id,
                'id_reunion' => trim($_POST['id_reunion']),
                'id_usuario' => trim($_POST['id_usuario'])
            ];

            if (empty($datos['id_reunion'])) {
                $errors[] = "El campo id_reunion es requerido";
            }
            if (empty($datos['id_usuario'])) {
                $errors[] = "El campo id_usuario es requerido";
            }

            if (count($errors) == 0) {
                if ($this->asistenteModel->actualizarAsistente($datos)) {
                    redireccionar('asistentes');
                } else {
                    echo "algo salio mal";
                    die('algo salio mal');
                }
            } else {
                $this->vista('asistentes/editar', $datos, $errors);
            }
        } else {
            $asistente = $this->asistenteModel->obtenerAsistentePorId($id);
            $datos = [
                'id' => $asistente->id,
                'id_reunion' => $asistente->id_reunion,
                'id_usuario' => $asistente->id_usuario
            ];
            $this->vista('asistentes/editar', $datos);
        }
    }

    public function eliminar($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = [
                'id' => $id
            ];
            if ($this->asistenteModel->eliminarAsistente($datos)) {
                redireccionar('asistentes');
            } else {
                echo "algo salio mal";
                die('algo salio mal');
            }
        } else {
            redireccionar('asistentes');
        }
    }
}
?>
