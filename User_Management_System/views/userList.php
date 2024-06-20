<?php
/*
File creazione tabella

*/
$orderDir=$orderDir==='ASC'?'DESC':'ASC'; //per fare l'ordinamento crescente o decrescente


?>
<table class="table table-dark table-striped">
    <caption>Users List</caption>
    <thead>
        <tr>
            <th><a href="?orderBy=id&orderDir=<?= $orderDir ?>">ID</a></th><!--creo i le colonne con i dati da mostrare-->
            <th><a href="?orderBy=username&orderDir=<?= $orderDir ?>">NAME</a></th>
            <th><a href="?orderBy=fiscalcode&orderDir=<?= $orderDir ?>">FISCAL CODE </a></th>
            <th><a href="?orderBy=email&orderDir=<?= $orderDir ?>">EMAIL </a></th>
            <th><a href="?orderBy=age&orderDir=<?= $orderDir ?>">AGE </a></th>
        </tr>
    </thead>
    <tbody>
        <?php
            if($user){//controllo che gli user esistano altrimentii dico che non ho trovato nulla
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