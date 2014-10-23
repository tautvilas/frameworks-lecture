<?php

class BlogController {
    var $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function getViewParams() {
        if (isset($_POST['post']) && $_POST['post']) {
            $text = $_POST['post'];
            $processor = new TextProcessingService();
            $text = $processor->removeSwearWords($text);
            $text = $processor->makeTextHtmlSafe($text);
            $this->model->addPost($text);
            header("Location: " . $_SERVER[REQUEST_URI]);
        }
        $params = new stdClass();
        $params->posts = $this->model->getPosts();
        return $params;
    }
}

?>
