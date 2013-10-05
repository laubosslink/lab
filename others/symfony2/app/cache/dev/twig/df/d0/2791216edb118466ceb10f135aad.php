<?php

/* WebProfilerBundle:Profiler:toolbar.html.twig */
class __TwigTemplate_dfd02791216edb118466ceb10f135aad extends Twig_Template
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
        echo "<!-- START of Symfony2 Web Debug Toolbar -->
";
        // line 2
        if (("normal" != $this->getContext($context, "position"))) {
            // line 3
            echo "    ";
            $this->env->loadTemplate("WebProfilerBundle:Profiler:toolbar_style.html.twig")->display(array_merge($context, array("position" => $this->getContext($context, "position"), "floatable" => true)));
            // line 4
            echo "    <div style=\"clear: both; height: 38px;\"></div>
";
        }
        // line 6
        echo "
<div class=\"sf-toolbarreset\">
    ";
        // line 8
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "templates"));
        foreach ($context['_seq'] as $context["name"] => $context["template"]) {
            // line 9
            echo "        ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "template"), "renderblock", array(0 => "toolbar", 1 => array("collector" => $this->getAttribute($this->getContext($context, "profile"), "getcollector", array(0 => $this->getContext($context, "name")), "method"), "profiler_url" => $this->getContext($context, "profiler_url"), "token" => $this->getAttribute($this->getContext($context, "profile"), "token"), "name" => $this->getContext($context, "name"))), "method"), "html", null, true);
            // line 15
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['name'], $context['template'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 17
        echo "
    ";
        // line 18
        if (("normal" != $this->getContext($context, "position"))) {
            // line 19
            echo "        <a class=\"hide-button\" title=\"Close Toolbar\" onclick=\"
            var p = this.parentNode;
            p.style.display = 'none';
            (p.previousElementSibling || p.previousSibling).style.display = 'none';
        \"></a>
    ";
        }
        // line 25
        echo "</div>
<!-- END of Symfony2 Web Debug Toolbar -->
";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:toolbar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 3,  17 => 1,  295 => 100,  289 => 96,  283 => 94,  281 => 93,  276 => 90,  270 => 86,  267 => 85,  264 => 84,  239 => 77,  216 => 73,  214 => 72,  198 => 66,  177 => 60,  154 => 57,  97 => 34,  127 => 45,  115 => 42,  85 => 28,  76 => 24,  155 => 56,  151 => 56,  136 => 47,  134 => 44,  131 => 43,  83 => 24,  55 => 12,  26 => 3,  761 => 457,  758 => 456,  747 => 454,  743 => 453,  739 => 451,  726 => 450,  700 => 445,  697 => 444,  678 => 442,  661 => 441,  657 => 439,  653 => 438,  649 => 437,  645 => 436,  641 => 435,  637 => 434,  634 => 433,  632 => 432,  615 => 431,  604 => 430,  589 => 425,  584 => 423,  580 => 422,  577 => 421,  563 => 420,  530 => 389,  512 => 386,  495 => 385,  492 => 384,  490 => 383,  485 => 381,  480 => 379,  179 => 61,  176 => 66,  168 => 80,  162 => 77,  145 => 52,  135 => 69,  122 => 63,  120 => 37,  116 => 61,  47 => 17,  25 => 4,  192 => 63,  171 => 58,  165 => 60,  157 => 59,  130 => 47,  100 => 35,  93 => 33,  88 => 28,  82 => 27,  79 => 25,  164 => 58,  140 => 49,  110 => 41,  103 => 41,  63 => 23,  43 => 8,  32 => 5,  29 => 6,  24 => 3,  75 => 24,  69 => 20,  66 => 19,  60 => 25,  56 => 21,  54 => 24,  42 => 10,  386 => 160,  383 => 159,  377 => 158,  375 => 157,  368 => 156,  364 => 155,  360 => 153,  358 => 152,  355 => 151,  352 => 150,  342 => 147,  340 => 146,  331 => 141,  328 => 140,  325 => 139,  323 => 138,  318 => 135,  312 => 131,  309 => 130,  306 => 129,  304 => 128,  299 => 125,  290 => 120,  287 => 119,  285 => 118,  280 => 115,  278 => 114,  273 => 111,  271 => 110,  266 => 107,  262 => 83,  256 => 103,  252 => 101,  245 => 97,  238 => 93,  232 => 89,  229 => 88,  224 => 75,  219 => 83,  213 => 79,  210 => 78,  207 => 77,  205 => 69,  200 => 73,  194 => 69,  191 => 68,  188 => 62,  186 => 66,  181 => 67,  175 => 64,  172 => 58,  169 => 62,  167 => 59,  160 => 57,  141 => 48,  128 => 42,  105 => 27,  101 => 25,  95 => 23,  86 => 28,  80 => 28,  77 => 23,  74 => 17,  71 => 19,  65 => 19,  59 => 16,  45 => 9,  34 => 5,  68 => 20,  61 => 16,  44 => 14,  37 => 9,  20 => 2,  161 => 57,  153 => 75,  150 => 74,  147 => 55,  143 => 51,  137 => 45,  121 => 49,  118 => 40,  113 => 44,  109 => 32,  106 => 42,  104 => 37,  99 => 33,  96 => 34,  94 => 33,  90 => 27,  78 => 24,  72 => 21,  62 => 15,  53 => 9,  50 => 18,  48 => 10,  41 => 9,  39 => 8,  35 => 7,  30 => 4,  27 => 3,  350 => 149,  341 => 159,  337 => 145,  334 => 157,  329 => 156,  327 => 155,  314 => 145,  307 => 141,  300 => 137,  293 => 121,  286 => 95,  279 => 125,  272 => 121,  257 => 80,  250 => 100,  243 => 79,  236 => 97,  226 => 87,  223 => 88,  215 => 83,  212 => 82,  209 => 70,  204 => 78,  201 => 77,  196 => 71,  190 => 72,  182 => 70,  180 => 60,  170 => 64,  163 => 58,  156 => 76,  152 => 48,  149 => 52,  146 => 58,  138 => 50,  133 => 68,  129 => 51,  126 => 45,  123 => 44,  117 => 47,  114 => 46,  111 => 59,  108 => 39,  102 => 36,  98 => 49,  91 => 45,  87 => 26,  84 => 30,  81 => 28,  73 => 23,  70 => 22,  67 => 24,  64 => 20,  58 => 13,  52 => 19,  49 => 10,  46 => 9,  40 => 15,  36 => 6,  33 => 8,  31 => 4,  28 => 3,);
    }
}
