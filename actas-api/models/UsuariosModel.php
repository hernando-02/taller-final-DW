<?php

class UsuarioModel
{
    private $db;
    private $usuarios;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }


    public function getAllUsuarios()
    {
        $sql = "SELECT * FROM usuarios";
        $resultado = $this->db->query($sql);
        while ($row = $resultado->fetch_assoc()) {
            $this->usuarios[] = $row;
        }

        return $this->usuarios;

    }


    public function getUsuario($id)
    {
        $sql = "SELECT * FROM usuarios WHERE id = '$id'";
        $result = $this->db->query($sql);
        while ($row = $result->fetch_assoc()) {
            $usuario[] = $row;
        }

        return $usuario;

    }


    public function createUsuario($username, $password, $nombres, $apellidos, $tipo_id)
    {
        $resultado = $this->db->query("INSERT INTO	usuarios ( username, password, nombres, apellidos, tipo_id ) 
        VALUES ('$username', '$password', '$nombres', '$apellidos', '$tipo_id')");

    }


    public function updateUsuario($id, $username, $password, $nombres, $apellidos, $tipo_id)
    {
        $resultado = $this->db->query(
            "UPDATE usuarios 
             SET username='$username', password='$password', nombres='$nombres', apellidos='$apellidos', tipo_id='$tipo_id'
             WHERE id = '$id'"
        );

    }


    public function deleteUsuario($id)
    {
        $resultado = $this->db->query("DELETE FROM usuarios WHERE id = '$id'");

    }

}

?>