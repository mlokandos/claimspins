<?php
$DATA_DIR = __DIR__ . '/data/';
$default  = 'en';

// Available languages (from data files)
$available = [];
foreach (glob($DATA_DIR . '*.json') as $f) {
    $available[] = basename($f, '.json');
}

// Parse Accept-Language header
$lang = $default;
if (!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
    $accepted = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
    foreach ($accepted as $entry) {
        $code = strtolower(trim(explode(';', $entry)[0]));
        $code = substr($code, 0, 2); // take just "en" from "en-US"
        if (in_array($code, $available)) {
            $lang = $code;
            break;
        }
    }
}

header('Location: /' . $lang . '/', true, 302);
exit;
