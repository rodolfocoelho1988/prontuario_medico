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
     * @return bool|string
     */
    public function create(array $endereco)
    {
        return $this->endereco->register($endereco);
    }

    /**
     * Faz a validação do endereço de um usuário
     * @param array $endereco
     * @return array|string
     */
    public function validation(array $endereco)
    {
        $rules = EnderecoRegisterRequest::rules($endereco);
        if($rules !== true) {
            $this->setResponse(["success" => false, "msg" => $rules]);
        } else {
            empty($endereco['numero']) ? $endereco['numero'] = NULL : "";
            empty($endereco['complemento']) ? $endereco['complemento'] = NULL : "";
            $this->setResponse(["success" => true, "msg" => $endereco]);
        }

        return $this->getResponse();
    }

}