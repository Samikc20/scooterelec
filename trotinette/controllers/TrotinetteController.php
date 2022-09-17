<?php

declare(strict_types=1);

namespace controllers;

use models\Trotinette;
use controllers\SecurityController;

class TrotinetteController extends SecurityController
{
    private $trotinette;

    public function __construct()
    {
        $this->trotinette = new Trotinette();
    }

    public function listTrotinettes(): void
    {
        $trotinettes = $this->trotinette->getTrotinettes();
        $template = "home";
        require "views/layout.php";
    }
}
