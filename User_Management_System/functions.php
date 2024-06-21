<?php

require_once 'connection.php';
function getConfig($param,$default=''){
    $config = require 'config.php';
    return $config[$param]??$default;
}
/*
funzione per generare utenti random
*/
function getRandName(){
    $names=[
        'John',
        'Mario',
        'Irene',
        'Goku',
        'Nazza',
        'Angelica',
        'Ermenegilda',
        'Vittoria',
        'Francesca',
        'Nicole',
        'Enrico',
        'Leopoldo',
        'Carloamianto',
        'Fabio',
        'Marcello',
        'Noelle',
        'Eleonora',
        'Elena',
        'Sam'
    ];
    $lastnames=[
        'Rossi',
        'Borbone',
        'Melon',
        'Cucu',
        'Sterza',
        'Formaggio',
        'Cherubin',
        'Anescu',
        'Sulek',
        'Vegro',
        'Morandi',
        'Sprocati',
        'Alfieri',
        'Zadra',
        'Targa',
        'Gasparini'
    ];//dopo una scelta di nomi e cognomi comuni per puro caso
    return $names[mt_rand(0,count($names)-1)].' '.$lastnames[mt_rand(0,count($lastnames)-1)];
    //ritorno una scelta random del nome concatenato al cognome e uno ' ' in mezzo
}
// echo getRandName();
// // echo getRandEmail(getRandName()); 
// echo getRandFiscalCode();
// echo getRandAge();
function getRandEmail($name){//per l'email passo il nome metto un num rand la @ e poi un dominio usando rand
    $domains=[
        'google.com',
        'yahoo.com',
        'outlook.com',
        'iisviolamarchesini.edu.it',
        'infinitevoid.jap',
        'malevolentshrine.com',
        'hotmail.it'
    ];
    return strtolower(str_replace(' ','.',$name).mt_rand(10,99).'@'. $domains[mt_rand(0,count($domains)-1)]); 
}//mt_rand ha estremo incluso perciò ricordate di togliere -1

function getRandFiscalCode(){
    $res='';
    for($i=16;$i>0;$i-=1){
        $res .=chr(mt_rand(65,90));//genero 16 lettere maiusc a caso
    }
    return $res;
}

function getRandAge(){
    return mt_rand(16,50);//ritorno un num nell'intervallo
}
function insertRandUser($totale,mysqli $mysqli){
    $i=$totale;
    while($i>0){
        $username=getRandName();
        $email=getRandEmail($username);
        $age=getRandAge();
        $fiscalcode=getRandFiscalCode();//genero i dati
        $sql='INSERT INTO users (username,email,fiscalcode,age) VALUES ';//ricorda lo spazio altrimenti hai errore
        $sql.="('$username','$email','$fiscalcode',$age);";//uso i comandi di MYSQL e poi concateno il resto
        $res=$mysqli->query($sql);//chiedo alla mia connessione al DB una query per aggiungere il nuovo utente
        if(!$res){
            echo $mysqli->error;
        }else{
            $i--;
        }
    }
}
function getUsers(array $params=[]){
    $records=[];//prendo gli user

    $conn=$GLOBALS['mysqli'];
    
    $limit=$params['recordsPerPage']??10;
    $orderBy=$params['orderBy']??'id';
    $orderDir=array_key_exists('orderDir',$params)? $params['orderDir']:'ASC';
    $search=$params['search']??'';
    $currentPage=$params['currentPage']??0;
    if($currentPage!==1){
        $start=($limit*($currentPage-1));
    }else{
        $start=0;
    }
    
    if($orderDir !== 'ASC' && $orderDir !=='DESC'){
        $orderDir='ASC';
    }
    $sql= "SELECT * FROM users";
    if($search){
        $sql.=" WHERE ";
        if(is_numeric($search)){
            $sql.="(id=$search OR age=$search) ";
        }else{
            $sql.="(fiscalcode like '%$search%' OR username like '%$search%' OR  email like '%$search%')";
        }
    }
    $sql.= " ORDER BY $orderBy $orderDir LIMIT $start,$limit";
    $res=$conn->query($sql);
    if($res){
        while($row=$res->fetch_assoc()){//prendo tutti gli user
            $records[]=$row;
        }
    }
    return $records;
}
function getParam($param,$default=''){
    return $_REQUEST[$param]?? $default;//se non ce niente gli do un risultato di default
}
function getTotalUsersCount(string $search='  '):int {
 
    $conn=$GLOBALS['mysqli'];
    $sql= "SELECT COUNT(*) as total FROM users";
    
    if($search){
        $sql.=" WHERE ";

        if(is_numeric($search)){
            $sql.="(id=$search OR age=$search) ";
        }else{
            $search=$conn->real_escape_string($search);
            $sql.="fiscalcode like '%$search%' OR username like '%$search%' OR  email like '%$search%'";
        }
    }
    // $sql.= " ORDER BY $orderBy $orderDir LIMIT 0,$limit";
    // var_dump($sql);
    $res=$conn->query($sql);
    if($res && $row=$res->fetch_assoc()){
        return (int) $row['total'];
    }
    return 0;
}
