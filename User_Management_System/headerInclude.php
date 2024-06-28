<?php
require_once 'headerInclude.php';
require_once 'model/user.php';
require_once 'functions.php';
session_start();
error_reporting(E_ALL);
ini_set('display_errors',1);
$page=$_SERVER['PHP_SELF'];
$updateUrl='updateUser.php';

$deleteUrl='controller/updateRecord.php';

$recordsPerPageOptions=getConfig('recordsPerPageOptions',[5,10,25]);
$recordsPerPageDefault=getConfig('recordsPerPage',10);
$recordsPerPage=(int)getParam('recordsPerPage',$recordsPerPageDefault);
$search=getParam('search','');
$search=trim($search);
$search=strip_tags($search);
//order by e order dir
$orderDir=getParam('orderDir','DESC');
$orderByColumns=getConfig('orderByColumns',[]); 
$orderBy=getParam('orderBy');
$orderBy=in_array($orderBy,$orderByColumns)?$orderBy:null;
require_once 'views/top.php';//aggiungo la nav bar, le funzioni e la parte sotto
require_once 'views/nav.php';