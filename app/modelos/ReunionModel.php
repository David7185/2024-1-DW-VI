<?php


class ReunionModel
{
    private $db;
    public function __construct()
    {
        $this->db = new BASE;
    }
    public function agregarReunion($datos)
    {
        $this->db->query("INSERT INTO reuniones(fecha,hora_inicio,hora_fin,dia)
                                                     values(:fecha,:hora_inicio,:hora_fin,:dia)");
        //vincular los valores
        $this->db->bind(':fecha', $datos['fecha']);
        $this->db->bind(':hora_inicio', $datos['hora_inicio']);
        $this->db->bind(':hora_fin', $datos['hora_fin']);
        $this->db->bind(':dia', $datos['dia']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerReuniones()
    {
        $this->db->query("SELECT * FROM reuniones");
        $resultados = $this->db->registros();
        return $resultados;
    }
    public function obtenerReunionId($id)
    {
        $this->db->query("SELECT * FROM reuniones WHERE id = :id");
        $this->db->bind(':id', $id);

        $fila = $this->db->registro();
        return $fila;
    }
    public function actualizarReunion($datos)
    {
        $this->db->query("UPDATE reuniones set fecha=:fecha,
                                                  hora_inicio=:hora_inicio,
                                                  hora_fin=:hora_fin,
                                                  dia=:dia,
                                                  WHERE id = :id");
        //vincular los valores
        $this->db->bind(':id', $datos['id']);
        $this->db->bind(':fecha', $datos['fecha']);
        $this->db->bind(':hora_inicio', $datos['hora_inicio']);
        $this->db->bind(':hora_fin', $datos['hora_fin']);
        $this->db->bind(':dia', $datos['dia']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

   
    public function eliminar($datos) {
        $this->db->query("DELETE FROM reuniones WHERE id = :id");
        $this->db->bind(':id', $datos['id']);
        
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
}
