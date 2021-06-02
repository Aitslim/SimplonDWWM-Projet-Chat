<?php

echo "Je suis dans chat.php" . "<br>";

?>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col" class="col-2" hidden>Date</th>
            <th scope="col" class="col-2" hidden>Pseudo</th>
            <th scope="col" class="col-8" hidden>Message</th>
        </tr>
    </thead>
    <tbody>
        <!-- Dans une premier temps faites une boucle pour afficher "en dur" plusieurs messages (plusieurs fois le même) -->

        <?php foreach ($messages as $row) { ?>
            <tr class="table-light">
                <td class="col-2"><?= $row["chat_date"] ?></td>
                <td class="col-2"><?= $row["chat_pseudo"] ?></td>
                <td class="col-8"><?= $row["chat_message"] ?></td>
            </tr>
        <?php } ?>

    </tbody>

</table>