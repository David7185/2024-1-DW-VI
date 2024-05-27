<?php

class ActaModel
{
    private $db;
    
    public function __construct()
    {
        $this->db = new BASE;
    }

    public function agregarActa($datos)
    {
        $this->db->query("INSERT INTO actas(id_reunion, acontecimientos, contenido, estado) 
                          VALUES(:id_reunion, :acontecimientos, :contenido, :estado)");
        // Vincular los valores
        $this->db->bind(':id_reunion', $datos['id_reunion']);
        $this->db->bind(':acontecimientos', $datos['acontecimientos']);
        $this->db->bind(':contenido', $datos['contenido']);
        $this->db->bind(':estado', $datos['estado']);
        
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerActas()
    {
        $this->db->query("SELECT * FROM actas");
        $resultados = $this->db->registros();
        return $resultados;
    }

    public function obtenerActaId($id)
    {
        $this->db->query("SELECT * FROM actas WHERE id = :id");
        $this->db->bind(':id', $id);

        $fila = $this->db->registro();
        return $fila;
    }

    public function obtenerActasPorReunion($id_reunion)
    {
        $this->db->query("SELECT * FROM actas WHERE id_reunion = :id_reunion");
        $this->db->bind(':id_reunion', $id_reunion);

        $resultados = $this->db->registros();
        return $resultados;
    }

    public function actualizarActa($datos)
    {
        $this->db->query("UPDATE actas SET id_reunion=:id_reunion, 
                                           acontecimientos=:acontecimientos, 
                                           contenido=:contenido, 
                                           estado=:estado 
                                           WHERE id = :id");
        // Vincular los valores
        $this->db->bind(':id', $datos['id']);
        $this->db->bind(':id_reunion', $datos['id_reunion']);
        $this->db->bind(':acontecimientos', $datos['acontecimientos']);
        $this->db->bind(':contenido', $datos['contenido']);
        $this->db->bind(':estado', $datos['estado']);
        
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarActa($id)
    {
        $this->db->query("DELETE FROM actas WHERE id = :id");
        // Vincular los valores
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
