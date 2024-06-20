/*
main page

*/

<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
require_once 'functions.php';
require_once 'views/top.php';//aggiungo la nav bar, le funzioni e la parte sotto
require_once 'views/nav.php';
?>


<!-- Begin page content -->
<main class="flex-shrink-0">
  <div class="container">
    <h1>User Management System</h1>
    <?php
    $action=getParam('action',null);//prendo parametri di ricerca
    switch($action){
      default:
        $user=getUsers();//di default prende gli user 
        require 'views/userList.php';//richiedo il file che crea la tabella che in automatico ha user perchè lo chiamo qua
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
