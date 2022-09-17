<?php

declare(strict_types=1);

namespace models;

use config\DataBase;

class Panier extends DataBase
{
    private $connexion;

    public function __construct()
    {
        $this->connexion = $this->getConnexion();
    }

    public function insertPanier(int $id_client): string
    {
        $query = $this->connexion->prepare("
                                            INSERT INTO `panier`(
                                                `id_client`
                                                 )
                                            VALUES(
                                                ?
                                            )
                                            ");
        $query->execute([$id_client]);
        $last_id = $this->connexion->lastInsertId();
        return $last_id;
    }

    public function insertPanierLine(int $id_panier, int $id_trotinette, int $quantite): bool
    {
        $query = $this->connexion->prepare("
                                            INSERT INTO `ligne_panier`(
                                                `id_panier`,
                                                `id_trotinette`,
                                                `quantite`
                                                 )
                                            VALUES(
                                                ?,
                                                ?,
                                                ?
                                            )
                                            ");
        $result = $query->execute(array($id_panier, $id_trotinette, $quantite));
        return $result;
    }
}
