<?php
require_once 'headerInclude.php';
?>
<main role="main" class="container">
<h1 class="text-center p-2">User Management System</h1>

<?php
$id=getParam('id',0);
$action=getParam('action','');
$orderBy=getParam('orderBy');
$orderDir=getParam('orderDir','');
$search=getParam('search','');
$pageI = getParam('page', 1);
$defaultParams="orderBy=$orderBy&orderDir=$orderDir&search=$search&page=$pageI";
// $paramsArray=compact('orderBy','orderDir','page','search');
// $defaultParams=http_build_query($paramsArray,'','&');//chiedo di separa gli argomenti e li dico che non usa chiave numerica
if($id){
    $user=getUser($id);
}else{
    $user=[
        'username'=>'',
        'email'=> '',
        'age'=> 0,
        'fiscalcode'=> '',
        'id'=> '',
        'avatar'=>''
    ];
}
// var_dump($user);
require_once 'views/formUpdate.php';
?>
</main>
<?php
require_once 'views/footer.php';
?>