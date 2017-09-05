<?php

namespace App;

use App\Controllers\AgendamentoController;
use App\Controllers\MedicoController;
use App\Controllers\PacienteController;
use App\Controllers\UsuarioController;
use \App\Libs\Twig as Twig;
use \Klein\Klein as Klein;

class Route
{
    private $twig;
    private $route;
    private $language;

    /**
     * Instance class twig, create routes && verify if fails and dispatch
     */
    public function ready()
    {
        $this->twig = new Twig();
        $this->route = new Klein();
        $this->language = new Libs\Language();
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
        $this->route->respond('GET', '/', function($request) {
            $paciente = new PacienteController();
            $medico = new MedicoController();
            $agendamento = new AgendamentoController();
            echo $this->twig->render('index.tpl.html', ["paciente" => $paciente->getTotal(), "medico" => $medico->getTotal(), "agendamento" => $agendamento->getTotal()]);
        });
        $this->route->respond('GET', '/login', function($request) {
            echo $this->twig->render('login.tpl.html');
        });
        $this->route->respond('POST', '/login', function($request, $response) {
            $usuario = new UsuarioController();
            echo $usuario->login($response);
        });
    }

    /**
     * Routes problem, is fails
     */
    public function fails()
    {
        $this->route->onHttpError(function($code, $router) {
            $data = [
                'lang' => $this->language->getLang()
            ];
            switch($code) {
                case 404:
                    $router->response()->body(
                        $this->twig->render('/errors/error404.tpl.html', $data)
                    );
                    break;
                case 405:
                    $router->response()->body(
                        $this->twig->render('/errors/error405.tpl.html', $data)
                    );
                    break;
                default:
                    $router->response()->body(
                        $this->twig->render('/errors/default.tpl.html', $data)
                    );
            }
        });
    }
}