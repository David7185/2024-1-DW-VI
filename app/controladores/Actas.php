<?php 

class Actas extends Controlador{

    public function __construct(){
        session_start();
        // if(isset($_SESSION['id_usuario'])){
        //     if($_SESSION['tipo_usuario'] ==1){
        //         redireccionar('home');
        //     }
           $this->reunionModel = $this->modelo('ReunionModel');
           $this->actaModel = $this->modelo('ActaModel');
        // }else{
        //     redireccionar('auth/login');
        // }
    }
    public function index($idReunion){
        $reunion=$this->reunionModel->obtenerReunionId($idReunion);
        $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
  
        $timestamp = strtotime($reunion->fecha);
            if ($timestamp === false) {
                die('Fecha inválida');
            }
            // Obtener el día de la semana
            $reunion->fecha = $dias[date('w', $timestamp)]." ".date('d', $timestamp)." de ".$meses[date('n', $timestamp)-1]. " del ".date('Y', $timestamp);
        $datos=[
            'titulo'=>'Detalle de reunion',
            'reunion'=>$reunion,
        ];
        $this->vista('reuniones/ver-detalle',$datos);
    }

    public function registro($idReunion){
        $datos=[
            'idReunion'=>$idReunion,
        
        ];
        return $this->vista('actas/registro',$datos);
    }

    public function insertar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = [];
            $idReunion = trim($_POST['id_reunion']);
            $reunion = $this->reunionModel->obtenerReunionId($idReunion);
            // $fecha = trim($_POST['fecha']);
            // $dias = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
            // // Convertir la fecha a timestamp
            // $timestamp = strtotime($fecha);
            // if ($timestamp === false) {
            //     die('Fecha inválida');
            // }
            // Obtener el día de la semana
            // $dia = $dias[date('w', $timestamp)];
            $datos = [
                'id_reunion' => $idReunion,
                'acontecimientos' => trim($_POST['acontecimientos']),
                'contenido' => trim($_POST['contenido']),
                'estado' => trim($_POST['estado'])
                // 'fecha' => $fecha,
                // 'hora_inicio' => trim($_POST['hora_inicio']),
                // 'hora_fin' => trim($_POST['hora_fin']),
                // 'dia' => $dia,
                // 'invitados' => trim($_POST['invitados'])
            ];
           
            // if (isValid($datos['fecha'])) {
            //     $errors[] = "El campo fecha es requerido";
            // }
            // if (isValid($datos['hora_inicio'])) {
            //     $errors[] = "El campo hora inicio es requerido";
            // }
            // if (isValid($datos['hora_fin'])) {
            //     $errors[] = "El campo hora fin es requerido";
            // }
            // if (isValid($datos['invitados'])) {
            //     $errors[] = "El campo invitados es requerido";
            // }
             
            if (empty($datos['acontecimientos'])) {
                $errors[] = "El campo acontecimientos es requerido";
            }
            if (empty($datos['contenido'])) {
                $errors[] = "El campo contenido es requerido";
            }
            if (empty($datos['estado'])) {
                $errors[] = "El campo estado es requerido";
            }
            if (count($errors) == 0) {

                if ($this->actaModel->agregarActa($datos)) {
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
}