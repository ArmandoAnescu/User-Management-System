<?php
session_start();
// var_dump($_GET);
require '../functions.php';
$action=getParam('action');
require '../model/user.php';
$params=$_GET;
unset($params['action']);
unset($params['id']);
$queryString=http_build_query($params);
switch($action){
    case 'delete':
        $id=getParam('id',0);
        $res=deleteUser($id);
        $message=$res?'cancellazione riuscita':'cancellazione non riuscita';
        $_SESSION['message']=$message;
        $_SESSION['success']=$res;
        header('LOCATION:../index.php?'.$queryString);
        break;
    case 'save':
        $data=$_POST;
        $res=saveUser($data);
        $message=$res?'Aggiunto nuovo user':'Aggiunta nuovo user non riuscita';
        $_SESSION['message']=$message;
        $_SESSION['success']=$res;
        header('LOCATION:../index.php?'.$queryString);
        break;
    case 'store':
        $data=$_POST;
        $id=getParam('id',0);
        $res=storeUser($id,$data);
        $message=$res?'Aggiornamento user n'.$id.' riuscito':'Aggiornamento user n'.$id.' non riuscito';
        $_SESSION['message']=$message;
        $_SESSION['success']=$res;
        header('LOCATION:../index.php?'.$queryString);
        break;
}


