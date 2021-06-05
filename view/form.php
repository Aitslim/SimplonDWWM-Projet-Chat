<!-- formulaire pour pseudo et message -->
<form action="index.php#baspage" method="POST">
    <fieldset>
        <div class="row">
            <div class="form-group col-4">
                <label for="pseudo_fe" class="form-label mt-4" hidden>Pseudo</label>
                <input type="text" name="chat_pseudo" class="form-control" id="pseudo_fe" aria-describedby="pseudo" placeholder="Entrez votre pseudo" required="">
            </div>

            <div class="form-group col-8">
                <label for="message_fe" class="form-label mt-4" hidden>message</label>
                <textarea class="form-control" name="chat_message" id="message_fe" rows="3" placeholder="Entrez votre message" required=""></textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary" id="baspage">Envoyer</button>

    </fieldset>
</form>