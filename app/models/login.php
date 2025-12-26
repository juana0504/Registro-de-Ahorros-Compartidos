<?php
require_once __DIR__ . '/../../config/database.php';

class Login {

    private $conexion;

    public function __construct(){
        $db = new Conexion();
        $this->conexion = $db->getConexion();
    }

    public function autenticar($email, $clave){

        $sql = "SELECT id_usuario, nombre, clave 
                FROM usuario 
                WHERE email = :email 
                LIMIT 1";

        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$usuario) {
            return false; // usuario no existe
        }

        if (!password_verify($clave, $usuario['clave'])) {
            return false; // contraseña incorrecta
        }

        return $usuario; // login correcto
    }
}
