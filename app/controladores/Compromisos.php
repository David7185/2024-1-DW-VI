<?php 

class Compromisos extends Controlador{

    public function __construct(){
        session_start();
        // if(isset($_SESSION['id_usuario'])){
        //     if($_SESSION['tipo_usuario']==1){
        //         redireccionar('home');
        //     }
        //     $this->usuarioModelo = $this->modelo('UsuarioModel');
        //     $this->epsModel = $this->modelo('EpsModel');
           
        // }else{
        //     redireccionar('auth/login');
        // }
      
    }
    public function index(){
       
        // $medicos=$this->usuarioModelo->obtenerMedicos();
       
        $datos=[
            'titulo'=>'Listado de compromisos',
            // 'medicos'=>$medicos,
        ];
        $this->vista('compromisos/index',$datos);
        
    }
public function registro(){
 
    $eps = $this->epsModel->obtenerEps();
    $datos=[
        'eps'=>$eps,
    ];
    return $this->vista('medicos/registro',$datos);
}
    public function insertar(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $errors = [];
            $pass = trim($_POST['repassword']);

            $datos = [
                'nombreu'=>trim($_POST['nombreu']),
                'apellidou'=>trim($_POST['apellidou']),
                'telefono'=>trim($_POST['telefono']),
                'direccion'=>trim($_POST['direccion']),
                'correou'=>trim($_POST['correou']),
                'hora_inicio'=>trim($_POST['hora_inicio']),
                'hora_salida'=>trim($_POST['hora_salida']),
                'password'=>trim($_POST['password']),
                'repassword'=>trim($_POST['repassword']),
                'id_rol'=>2,
                'activo'=>1,
                'ep_cod'=>trim($_POST['ep_cod'])
            ];
            if (isNull($datos, $pass)) {
                $errors[] = "Debe llenar todos los campos";
            }
            if (!isEmail($datos['correou'])) {
                $errors[] = "Direccion de correo invalida";
            }
            if (!validPassword($datos['password'], $pass)) {
                $errors[] = "Las contraseñas no coinciden";
            }if (count($errors) == 0) {
                $datos['password'] = hashPassword(trim($_POST['password']));
                if ($this->usuarioModelo->agregarMedico($datos)) {
                    redireccionar('medicos');
                } else {
                    echo "algo salio mal";
                    die('algo salio mal');

                }

            } else {

                $this->vista('medicos/registro', $datos, $errors);
            }

            
        }else{
            $this->vista('medicos/registro');
        }
    }

    public function editar($id){
        session_start();
        if($_SESSION['tipo_usuario'] == 2){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $datos=[
                    'id'=>$id,
                    'nombreu'=>trim($_POST['nombreu']),
                    'apellidou'=>trim($_POST['apellidou']),
                    'telefono'=>trim($_POST['telefono']),
                    'direccion'=>trim($_POST['direccion']),
                    'hora_inicio'=>trim($_POST['hora_inicio']),
                    'hora_salida'=>trim($_POST['hora_salida']),
                    'ep_cod'=>trim($_POST['ep_cod']),
                    'correou'=>trim($_POST['telefono'])
                ];
               if($this->usuarioModelo->actualizarMedico($datos)){
                   redireccionar('medicos');
                }else{
                    die('algo salio mal');
                }
            }else{
                $user = $this->usuarioModelo->obtenerUsuarioid($id);
                $eps = $this->epsModel->obtenerEps();
                $datos = [
                    'id'=>$user->id,
                    'nombreu'=>$user->nombreu,
                    'apellidou'=>$user->apellidou,
                    'hora_inicio'=>$user->hora_inicio,
                    'hora_salida'=>$user->hora_salida,
                    'telefono'=>$user->telefono,
                    'direccion'=>$user->direccion,
                    'correou'=>$user->id_rol,
                    'eps'=>$eps
                ];
                
              $this->vista('medicos/editar',$datos);
            }
        }else{
            redireccionar('auth/login');
        }
}

public function eliminar($id){
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $medico = $this->usuarioModelo->obtenerUsuarioid($id);
        $datos = [
            'id'=>$medico->id,
            'activo'=>0,           
        ];
          if($this->usuarioModelo->eliminar($datos)){
            $data=['ok'=>true,
                    'msg'=>'registro eliminado con exito'];   
          }else{
            $data=['ok'=>false,
            'msg'=>'Ha ocurrido un error'];   
          }
          echo json_encode($data,true);
    }
}

public function reingresar($id){
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $medico = $this->usuarioModelo->obtenerUsuarioid($id);
        $datos = [
            'id'=>$medico->id,
            'activo'=>1,           
        ];
          if($this->usuarioModelo->eliminar($datos)){
            $data=['ok'=>true,
                    'msg'=>'registro reingresado con exito'];   
          }else{
            $data=['ok'=>false,
            'msg'=>'Ha ocurrido un error'];   
          }
          echo json_encode($data,true);
    }
}
}