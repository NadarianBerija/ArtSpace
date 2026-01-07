<?php
class controllerAdmin {
    public static function formLoginSite() {
        include_once('viewAdmin/formLogin.php');
    }

    public static function loginAction() {
        $logIn = modelAdmin::userAuthentication();
        if(isset($logIn) and $logIn==true) {
            include_once('viewAdmin/startAdmin.php');
        }
        else {
            $_SESSION['errorString'] = 'Incorrect email or password';
            include_once('viewAdmin/formLogin.php');
        }
    }

    public static function logoutAction() {
        modelAdmin::userLogout();
        include_once('viewAdmin/formLogin.php');
    }

    public static function error404() {
        include_once('viewAdmin/error404.php');
    }
}