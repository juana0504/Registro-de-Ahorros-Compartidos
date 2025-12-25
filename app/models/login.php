<?php
require_once __DIR__ . '/../config/database.php';

class Login{

    private $conexion;

    public function __construct(){
        $db = new Conexion();
        $this->conexion = $db->getConexion();
    }

    public function autenticar($email, $clave){

        try{
            $insert = "SELECT * FROM usuario WHERE email = :email LIMIT 1";
            $resultado = $this->conexion->prepare($insert);
            $resultado->bindParam(':email', $email);
            $resultado->execute();
            $resultado->fetch(PDO::FETCH_ASSOC);
        }catch (PDOException $e) {
            //AQUÍ VA TU CATCH PARA CORREO DUPLICADO
            if ($e->getCode() == 23000) {
                mostrarSweetAlert('error', 'Correo duplicado', 'Este correo ya existe en el sistema.');
                return false;
            }

            error_log("Error en usuario::registrar->" . $e->getMessage());
            return false;
        }
    }
}