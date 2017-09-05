<?php

namespace App\Libs;

class TwigExtension extends \Twig_Extension
{
    public function getGlobals()
    {
        @session_start();
        $array = [];
        if(isset($_SESSION["user"])) {
            $array = ['session' => $_SESSION["user"]];
        }

        return $array;
    }
}