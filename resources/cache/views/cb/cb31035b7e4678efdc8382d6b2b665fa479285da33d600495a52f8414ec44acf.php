<?php

/* index.tpl.html */
class __TwigTemplate_3bb1f3c3c7548b443b18ee3886f5e18da91867148ce411ba32ee849c357c7e0d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        if ( !($context["session"] ?? null)) {
            // line 2
            echo "<script>window.location.href = '/login'</script>
";
        }
        // line 4
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <!-- Title -->
    <title>SysMedic - Dashboard</title>

    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no\"/>
    <meta charset=\"UTF-8\">
    <meta name=\"description\" content=\"Agendamento de consultas entre o medico e paciente com prontuários.\" />
    <meta name=\"keywords\" content=\"admin,dashboard, agendamento, consultas, medico, paciente, prontuários, sysmedic\" />
    <link rel=\"shortcut icon\" href=\"/images/favicon.ico\">

    <!-- Styles -->
    <link type=\"text/css\" rel=\"stylesheet\" href=\"/bower_components/materialize/dist/css/materialize.min.css\"/>
    <link type=\"text/css\" rel=\"stylesheet\" href=\"http://fonts.googleapis.com/icon?family=Material+Icons\">
    <link type=\"text/css\" rel=\"stylesheet\" href=\"/bower_components/material-preloader/css/materialPreloader.min.css\">
    <link type=\"text/css\" rel=\"stylesheet\" href=\"/bower_components/datatables/media/css/jquery.dataTables.min.css\">

    <!-- Theme Styles -->
    <link href=\"/css/alpha.min.css\" rel=\"stylesheet\" type=\"text/css\"/>
    <link href=\"/css/custom.css\" rel=\"stylesheet\" type=\"text/css\"/>

    <!-- jQuery -->
    <script type=\"text/javascript\" src=\"/bower_components/jquery/dist/jquery.min.js\"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src=\"http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js\"></script>
    <script src=\"http://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
    <![endif]-->

</head>
<body>
<div class=\"loader-bg\"></div>
<div class=\"loader\">
    <div class=\"preloader-wrapper big active\">
        <div class=\"spinner-layer spinner-blue\">
            <div class=\"circle-clipper left\">
                <div class=\"circle\"></div>
            </div><div class=\"gap-patch\">
            <div class=\"circle\"></div>
        </div><div class=\"circle-clipper right\">
            <div class=\"circle\"></div>
        </div>
        </div>
        <div class=\"spinner-layer spinner-teal lighten-1\">
            <div class=\"circle-clipper left\">
                <div class=\"circle\"></div>
            </div><div class=\"gap-patch\">
            <div class=\"circle\"></div>
        </div><div class=\"circle-clipper right\">
            <div class=\"circle\"></div>
        </div>
        </div>
        <div class=\"spinner-layer spinner-yellow\">
            <div class=\"circle-clipper left\">
                <div class=\"circle\"></div>
            </div><div class=\"gap-patch\">
            <div class=\"circle\"></div>
        </div><div class=\"circle-clipper right\">
            <div class=\"circle\"></div>
        </div>
        </div>
        <div class=\"spinner-layer spinner-green\">
            <div class=\"circle-clipper left\">
                <div class=\"circle\"></div>
            </div><div class=\"gap-patch\">
            <div class=\"circle\"></div>
        </div><div class=\"circle-clipper right\">
            <div class=\"circle\"></div>
        </div>
        </div>
    </div>
