<?php

use Common\Application;

require_once(__DIR__ . '/../vendor/autoload.php');

$app = new Application();

$app->router->get('/auth/login', 'AuthController@loginForm');
$app->router->post('/auth/login', 'AuthController@login');
$app->router->post('/auth/logout', 'AuthController@logout');

$app->router->get('/admin/home', 'AdminController@home');
$app->router->get('/admin/student', 'AdminController@student');
$app->router->get('/admin/student/add', 'AdminController@addStudent');
$app->router->get('/admin/schoolLevel', 'AdminController@schoolLevel');
$app->router->get('/admin/schoolLevel/add', 'AdminController@addSchoolLevel');
$app->router->get('/admin/schoolYear', 'AdminController@schoolYear');
$app->router->get('/admin/schoolYear/add', 'AdminController@addSchoolYear');
$app->router->get('/admin/classroom', 'AdminController@classroom');
$app->router->get('/admin/classroom/add', 'AdminController@addClassroom');

$app->run();
