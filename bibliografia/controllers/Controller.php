<?php
require_once 'models/Model.php';

class SistemaController {
    private $model;

    public function __construct($pdo) {
        $this->model = new SistemaModel($pdo);
        // Iniciar sesión para persistencia del usuario
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function ejecutar() {
        // Captura la acción solicitada por el usuario vía URL
        $accion = isset($_GET['action']) ? $_GET['action'] : 'login_form';

        switch ($accion) {
            case 'registro_form':
                include 'views/registro.php';
                break;

            case 'registrar':
                // Eliminar espacios en blanco según requerimiento
                $user = str_replace(' ', '', $_POST['nombreusuario']);
                $pass = str_replace(' ', '', $_POST['clave']);
                $this->model->registrarUsuario($_POST['cedula'], $_POST['nombre'], $user, $pass);
                header("Location: index.php?action=login_form");
                break;

            case 'validar':
                $user = str_replace(' ', '', $_POST['nombreusuario']);
                $pass = str_replace(' ', '', $_POST['clave']);
                $usuario = $this->model->login($user, $pass);
                if ($usuario) {
                    $_SESSION['user'] = $usuario['nombreusuario'];
                    header("Location: index.php?action=listado");
                } else {
                    echo "Datos incorrectos. <a href='index.php'>Volver</a>";
                }
                break;

            case 'listado':
                if (!isset($_SESSION['user'])) header("Location: index.php");
                $datos = $this->model->obtenerListado();
                include 'views/listado.php';
                break;

            case 'agregar':
                $this->model->agregarEnlace($_POST['titulo'], $_POST['tema'], $_POST['link']);
                header("Location: index.php?action=listado");
                break;

            case 'salir':
                session_destroy();
                header("Location: index.php");
                break;

            default:
                include 'views/login.php';
                break;
        }
    }
}
?>
