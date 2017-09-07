<?php

namespace App\Libs;

class Language
{
    /**
     * References array this actual language
     * @var array|mixed
     */
    private $lang = [];

    /**
     * Language constructor.
     */
    public function __construct()
    {
        @session_start();
        if(isset($_GET['changelang']))
        {
            if($this->langExists($_GET['changelang']))
            {
                $lang = $_GET['changelang'];
            }
            else
            {
                $lang = 'ptbr';
            }
            $_SESSION['lang'] = $lang;
        }
        else if(isset($_SESSION['lang']))
        {
            $lang = $_SESSION['lang'];
        }
        else
        {
            $lang = 'ptbr';
            $_SESSION['lang'] = $lang;
        }

        $this->setLang($lang);

    }

    /**
     * Get array language
     * @return array|mixed
     */
    public function getLang() : array
    {
        return $this->lang;
    }

    /**
     * Verify it file exists in directory resources/lang/
     * @param string $file
     * @return bool
     */
    private function langExists(string $file) : bool
    {
        if(file_exists(__DIR__ . '/../../resources/lang/'.$file.'.php'))
            return true;
        return false;
    }

    /**
     * Require file the language
     * @param string $file
     * @return array
     */
    private function setLang(string $file) : array
    {
        return $this->lang = require_once(__DIR__ . '/../../resources/lang/'.$file.'.php');
    }
}