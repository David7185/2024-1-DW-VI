<?php 


class UsuarioModel {

        private $db;

        public function __construct(){
            $this->db = new BASE;
        }
        public function agregarMedico($datos){

            $this->db->query("INSERT INTO usuarios(nombreu,apellidou,correou,password,telefono, direccion,ep_cod,id_rol,hora_inicio,hora_salida,activo)
                                                     values(:nombreu,:apellidou,:correou,:password,:telefono, :direccion,:ep_cod,:id_rol,:hora_inicio,:hora_salida,:activo)");
            //vincular los valores
            $this->db->bind(':nombreu',$datos['nombreu']);
            $this->db->bind(':apellidou',$datos['apellidou']);
            $this->db->bind(':correou',$datos['correou']);
            $this->db->bind(':password',$datos['password']);
            $this->db->bind(':telefono',$datos['telefono']);
            $this->db->bind(':direccion',$datos['direccion']);
            $this->db->bind(':hora_inicio',$datos['hora_inicio']);
            $this->db->bind(':hora_salida',$datos['hora_salida']);
            $this->db->bind(':ep_cod',$datos['ep_cod']);
            $this->db->bind(':id_rol',$datos['id_rol']);
            $this->db->bind(':activo',$datos['activo']);
            
                if($this->db->execute()){
                    return true;
                }else{
                    return false;
                }
            }

        public function obtenerPacientes(){
            $this->db->query("SELECT * FROM usuarios where id_rol = 1");
            $resultados = $this->db->registros();
            return $resultados;
        }
        public function obtenerUsuarioid($id)
        {
            $this->db->query("SELECT * FROM usuarios WHERE id = :id");
            $this->db->bind(':id', $id);
    
            $fila = $this->db->registro();
            return $fila;
        }
        public function obtenerMedicos(){
            $this->db->query("SELECT * FROM usuarios where id_rol = 2");
            $resultados = $this->db->registros();
            return $resultados;
        }
        public function actualizarMedico($datos)
        {
            $this->db->query("UPDATE usuarios set nombreu=:nombreu,
                                                  apellidou=:apellidou,
                                                  telefono=:telefono,
                                                  direccion=:direccion,
                                                  ep_cod=:ep_cod,
                                                  hora_inicio=:hora_inicio,
                                                  hora_salida=:hora_salida

                                                  WHERE id = :id");
            //vincular los valores
            $this->db->bind(':id', $datos['id']);
            $this->db->bind(':nombreu', $datos['nombreu']);
            $this->db->bind(':apellidou', $datos['apellidou']);
            $this->db->bind(':telefono', $datos['telefono']);
            $this->db->bind(':direccion', $datos['direccion']);
            $this->db->bind(':ep_cod', $datos['ep_cod']);
            $this->db->bind(':hora_inicio', $datos['hora_inicio']);
            $this->db->bind(':hora_salida', $datos['hora_salida']);
          
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function eliminar($datos)
        {
            $this->db->query("UPDATE usuarios set activo=:activo
                                                  WHERE id = :id");
            //vincular los valores
            $this->db->bind(':id', $datos['id']);
            $this->db->bind(':activo', $datos['activo']);
           
          
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

}