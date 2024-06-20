<?php
/*
File creazione tabella

*/
$orderDirClass=$orderDir;
$orderDir=$orderDir==='ASC'?'DESC':'ASC'; //per fare l'ordinamento crescente o decrescente
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
</style>
<table class="table table-dark table-striped">
    <caption>Users List</caption>
    <thead>
        <tr>
            <th class="<?= $orderBy==='id'? $orderDirClass: '' ?>" ><a href="<?=$page?>?search=<?=$search?>&recordsPerPage=<?=$recordsPerPage?>&orderBy=id&orderDir=<?= $orderDir ?>">ID</a></th><!--creo i le colonne con i dati da mostrare-->
            <th class="<?= $orderBy==='username'? $orderDirClass: '' ?>"><a href="<?=$page?>?search=<?=$search?>&recordsPerPage=<?=$recordsPerPage?>&orderDir<?= $orderDir?>&orderBy=username&orderDir=<?= $orderDir ?>">NAME</a></th>
            <th class="<?= $orderBy==='fiscalcode'? $orderDirClass: '' ?>"><a href="<?=$page?>?search=<?=$search?>&recordsPerPage=<?=$recordsPerPage?>&orderBy=fiscalcode&orderDir=<?= $orderDir ?>">FISCAL CODE </a></th>
            <th class="<?= $orderBy==='email'? $orderDirClass: '' ?>"><a href="<?=$page?>?search=<?=$search?>&recordsPerPage=<?=$recordsPerPage?>&orderBy=email&orderDir=<?= $orderDir ?>">EMAIL </a></th>
            <th class="<?= $orderBy==='age'? $orderDirClass: '' ?>"><a href="<?=$page?>?search=<?=$search?>&recordsPerPage=<?=$recordsPerPage?>&orderBy=age&orderDir=<?= $orderDir ?>">AGE </a></th>
        </tr>
    </thead>
    <tbody>
        <?php
            if($user){//controllo che gli user esistano altrimenti dico che non ho trovato nulla
                foreach($user as $utente){?>
                <tr>
                    <td><?= $utente['id'];?></td>
                    <td><?= $utente['username'];?></td><!-- inserisco i vari campi -->
                    <td><?= $utente['fiscalcode'];?></td>
                    <td><a href="mailto:<?= $utente['email']?>"><?= $utente['email'];?></a></td><!-- aggiungo anche il link per scrivere una email -->
                    <td><?= $utente['age']; ?></td>
                </tr>
        <?php
            }
        }else{ ?>
            <tr>
                <td colspan="5">No records found</td><!-- Se non ci sono user o i par della ricerca non trovano niente lo dico -->
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>