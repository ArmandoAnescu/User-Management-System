<?php
session_start();
// var_dump($_GET);
require '../functions.php';
$action=getParam('action');
require '../model/user.php';
switch($action){
    case 'delete':
        $params=$_GET;
        unset($params['action']);
        unset($params['id']);
        $queryString=http_build_query($params);
        $id=getParam('id',0);
        $res=deleteUser($id);
        $message=$res?'cancellazione riuscita':'cancellazione non riuscita';
        $_SESSION['message']=$message;
        $_SESSION['success']=$res;
        header('LOCATION:../index.php?'.$queryString);
        break;
    case 'update':
        break;
}