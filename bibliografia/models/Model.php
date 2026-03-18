<?php
class SistemaModel {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    // Proceso de registro de nuevo usuario
    public function registrarUsuario($cedula, $nombre, $user, $pass) {
        $sql = "INSERT INTO usuarios (cedula, nombre, nombreusuario, clave) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$cedula, $nombre, $user, $pass]);
    }

    // Proceso de validación de ingreso
    public function login($user, $pass) {
        $sql = "SELECT * FROM usuarios WHERE nombreusuario = ? AND clave = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$user, $pass]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Obtener todos los registros de la tabla LISTADO
    public function obtenerListado() {
        $stmt = $this->db->query("SELECT * FROM LISTADO");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Agregar nueva entrada bibliográfica
    public function agregarEnlace($titulo, $tema, $link) {
        $sql = "INSERT INTO LISTADO (TITULO, TEMA, LINK) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$titulo, $tema, $link]);
    }
}
?>
