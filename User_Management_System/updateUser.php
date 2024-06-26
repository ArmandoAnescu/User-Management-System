<?php
require_once 'headerInclude.php';
?>
<main role="main" class="container">
<h1 class="text-center p-2">User Management System</h1>

<?php
$id=getParam('id',0);
$action=getParam('action','');
if($id){
    $user=getUser($id);
}else{
    $user=[
        'username'=>'',
        'email'=> '',
        'age'=> 0,
        'fiscalcode'=> '',
        'id'=> ''
    ];
}
// var_dump($user);
require_once 'views/formUpdate.php';
?>
</main>
<?php
require_once 'views/footer.php';
?>