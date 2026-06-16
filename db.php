<?php
if ($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == '127.0.0.1') {
    // локалка
    $host = 'localhost';
    $db   = 'site_db'; 
    $user = 'root';    
    $pass = '';        
} else {
    // хостинг
    $host = '';
    $db   = ''; 
    $user = ''; 
    $pass = ''; 
}

$charset = 'utf8mb4';

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_error) {
    die("Ошибка подключения: " . $mysqli->connect_error);
}

$mysqli->set_charset($charset);
?>