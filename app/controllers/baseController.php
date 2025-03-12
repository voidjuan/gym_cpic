<?php
namespace App\Controllers;
# Comienzo de las sesiones
session_start();
class BaseController {
    protected string $layout = "main_layout";

    public function __construct()
    {
        // Validar el tiempo de inactividad de un usuario
        // El tiempo no debe superar lo configurado en INACTIVE_TIME
        if (isset($_SESSION["timeout"])) {
            # Se calcula el tiempo de sesión transcurrido
            $tiempoSesion = time() - $_SESSION["timeout"];
            if ($tiempoSesion > INACTIVE_TIME*60) {
                session_destroy();
                header("Location: /login/login");
            } else {
                $_SESSION["timeout"] = time();
            }
        }
    }
    public function render(string $view, array $data=null){
        if (isset($data) && is_array($data)) {
            foreach ($data as $key => $value) {
                $$key = $value;
            }
        }
        $content = MAIN_APP_ROUTE. "../views/$view";
        $layout = MAIN_APP_ROUTE. "../views/layouts/$this->layout.php";
        include_once $layout;
    }
    
    public function formatNumber() {
        echo "<br>Formatea un numero";
    }

    public function redirecTo($view){
        header("location: /$view");
    }
}