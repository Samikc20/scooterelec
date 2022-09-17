<table>
    <caption>Panier</caption>
    <tbody>
        <table border="1">
            <tr>
                <th>Id</th>
                <th>Marque</th>
                <th>Prix</th>
                <th>Quantite</th>
                <th>Prix Total</th>
                <th>Action</th>
            </tr>
            <?php
            if (isset($result)) {

                foreach ($result as $key => $trotinette) { ?>

                    <tr>
                        <td><strong><?= $trotinette['Id_trotinette']; ?></strong></td>
                        <td><?= $trotinette['Marque']; ?></td>
                        <td><?= $trotinette['Prix']; ?></td>
                        <td><?= $quantites[$key]; ?></td>
                        <td><?= $trotinette['Prix'] *  $quantites[$key]; ?></td>
                        <td><a href='index.php?action=removePanier&id=<?= $trotinette['Id_trotinette']; ?>'>Annuler</a></td>
                    </tr>

            <?php
                }
            }; ?>
        </table>
    </tbody>
</table>
<a href="index.php?action=confirmCommande">confirm commande</a>