<?php

use Bramus\Router\Router;

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require __DIR__ . '/../bootstrap.php';

define('APPNAME', 'Kei Story');

session_start();

$router = new Router();

// ------------- Auth routes ----------
$router->post('/logout', '\App\Controllers\Auth\LoginController@logout');
$router->get('/register', '\App\Controllers\Auth\RegisterController@showRegisterForm');
$router->post('/register', '\\App\Controllers\Auth\RegisterController@register');
$router->get('/login', '\App\Controllers\Auth\LoginController@showLoginForm');
$router->post('/login', '\App\Controllers\Auth\LoginController@login');

// -------------- Admin routes ------------------
$router->get('/admin', '\App\Controllers\Auth\AdminController@admin');
$router->get('/admin/Users', '\App\Controllers\Auth\AdminController@adminUsers');
$router->get('/admin/Books', '\App\Controllers\Auth\AdminController@adminBooks');
$router->get('/admin/Categories', '\App\Controllers\Auth\AdminController@adminCategories');
$router->get('/admin/Authors', '\App\Controllers\Auth\AdminController@adminAuthors');
$router->get('/admin/Notification', '\App\Controllers\Auth\AdminController@adminNotification');

$router->post('/deleteUser', '\App\Controllers\Auth\AdminController@deleteUser');

$router->post('/updatePermission', 'App\Controllers\Auth\AdminController@updatePermission');
$router->post('/deniedPermission', 'App\Controllers\Auth\AdminController@deniedPermission');

$router->post('/handleReport', '\App\Controllers\Auth\AdminController@handleReport');
$router->post('/deleteReport', '\App\Controllers\Auth\AdminController@deleteReport');
$router->post('/deleteBookbyAdmin', '\App\Controllers\Auth\AdminController@deleteBookbyAdmin');

$router->post('/addCategory', '\App\Controllers\Auth\AdminController@addCategory');
$router->post('/editCategory', '\App\Controllers\Auth\AdminController@editCategory');

// --------- Book --------
$router->get('/addBook', '\App\Controllers\Story\storyController@addStory');
$router->post('/addBook', '\App\Controllers\Story\storyController@createNewStory');

$router->get('/editBook', '\App\Controllers\Story\storyController@editStory');
$router->post('/handleEditBook', '\App\Controllers\Story\storyController@handleEditBook');

$router->get('/showBook', '\App\Controllers\Story\storyController@showStory');

$router->post('/deleteBook', '\App\Controllers\Story\storyController@deleteBook');

// --------- Chapter -------
$router->post('/addChapter', '\App\Controllers\Story\storyController@addChapter');
$router->post('/handleCreateChapter', '\App\Controllers\Story\storyController@handleCreateChapter');

$router->post('/editChapter', '\App\Controllers\Story\storyController@editChapter');
$router->post('/handleEditChapter', '\App\Controllers\Story\storyController@handleEditChapter');

$router->post('/deleteChapter', '\App\Controllers\Story\storyController@deleteChapter');

$router->get('/showChapter', '\App\Controllers\Story\storyController@showChapter');


// ----------- Comment --------------
$router->post('/newComment', '\App\Controllers\Auth\UserController@newComment');
$router->post('/editComment', '\App\Controllers\Auth\UserController@editComment');
$router->post('/deleteComment', '\App\Controllers\Auth\UserController@deleteComment');

// ----------- Favorite -------------
$router->post('/addFavorite', '\App\Controllers\Auth\UserController@addFavorite');
$router->post('/deleteFavorite', '\App\Controllers\Auth\UserController@deleteFavorite');

// ----------- Report --------------
$router->post('/addReport', '\App\Controllers\Auth\UserController@addReport');

// ----------- Require ----------
$router->post('/RequiredAuthor', '\App\Controllers\Auth\UserController@RequiredAuthor');


// --------------- general ----------
$router->get('/', '\App\Controllers\homeController@index');
$router->get('/home', '\App\Controllers\homeController@index');
$router->get('/profile', '\App\Controllers\Auth\UserController@profile');
$router->post('/profile', '\App\Controllers\Auth\UserController@doiMK');
$router->get('/myFavorite', '\App\Controllers\Auth\UserController@myFavorite');
$router->get('/myStory', '\App\Controllers\Auth\UserController@myStory');
$router->get('/theLoai', '\App\Controllers\Story\storyController@showTheLoai');
$router->set404('\App\Controllers\Controller@sendNotFound');


$router->run();
