<?php 

require_once '../app/librerias/jwt_utils.php';

class Auth extends Controlador{
    public function __construct(){
        session_start();
        if(isset($_SESSION['id_usuario'])){
            redireccionar('pacientes');
        }else{
            $this->authModel = $this->modelo('AuthModel');
        }
     
    }
    public function index(){
       return $this->vista('auth/login');
    }

    public function registrar(){
     
        return $this->vista('auth/registro');
    }

    public function insertar(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $errors = [];
            $pass = trim($_POST['clave']);

            $datos = [
                'nombres'=>trim($_POST['nombres']),
                'apellidos'=>trim($_POST['apellidos']),
                'email'=>trim($_POST['email']),
                'clave'=>trim($_POST['clave']),
                'clave2'=>trim($_POST['clave2']),
                'rol'=>trim($_POST['rol']),
            ];
            if (isNull($datos, $pass)) {
                $errors[] = "Debe llenar todos los campos";
            }
            if (!isEmail($datos['email'])) {
                $errors[] = "Direccion de correo invalida";
            }
            if (!validPassword($datos['clave'], $pass)) {
                $errors[] = "Las contraseñas no coinciden";
            }if (count($errors) == 0) {
                $datos['clave'] = hashPassword(trim($_POST['clave']));
                if ($this->authModel->agregarUsuario($datos)) {
                    redireccionar('auth/login');
                } else {
                    echo "algo salio mal";
                    die('algo salio mal');

                }

            } else {

                $this->vista('auth/registro', $datos, $errors);
            }

            
        }else{
            $this->vista('auth/registro');
        }
        
    }


    public function iniciarsesion(){
        if ($_SERVER["REQUEST_METHOD"] = "POST") {
            
            $errors = [];
            $correo = trim($_POST['email']);
            $password = trim($_POST['clave']);

            if (isNullLogin($correo, $password)) {
                $errors[] = "Debe llenar todos los campos";
                $this->vista("auth/login", $datos = [], $errors);
            } else if ($this->authModel->login($correo, $password)) {
                $fila = $this->authModel->login($correo, $password);
                    $validpassw = password_verify($password, $fila->clave);
                    if ($validpassw) {
                        
                        $_SESSION['id_usuario'] = intval($fila->id);
                        $_SESSION['tipo_usuario'] = intval($fila->rol);
                        $_SESSION['nombres'] = $fila->nombres .' '.$fila->apellidos ;
                        // if($_SESSION['tipo_usuario'] == 2){
                        //     $_SESSION['nombres'] = $fila->nombres .' '.$fila->apellidos ;
                        //     $_SESSION['id']= $fila->id;
                        //     redireccionar('medicos');
                        // }else if ($_SESSION['tipo_usuario'] == 1){
                        //     $_SESSION['nombres'] = $fila->nombres .' '.$fila->apellidos ;
                        //     $_SESSION['id']= $fila->id;
                        //     redireccionar('home');
                        // }
                        // Devuelve el token al cliente, por ejemplo, en un JSON
                        // Generar el token JWT
                        $token = generateJWT($fila->id, $fila->email);
                        $_SESSION['token'] = $token;

                        // Configurar el encabezado de respuesta para JSON
                        // header('Content-Type: application/json');
                       

                        // Devolver el token JWT en formato JSON
                        // echo json_encode(['token' => $token]);

                        

                        redireccionar('home');
                    } else {
                        $errors[] = "La usuario o contraseña incorrectos";
                        $this->vista("auth/login", $datos = [], $errors);
                    }
               
            }
            
            else {
                $errors[] = "El usuario o correo electronico no existe";
                $this->vista("auth/login", $datos = [], $errors);
            }
        }
    }

    public function salir()
    {
        session_start();
        session_destroy();
        redireccionar('auth/login');

    }
}