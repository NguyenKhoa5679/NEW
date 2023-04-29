<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require __DIR__ . '/../bootstrap.php';

define('APPNAME', 'Kei Story'); 

session_start();

$router = new \Bramus\Router\Router();

// Auth routes
$router->post('/logout', '\App\Controllers\Auth\LoginController@logout');
$router->get('/register', '\App\Controllers\Auth\RegisterController@showRegisterForm');
$router->post('/register', '\\App\Controllers\Auth\RegisterController@register');
$router->get('/login', '\App\Controllers\Auth\LoginController@showLoginForm');
$router->post('/login', '\App\Controllers\Auth\LoginController@login');
$router->set404('\App\Controllers\Controller@sendNotFound');


$router->get('/', '\App\Controllers\homeController@index');
$router->get('/home', '\App\Controllers\homeController@index');

$router->get('/addBook', '\App\Controllers\Story\storyController@addStory');
$router->get('/editBook', '\App\Controllers\Story\storyController@editBook');
$router->get('/showBook', '\App\Controllers\Story\storyController@showStory');
// $router->get('/deleteBook', '\App\Controllers\Story\storyController@deleteBook');

$router->get('/addChapter', '\App\Controllers\Story\storyController@addChapter');
$router->get('/editChapter', '\App\Controllers\Story\storyController@editChapter');
$router->get('/showChapter', '\App\Controllers\Story\storyController@showChapter');
// $router->get('/deleteChapter', '\App\Controllers\storyController@deleteChapter');

$router->get('/admin', '\App\Controllers\Auth\UserController@admin');
$router->get('/profile', '\App\Controllers\Auth\UserController@profile');
$router->get('/myFavorite', '\App\Controllers\Auth\UserController@myFavorite');
$router->get('/myStory', '\App\Controllers\Auth\UserController@myStory');

// $router->get('/hello/(\w+)', function($name) {
//     echo 'Hello ' . htmlentities($name);
// });

$router->get('/movies/(\d+)/photos/(\d+)', function($movieId, $photoId) {
    echo 'Movie #' . $movieId . ', photo #' . $photoId;
});


$router->run();
