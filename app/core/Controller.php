<?php

namespace Main\core;
// Define the Controller class
class Controller
{
    protected function loadModel($model)
    {
        // Include the model file from the models directory
        //require_once '../app/models/' . $model . '.php';
        $modelClass = "Main\\models\\" . $model;
        // Instantiate and return the model object
        return new $modelClass;
    }
    protected function renderView($viewPath, $data = [])
    {
        $errors = $data['errors'] ?? Session::flash('errors') ?? [];
        $old    = $data['old'] ?? Session::flash('old') ?? [];

        extract($data);

        ob_start();
        require "../app/views/{$viewPath}.php";
        $content = ob_get_clean();

        require "../app/views/layouts/main.php";
    }
}
