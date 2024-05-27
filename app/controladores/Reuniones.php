<?php
require_once '../app/librerias/jwt_utils.php';

class Reuniones extends Controlador {
    public function __construct() {
        $this->reunionModel = $this->modelo('ReunionModel');
        
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
        $reuniones = $this->reunionModel->obtenerReuniones();
        $datos = [
            'titulo' => 'Listado de reuniones',
            'reuniones' => $reuniones,
        ];
        $this->vista('reuniones/index', $datos);
    }

    public function registro() {
        return $this->vista('reuniones/registro');
    }

    public function insertar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = [];
            $fecha = trim($_POST['fecha']);
            $dias = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
            $timestamp = strtotime($fecha);
            if ($timestamp === false) {
                die('Fecha inválida');
            }
            $dia = $dias[date('w', $timestamp)];
            $datos = [
                'fecha' => $fecha,
                'hora_inicio' => trim($_POST['hora_inicio']),
                'hora_fin' => trim($_POST['hora_fin']),
                'dia' => $dia,
                'invitados' => trim($_POST['invitados'])
            ];

            if (empty($datos['fecha'])) {
                $errors[] = "El campo fecha es requerido";
            }
            if (empty($datos['hora_inicio'])) {
                $errors[] = "El campo hora inicio es requerido";
            }
            if (empty($datos['hora_fin'])) {
                $errors[] = "El campo hora fin es requerido";
            }
            if (empty($datos['invitados'])) {
                $errors[] = "El campo invitados es requerido";
            }
            if (count($errors) == 0) {
                if ($this->reunionModel->agregarReunion($datos)) {
                    redireccionar('reuniones');
                } else {
                    echo "algo salio mal";
                    die('algo salio mal');
                }
            } else {
                $this->vista('reuniones/registro', $datos, $errors);
            }
        } else {
            $this->vista('reuniones/registro');
        }
    }

    public function editar($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = [];
            $fecha = trim($_POST['fecha']);
            $dias = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
            $timestamp = strtotime($fecha);
            if ($timestamp === false) {
                die('Fecha inválida');
            }
            $dia = $dias[date('w', $timestamp)];
            $datos = [
                'id' => $id,
                'fecha' => $fecha,
                'hora_inicio' => trim($_POST['hora_inicio']),
                'hora_fin' => trim($_POST['hora_fin']),
                'dia' => $dia,
                'invitados' => trim($_POST['invitados'])
            ];

            if (empty($datos['fecha'])) {
                $errors[] = "El campo fecha es requerido";
            }
            if (empty($datos['hora_inicio'])) {
                $errors[] = "El campo hora inicio es requerido";
            }
            if (empty($datos['hora_fin'])) {
                $errors[] = "El campo hora fin es requerido";
            }
            if (empty($datos['invitados'])) {
                $errors[] = "El campo invitados es requerido";
            }
            if (count($errors) == 0) {
                if ($this->reunionModel->actualizarReunion($datos)) {
                    redireccionar('reuniones');
                } else {
                    echo "algo salio mal";
                    die('algo salio mal');
                }
            } else {
                $this->vista('reuniones/editar', $datos, $errors);
            }
        } else {
            $reunion = $this->reunionModel->obtenerReunionId($id);
            $datos = [
                'id' => $reunion->id,
                'fecha' => $reunion->fecha,
                'hora_inicio' => $reunion->hora_inicio,
                'hora_fin' => $reunion->hora_fin,
                'dia' => $reunion->dia,
                'invitados' => $reunion->invitados
            ];
            $this->vista('reuniones/editar', $datos);
        }
    }

    public function cerrar($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $reunion = $this->reunionModel->obtenerReunionId($id);
            $datos = [
                'id' => $reunion->id,
                'estado' => 0,
            ];
            if ($this->reunionModel->cerrar($datos)) {
                $data = [
                    'ok' => true,
                    'msg' => 'Registro cerrado con éxito'
                ];
            } else {
                $data = [
                    'ok' => false,
                    'msg' => 'Ha ocurrido un error'
                ];
            }
            echo json_encode($data, true);
        }
    }

    public function reingresar($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $reunion = $this->reunionModel->obtenerReunionId($id);
            $datos = [
                'id' => $reunion->id,
                'estado' => 1,
            ];
            if ($this->reunionModel->cerrar($datos)) {
                $data = [
                    'ok' => true,
                    'msg' => 'Registro reingresado con éxito'
                ];
            } else {
                $data = [
                    'ok' => false,
                    'msg' => 'Ha ocurrido un error'
                ];
            }
            echo json_encode($data, true);
        }
    }
}
?>


