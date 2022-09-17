<?php

declare(strict_types=1);

namespace controllers;

use controllers\SecurityController;
use models\Panier;
use models\Trotinette;

class PanierController extends SecurityController
{
    private $trotinette;
    private $panier;

    public function __construct()
    {
        $this->panier = new Panier();
        $this->trotinette = new Trotinette();
    }

    public function addPanier(): void
    {

        $old_ids = array();
        $old_quantites = array();

        if (!isset($_COOKIE['ids'])) {
            setcookie('ids', '', time() + 3600);
        }
        if (!isset($_COOKIE['quantites'])) {
            setcookie('quantites', '', time() + 3600);
        }
        if (!empty($_COOKIE['ids'])) {
            $old_ids =  explode(',', $_COOKIE['ids']);
        }
        if (!empty($_COOKIE['quantites'])) {
            $old_quantites =  explode(',', $_COOKIE['quantites']);
        }
        if (isset($_POST['quantite']) && !empty($_POST["quantite"]) && isset($_GET['id']) && !empty($_GET["id"])) {
            if (in_array($_GET['id'], $old_ids)) {
                $index = array_search($_GET['id'], $old_ids);
                $old_quantites[$index] += $_POST["quantite"];
            } else {
                array_push($old_ids, $_GET['id']);
                array_push($old_quantites, $_POST['quantite']);
            }

            setcookie('quantites', implode(",", $old_quantites), time() + 3600);
            setcookie('ids', implode(",", $old_ids), time() + 3600);
        }
        header('Location: ' . "index.php");
    }

    public function afficherPanier(): void
    {
        $quantites = array();
        if (isset($_COOKIE['quantites']) && !empty($_COOKIE['quantites']))
            $quantites = explode(',', $_COOKIE['quantites']);

        $items = '';
        if (isset($_COOKIE['ids']) && !empty($_COOKIE['ids']))
            $items = $_COOKIE['ids'];
        $result = array();
        foreach (explode(',', $items) as $item) {
            if (!empty($item))
                array_push($result, $this->trotinette->getTrotinette($item));
        }

        $template = "panier";

        require "views/layout.php";
    }

    public function removePanier(): void
    {
        $old_ids = array();
        $old_quantites = array();
        if (!empty($_COOKIE['ids'])) {
            $old_ids =  explode(',', $_COOKIE['ids']);
        }
        if (!empty($_COOKIE['quantites'])) {
            $old_quantites =  explode(',', $_COOKIE['quantites']);
        }
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            foreach ($old_ids as $key => $value) {
                if ($_GET['id'] == $value) {
                    unset($old_ids[$key]);
                    unset($old_quantites[$key]);
                }
            }
        }
        setcookie('quantites', implode(",", $old_quantites), time() + 3600);
        setcookie('ids', implode(",", $old_ids), time() + 3600);
        header('Location: ' . "index.php?action=panier");
    }

    public function confirmCommande(): void
    {
        $old_ids = array();
        $old_quantites = array();
        $id_client = $_SESSION['user']['id_user'];
        $panier = $this->panier->insertPanier($id_client);
        if ($panier) {
            if (!empty($_COOKIE['ids'])) {
                $old_ids =  explode(',', $_COOKIE['ids']);
            }
            if (!empty($_COOKIE['quantites'])) {
                $old_quantites =  explode(',', $_COOKIE['quantites']);
            }
            foreach ($old_ids as $key => $value) {
                $test_line = $this->panier->insertPanierLine((int)$panier, (int)$old_ids[$key], (int)$old_quantites[$key]);
                if ($test_line) {
                    $message = "panier confirmé";
                    header("location:index.php?message=" . $message);
                } else {
                    $message = "Une erreur SQL est survenue";
                }
            }
            setcookie('quantites', "", time() + 3600);
            setcookie('ids', "", time() + 3600);
        } else {
            $message = "Une erreur SQL est survenue";
        }
    }
}
