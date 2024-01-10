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
  
        // Instatiate servi
        return new $service();
      }

    // Load view
    public function view($view, $data = []) {
        // check the view file
        if(file_exists('../app/views/'. $view . '.php')) {
            require_once '../app/views/'. $view . '.php';
        } else {
            // view does not exist . 
            die ('View does not exist.');
        }
    }
}