</div>
<div class=\"mn-content fixed-sidebar\">
    <header class=\"mn-header navbar-fixed\">
        <nav class=\"cyan darken-1\">
            <div class=\"nav-wrapper row\">
                <section class=\"material-design-hamburger navigation-toggle\">
                    <a href=\"javascript:void(0)\" data-activates=\"slide-out\" class=\"button-collapse show-on-large material-design-hamburger__icon\">
                        <span class=\"material-design-hamburger__layer\"></span>
                    </a>
                </section>
                <div class=\"header-title col s3 m3\">
                    <span class=\"chapter-title\">SysMedic</span>
                </div>
                <form class=\"left search col s6 hide-on-small-and-down\">
                    <div class=\"input-field\">
                        <input id=\"search\" type=\"search\" placeholder=\"Pesquisar\" autocomplete=\"off\">
                        <label for=\"search\"><i class=\"material-icons search-icon\">pesquisar</i></label>
                    </div>
                    <a href=\"javascript: void(0)\" class=\"close-search\"><i class=\"material-icons\">fechar</i></a>
                </form>
            </div>
        </nav>
    </header>

    <aside id=\"slide-out\" class=\"side-nav white fixed\">
        <div class=\"side-nav-wrapper\">
            <!-- Perfil -->
            <div class=\"sidebar-profile\">
                <div class=\"sidebar-profile-image\">
                    <img src=\"/images/profile-image.png\" class=\"circle\" alt=\"\">
                </div>
                <div class=\"sidebar-profile-info\">
                    <a href=\"javascript:void(0);\" class=\"account-settings-link\">
                        <p>Yves Clêuder</p>
                        <span>CRM: 1020<i class=\"material-icons right\">arrow_drop_down</i></span>
                    </a>
                </div>
            </div>
            <!-- Perfil -->
            <div class=\"sidebar-account-settings\">
                <ul>
                    <li class=\"no-padding\">
                        <a class=\"waves-effect waves-grey\"><i class=\"material-icons\">exit_to_app</i>Sair</a>
                    </li>
                </ul>
            </div>
            <ul class=\"sidebar-menu collapsible collapsible-accordion\" data-collapsible=\"accordion\">
                <li class=\"no-padding active\"><a class=\"waves-effect waves-grey active\" href=\"/\"><i class=\"material-icons\">settings_input_svideo</i>Dashboard</a></li>
                <li class=\"no-padding\">
                    <a class=\"collapsible-header waves-effect waves-grey\"><i class=\"material-icons\">favorite</i>Médico<i class=\"nav-drop-icon material-icons\">keyboard_arrow_right</i></a>
                    <div class=\"collapsible-body\">
                        <ul>
                            <li><a href=\"/medico/adicionar\">Adicionar</a></li>
                            <li><a href=\"/medico/\">Listar</a></li>
                        </ul>
                    </div>
                </li>
                <li class=\"no-padding\">
                    <a class=\"collapsible-header waves-effect waves-grey\"><i class=\"material-icons\">face</i>Paciente<i class=\"nav-drop-icon material-icons\">keyboard_arrow_right</i></a>
                    <div class=\"collapsible-body\">
                        <ul>
                            <li><a href=\"/paciente/adicionar\">Adicionar</a></li>
                            <li><a href=\"/paciente/\">Listar</a></li>
                        </ul>
                    </div>
                </li>
                <li class=\"no-padding\">
                    <a class=\"collapsible-header waves-effect waves-grey\"><i class=\"material-icons\">access_alarm</i>Agendamento<i class=\"nav-drop-icon material-icons\">keyboard_arrow_right</i></a>
                    <div class=\"collapsible-body\">
                        <ul>
                            <li><a href=\"/agendamento/adicionar\">Adicionar</a></li>
                            <li><a href=\"/agendamento/\">Listar</a></li>
                        </ul>
                    </div>
                </li>
                <li class=\"no-padding\">
                    <a href=\"/prontuario/\" class=\"collapsible-header waves-effect waves-grey\"><i class=\"material-icons\">list</i>Prontuário</a>
                </li>
            </ul>
            <div class=\"footer\">
                <p class=\"copyright\">SysMedic © 2017</p>
            </div>
        </div>
    </aside>
    <main class=\"mn-inner\">
        <div class=\"row no-m-t no-m-b\">
            <div class=\"col s12 m12 l4\">
                <div class=\"card stats-card\">
                    <div class=\"card-content\">
                        <div class=\"card-options\">
                            <ul>
                                <a href=\"/medico/\"><span class=\"badge cyan lighten-1\">listar</span></a>
                            </ul>
                        </div>
                        <span class=\"card-title\">Médicos</span>
                        <span class=\"stats-counter\"><span class=\"counter\">";
        // line 173
        echo twig_escape_filter($this->env, $this->getAttribute(($context["medico"] ?? null), "count", array()), "html", null, true);
        echo "</span><small>total</small></span>
                    </div>
                </div>
            </div>
            <div class=\"col s12 m12 l4\">
                <div class=\"card stats-card\">
                    <div class=\"card-content\">
                        <div class=\"card-options\">
                            <ul>
                                <a href=\"/paciente/\"><span class=\"badge cyan lighten-1\">listar</span></a>
                            </ul>
                        </div>
                        <span class=\"card-title\">Pacientes</span>
                        <span class=\"stats-counter\"><span class=\"counter\">";
        // line 186
        echo twig_escape_filter($this->env, $this->getAttribute(($context["paciente"] ?? null), "count", array()), "html", null, true);
        echo "</span><small>total</small></span>
                    </div>
                </div>
            </div>
            <div class=\"col s12 m12 l4\">
                <div class=\"card stats-card\">
                    <div class=\"card-content\">
                        <div class=\"card-options\">
                            <ul>
                                <a href=\"/agendamento/\"><span class=\"badge cyan lighten-1\">listar</span></a>
                            </ul>
                        </div>
                        <span class=\"card-title\">Agendamentos</span>
                        <span class=\"stats-counter\"><span class=\"counter\">";
        // line 199
        echo twig_escape_filter($this->env, $this->getAttribute(($context["agendamento"] ?? null), "count", array()), "html", null, true);
        echo "</span><small>neste mês</small></span>
                        <div class=\"percent-info red-text\">8% <i class=\"material-icons\">trending_down</i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"row no-m-t no-m-b\">
            <div class=\"col s12 m12 l12\">
                <div class=\"card\">
                    <div class=\"card-content\">
                        <span class=\"card-title\">Agendamentos de hoje</span>
                        <table id=\"scheduleDay\" class=\"display responsive-table datatable-example\">
                            <thead>
                            <tr>
                                <th>Médico</th>
                                <th>Quantidade de pacientes</th>
                                <th>Primeiro atendimento</th>
                                <th>Último atendimento</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>José Fernandes</td>
                                <td>20</td>
                                <td>17:00</td>
                                <td>19:00</td>
                            </tr>
                            <tr>
                                <td>José Fernandes</td>
                                <td>20</td>
                                <td>17:00</td>
                                <td>19:00</td>
                            </tr>
                            <tr>
                                <td>José Fernandes</td>
                                <td>20</td>
                                <td>17:00</td>
                                <td>19:00</td>
                            </tr>
                            <tr>
                                <td>José Fernandes</td>
                                <td>20</td>
                                <td>17:00</td>
                                <td>19:00</td>
                            </tr>
                            <tr>
                                <td>José Fernandes</td>
                                <td>20</td>
                                <td>17:00</td>
                                <td>19:00</td>
                            </tr>
                            <tr>
                                <td>José Fernandes</td>
                                <td>20</td>
                                <td>17:00</td>
                                <td>19:00</td>
                            </tr>
                            <tr>
                                <td>José Fernandes</td>
                                <td>20</td>
                                <td>17:00</td>
                                <td>19:00</td>
                            </tr>
                            <tr>
                                <td>José Fernandes</td>
                                <td>20</td>
                                <td>17:00</td>
                                <td>19:00</td>
                            </tr>
                            <tr>
                                <td>José Fernandes</td>
                                <td>20</td>
                                <td>17:00</td>
                                <td>19:00</td>
                            </tr>
                            <tr>
                                <td>José Fernandes</td>
                                <td>20</td>
                                <td>17:00</td>
                                <td>19:00</td>
                            </tr>
                            <tr>
                                <td>José Fernandes</td>
                                <td>20</td>
                                <td>17:00</td>
                                <td>19:00</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<div class=\"left-sidebar-hover\"></div>

