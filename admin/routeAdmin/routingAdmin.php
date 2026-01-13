<?php
$host = explode('?', $_SERVER['REQUEST_URI']) [0];
$num = substr_count($host, '/');
$path = explode('/', $host) [$num];

if ($path == '' OR $path == 'index.php') {

    $response = controllerAdmin::formLoginSite();
}

elseif ($path == 'login') {
    $response = controllerAdmin::loginAction();
}
elseif ($path == 'logout') {
    $response = controllerAdmin::logoutAction();
}
elseif($path=='artsAdmin'){
    $response = controllerAdminArts::ArtsList();
}

elseif($path == 'artAdd') {
    $response = controllerAdminArts::artAddForm();
}
elseif($path == 'artAddResult') {
    $response = controllerAdminArts::artAddResult();
}

elseif($path == 'artEdit' && isset($_GET['id'])) {
    $response = controllerAdminArts::artEditForm($_GET['id']);
}
elseif($path == 'artEditResult' && isset($_GET['id'])) {
    $response = controllerAdminArts::artEditResult($_GET['id']);
}

elseif($path == 'artDel' && isset($_GET['id'])) {
    $response = controllerAdminArts::artDeleteForm($_GET['id']);
}
elseif($path == 'artDelResult' && isset($_GET['id'])) {
    $response = controllerAdminArts::artDeleteResult($_GET['id']);
}

else {

    $response = controllerAdmin::error404();
}