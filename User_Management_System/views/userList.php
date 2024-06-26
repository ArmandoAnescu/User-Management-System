<?php
/*
File creazione tabella

*/
$orderDirClass=$orderDir;
$params = "search=$search&recordsPerPage=$recordsPerPage&orderDir=$orderDir";
$orderDir=$orderDir==='ASC'?'DESC':'ASC'; //per fare l'ordinamento crescente o decrescente
$page=$_SERVER['PHP_SELF'];
$baseUrl = "$page?$params";
?>
<style>
.table thead th.ASC:after ,.table thead th.DESC:after   {
    content: '↑';
    padding: 3px;
    color: red;
}

.table thead th.DESC:after    {
    content: '↓';
}
.avatar
{
    color: #0000FF;
}
</style>
<table class="table table-dark table-striped table-bordered">
    <caption style="caption-side:top">Users List</caption>
    <thead>
        <tr>
            <th colspan="8" class="text-center text-bg-dark" >
                <?= $totalRecords?> FOUND. Page <?= $pageI?> of <?= ceil($totalRecords/ $recordsPerPage)?>.

            </th>
        </tr>
        <tr><!-- passo l'order by e il dir così quando il modo di vedere tra asc e desc non si resetta -->
            <th class="<?= $orderBy==='id'? $orderDirClass: '' ?>" ><a href="<?=$page?>?search=<?=$search?>&recordsPerPage=<?=$recordsPerPage?>&orderBy=id&orderDir=<?= $orderDir ?>&page=<?=$pageI?>">ID</a></th><!--creo i le colonne con i dati da mostrare-->
            <th class="<?= $orderBy==='username'? $orderDirClass: '' ?>"><a href="<?=$page?>?search=<?=$search?>&recordsPerPage=<?=$recordsPerPage?>&orderDir<?= $orderDir?>&orderBy=username&orderDir=<?= $orderDir ?>&page=<?=$pageI?>">NAME</a></th>
            <th class="avatar" style="color:dodgerblue">AVATAR</th>
            <th class="<?= $orderBy==='roletype'? $orderDirClass: '' ?>"><a href="<?=$page?>?search=<?=$search?>&recordsPerPage=<?=$recordsPerPage?>&orderDir<?= $orderDir?>&orderBy=roletype&orderDir=<?= $orderDir ?>&page=<?=$pageI?>">ROLE TYPE</a></th>
            <th class="<?= $orderBy==='fiscalcode'? $orderDirClass: '' ?>"><a href="<?=$page?>?search=<?=$search?>&recordsPerPage=<?=$recordsPerPage?>&orderBy=fiscalcode&orderDir=<?= $orderDir ?>&page=<?=$pageI?>">FISCAL CODE </a></th>
            <th class="<?= $orderBy==='email'? $orderDirClass: '' ?>"><a href="<?=$page?>?search=<?=$search?>&recordsPerPage=<?=$recordsPerPage?>&orderBy=email&orderDir=<?= $orderDir ?>&page=<?=$pageI?>">EMAIL </a></th>
            <th class="<?= $orderBy==='age'? $orderDirClass: '' ?>"><a href="<?=$page?>?search=<?=$search?>&recordsPerPage=<?=$recordsPerPage?>&orderBy=age&orderDir=<?= $orderDir ?>&page=<?=$pageI?>">AGE </a></th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php
            if($user){//controllo che gli user esistano altrimenti dico che non ho trovato nulla
                $avatarDir=getConfig('webAvatarDir');
                $thumbWidth=getConfig('thumbnail_width',200);
                foreach($user as $utente){
                    $avatarImg=file_exists($avatarDir.'thumb_'.$utente['avatar'])? $avatarDir.'thumb_'.$utente['avatar']: $avatarDir.'thumb_'.'default.jpg';

                    ?>
                <tr>
                    <td><?= $utente['id'];?></td>
                    <td><?= $utente['username'];?></td><!-- inserisco i vari campi -->
                    <td><img src="<?=$avatarImg?>" alt="pfp"></td>
                    <td><?= $utente['roletype'];?></td>
                    <td><?= $utente['fiscalcode'];?></td>
                    <td><a href="mailto:<?= $utente['email']?>"><?= $utente['email'];?></a></td><!-- aggiungo anche il link per scrivere una email -->
                    <td><?= $utente['age']; ?></td>
                    <td>
                        <div class="row">
                                <div class="col-sm-6">
                                    <a class="btn btn-success" href="<?=$updateUrl?>?page=<?=$pageI?>&id=<?=$utente['id']?>&action=update&<?=$params?>&orderBy=<?=$orderBy?>">
                                            <i class="fa fa-pen"></i>
                                            UPDATE</a>
                                </div>
                                <div class="col-sm-6">
                                    <a onclick="return confirm('Vuoi eliminare lo user?')" class="btn btn-danger" href="<?=$deleteUrl?>?page=<?=$pageI?>&id=<?=$utente['id']?>&action=delete&<?=$params?>">
                                            <i class="fa fa-trash"></i>
                                            DELETE
                                    </a>
                                </div>
                             
                        </div>
                    </td>
                </tr>
        <?php
            }
            ?>
            <tfoot>
            <tr>
                <td colspan="8">
                    <?php
                    require 'views/navigation.php';
                    echo createPagination($totalRecords,$recordsPerPage,$pageI,$baseUrl);
                    ?>
                </td><!-- Se non ci sono user o i par della ricerca non trovano niente lo dico -->
            </tr>
            </tfoot>
        <?php
        }else{ ?>
            <tr>
                <td colspan="8">No records found</td><!-- Se non ci sono user o i par della ricerca non trovano niente lo dico -->
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>