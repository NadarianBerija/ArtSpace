<?php

function isAuth() {
    return isset($_SESSION['user']);
}

function langLink($langCode)
{
    $params = $_GET;
    $params['lang'] = $langCode;
    return '?' . http_build_query($params);
}