<?php
$msg = 5;

?>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col" class="col-2">Date</th>
            <th scope="col" class="col-2">Pseudo</th>
            <th scope="col" class="col-8">Message</th>
        </tr>
    </thead>
    <tbody>
        <!-- Dans une premier temps faites une boucle pour afficher "en dur" plusieurs messages (plusieurs fois le même) -->
        <?php for ($i = 1; $i < $msg; $i++) { ?>
            <tr class="table-light">
                <td class="col-2">01/06/2021</td>
                <td class="col-2">Camile</td>
                <td class="col-8">mon message</td>
            </tr>
        <?php } ?>

    </tbody>
</table>