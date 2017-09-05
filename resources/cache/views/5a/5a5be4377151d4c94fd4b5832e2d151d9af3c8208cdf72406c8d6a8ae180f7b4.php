<?php

/* index.tpl.html */
class __TwigTemplate_864539dff5abb0616aca1186d5e4a14aa5cfc05f4314f2a67f0dcb498108a108 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("template.tpl.html", "index.tpl.html", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "template.tpl.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute(($context["lang"] ?? null), "TITLE", array()), "html", null, true);
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "    Conteudo aqui dentro
    Título: ";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute(($context["lang"] ?? null), "TITLE", array()), "html", null, true);
        echo "
    <br />
    Alterando a linguagem<br />
    Português -> <a href=\"?changelang=ptbr\">aqui</a><br />
    Espanhol -> <a href=\"?changelang=es\">aqui</a><br />
    Inglês -> <a href=\"?changelang=en\">aqui</a><br />
";
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
        return array (  41 => 8,  38 => 7,  35 => 6,  29 => 4,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"template.tpl.html\" %}

{# Pode utilizar o lang.TITLE aqui ou lá dentro do próprio template.tpl.html #}
{% block title %}{{ lang.TITLE }}{% endblock %}

{% block content %}
    Conteudo aqui dentro
    Título: {{ lang.TITLE }}
    <br />
    Alterando a linguagem<br />
    Português -> <a href=\"?changelang=ptbr\">aqui</a><br />
    Espanhol -> <a href=\"?changelang=es\">aqui</a><br />
    Inglês -> <a href=\"?changelang=en\">aqui</a><br />
{% endblock %}
", "index.tpl.html", "/var/www/html/basic-framework/resources/views/index.tpl.html");
    }
}
