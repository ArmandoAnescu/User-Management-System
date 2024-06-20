<?php

require_once 'connection.php';
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
insertRandUser(30,$mysqli);


