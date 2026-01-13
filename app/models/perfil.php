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

    // esta funcion se duplica por cada rol
    public function mostrarUsuario($id){
        try{

            $consultar = "SELECT * FROM usuario WHERE id_usuario = :id_usuario LIMIT 1";

            $resultado = $this->conexion->prepare($consultar);
            $resultado->bindParam(':id_usuario', $id);
            $resultado->execute();

            return $resultado->fetch();
        }catch(PDOexception $e){
            error_log("Error en usuario::mostrarUsuario->" . $e->getMessage());
            return;
        }
    }
}
?>