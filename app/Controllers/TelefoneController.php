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
     * @param int $usuario_id
     * @return array
     */
    public function create(int $usuario_id)
    {
        $telefones = $_POST['telefone'];
        $array = [];
        /**
         * Organiza os telefones
         */
        for($i = 0; $i < count($telefones); $i=$i+2) {
            $array[$i]["tipo"] = $telefones[$i]["tipo"];
            $array[$i]["numero"] = $telefones[$i+1]["numero"];
        }

        /**
         * Armazena os IDs dos telefones já cadastrado, para caso houver fala em um cadastro, deletar os outros telefones
         * Para não ficar lixo na base;
         */
        $telefones_ids = [];
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
                    foreach($telefones_ids as $id) {
                        Telefone::delete($id);
                    }
                    return ["success" => false, "msg" => $rules];
                } else {
                    $telefone["numero"] = str_replace("-","", $numero);
                    $telefones_ids[] = $this->telefone->create($telefone, $usuario_id);
                }
            }
        }
        return ["success" => true, "msg" => $telefones_ids];
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