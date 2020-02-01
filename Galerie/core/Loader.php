<?php

class Loader {

  public function view($view, $data = []) {
    foreach ($data as $key=>$value) $$key = $value;
    include "views/${view}.php";
  }

  public function load($view = null, $data = []) {
    $this->define_helper();
    $data = $this->inject_model_data($data);
    $this->view('header', $data);
    if ($view!==null) $this->view($view, $data);
    $this->view('footer', $data);
  }
  
  public function define_helper() { //je capte pas a quoi sert la fonction dans la fonction
    function set_value($name) {
      return isset($_POST[$name])?htmlentities($_POST[$name]):'';
    }
  }

  public function add_model($model_name, $model) {
    $this->models [$model_name] = $model;
  }

  private function inject_model_data($data) {
    foreach ( $this->models as $model )
      $data = $model->inject_data ( $data );
    return $data;
  }

}
?>