<?php
/*
* Base controller 
*Loads the models and views
*/

class Controller {

    public function model($model) {
        // require model file
        require_once '../app/models/'. $model . '.php';

        // instantiate model
        return new $model(); 
    }

    public function service($service){
        // Require servi file
        require_once '../app/services/implementations/' . $service . '.php';
  
        // Instatiate service
        return new $service();
      }

    // Load view
    public function view($view, $data = []) {
        // Check the view file
        $viewFile = '../app/views/' . $view . '.php';
        
        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            // View does not exist
            die('View file not found: ' . $viewFile);
        }
    }
}