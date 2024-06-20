/*
File creazione tabella

*/

<table class="table table-dark table-striped">
    <caption>Users List</caption>
    <thead>
        <tr>
            <th>ID</th>//creo i le colonne con i dati da mostrare
            <th>NAME</th>
            <th>FISCAL CODE</th>
            <th>EMAIL</th>
            <th>AGE</th>
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