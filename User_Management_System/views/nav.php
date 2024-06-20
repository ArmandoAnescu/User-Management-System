<?php
$currentUrl=$_SERVER['PHP_SELF'];
$indexPage='index.php';
$action=$_GET['action']?? '';
$indexActive=!$action ?'active':'';
$newActive=$action==='insert' ?'active':'';
?>
<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
      <i class="fa-solid fa-users"></i>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link <?=$indexActive?>" aria-current="page" href="<?=$indexPage ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class='nav-link <?= $newActive?> ' href='<?=$indexPage?>?action=insert'><i class="fa-solid fa-user-plus"></i>New User</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
</header>