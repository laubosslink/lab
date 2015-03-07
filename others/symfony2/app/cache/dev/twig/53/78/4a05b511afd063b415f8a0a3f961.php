<?php

/* WebProfilerBundle:Profiler:toolbar_js.html.twig */
class __TwigTemplate_53784a05b511afd063b415f8a0a3f961 extends Twig_Template
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
        echo "<div id=\"sfwdt";
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "\" class=\"sf-toolbar\" style=\"display: none\"></div>
";
        // line 2
        $this->env->loadTemplate("WebProfilerBundle:Profiler:base_js.html.twig")->display($context);
        // line 3
        echo "<script type=\"text/javascript\">/*<![CDATA[*/
    (function () {
        Sfjs.load(
            'sfwdt";
        // line 6
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "',
            '";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_wdt", array("token" => $this->getContext($context, "token"))), "html", null, true);
        echo "',
            function(xhr, el) {
                el.style.display = -1 !== xhr.responseText.indexOf('sf-toolbarreset') ? 'block' : 'none';
            },
            function(xhr) {
                if (xhr.status !== 0) {
                    confirm('An error occurred while loading the web debug toolbar (' + xhr.status + ': ' + xhr.statusText + ').\\n\\nDo you want to open the profiler?') && (window.location = '";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_profiler", array("token" => $this->getContext($context, "token"))), "html", null, true);
        echo "');
                }
            }
        );
    })();
/*]]>*/</script>
";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:toolbar_js.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 13,  33 => 7,  29 => 6,  24 => 3,  22 => 2,  17 => 1,  141 => 40,  138 => 39,  131 => 31,  128 => 30,  121 => 33,  119 => 30,  116 => 29,  113 => 28,  107 => 5,  100 => 47,  95 => 45,  92 => 44,  90 => 43,  86 => 41,  84 => 39,  78 => 28,  75 => 27,  66 => 24,  63 => 23,  47 => 13,  35 => 7,  31 => 6,  27 => 5,  21 => 1,  85 => 31,  80 => 37,  76 => 27,  70 => 24,  65 => 22,  61 => 20,  59 => 22,  52 => 15,  43 => 12,  40 => 7,  34 => 5,  28 => 3,);
    }
}
