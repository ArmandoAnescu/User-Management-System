/*
main page

*/

<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors',1);
require_once 'functions.php';

$page=$_SERVER['PHP_SELF'];
$updateUrl='controller/updateRecord.php';
$recordsPerPageOptions=getConfig('recordsPerPageOptions',[5,10,25]);
$recordsPerPageDefault=getConfig('recordsPerPage',10);
$recordsPerPage=(int)getParam('recordsPerPage',$recordsPerPageDefault);
$search=getParam('search','');
$search=trim($search);
$search=strip_tags($search);
//order by e order dir
$orderDir=getParam('orderDir');
$orderByColumns=getConfig('orderByColumns',[]); 
$orderBy=getParam('orderBy');
$orderBy=in_array($orderBy,$orderByColumns)?$orderBy:null;
require_once 'views/top.php';//aggiungo la nav bar, le funzioni e la parte sotto
require_once 'views/nav.php';
?>


<!-- Begin page content -->
<main class="flex-shrink-0">
  <div class="container">
    <h1 class="text-center p-2">User Management System</h1>
    <?php
    if(!empty($_SESSION['$message'])){
      if($_SESSION['$message']==='cancellazione riuscita'){
        echo '<div class="alert alert-success">'.$_SESSION['$message'].'</div>';
      }else{
        echo '<div class="alert alert-danger">'.$_SESSION['$message'].'</div>';
      }

    }
    ?>
    <?php
    $action=getParam('action');//prendo parametri di ricerca
    switch($action){
      default:
      $pageI = getParam('page', 1);
        $params=[
          'orderBy'=>$orderBy,
          'recordsPerPage'=>$recordsPerPage,
          'orderDir'=>$orderDir,
          'search'=>$search,
          'currentPage'=>$pageI
        ];
        $totalRecords=getTotalUsersCount($params['search']);
        $user=$totalRecords?getUsers($params):[];//di default prende gli user
        // var_dump($_REQUEST);
        $orderDirClass = $orderDir;
        require 'views/userList.php';
        break;
    }
    ?>
  </div>
</main>
<?php
require_once 'views/footer.php';//chiamo il footer
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="js/bootstrap.min.js"></script>

    </body>
</html>
