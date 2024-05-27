<?php


class AuthModel
{

    private $db;

    public function __construct()
    {
        $this->db = new BASE;
    }

    public function agregarUsuario($datos)
    {

        $this->db->query("INSERT INTO usuarios(nombres,apellidos,email,clave,rol) VALUES (:nombres,:apellidos,:email,:clave,:rol)");
        //vincular los valores
        $this->db->bind(':nombres', $datos['nombres']);
        $this->db->bind(':apellidos', $datos['apellidos']);
        $this->db->bind(':email', $datos['email']);
        $this->db->bind(':clave', $datos['clave']);
        $this->db->bind(':rol', $datos['rol']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function login($correo, $password)
    {
        $this->db->query("SELECT * from usuarios WHERE clave= :clave || email = :email limit 1");
        $this->db->bind(':clave', $password);
        $this->db->bind(':email', $correo);

        $fila = $this->db->registro();

        return $fila;
    }

    function emailExiste($email)
    {
        $this->db->query("SELECT id  FROM usuarios WHERE email = :email LIMIT 1");
        $this->db->bind(':email', $email);
        $fila = $this->db->registro();
        if ($fila) {
            return true;
        } else {
            return false;
        }
    }
}
