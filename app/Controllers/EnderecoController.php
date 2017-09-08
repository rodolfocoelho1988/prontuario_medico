<?php

namespace App\Controllers;

use App\Models\Endereco;
use App\Requests\EnderecoRegisterRequest;

class EnderecoController extends Controller
{
    private $endereco;

    /**
     * EnderecoController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->endereco = new Endereco();
    }

    /**
     * @param array $endereco
     * @return array
     */
    public function create(array $endereco)
    {
        $rules = EnderecoRegisterRequest::rules($endereco);
        if($rules !== true) {
            $this->setResponse(["success" => false, "msg" => $rules]);
        } else {
            empty($endereco['numero']) ? $endereco['numero'] = NULL : "";
            empty($endereco['complemento']) ? $endereco['complemento'] = NULL : "";
            $endereco = $this->endereco->register($endereco);
            if($endereco)
                $this->setResponse(["success" => true, "msg" => $endereco]);
            else
                $this->setResponse(["success" => false, "msg" => [["error" => ["Cadastro indisponível no momento."]]]]);
        }

        return $this->getResponse();
    }

}