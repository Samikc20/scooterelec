<table>
    <caption>Trotinettes</caption>
    <tbody>
        <table border="1">
            <tr>
                <th>Marque</th>
                <th>Prix</th>
                <th>Description</th>
                <th>Couleur</th>
                <th>Quantite</th>
                <th>Action</th>
            </tr>
            <?php

            use models\Trotinette;

            foreach ($trotinettes as $trotinette) {
                if ($trotinette['quantite'] != 0) { ?>
                    <form action="index.php?action=ajouterPanier&id=<?= $trotinette['Id_trotinette']; ?>" method="POST">
                        <tr>
                            <td><strong><?= $trotinette['Marque']; ?></strong></td>
                            <td><?= $trotinette['Prix']; ?></td>
                            <td><?= $trotinette['Description']; ?></td>
                            <td><?= $trotinette['Couleur']; ?></td>
                            <td><select name="quantite">
                                    <?php
                                    foreach (range(1, $trotinette['quantite']) as $number) { ?>
                                        <option value=<?= $number ?>><?= $number ?></option>
                                    <?php
                                    }
                                    ?>
                                </select></td>
                            <td><button type="submit">ajouter au panier</button></td>
                        </tr>
                    </form>
            <?php }
            }; ?>
        </table>
    </tbody>
</table>