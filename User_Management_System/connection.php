<?php
/*
FILE PER CONNESSIONE AL DB
*/
$config=require_once 'config.php';
$mysqli = new mysqli(
    $config['mysql_host'],
    $config['mysql_user'],
    $config['mysql_password'],
    $config['mysql_db']
);
unset($config);//per riutilizzarla in futuro
if ($mysqli->connect_error) {//controllo se ci sono stati errori di connessione
    die(''. $mysqli->connect_error);
}else {
    echo 'Connesione riuscita'.'<br>';
    var_dump($mysqli);
}
