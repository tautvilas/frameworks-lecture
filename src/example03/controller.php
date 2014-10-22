<?php

class Controller {
    var $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function getViewParams() {
        if (isset($_POST['post']) && $_POST['post']) {
            $this->model->addPost($_POST['post']);
            header("Location: .");
        }
        $params = new stdClass();
        $params->posts = $this->model->getPosts();
        return $params;
    }
}

?>