<!-- JavaScript -->

<script type=\"text/javascript\" src=\"/bower_components/materialize/dist/js/materialize.min.js\"></script>
<script type=\"text/javascript\" src=\"/bower_components/material-preloader/js/materialPreloader.min.js\"></script>
<script type=\"text/javascript\" src=\"/js/alpha.min.js\"></script>
<script type=\"text/javascript\" src=\"/bower_components/datatables/media/js/jquery.dataTables.min.js\"></script>

<!-- Modules JavaScript -->
<script type=\"text/javascript\" src=\"/js/module/table.js\"></script>
<script type=\"text/javascript\" src=\"/js/module/dashboard.js\"></script>

<script type=\"text/javascript\">
    \$(document).ready(function() {
        sysmedic.dashboard.start();
        sysmedic.dashboard.counterup();
        sysmedic.table.scheduleDay();
    });
</script>

</body>
</html>";
    }

    public function getTemplateName()
    {
        return "index.tpl.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  228 => 199,  212 => 186,  196 => 173,  25 => 4,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% if not session %}
<script>window.location.href = '/login'</script>
{% endif %}
<!DOCTYPE html>
<html lang=\"en\">
<head>
    <!-- Title -->
    <title>SysMedic - Dashboard</title>

    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no\"/>
    <meta charset=\"UTF-8\">
    <meta name=\"description\" content=\"Agendamento de consultas entre o medico e paciente com prontuários.\" />
    <meta name=\"keywords\" content=\"admin,dashboard, agendamento, consultas, medico, paciente, prontuários, sysmedic\" />
    <link rel=\"shortcut icon\" href=\"/images/favicon.ico\">

    <!-- Styles -->
    <link type=\"text/css\" rel=\"stylesheet\" href=\"/bower_components/materialize/dist/css/materialize.min.css\"/>
    <link type=\"text/css\" rel=\"stylesheet\" href=\"http://fonts.googleapis.com/icon?family=Material+Icons\">
    <link type=\"text/css\" rel=\"stylesheet\" href=\"/bower_components/material-preloader/css/materialPreloader.min.css\">
    <link type=\"text/css\" rel=\"stylesheet\" href=\"/bower_components/datatables/media/css/jquery.dataTables.min.css\">

    <!-- Theme Styles -->
    <link href=\"/css/alpha.min.css\" rel=\"stylesheet\" type=\"text/css\"/>
    <link href=\"/css/custom.css\" rel=\"stylesheet\" type=\"text/css\"/>

    <!-- jQuery -->
    <script type=\"text/javascript\" src=\"/bower_components/jquery/dist/jquery.min.js\"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src=\"http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js\"></script>
    <script src=\"http://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
    <![endif]-->

</head>
<body>
<div class=\"loader-bg\"></div>
<div class=\"loader\">
    <div class=\"preloader-wrapper big active\">
        <div class=\"spinner-layer spinner-blue\">
            <div class=\"circle-clipper left\">
                <div class=\"circle\"></div>
            </div><div class=\"gap-patch\">
            <div class=\"circle\"></div>
        </div><div class=\"circle-clipper right\">
            <div class=\"circle\"></div>
        </div>
        </div>
        <div class=\"spinner-layer spinner-teal lighten-1\">
            <div class=\"circle-clipper left\">
                <div class=\"circle\"></div>
            </div><div class=\"gap-patch\">
            <div class=\"circle\"></div>
        </div><div class=\"circle-clipper right\">
            <div class=\"circle\"></div>
        </div>
        </div>
        <div class=\"spinner-layer spinner-yellow\">
            <div class=\"circle-clipper left\">
                <div class=\"circle\"></div>
            </div><div class=\"gap-patch\">
            <div class=\"circle\"></div>
        </div><div class=\"circle-clipper right\">
            <div class=\"circle\"></div>
        </div>
        </div>
        <div class=\"spinner-layer spinner-green\">
            <div class=\"circle-clipper left\">
                <div class=\"circle\"></div>
            </div><div class=\"gap-patch\">
            <div class=\"circle\"></div>
        </div><div class=\"circle-clipper right\">
            <div class=\"circle\"></div>
        </div>
        </div>
    </div>
</div>
<div class=\"mn-content fixed-sidebar\">
    <header class=\"mn-header navbar-fixed\">
        <nav class=\"cyan darken-1\">
            <div class=\"nav-wrapper row\">
                <section class=\"material-design-hamburger navigation-toggle\">
                    <a href=\"javascript:void(0)\" data-activates=\"slide-out\" class=\"button-collapse show-on-large material-design-hamburger__icon\">
                        <span class=\"material-design-hamburger__layer\"></span>
                    </a>
                </section>
                <div class=\"header-title col s3 m3\">
                    <span class=\"chapter-title\">SysMedic</span>
                </div>
                <form class=\"left search col s6 hide-on-small-and-down\">
                    <div class=\"input-field\">
                        <input id=\"search\" type=\"search\" placeholder=\"Pesquisar\" autocomplete=\"off\">
                        <label for=\"search\"><i class=\"material-icons search-icon\">pesquisar</i></label>
                    </div>
                    <a href=\"javascript: void(0)\" class=\"close-search\"><i class=\"material-icons\">fechar</i></a>
                </form>
            </div>
        </nav>
    </header>

    <aside id=\"slide-out\" class=\"side-nav white fixed\">
        <div class=\"side-nav-wrapper\">
            <!-- Perfil -->
            <div class=\"sidebar-profile\">
                <div class=\"sidebar-profile-image\">
                    <img src=\"/images/profile-image.png\" class=\"circle\" alt=\"\">
                </div>
                <div class=\"sidebar-profile-info\">
                    <a href=\"javascript:void(0);\" class=\"account-settings-link\">
                        <p>Yves Clêuder</p>
                        <span>CRM: 1020<i class=\"material-icons right\">arrow_drop_down</i></span>
                    </a>
                </div>
            </div>
            <!-- Perfil -->
            <div class=\"sidebar-account-settings\">
                <ul>
                    <li class=\"no-padding\">
                        <a class=\"waves-effect waves-grey\"><i class=\"material-icons\">exit_to_app</i>Sair</a>
                    </li>
                </ul>
            </div>
            <ul class=\"sidebar-menu collapsible collapsible-accordion\" data-collapsible=\"accordion\">
                <li class=\"no-padding active\"><a class=\"waves-effect waves-grey active\" href=\"/\"><i class=\"material-icons\">settings_input_svideo</i>Dashboard</a></li>
                <li class=\"no-padding\">
                    <a class=\"collapsible-header waves-effect waves-grey\"><i class=\"material-icons\">favorite</i>Médico<i class=\"nav-drop-icon material-icons\">keyboard_arrow_right</i></a>
                    <div class=\"collapsible-body\">
                        <ul>
                            <li><a href=\"/medico/adicionar\">Adicionar</a></li>
                            <li><a href=\"/medico/\">Listar</a></li>
                        </ul>
                    </div>
                </li>
                <li class=\"no-padding\">
                    <a class=\"collapsible-header waves-effect waves-grey\"><i class=\"material-icons\">face</i>Paciente<i class=\"nav-drop-icon material-icons\">keyboard_arrow_right</i></a>
                    <div class=\"collapsible-body\">
                        <ul>
                            <li><a href=\"/paciente/adicionar\">Adicionar</a></li>
                            <li><a href=\"/paciente/\">Listar</a></li>
                        </ul>
                    </div>
                </li>
                <li class=\"no-padding\">
                    <a class=\"collapsible-header waves-effect waves-grey\"><i class=\"material-icons\">access_alarm</i>Agendamento<i class=\"nav-drop-icon material-icons\">keyboard_arrow_right</i></a>
                    <div class=\"collapsible-body\">
                        <ul>
                            <li><a href=\"/agendamento/adicionar\">Adicionar</a></li>
                            <li><a href=\"/agendamento/\">Listar</a></li>
                        </ul>
                    </div>
                </li>
                <li class=\"no-padding\">
                    <a href=\"/prontuario/\" class=\"collapsible-header waves-effect waves-grey\"><i class=\"material-icons\">list</i>Prontuário</a>
                </li>
            </ul>
            <div class=\"footer\">
                <p class=\"copyright\">SysMedic © 2017</p>
            </div>
        </div>
    </aside>
    <main class=\"mn-inner\">
        <div class=\"row no-m-t no-m-b\">
            <div class=\"col s12 m12 l4\">
                <div class=\"card stats-card\">
                    <div class=\"card-content\">
                        <div class=\"card-options\">
                            <ul>
                                <a href=\"/medico/\"><span class=\"badge cyan lighten-1\">listar</span></a>
                            </ul>
                        </div>
                        <span class=\"card-title\">Médicos</span>
                        <span class=\"stats-counter\"><span class=\"counter\">{{ medico.count }}</span><small>total</small></span>
                    </div>
                </div>
            </div>
            <div class=\"col s12 m12 l4\">
                <div class=\"card stats-card\">
                    <div class=\"card-content\">
                        <div class=\"card-options\">
                            <ul>
                                <a href=\"/paciente/\"><span class=\"badge cyan lighten-1\">listar</span></a>
                            </ul>
                        </div>
                        <span class=\"card-title\">Pacientes</span>
                        <span class=\"stats-counter\"><span class=\"counter\">{{ paciente.count }}</span><small>total</small></span>
                    </div>
                </div>
            </div>
            <div class=\"col s12 m12 l4\">
                <div class=\"card stats-card\">
                    <div class=\"card-content\">
                        <div class=\"card-options\">
                            <ul>
                                <a href=\"/agendamento/\"><span class=\"badge cyan lighten-1\">listar</span></a>
                            </ul>
                        </div>
                        <span class=\"card-title\">Agendamentos</span>
                        <span class=\"stats-counter\"><span class=\"counter\">{{ agendamento.count }}</span><small>neste mês</small></span>
                        <div class=\"percent-info red-text\">8% <i class=\"material-icons\">trending_down</i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"row no-m-t no-m-b\">
            <div class=\"col s12 m12 l12\">
                <div class=\"card\">
                    <div class=\"card-content\">
                        <span class=\"card-title\">Agendamentos de hoje</span>
                        <table id=\"scheduleDay\" class=\"display responsive-table datatable-example\">
                            <thead>
                            <tr>
                                <th>Médico</th>
                                <th>Quantidade de pacientes</th>
                                <th>Primeiro atendimento</th>
                                <th>Último atendimento</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>José Fernandes</td>
                                <td>20</td>
                                <td>17:00</td>
                                <td>19:00</td>
                            </tr>
                            <tr>
                                <td>José Fernandes</td>
                                <td>20</td>
                                <td>17:00</td>
                                <td>19:00</td>
                            </tr>
                            <tr>
                                <td>José Fernandes</td>
                                <td>20</td>
                                <td>17:00</td>
                                <td>19:00</td>
                            </tr>
                            <tr>
                                <td>José Fernandes</td>
                                <td>20</td>
                                <td>17:00</td>
                                <td>19:00</td>
                            </tr>
                            <tr>
                                <td>José Fernandes</td>
                                <td>20</td>
                                <td>17:00</td>
                                <td>19:00</td>
                            </tr>
                            <tr>
                                <td>José Fernandes</td>
                                <td>20</td>
                                <td>17:00</td>
                                <td>19:00</td>
                            </tr>
                            <tr>
                                <td>José Fernandes</td>
                                <td>20</td>
                                <td>17:00</td>
                                <td>19:00</td>
                            </tr>
                            <tr>
                                <td>José Fernandes</td>
                                <td>20</td>
                                <td>17:00</td>
                                <td>19:00</td>
                            </tr>
                            <tr>
                                <td>José Fernandes</td>
                                <td>20</td>
                                <td>17:00</td>
                                <td>19:00</td>
                            </tr>
                            <tr>
                                <td>José Fernandes</td>
                                <td>20</td>
                                <td>17:00</td>
                                <td>19:00</td>
                            </tr>
                            <tr>
                                <td>José Fernandes</td>
                                <td>20</td>
                                <td>17:00</td>
                                <td>19:00</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<div class=\"left-sidebar-hover\"></div>

<!-- JavaScript -->

<script type=\"text/javascript\" src=\"/bower_components/materialize/dist/js/materialize.min.js\"></script>
<script type=\"text/javascript\" src=\"/bower_components/material-preloader/js/materialPreloader.min.js\"></script>
<script type=\"text/javascript\" src=\"/js/alpha.min.js\"></script>
<script type=\"text/javascript\" src=\"/bower_components/datatables/media/js/jquery.dataTables.min.js\"></script>

<!-- Modules JavaScript -->
<script type=\"text/javascript\" src=\"/js/module/table.js\"></script>
<script type=\"text/javascript\" src=\"/js/module/dashboard.js\"></script>

<script type=\"text/javascript\">
    \$(document).ready(function() {
        sysmedic.dashboard.start();
        sysmedic.dashboard.counterup();
        sysmedic.table.scheduleDay();
    });
</script>

</body>
</html>", "index.tpl.html", "/var/www/html/prontuario_medico/resources/views/index.tpl.html");
    }
}
