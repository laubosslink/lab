<?php

/* WebProfilerBundle:Collector:router.html.twig */
class __TwigTemplate_49934c0d262ee9c1b2343d4a9c16b2bd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("WebProfilerBundle:Profiler:layout.html.twig");

        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "WebProfilerBundle:Profiler:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
    }

    // line 6
    public function block_menu($context, array $blocks = array())
    {
        // line 7
        echo "<span class=\"label\">
    <span class=\"icon\"><img src=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webprofiler/images/profiler/routing.png"), "html", null, true);
        echo "\" alt=\"Routing\" /></span>
    <strong>Routing</strong>
</span>
";
    }

    // line 13
    public function block_panel($context, array $blocks = array())
    {
        // line 14
        echo "    ";
        echo $this->env->getExtension('actions')->renderAction("WebProfilerBundle:Router:panel", array("token" => $this->getContext($context, "token")), array());
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Collector:router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 16,  26 => 3,  761 => 457,  758 => 456,  747 => 454,  743 => 453,  739 => 451,  726 => 450,  700 => 445,  697 => 444,  678 => 442,  661 => 441,  657 => 439,  653 => 438,  649 => 437,  645 => 436,  641 => 435,  637 => 434,  634 => 433,  632 => 432,  615 => 431,  604 => 430,  589 => 425,  584 => 423,  580 => 422,  577 => 421,  563 => 420,  530 => 389,  512 => 386,  495 => 385,  492 => 384,  490 => 383,  485 => 381,  480 => 379,  179 => 83,  176 => 82,  168 => 80,  162 => 77,  145 => 73,  135 => 69,  122 => 63,  120 => 62,  116 => 61,  47 => 13,  25 => 3,  192 => 69,  171 => 62,  165 => 60,  157 => 59,  130 => 47,  100 => 34,  93 => 31,  88 => 28,  82 => 38,  79 => 37,  164 => 58,  140 => 52,  110 => 43,  103 => 41,  63 => 23,  43 => 12,  32 => 5,  29 => 4,  24 => 3,  75 => 24,  69 => 20,  66 => 19,  60 => 27,  56 => 21,  54 => 24,  42 => 10,  386 => 160,  383 => 159,  377 => 158,  375 => 157,  368 => 156,  364 => 155,  360 => 153,  358 => 152,  355 => 151,  352 => 150,  342 => 147,  340 => 146,  331 => 141,  328 => 140,  325 => 139,  323 => 138,  318 => 135,  312 => 131,  309 => 130,  306 => 129,  304 => 128,  299 => 125,  290 => 120,  287 => 119,  285 => 118,  280 => 115,  278 => 114,  273 => 111,  271 => 110,  266 => 107,  262 => 105,  256 => 103,  252 => 101,  245 => 97,  238 => 93,  232 => 89,  229 => 88,  224 => 126,  219 => 83,  213 => 79,  210 => 78,  207 => 77,  205 => 76,  200 => 73,  194 => 69,  191 => 68,  188 => 67,  186 => 66,  181 => 67,  175 => 64,  172 => 58,  169 => 61,  167 => 59,  160 => 53,  141 => 56,  128 => 65,  105 => 27,  101 => 25,  95 => 23,  86 => 31,  80 => 28,  77 => 23,  74 => 17,  71 => 32,  65 => 30,  59 => 12,  45 => 11,  34 => 5,  68 => 31,  61 => 16,  44 => 14,  37 => 6,  20 => 1,  161 => 57,  153 => 75,  150 => 74,  147 => 55,  143 => 72,  137 => 45,  121 => 35,  118 => 40,  113 => 44,  109 => 38,  106 => 42,  104 => 36,  99 => 33,  96 => 32,  94 => 31,  90 => 21,  78 => 24,  72 => 21,  62 => 19,  53 => 9,  50 => 14,  48 => 10,  41 => 9,  39 => 8,  35 => 7,  30 => 4,  27 => 4,  350 => 149,  341 => 159,  337 => 145,  334 => 157,  329 => 156,  327 => 155,  314 => 145,  307 => 141,  300 => 137,  293 => 121,  286 => 129,  279 => 125,  272 => 121,  257 => 109,  250 => 100,  243 => 96,  236 => 97,  226 => 87,  223 => 88,  215 => 83,  212 => 82,  209 => 81,  204 => 78,  201 => 77,  196 => 71,  190 => 72,  182 => 70,  180 => 60,  170 => 64,  163 => 54,  156 => 76,  152 => 48,  149 => 47,  146 => 58,  138 => 70,  133 => 68,  129 => 51,  126 => 45,  123 => 47,  117 => 45,  114 => 44,  111 => 59,  108 => 39,  102 => 35,  98 => 49,  91 => 45,  87 => 29,  84 => 30,  81 => 28,  73 => 23,  70 => 22,  67 => 24,  64 => 20,  58 => 15,  52 => 12,  49 => 13,  46 => 13,  40 => 7,  36 => 7,  33 => 6,  31 => 4,  28 => 3,);
    }
}
