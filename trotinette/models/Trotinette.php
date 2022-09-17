<?php

declare(strict_types=1);

namespace models;

use config\DataBase;

class Trotinette extends DataBase
{
    private $connexion;

    public function __construct()
    {
        $this->connexion = $this->getConnexion();
    }

    public function getTrotinettes(): ?array
    {
        $trotinettes = null;
        $query = $this->connexion->prepare(
            "
            SELECT
            *
            FROM
            trotinette
            "
        );

        $query->execute();
        $trotinettes = $query->fetchAll();
        return $trotinettes;
    }
    public function getTrotinette($id): ?array
    {
        $trotinettes = null;
        $query = $this->connexion->prepare(
            "
            SELECT
            *
            FROM
            trotinette
            WHERE Id_trotinette = ?
            "
        );

        $query->bindParam(1, $id);
        $query->execute();
        $result = $query->fetch();
        return $result;
    }

    public function getTrotinetteByMarque($marque): bool|array
    {
        $query = $this->connexion->prepare("
                                            SELECT 
                                            * 
                                            FROM 
                                            `trotinette` 
                                            WHERE 
                                            `marque` = ? 
                                            ");
        $query->execute([$marque]);
        $user = $query->fetch();

        return $user;
    }
}
