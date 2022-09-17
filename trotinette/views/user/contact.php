<form action="index.php?action=contact" method="POST">
    <div>
        <label for="firstName"><b>Prenom</b></label>
        <input type="text" placeholder="Votre prenom" name="firstName" required>

        <label for="lastName"><b>Nom</b></label>
        <input type="text" placeholder="Votre nom" name="lastName" required>

        <label for="mail"><b>E-mail</b></label>
        <input type="text" placeholder="Votre e-mail" name="mail" required>

        <label for="phone"><b>Téléphone</b></label>
        <input type="number" placeholder="Votre téléphone" name="phone" required>

        <label for="sujet"><b>Sujet</b></label>
        <textarea name="sujet" placeholder="Ecrivez votre message ici.." rows="4" cols="50"></textarea>

        <button type="submit">Envoyer</button>
    </div>
</form>