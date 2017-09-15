<?php

namespace App\Controllers;

use App\Models\Telefone;
use App\Requests\TelefoneCreateRequest;
use Klein\Request;

class TelefoneController extends Controller
{
    private $telefone;

    /**
     * TelefoneController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->telefone = new Telefone();
    }

    /**
     * Faz a validação e a limpeza dos telefones em brancos
     * @param array $telefones
     * @return array
     */
    public function validation(array $telefones)
    {
        $array = [];
        /**
         * Organiza os telefones
         */
        for($i = 0; $i < count($telefones); $i=$i+2) {
            $array[$i]["tipo"] = $telefones[$i]["tipo"];
            $array[$i]["numero"] = $telefones[$i+1]["numero"];
        }

        /**
         * Armazena os telefones que sao válidos
         */
        $telefonesFinais = [];
        /**
         * Limpa os campos de telefones que não estiverem preenchidos
         */
        foreach($array as $key => $telefone) {
            if(empty($telefone["numero"])) {
                unset($array[$key]);
            } else {
                $numero = $telefone["numero"];
                $telefone["numero"] = str_replace([" ", "(", ")", "-"],"", $telefone["numero"]);
                $rules = TelefoneCreateRequest::rules($telefone);
                if($rules !== true) {
                    return ["success" => false, "msg" => $rules];
                } else {
                    $telefone["numero"] = str_replace("-","", $numero);
                    $telefonesFinais[] = $telefone;
                }
            }
        }

        return ["success" => true, "msg" => $telefonesFinais];
    }

    /**
     * Deleta e insere os novos telefones
     * @param array $telefones
     * @param int $usuario
     * @return array|bool
     */
    public function synchronize(array $telefones, int $usuario)
    {
        if(!empty($telefones) or (!isset($telefones)))
            return $this->telefone->synchronize($telefones, $usuario);
        else
            return true;
    }

    /**
     * Busca todos os telefones de uma determinada pessoa
     * @param Request $request
     * @return mixed
     */
    public function get(Request $request)
    {
        return $this->telefone->get($request->id);
    }
}