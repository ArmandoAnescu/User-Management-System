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
        copyAvatar($id);
        $message=$res?'cancellazione riuscita':'cancellazione non riuscita';
        $_SESSION['message']=$message;
        $_SESSION['success']=$res;
        header('LOCATION:../index.php?'.$queryString);
        break;
    case 'save':
        $data=$_POST;
        $res=saveUser($data);
        if($res){
            $message='Aggiunto nuovo user '.$data['username'];
        }else{
            $message='Impossibile aggiungere nuovo utente '.$data['username'];
        }
        // $message=$res?'Aggiunto nuovo user':'Impossibile aggiungere nuovo utente';//non so perchè non si poteva fare così ma l'istruttore ha voluto così
        $_SESSION['message']=$message;
        $_SESSION['success']=$res;
        header('LOCATION:../index.php?'.$queryString);
        break;
    case 'store':
        $data=$_POST;
        $id=getParam('id',0);
        $res=storeUser($id,$data);
        $message=$res['success']?'Aggiornamento user n'.$id.' riuscito':'Aggiornamento user n'.$id.' non riuscito : '.$res['error'];
        $_SESSION['message']=$message;
        $_SESSION['success']=$res;
        header('LOCATION:../index.php?'.$queryString);
        break;
}


