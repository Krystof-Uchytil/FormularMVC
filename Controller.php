<?php

abstract class Controller {
    protected function view($view, $data = []) {
        extract($data); // Rozbalí data jako proměnné
        require "views/$view.php";
    }
}