<?php

namespace App;

use App\Controllers\CidadeController;
use App\Controllers\Dashboard;
use App\Controllers\EspecialidadeController;
use App\Controllers\EstadoController;
use App\Controllers\MedicoController;
use App\Controllers\NacionalidadeController;
use App\Controllers\TelefoneController;
use App\Controllers\UsuarioController;
use \App\Libs\Twig as Twig;
use \Klein\Klein as Klein;

class Route
{
    private $twig;
    private $route;

    /**
     * Instance class twig, create routes && verify if fails and dispatch
     */
    public function ready()
    {
        $this->twig = new Twig();
        $this->route = new Klein();
        $this->routing();
        $this->fails();
        $this->route->dispatch();
    }

    /**
     * Creating routes
     */
    public function routing()
    {
        @session_start();
        $this->route->respond('GET', '/', function() {
            $dashboard = new Dashboard();
            echo $this->twig->render('index.tpl.html', $dashboard->index());
        });
        $this->route->respond('GET', '/login', function($request, $response) {
            echo $this->twig->render('login.tpl.html');
        });
        $this->route->respond('POST', '/login', function($request, $response) {
            $usuario = new UsuarioController();
            echo $usuario->login($response);
        });

        /**
         * Médico
         */
        $this->route->respond('GET', '/medico', function() {
            $medico = new MedicoController();
            $medicos = $medico->getAll();
            echo $this->twig->render('medico.tpl.html', ["medicos" => $medicos]);
        });
        $this->route->respond('GET', '/medico/adicionar', function() {
            $nacionalidade = new NacionalidadeController();
            $estado = new EstadoController();
            $array = [
                "nacionalidades" => $nacionalidade->getAll(),
                "estados" => $estado->getAll()
            ];
            echo $this->twig->render('medico-adicionar.tpl.html', $array);
        });
        $this->route->respond('POST', '/medico/adicionar', function($request, $response) {
            $medico = new MedicoController();
            echo json_encode($medico->create($response));
        });

        /**
         * Cidade
         */
        $this->route->respond('GET', '/cidade/[i:id]', function($request) {
            $cidade = new CidadeController();
            echo json_encode($cidade->get($request->id));
        });

        /**
         * Telefone
         */
        $this->route->respond('GET', '/telefone/[i:id]', function($request) {
            $telefone = new TelefoneController();
            echo json_encode($telefone->get($request->id));
        });

        /**
         * Especialidade
         */
        $this->route->respond('GET', '/especialidade/[i:id]', function($request) {
            $especialidade = new EspecialidadeController();
            echo json_encode($especialidade->get($request->id));
        });
    }

    /**
     * Routes problem, is fails
     */
    public function fails()
    {
        $this->route->onHttpError(function($code, $router) {
            switch($code) {
                case 404:
                    $router->response()->body(
                        $this->twig->render('/errors/error404.tpl.html')
                    );
                    break;
                case 405:
                    $router->response()->body(
                        $this->twig->render('/errors/error405.tpl.html')
                    );
                    break;
                default:
                    $router->response()->body(
                        $this->twig->render('/errors/default.tpl.html')
                    );
            }
        });
    }
}