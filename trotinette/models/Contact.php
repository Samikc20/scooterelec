<?php

declare(strict_types=1);

namespace models;

use config\DataBase;

class Contact extends DataBase
{
    private $connexion;

    public function __construct()
    {
        $this->connexion = $this->getConnexion();
    }

    public function insertContact(string $firstName, string $lastName, string $mail, string $phone, string $sujet): bool
    {
        $query = $this->connexion->prepare("
                                            INSERT INTO `contact`(
                                                `Nom`,
                                                `Prenom`,
                                                `Mail`,
                                                `Phone`,
                                                `Sujet`
                                                 )
                                            VALUES(
                                                ?,
                                                ?,
                                                ?,
                                                ?,
                                                ?
                                            )
                                            ");
        $result = $query->execute(array($firstName, $lastName, $mail, $phone, $sujet));
        return $result;
    }
}
