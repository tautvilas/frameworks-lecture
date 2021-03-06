<?php

include_once("routes.php");

$db = new SQLite3("db/blog.sqlite");

include_once("model.php");

$app_model = new Model($db);

foreach (glob("services/*.php") as $filename) {
    include $filename;
}

foreach (glob("controllers/*.php") as $filename) {
    include $filename;
}

$route = isset($_GET['route']) ? $_GET['route'] : 'main';

$controller_name = $app_routes[$route];

/* DI code */
$iocContainer = array();
$controllerArgs = array($app_model);
$constructor = new ReflectionMethod($controller_name, '__construct');
$params = $constructor->getParameters();
foreach($params as $param) {
    $paramClass = $param->getClass();
    if ($paramClass != NULL) {
        $serviceType = $paramClass->name;
        if (!array_key_exists($serviceType, $iocContainer)) {
            $iocContainer[$serviceType] = new $serviceType();
        }
        $controllerArgs[] = $iocContainer[$serviceType];
    }
}
$class = new ReflectionClass($controller_name);
$app_controller = $class->newInstanceArgs($controllerArgs);

/* View setup */

$v = $app_controller->getViewParams();

foreach (glob("views/*.php") as $filename) {
    if (pathinfo($filename)['filename'] === $route) {
        include $filename;
    }
}

$db->close();

?>
