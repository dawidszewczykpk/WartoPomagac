<?php
session_start();

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::post('login', 'SecurityController');
Router::post('register', 'SecurityController');
Router::post('addOffer', 'OfferController');
Router::post('search_projects', 'OfferController');
Router::post('cities', 'SearchController');
Router::post('random', 'SearchController');

Router::get('search', 'SearchController');
Router::get('offers', 'OfferController');

Router::run($path);