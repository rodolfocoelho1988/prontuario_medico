<?php

namespace App\Controllers;

use App\Models\Menu;

class MenuController extends Controller
{
    private $menu;

    /**
     * MenuController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->menu = new Menu();
    }

    public function get()
    {
        if(!isset($_SESSION['user']))
            header('Location: /login');
        else
            return $this->menu->get($_SESSION['user']->grupo_id);
    }

}