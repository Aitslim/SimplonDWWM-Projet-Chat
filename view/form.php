<!-- Créer ici un formulaire avec les champs pseudo et message -->
<div class="container">
    <form action="">
        <fieldset>

            <div class="form-group">
                <label for="pseudo" class="form-label mt-2">Pseudo</label>
                <input type="text" name="pseudo" class="form-control" id="pseudo" aria-describedby="pseudoHelp" value="" placeholder="Pseudo" required="">
                <div class="invalid-feedback">Veuillez entrer un nom complet</div>
                <!-- </div> -->

                <!-- <div class="form-group"> -->
                <label for="message" class="form-label mt-2">Votre message</label>
                <textarea name="message" class="form-control" id="message" rows="2"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-5">Valider</button>

        </fieldset>
    </form>
</div>