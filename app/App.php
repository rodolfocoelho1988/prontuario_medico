<?php

namespace App;

use \Whoops\Run as WhoopsRun;
use \Whoops\Handler\PrettyPageHandler as WhoopsPrettyPageHandler;

class App
{
    /**
     * App constructor.
     */
    public function __construct()
    {
        $this->initWhoopsErrorHandler();
        $route = new Route();
        $route->ready();
    }

    /**
     * When generating exceptions this method makes processing
     * @return $this
     */
    public function initWhoopsErrorHandler()
    {
        $whoops = new WhoopsRun();
        $handler = new WhoopsPrettyPageHandler();

        $whoops->pushHandler($handler)->register();

        return $this;
    }
}