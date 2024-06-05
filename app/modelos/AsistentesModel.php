<?php

class AsistentesModel
{
    private $db;
    public function __construct()
    {
        $this->db = new BASE;
    }

    public function agregarAsistente($datos)
    {
        $this->db->query("INSERT INTO asistentes (id_reunion, id_usuario) VALUES (:id_reunion, :id_usuario)");
        // Vincular los valores
        $this->db->bind(':id_reunion', $datos['id_reunion']);
        $this->db->bind(':id_usuario', $datos['id_usuario']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerAsistentes()
    {
        $this->db->query("SELECT * FROM asistentes");
        $resultados = $this->db->registros();
        return $resultados;
    }

    public function obtenerAsistentePorId($id)
    {
        $this->db->query("SELECT * FROM asistentes WHERE id = :id");
        $this->db->bind(':id', $id);
        $fila = $this->db->registro();
        return $fila;
    }

    public function actualizarAsistente($datos)
    {
        $this->db->query("UPDATE asistentes SET id_reunion = :id_reunion, id_usuario = :id_usuario WHERE id = :id");
        // Vincular los valores
        $this->db->bind(':id', $datos['id']);
        $this->db->bind(':id_reunion', $datos['id_reunion']);
        $this->db->bind(':id_usuario', $datos['id_usuario']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarAsistente($datos)
    {
        $this->db->query("DELETE FROM asistentes WHERE id = :id");
        // Vincular los valores
        $this->db->bind(':id', $datos['id']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
