<?php

declare(strict_types=1);

namespace config;

use Exception;

class DataBase
{
    private const SERVEUR = "localhost";
    private const USER = "root";
    private const MDP = "";
    private const BDD = "trottinettes";
    private $connexion;
    // private const SERVEUR = "db.3wa.io";
    // private const USER = "samikchaou";
    // private const MDP = "95f10cfc6b092d53c99800f2c66d4a97";
    // private const BDD = "samikchaou_restaurant";
    // private $connexion;

    public function getConnexion(): ?\PDO
    {
        $this->connexion = null;
        try {
            $this->connexion = new \PDO("mysql:host=" . self::SERVEUR . ";dbname=" . self::BDD, self::USER, self::MDP);
            $this->connexion->exec("SET CHARACTER SET utf8");
        } catch (Exception $message) {
            echo ' une erruer au moment de la connexion BDD : ' . $message->getMessage();
        }

        return $this->connexion;
    }
}
