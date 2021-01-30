<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);
Router::get('psycho', 'UserController');
Router::get('volunteers', 'UserController');
Router::get('authors', 'UserController');
Router::get('team', 'UserController');
Router::post('logout', 'SecurityController');
Router::get('index', 'DefaultController');
Router::get('main', 'DefaultController');
Router::post('login', 'SecurityController');
Router::post('register', 'SecurityController');


Router::run($path);