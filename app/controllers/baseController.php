<?php
namespace App\Controllers;
class BaseController {
    public function render(string $view, array $data=null){
        if (isset($data) && is_array($data)) {
            foreach ($data as $key => $value) {
                // echo "<br>Key> $key";
                $$key = $value;
                // echo "<pre>";
                // print_r($value);
                // echo "</pre>";
            }
        }
        include_once MAIN_APP_ROUTE.'../views/'.$view;
    }
    
    public function formatNumber() {
        echo "<br>Formatea un numero";
    }

    public function redirecTo($view){
        header("location: /$view");
    }
}