<?php

declare(strict_types=1);

namespace controllers;

use models\Contact;
use controllers\SecurityController;

class ContactController extends SecurityController
{
    private $contact;

    public function __construct()
    {
        $this->contact = new Contact();
    }

    public function contact(): void
    {
        $template = "user/contact";

        if (isset($_POST['firstName']) && !empty($_POST["firstName"]) && isset($_POST['lastName']) && !empty($_POST["lastName"]) && isset($_POST['mail']) && !empty($_POST["mail"]) && isset($_POST['phone']) && !empty($_POST["phone"] && isset($_POST['sujet']) && !empty($_POST["sujet"]))) {

            $firstName = htmlspecialchars($_POST['firstName']);
            $lastName = htmlspecialchars($_POST['lastName']);
            $mail = htmlspecialchars($_POST['mail']);
            $phone = htmlspecialchars($_POST['phone']);
            $sujet = htmlspecialchars($_POST['sujet']);

            $test = $this->contact->insertContact($firstName, $lastName, $mail, $phone, $sujet);

            if ($test) {
                $message = "Votre message a bien été envoyé";
                header("location:index.php?action=contact&message=" . $message);
            } else {
                $message = "Une erreur est survenue";
            }
        }
        require "views/layout.php";
    }
}
