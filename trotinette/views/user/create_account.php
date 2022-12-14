<h2><i class="fa fa-user"></i> Création d'un compte client</h2>

<form class="generic-form" action="index.php?action=create_account" method="POST">

    <label for="lastName">Nom :</label>
    <input id="lastName" type="text" name="lastName" data-required data-name="Nom" value="">
    <label for="firstName">Prénom :</label>
    <input id="firstName" type="text" name="firstName" data-required data-name="Prénom" value="">
    <label for="birthDay">Date de naissance :</label>
    <select id="birthDay" name="birthDay">
        <?php for ($day = 1; $day <= 31; $day++) : ?>
            <option value="<?= $day ?>"><?= $day ?></option>
        <?php endfor; ?>
    </select>
    <span> / </span>
    <select name="birthMonth">
        <option value="1">Janvier</option>
        <option value="2">Février</option>
        <option value="3">Mars</option>
        <option value="4">Avril</option>
        <option value="5">Mai</option>
        <option value="6">Juin</option>
        <option value="7">Juillet</option>
        <option value="8">Août</option>
        <option value="9">Septembre</option>
        <option value="10">Octobre</option>
        <option value="11">Novembre</option>
        <option value="12">Décembre</option>
    </select>
    <span> / </span>
    <select name="birthYear">
        <?php for ($year = 1940; $year <= date('Y') - 18; $year++) : ?>
            <option value="<?= $year; ?>"><?= $year; ?></option>
        <?php endfor; ?>
    </select>
    <label class="textarea" for="address">Adresse :</label>
    <textarea id="address" name="address" rows="3"></textarea>
    <label for="city">Ville :</label>
    <input id="city" type="text" name="city" value="">
    <label for="zipCode">Code Postal :</label>
    <input id="zipCode" class="zip-code" type="text" maxlength="5" name="zipCode" data-name="Code postal" data-type="number" value="">
    <label for="phone">Téléphone :</label>
    <input id="phone" class="phone" type="text" maxlength="10" name="phone" data-name="Téléphone" data-type="number" value="">
    <label for="email">E-mail :</label>
    <input id="email" type="text" name="email" data-required data-name="E-mail" value="">
    <label for="password">Mot de passe :</label>
    <input id="password" type="password" name="password" data-required data-name="Mot de passe" data-length="8">
    <input class="button button-primary" type="submit" value="Créer le compte">
    <a class="button button-cancel small" href="">Annuler</a>
</form>