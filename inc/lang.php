<?php

const LANG_DEFAULT = 'eng';
const LANG_AVAILABLE = ['eng', 'est'];

function getLang(): string
{
    if (!empty($_GET['lang']) && in_array($_GET['lang'], LANG_AVAILABLE, true)) {
        $_SESSION['lang'] = $_GET['lang'];
    }
    return $_SESSION['lang'] ?? LANG_DEFAULT;
}

function __($key): string
{
    static $translations = [];

    $lang = getLang();

    if (!isset($translations[$lang])) {
        $file = __DIR__ . "/../lang/{$lang}.php";
        $translations[$lang] = file_exists($file)
            ? require $file
            : require __DIR__ . '/../lang/' . LANG_DEFAULT . '.php';
    }

    return $translations[$lang][$key] ?? $key;
}