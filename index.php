<?php
session_start();
include_once 'inc/Database.php';
require 'model/Category.php';
require 'model/Arts.php';
require 'model/Comments.php';
require 'model/Register.php';

include_once 'view/arts.php';
include_once 'view/comments.php';

require 'inc/session.php';
require 'inc/lang.php';
require 'inc/functions.php';

include_once 'controller/Controller.php';
include_once 'route/routing.php';

echo $response;
?>