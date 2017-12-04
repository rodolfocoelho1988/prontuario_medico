<?php

namespace App;

use App\Controllers\AgendamentoController;
use App\Controllers\CidadeController;
use App\Controllers\MedicalRecords\AnamneseController;
use App\Controllers\MedicalRecords\AtestadoController;
use App\Controllers\MedicalRecords\EvolucaoController;
use App\Controllers\MedicalRecords\HipoteseController;
use App\Controllers\MedicalRecords\PrescricaoController;
use App\Controllers\MenuController;
use App\Controllers\Pages\AgendamentoPage;
use App\Controllers\Pages\IndexPage;
use App\Controllers\EspecialidadeController;
use App\Controllers\MedicoController;
use App\Controllers\PacienteController;
use App\Controllers\Pages\MedicoPage;
use App\Controllers\Pages\PacientePage;
use App\Controllers\ProntuarioController;
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
        $this->route->respond('GET', '/', function($request) {
            $indexPage = new IndexPage();
            echo $this->twig->render('index.tpl.html', $indexPage->index($request));
        });
        $this->route->respond('GET', '/login', function() {
            echo $this->twig->render('login.tpl.html');
        });
        $this->route->respond('POST', '/login', function($request, $response) {
            $usuario = new UsuarioController();
            echo $usuario->login($response);
        });
        $this->route->respond('GET', '/logout', function($request, $response) {
            $usuario = new UsuarioController();
            return $usuario->logout($response);
        });

        /**
         * Médico
         */
        $this->route->respond('GET', '/medico', function($request) {
            $medicoPage = new MedicoPage($request);
            echo $this->twig->render('medico.tpl.html', $medicoPage->index());
        });
        $this->route->respond('GET', '/medico/cadastrar', function($request) {
            $medicoPage = new MedicoPage($request);
            echo $this->twig->render('medico-cadastrar.tpl.html', $medicoPage->cadastrar());
        });
        $this->route->respond('POST', '/medico/cadastrar', function($request, $response) {
            $medico = new MedicoController();
            echo json_encode($medico->create($response));
        });

        /**
         * Paciente
         */
        $this->route->respond('GET', '/paciente', function($request) {
            $pacientePage = new PacientePage($request);
            echo $this->twig->render('paciente.tpl.html', $pacientePage->index());
        });
        $this->route->respond('GET', '/paciente/cadastrar', function($request) {
            $pacientePage = new PacientePage($request);
            echo $this->twig->render('paciente-cadastrar.tpl.html', $pacientePage->cadastrar());
        });
        $this->route->respond('POST', '/paciente/cadastrar', function($request, $response) {
            $paciente = new PacienteController();
            echo json_encode($paciente->create($response));
        });
        $this->route->respond('GET', '/paciente/[i:id]/historico', function($request, $response) {
            $agendamento = new AgendamentoController();
            $paciente = new PacienteController();
            $agendamentos = $agendamento->getByPaciente($request);
            $menu = new MenuController();
            $array = [
                "paciente" => $paciente->get($request),
                "menus" => $menu->get(),
                "agendamentos" => $agendamentos
            ];
            echo $this->twig->render('paciente-historico.tpl.html', $array);
        });

        /**
         * Agendamento
         */
        $this->route->respond('GET', '/agendamento', function($request) {
            $agendamentoPage = new AgendamentoPage($request);
            echo $agendamentoPage->index($this->twig);
        });
        $this->route->respond('GET', '/agendamento/cadastrar', function($request) {
            $agendamentoPage = new AgendamentoPage($request);
            echo $this->twig->render('agendamento-cadastrar.tpl.html', $agendamentoPage->cadastrar());
        });
        $this->route->respond('POST', '/agendamento/cadastrar', function($request, $response) {
            $agendamento = new AgendamentoController();
            echo json_encode($agendamento->create($response));
        });
        $this->route->respond('GET', '/agendamento/[i:id]', function($request) {
            $agendamento = new AgendamentoController();
            $menu = new MenuController();
            $array = [
                "paciente" => $agendamento->paciente($request),
                "agendamento" => [
                    "id" => $request->id
                ],
                "menus" => $menu->get()
            ];

            echo $this->twig->render('prontuario.tpl.html', $array);
        });
        $this->route->respond('GET', '/agendamento/[i:id]/fechar', function($request, $response) {
            $agendamento = new AgendamentoController();
            echo json_encode($agendamento->close($request, $response));
        });

        /**
         * Cidade
         */
        $this->route->respond('GET', '/cidade/[i:id]', function($request) {
            $cidade = new CidadeController();
            echo json_encode($cidade->get($request));
        });

        /**
         * Telefone
         */
        $this->route->respond('GET', '/telefone/[i:id]', function($request) {
            $telefone = new TelefoneController();
            echo json_encode($telefone->get($request));
        });

        /**
         * Especialidade
         */
        $this->route->respond('GET', '/especialidade/[i:id]', function($request) {
            $especialidade = new EspecialidadeController();
            echo json_encode($especialidade->get($request));
        });

        /**
         * Usuario
         */
        $this->route->respond('GET', '/usuario/desativar/[i:id]', function($request) {
            $usuario = new UsuarioController();
            return json_encode($usuario->disable($request));
        });
        $this->route->respond('GET', '/usuario/ativar/[i:id]', function($request) {
            $usuario = new UsuarioController();
            return json_encode($usuario->active($request));
        });

        /**
         * Prontuário
         */
        $this->route->respond('GET', '/prontuario/anamnese/[i:agendamento]', function($request) {
            $anamnese = new AnamneseController();
            echo json_encode($anamnese->byAgendamento($request->agendamento));
        });
        $this->route->respond('POST', '/prontuario/anamnese/save', function($request, $response) {
            $anamnese = new AnamneseController();
            echo json_encode($anamnese->save($response));
        });

        $this->route->respond('GET', '/prontuario/hipotese/[i:agendamento]', function($request) {
            $hipotese = new HipoteseController();
            echo json_encode($hipotese->byAgendamento($request->agendamento));
        });
        $this->route->respond('POST', '/prontuario/hipotese/save', function($request, $response) {
            $hipotese = new HipoteseController();
            echo json_encode($hipotese->save($response));
        });

        $this->route->respond('GET', '/prontuario/prescricao/[i:agendamento]', function($request) {
            $prescricao = new PrescricaoController();
            echo json_encode($prescricao->byAgendamento($request->agendamento));
        });
        $this->route->respond('POST', '/prontuario/prescricao/save', function($request, $response) {
            $prescricao = new PrescricaoController();
            echo json_encode($prescricao->save($response));
        });

        $this->route->respond('GET', '/prontuario/evolucao/[i:agendamento]', function($request) {
            $evolucao = new EvolucaoController();
            echo json_encode($evolucao->byAgendamento($request->agendamento));
        });
        $this->route->respond('POST', '/prontuario/evolucao/save', function($request, $response) {
            $evolucao = new EvolucaoController();
            echo json_encode($evolucao->save($response));
        });

        $this->route->respond('GET', '/prontuario/atestado/[i:agendamento]', function($request) {
            $atestado = new AtestadoController();
            echo json_encode($atestado->byAgendamento($request->agendamento));
        });
        $this->route->respond('POST', '/prontuario/atestado/save', function($request, $response) {
            $atestado = new AtestadoController();
            echo json_encode($atestado->save($response));
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