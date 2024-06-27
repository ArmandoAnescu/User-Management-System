<?php
/*
FILE DI CONFIGURAZIONE
serve per gestire i dati del mio DB di MYSQL

Per evitare var globali in giro
*/
$mega=1024;
$giga=1024*$mega;  
$maxUpLoad=ini_get('upload_max_filesize');//prendo dal file di conf ls max grandezza di un files
if(stristr($maxUpLoad,'G'))//controlla che la conf sia o in Giga o Mega e da li esegue il calcolo per la max capacità
{
    $maxUpLoad=intval($maxUpLoad)*$giga;
}else
{   
    $maxUpLoad=intval($maxUpLoad)*$mega;

}
return[
    'mysql_host'=>'localhost',
    'mysql_user'=>'root',
    'mysql_password'=>'',//configuro il mio sql per prelevare/selezionare e aggiugnere dati
    'mysql_db'=>'corsophp',
    'recordsPerPage'=>25,
    'orderByColumns'=>['id','username','fiscalcode','age','email'],
    'recordsPerPageOptions'=>[
        5,10,20,25,50,100,200
    ],
    'numLinkNavigator'=>5,
    'maxFileUpload'=>$maxUpLoad,
    'avatarDir'=>'C:\Users\stage\Documents\JS\SuperChess-main\PHP-EX\User_Management_System'.'/avatar/',
    'webAvatarDir'=>'avatar/',
    'thumbnail_width'=>200,
    'thumbnail_height'=>120
];

