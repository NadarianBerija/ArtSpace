<?php
session_start();
include_once 'inc/Database.php';
require 'model/Category.php';
require 'model/Arts.php';
require 'model/Comments.php';

include_once 'view/arts.php';
include_once 'view/comments.php';

include_once 'controller/Controller.php';
include_once 'route/routing.php';

echo $response;
?>