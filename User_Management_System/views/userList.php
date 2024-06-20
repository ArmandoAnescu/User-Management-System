<table class="table table-dark table-striped">
    <caption>Users List</caption>
    <thead>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>FISCAL CODE</th>
            <th>EMAIL</th>
            <th>AGE</th>
        </tr>
    </thead>
    <tbody>
        <?php
            if($user){
                foreach($user as $utente){?>
                <tr>
                    <td><?= $utente['id'];?></td>
                    <td><?= $utente['username'];?></td>
                    <td><?= $utente['fiscalcode'];?></td>
                    <td><a href="mailto:<?= $utente['email']?>"><?= $utente['email'];?></a></td>
                    <td><?= $utente['age']; ?></td>
                </tr>
        <?php
            }
        }else{ ?>
            <tr>
                <td colspan="5">No records found</td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>