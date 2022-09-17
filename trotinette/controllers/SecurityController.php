<?php
declare(strict_types=1);

namespace controllers;

class SecurityController
{
   
    public function isConnect():bool
    {
        if(isset($_SESSION['user']))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}