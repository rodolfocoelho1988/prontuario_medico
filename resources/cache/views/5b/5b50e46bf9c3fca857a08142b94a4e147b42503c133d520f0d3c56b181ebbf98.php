<?php

/* template.tpl.html */
class __TwigTemplate_def27946b3ab2f6fba9863b765010d04199e92335db422efcde375706533e7a6 extends Twig_Template
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
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <!-- Title -->
    <title>";
        // line 5
        $this->displayBlock("title", $context, $blocks);
        echo "</title>

    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no\"/>
    <meta charset=\"UTF-8\">
    <meta name=\"description\" content=\"Agendamento de consultas entre o medico e paciente com prontuários.\" />
    <meta name=\"keywords\" content=\"admin,dashboard, agendamento, consultas, medico, paciente, prontuários, sysmedic\" />
    <link rel=\"shortcut icon\" href=\"/images/favicon.ico\">

    <!-- Styles -->
    <link type=\"text/css\" rel=\"stylesheet\" href=\"/bower_components/materialize/dist/css/materialize.min.css\"/>
    <link type=\"text/css\" rel=\"stylesheet\" href=\"http://fonts.googleapis.com/icon?family=Material+Icons\">
    <link type=\"text/css\" rel=\"stylesheet\" href=\"/bower_components/material-preloader/css/materialPreloader.min.css\">
    ";
        // line 17
        $this->displayBlock("style", $context, $blocks);
        echo "

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
<body class=\"";
        // line 34
        $this->displayBlock("body", $context, $blocks);
        echo "\">
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

";
        // line 77
        $this->displayBlock("content", $context, $blocks);
        echo "

<!-- JavaScript -->
<script type=\"text/javascript\" src=\"/bower_components/materialize/dist/js/materialize.min.js\"></script>
<script type=\"text/javascript\" src=\"/bower_components/material-preloader/js/materialPreloader.min.js\"></script>
<script type=\"text/javascript\" src=\"/js/alpha.min.js\"></script>
";
        // line 83
        $this->displayBlock("javascript", $context, $blocks);
        echo "

<!-- Modules JavaScript -->
<script type=\"text/javascript\" src=\"/js/module/dashboard.js\"></script>
";
        // line 87
        $this->displayBlock("modulejs", $context, $blocks);
        echo "

<script type=\"text/javascript\">
    \$(document).ready(function() {
        sysmedic.dashboard.counterup();
    });
</script>

</body>
</html>";
    }

    public function getTemplateName()
    {
        return "template.tpl.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  122 => 87,  115 => 83,  106 => 77,  60 => 34,  40 => 17,  25 => 5,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <!-- Title -->
    <title>{{ block('title') }}</title>

    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no\"/>
    <meta charset=\"UTF-8\">
    <meta name=\"description\" content=\"Agendamento de consultas entre o medico e paciente com prontuários.\" />
    <meta name=\"keywords\" content=\"admin,dashboard, agendamento, consultas, medico, paciente, prontuários, sysmedic\" />
    <link rel=\"shortcut icon\" href=\"/images/favicon.ico\">

    <!-- Styles -->
    <link type=\"text/css\" rel=\"stylesheet\" href=\"/bower_components/materialize/dist/css/materialize.min.css\"/>
    <link type=\"text/css\" rel=\"stylesheet\" href=\"http://fonts.googleapis.com/icon?family=Material+Icons\">
    <link type=\"text/css\" rel=\"stylesheet\" href=\"/bower_components/material-preloader/css/materialPreloader.min.css\">
    {{ block('style') }}

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
<body class=\"{{ block('body') }}\">
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

{{ block('content') }}

<!-- JavaScript -->
<script type=\"text/javascript\" src=\"/bower_components/materialize/dist/js/materialize.min.js\"></script>
<script type=\"text/javascript\" src=\"/bower_components/material-preloader/js/materialPreloader.min.js\"></script>
<script type=\"text/javascript\" src=\"/js/alpha.min.js\"></script>
{{ block('javascript') }}

<!-- Modules JavaScript -->
<script type=\"text/javascript\" src=\"/js/module/dashboard.js\"></script>
{{ block('modulejs') }}

<script type=\"text/javascript\">
    \$(document).ready(function() {
        sysmedic.dashboard.counterup();
    });
</script>

</body>
</html>", "template.tpl.html", "/var/www/html/prontuario_medico/resources/views/template.tpl.html");
    }
}
