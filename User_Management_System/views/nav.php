<?php
$currentUrl=$_SERVER['PHP_SELF'];//prendo l'url di adesso
$indexPage='index.php';//identifico la home page
$action=$_GET['action']?? '';//guardo cosa fa lo user
$indexActive=!$action ?'active':'';//
$newActive=$action==='insert' ?'active':'';//quando vado nella pagine new user cambia l'azione in insert cambianod l'icona di active a wuella di new user
//altrimetni se vuota quindi falsa  non la illumina e illumina il tasto home
?>
<style>
  i.fa-user-plus{
    margin-right: 5px;
  }
</style>
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
            <a class="nav-link <?=$indexActive?>" aria-current="page" href="<?=$indexPage ?>">Home</a><!-- metto il link alla pagina home -->
          </li>
          <li class="nav-item">
            <a class='nav-link <?= $newActive?> ' href='<?=$indexPage?>?action=insert'><i class="fa-solid fa-user-plus" ></i >New User</a><!-- metto il link alla pagina per inserire nuovi utenti -->
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
          </li> -->
        </ul>
        <form class="g-3" method="GET"  role="search" id="searchForm">
          <input type="hidden" name="orderBy" value="<?=$orderBy ?>">
          <input type="hidden" name="orderDir" value="<?=$orderDir ?>">
          <div class="row">
          <div class="col-3 mt-2">
          <label class="form-label text-bg-dark " for="recordsPerPage">Records</label>
          </div>
          <div class="col">
          <select class="form-select"  name="recordsPerPage" id="recordsPerPage"
          onchange="document.forms.searchForm.submit()">
          <option value="">SELECT</option>
            <?php
              foreach($recordsPerPageOptions as $key=>$v){
                $v=(int)$v;
                $selected=$v===$recordsPerPage ? 'selected':'';
                echo "<option $selected value='$v'>$v </option> \n";
              }
            ?>
          </select>
          </div> 
          <div class="col">
          <input name="search"  value="<?=$search?>" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          </div>
          <div class="col">  
          <button class="btn btn-outline-success" type="submit">Search</button>
          </div>  
          <div class="col-2">  
          <button class="btn btn-outline-info" onclick="location.href= '<?=$page?>'" type="button">Reset</button>
          </div> 
        </div>
        </form>
      </div>
    </div>
  </nav>
</header>