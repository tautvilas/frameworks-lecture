<?php

class BlogController {
    var $model;
    var $processor;

    public function __construct($model, TextProcessingService $processor) {
        $this->model = $model;
        $this->processor = $processor;
    }

    public function getViewParams() {
        if (isset($_POST['post']) && $_POST['post']) {
            $text = $_POST['post'];
            $text = $this->processor->removeSwearWords($text);
            $text = $this->processor->makeTextHtmlSafe($text);
            $this->model->addPost($text);
            header("Location: " . $_SERVER[REQUEST_URI]);
        }
        $params = new stdClass();
        $params->posts = $this->model->getPosts();
        return $params;
    }
}

?>
