<?php
require_once __DIR__ . '/../../config/database.php';

class Usuario
{
    private $conexion; // Propiedad para almacenar la conexión a la base de datos

    // Constructor: se ejecuta automáticamente cuando se crea el objeto
    public function __construct()
    {
        $db = new conexion(); // Crea una nueva instancia de la clase conexion (config/database.php)
        $this->conexion = $db->getConexion(); // Obtiene la conexión PDO y la guarda en $this->conexion
    }

    // Verifica correo en la tabla USUARIO (representante)
    public function emailUsuarioExiste($email)
    {
        $sql = "SELECT id_usuario FROM usuario WHERE email = :email LIMIT 1";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function registrar($data)
    {
        try {
            $insert = "INSERT INTO usuario(
            nombre,
            email,
            clave
            )VALUES(
            :nombre,
            :email,
            :clave)";

            $resultado = $this->conexion->prepare($insert);
            $resultado->bindParam(':nombre', $data['nombre']);
            $resultado->bindParam(':email', $data['email']);
            $resultado->bindParam(':clave', $data['clave']);

            return $resultado->execute();
        } catch (PDOException $e) {
            error_log("Error en usuario::registrar->" . $e->getMessage());
            return false;
        }
    }
}
