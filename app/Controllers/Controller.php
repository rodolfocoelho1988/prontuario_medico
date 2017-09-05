<?php

namespace App\Controllers;


abstract class Controller
{
    private $response;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->response = [];
    }

    /**
     * Method to give a response to the user
     * @return string|array
     */
    public function getResponse() : array
    {
        return $this->response;
    }

    /**
     * Set response to the user
     * @param array $response
     */
    public function setResponse(array $response)
    {
        $this->response = $response;
    }
}