<?php

$db = new SQLite3("db/blog.sqlite");

include_once("model.php");

$app_model = new Model($db);

include_once("controller.php");

$app_controller = new Controller($app_model);

$v = $app_controller->getViewParams();

include_once("view.php");

$db->close();

?>
