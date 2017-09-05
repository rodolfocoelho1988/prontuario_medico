<?php

/* login.tpl.html */
class __TwigTemplate_34dd858c7e8eb1dc41fd654f4908e4c00d8a6aa7101405fe2e75a31e6bc1c500 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("template.tpl.html", "login.tpl.html", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'content' => array($this, 'block_content'),
            'modulejs' => array($this, 'block_modulejs'),
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

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Login - SysMedic";
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        echo "signin-page";
    }

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        if (($context["session"] ?? null)) {
            // line 6
            echo "<script>window.location.href = '/'</script>
";
        }
        // line 8
        echo "<div class=\"mn-content valign-wrapper\">
    <main class=\"mn-inner container\">
        <div class=\"valign\">
            <div class=\"row\">
                <div class=\"col s12 m6 l4 offset-l4 offset-m3\">
                    <div class=\"card white darken-1\">
                        <div class=\"card-content \">
                            <span class=\"card-title\">Login</span>
                            <div class=\"row\">
                                <form id=\"login-form\" class=\"col s12\">
                                    <div class=\"input-field col s12\">
                                        <select id=\"type\" onchange=\"sysmedic.usuario.changePerfil()\">
                                            <option disabled selected>Você é?</option>
                                            <option value=\"paciente\">Paciente</option>
                                            <option value=\"medico\">Médico</option>
                                            <option value=\"secretaria\">Secretária</option>
                                        </select>
                                    </div>
                                    <div class=\"input-field col s12\">
                                        <input id=\"login-div-input\" type=\"email\" name=\"user[email]\">
                                        <label id=\"login-div-label\" for=\"login-div-input\">Email</label>
                                    </div>
                                    <div class=\"input-field col s12\">
                                        <input id=\"password\" type=\"password\" name=\"user[password]\">
                                        <label for=\"password\">Senha</label>
                                    </div>
                                    <div class=\"col s12 right-align m-t-sm\">
                                        <a href=\"/registrar\" class=\"waves-effect waves-grey btn-flat\">registrar</a>
                                        <a id=\"logar\" onclick=\"sysmedic.usuario.login()\" class=\"waves-effect waves-light btn teal\">logar</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
";
    }

    // line 49
    public function block_modulejs($context, array $blocks = array())
    {
        // line 50
        echo "<script type=\"text/javascript\" src=\"/js/module/ajax.js\"></script>
<script type=\"text/javascript\" src=\"/js/module/usuario.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "login.tpl.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 50,  95 => 49,  52 => 8,  48 => 6,  46 => 5,  43 => 4,  37 => 3,  31 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'template.tpl.html' %}
{% block title %}Login - SysMedic{% endblock %}
{% block body %}signin-page{% endblock %}
{% block content %}
{% if session %}
<script>window.location.href = '/'</script>
{% endif %}
<div class=\"mn-content valign-wrapper\">
    <main class=\"mn-inner container\">
        <div class=\"valign\">
            <div class=\"row\">
                <div class=\"col s12 m6 l4 offset-l4 offset-m3\">
                    <div class=\"card white darken-1\">
                        <div class=\"card-content \">
                            <span class=\"card-title\">Login</span>
                            <div class=\"row\">
                                <form id=\"login-form\" class=\"col s12\">
                                    <div class=\"input-field col s12\">
                                        <select id=\"type\" onchange=\"sysmedic.usuario.changePerfil()\">
                                            <option disabled selected>Você é?</option>
                                            <option value=\"paciente\">Paciente</option>
                                            <option value=\"medico\">Médico</option>
                                            <option value=\"secretaria\">Secretária</option>
                                        </select>
                                    </div>
                                    <div class=\"input-field col s12\">
                                        <input id=\"login-div-input\" type=\"email\" name=\"user[email]\">
                                        <label id=\"login-div-label\" for=\"login-div-input\">Email</label>
                                    </div>
                                    <div class=\"input-field col s12\">
                                        <input id=\"password\" type=\"password\" name=\"user[password]\">
                                        <label for=\"password\">Senha</label>
                                    </div>
                                    <div class=\"col s12 right-align m-t-sm\">
                                        <a href=\"/registrar\" class=\"waves-effect waves-grey btn-flat\">registrar</a>
                                        <a id=\"logar\" onclick=\"sysmedic.usuario.login()\" class=\"waves-effect waves-light btn teal\">logar</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
{% endblock %}

{% block modulejs %}
<script type=\"text/javascript\" src=\"/js/module/ajax.js\"></script>
<script type=\"text/javascript\" src=\"/js/module/usuario.js\"></script>
{% endblock %}", "login.tpl.html", "/var/www/html/prontuario_medico/resources/views/login.tpl.html");
    }
}
