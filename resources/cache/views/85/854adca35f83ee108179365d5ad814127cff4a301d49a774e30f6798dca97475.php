<?php

/* template.tpl.html */
class __TwigTemplate_d170d92e1cb79c66f2d02231a7cbf6dd97edb98488a92a3fa3ae69a47b98b8cb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>

<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <title>";
        // line 7
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    <meta name=\"description\" content=\"\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
</head>
<body>
<!-- Main Content -->
";
        // line 13
        $this->displayBlock('content', $context, $blocks);
        // line 14
        echo "<!-- /Main Content -->
</body>
</html>";
    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
    }

    // line 13
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "template.tpl.html";
    }

    public function getDebugInfo()
    {
        return array (  51 => 13,  46 => 7,  40 => 14,  38 => 13,  29 => 7,  21 => 1,);
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
<html>

<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <title>{% block title %}{% endblock %}</title>
    <meta name=\"description\" content=\"\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
</head>
<body>
<!-- Main Content -->
{% block content %}{% endblock %}
<!-- /Main Content -->
</body>
</html>", "template.tpl.html", "/var/www/html/basic-framework/resources/views/template.tpl.html");
    }
}
