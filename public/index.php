<?php

//echo 'Hello from the public folder!<br>';

//echo '<h2>Requested url = ' . $_SERVER['QUERY_STRING'] . '</h2>';

require '../Core/Router.php';

$router = new Router();
//echo 'class we\'ve got is ' . get_class($router);
// เพิ่ม route
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
$router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);

// แสดงผล routing table
echo '<h2>Matched Route</h2>';
$url = $_SERVER['QUERY_STRING'];
if ($router->match($url)) {
    echo '<pre>';
    var_dump($router->getParams());
    echo '</pre>';
} else {
    echo "No route found for the URL '$url'";
}

//echo '<h2>Route Table</h2>';
//echo '<pre>';
//var_dump($router->getRoutes());
//echo '</pre>';

