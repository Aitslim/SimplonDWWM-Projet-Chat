<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col" class="col-2" hidden>Date</th>
            <th scope="col" class="col-2" hidden>Pseudo</th>
            <th scope="col" class="col-8" hidden>Message</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($messages as $row) { ?>
            <tr class="table-light">

                <td class="col-2"><?= date_format(date_create($row["chat_date"]), 'd/m/y H:i:s') ?></td>
                <td class="col-1"><?= htmlspecialchars($row["chat_pseudo"]) ?></td>
                <td class="col-7"><?= nl2br(htmlspecialchars($row["chat_message"])) ?></td>
                <td class="col-1">
                    <a href="index.php?delete=<?= trim($row["id"]) ?>"><i class="fa fa-remove" style="font-size: 12px; color: red;"></i></a>
                </td>
            </tr>
        <?php } ?>

    </tbody>

</table>