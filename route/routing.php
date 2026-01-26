<?php
$host = explode('?', $_SERVER['REQUEST_URI']) [0];
$num = substr_count($host, '/');
$path = explode('/', $host) [$num];

if($path == '' OR $path == 'index' OR $path == 'index.php') {
    $response = Controller::StartSite();
}
elseif($path == 'all') {
    $response = Controller::AllArts();
}
elseif($path == 'category' and isset($_GET['id'])) {
    $response = Controller::ArtsByCatID($_GET['id']);
}
elseif($path == 'art' and isset($_GET['id'])) {
    $response = Controller::ArtsByID($_GET['id']);
}
elseif($path == 'insertcomment' and isset($_GET['comment'], $_GET['id'])) {
    $response = Controller::InsertComment($_GET['comment'], $_GET['id']);
}
elseif ($path == 'registerForm') {
    $response = Controller::registerForm();
}
elseif ($path == 'registerAnswer') {
    $response = Controller::registerUser();
}
elseif ($path == 'info') {
    $response = Controller::info();
}
else{
    $response = Controller::error404();
}
?>