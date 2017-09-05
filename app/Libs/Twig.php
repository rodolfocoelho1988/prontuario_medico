<?php

namespace App\Libs;

class Twig
{
    private $loader;
    private $twig;

    /**
     * Twig constructor.
     */
    function __construct()
    {
        $this->loader = new \Twig_Loader_Filesystem(__DIR__ . '/../../resources/views');
        $this->twig = new \Twig_Environment($this->loader, [
            "debug" => true,
            "cache" => __DIR__ . '/../../resources/cache/views'
        ]);
        $this->twig->addExtension(new TwigExtension());
        $this->twig->addExtension(new \Twig_Extension_Debug());
    }

    /**
     * Generates the view for the user
     * @param string $file
     * @param array $data
     */
    public function render(string $file, array $data = [])
    {
        echo $this->twig->render($file, $data);
    }
}