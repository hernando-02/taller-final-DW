<?php

class UsuariosController
{
    public function __construct()
    {
        require_once "models/UsuariosModel.php";
    }

    public function index()
    {
        header('Content-type:application/json;charset=utf-8');
        $usuarios = new UsuarioModel();
        echo (json_encode($usuarios->getAllUsuarios()));

    }

    public function getOne()
    {
        $body = json_decode(file_get_contents("php://input"), true);

        if ($_SERVER["REQUEST_METHOD"] == "GET") {

            $id = $_GET['id'];

            header('Content-type:application/json;charset=utf-8');
            $usuario = new UsuarioModel();
            echo (json_encode($usuario->getUsuario($id)));

        }

    }

    public function create()
    {
        $body = json_decode(file_get_contents("php://input"), true);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $username = $body['username'];
            $password = $body['password'];
            $nombres = $body['nombres'];
            $apellidos = $body['apellidos'];
            $tipo_id = $body['tipo_id'];

            $usuario = new UsuarioModel();
            $usuario->createUsuario($username, $password, $nombres, $apellidos, $tipo_id);
        }

    }

    public function update()
    {
        $body = json_decode(file_get_contents("php://input"), true);

        if ($_SERVER["REQUEST_METHOD"] == "PUT") {

            $id = $body['id'];
            $username = $body['username'];
            $password = $body['password'];
            $nombres = $body['nombres'];
            $apellidos = $body['apellidos'];
            $tipo_id = $body['tipo_id'];

            $usuario = new UsuarioModel();
            $usuario->updateUsuario($id, $username, $password, $nombres, $apellidos, $tipo_id);

        }

    }

    public function delete()
    {
        $body = json_decode(file_get_contents("php://input"), true);

        if ($_SERVER["REQUEST_METHOD"] == "DELETE") {

            $id = $_GET['id'];

            $usuario = new UsuarioModel();
            $usuario->deleteUsuario($id);

        }

    }

}
?>