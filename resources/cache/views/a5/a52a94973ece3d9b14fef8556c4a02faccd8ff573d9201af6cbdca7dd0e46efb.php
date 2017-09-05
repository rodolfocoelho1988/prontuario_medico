<?php

/* /errors/error405.tpl.html */
class __TwigTemplate_3aa36ecf4f72f73a4c9d2a9fb1f6c6e40274975eed60ab8fa29bb915ddec73e4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("template.tpl.html", "/errors/error405.tpl.html", 1);
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

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute(($context["lang"] ?? null), "TITLE_405", array()), "html", null, true);
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <h3>";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["lang"] ?? null), "TITLE_405", array()), "html", null, true);
        echo "</h3>
    <button class=\"btn btn-lg\" href=\"javascript:;\" onclick=\"javascript:history.back()\">";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute(($context["lang"] ?? null), "BACK", array()), "html", null, true);
        echo "</button>
";
    }

    public function getTemplateName()
    {
        return "/errors/error405.tpl.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 7,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
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

{% block title %}{{ lang.TITLE_405}}{% endblock %}

{% block content %}
    <h3>{{ lang.TITLE_405}}</h3>
    <button class=\"btn btn-lg\" href=\"javascript:;\" onclick=\"javascript:history.back()\">{{ lang.BACK }}</button>
{% endblock %}
", "/errors/error405.tpl.html", "/var/www/html/prontuario_medico/resources/views/errors/error405.tpl.html");
    }
}
