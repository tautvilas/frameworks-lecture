<?php

include_once("routes.php");

$db = new SQLite3("db/blog.sqlite");

include_once("model.php");

$app_model = new Model($db);

foreach (glob("controllers/*.php") as $filename)
{
    include $filename;
}

$route = isset($_GET['route']) ? $_GET['route'] : 'main';

$controller_name = $app_routes[$route];

$app_controller = new $controller_name($app_model);

$v = $app_controller->getViewParams();

foreach (glob("views/*.php") as $filename)
{
    if (pathinfo($filename)['filename'] === $route) {
        include $filename;
    }
}

$db->close();

?>
