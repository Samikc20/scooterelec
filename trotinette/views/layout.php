<!DOCTYPE html>
<html>

<body>
    <nav>
        <ul>
            <?php if ($this->isConnect()) : ?>
                <li>
                    <p>Bonjour <strong><?= $_SESSION['user']['prenom'] ?> <?= $_SESSION['user']['nom'] ?></strong> !</p>
                </li>
                <li>
                    <a href="index.php?action=deconnexion">Déconnexion</a>
                </li>
            <?php else : ?>
                <li>
                    <a href="index.php?action=create_account">Créer un compte</a>
                </li>
                <li>
                    <a href="index.php?action=connexion">Connexion</a>
                </li>
            <?php endif; ?>
            <li>
                <a href="index.php?action=contact">Contact</a>
            </li>
            <li>
                <a href="index.php?action=panier">Panier</a>
            </li>
            <li>
                <a href="index.php">Acceuil</a>
            </li>
        </ul>
    </nav>
    <main>
        <?php if (isset($message)) : ?>
            <p><?= $message ?></p>
        <?php endif; ?>

        <?php if (array_key_exists("message", $_GET)) : ?>
            <p><?= $_GET['message'] ?></p>
        <?php endif; ?>

        <?php include $template . ".php"; ?>
    </main>
</body>

</html>