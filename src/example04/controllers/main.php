<?php

class MainController {
    var $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function getViewParams() {
        $params = new stdClass();
        $params->name = "John";
        return $params;
    }
}

?>
