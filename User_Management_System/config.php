<?php
/*
FILE DI CONFIGURAZIONE
serve per gestire i dati del mio DB di MYSQL

Per evitare var globali in giro
*/
return[
    'mysql_host'=>'localhost',
    'mysql_user'=>'root',
    'mysql_password'=>'',//configuro il mio sql per prelevare/selezionare e aggiugnere dati
    'mysql_db'=>'corsophp',
    'recordsPerPage'=>25
];
