<?php

/* WebProfilerBundle:Collector:events.html.twig */
class __TwigTemplate_03175e35fdf2fbd0a5ea82f398aaec4c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("WebProfilerBundle:Profiler:layout.html.twig");

        $this->blocks = array(
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
        // line 3
        $context["__internal_03175e35fdf2fbd0a5ea82f398aaec4c_1"] = $this;
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\"><img src=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webprofiler/images/profiler/events.png"), "html", null, true);
        echo "\" alt=\"Events\" /></span>
    <strong>Events</strong>
</span>
";
    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        // line 13
        echo "    <h2>Called Listeners</h2>

    <table>
        <tr>
            <th>Event name</th>
            <th>Priority</th>
            <th>Listener</th>
        </tr>
        ";
        // line 21
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "collector"), "calledlisteners"));
        foreach ($context['_seq'] as $context["_key"] => $context["listener"]) {
            // line 22
            echo "            <tr>
                <td><code>";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "listener"), "event"), "html", null, true);
            echo "</code></td>
                <td><code>";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "listener"), "priority"), "html", null, true);
            echo "</code></td>
                <td><code>";
            // line 25
            echo $context["__internal_03175e35fdf2fbd0a5ea82f398aaec4c_1"]->getdisplay_listener($this->getContext($context, "listener"));
            echo "</code></td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['listener'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 28
        echo "    </table>

    ";
        // line 30
        if ($this->getAttribute($this->getContext($context, "collector"), "notcalledlisteners")) {
            // line 31
            echo "        <h2>Not Called Listeners</h2>

        <table>
            <tr>
                <th>Event name</th>
                <th>Priority</th>
                <th>Listener</th>
            </tr>
            ";
            // line 39
            $context["listeners"] = $this->getAttribute($this->getContext($context, "collector"), "notcalledlisteners");
            // line 40
            echo "            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(twig_sort_filter(twig_get_array_keys_filter($this->getContext($context, "listeners"))));
            foreach ($context['_seq'] as $context["_key"] => $context["listener"]) {
                // line 41
                echo "                <tr>
                    <td><code>";
                // line 42
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "listeners"), $this->getContext($context, "listener"), array(), "array"), "event"), "html", null, true);
                echo "</code></td>
                    <td><code>";
                // line 43
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "listeners"), $this->getContext($context, "listener"), array(), "array"), "priority"), "html", null, true);
                echo "</code></td>
                    <td><code>";
                // line 44
                echo $context["__internal_03175e35fdf2fbd0a5ea82f398aaec4c_1"]->getdisplay_listener($this->getAttribute($this->getContext($context, "listeners"), $this->getContext($context, "listener"), array(), "array"));
                echo "</code></td>
                </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['listener'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 47
            echo "        </table>
    ";
        }
    }

    // line 51
    public function getdisplay_listener($listener = null)
    {
        $context = $this->env->mergeGlobals(array(
            "listener" => $listener,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 52
            echo "    ";
            if (($this->getAttribute($this->getContext($context, "listener"), "type") == "Closure")) {
                // line 53
                echo "        Closure
    ";
            } elseif (($this->getAttribute($this->getContext($context, "listener"), "type") == "Function")) {
                // line 55
                echo "        ";
                $context["link"] = $this->env->getExtension('code')->getFileLink($this->getAttribute($this->getContext($context, "listener"), "file"), $this->getAttribute($this->getContext($context, "listener"), "line"));
                // line 56
                echo "        ";
                if ($this->getContext($context, "link")) {
                    echo "<a href=\"";
                    echo twig_escape_filter($this->env, $this->getContext($context, "link"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "listener"), "function"), "html", null, true);
                    echo "</a>";
                } else {
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "listener"), "function"), "html", null, true);
                }
                // line 57
                echo "    ";
            } elseif (($this->getAttribute($this->getContext($context, "listener"), "type") == "Method")) {
                // line 58
                echo "        ";
                $context["link"] = $this->env->getExtension('code')->getFileLink($this->getAttribute($this->getContext($context, "listener"), "file"), $this->getAttribute($this->getContext($context, "listener"), "line"));
                // line 59
                echo "        ";
                echo $this->env->getExtension('code')->abbrClass($this->getAttribute($this->getContext($context, "listener"), "class"));
                echo "::";
                if ($this->getContext($context, "link")) {
                    echo "<a href=\"";
                    echo twig_escape_filter($this->env, $this->getContext($context, "link"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "listener"), "method"), "html", null, true);
                    echo "</a>";
                } else {
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "listener"), "method"), "html", null, true);
                }
                // line 60
                echo "    ";
            }
        } catch(Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ob_get_clean();
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Collector:events.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  164 => 58,  140 => 52,  110 => 43,  103 => 41,  63 => 23,  43 => 12,  32 => 6,  29 => 5,  24 => 3,  75 => 24,  69 => 21,  66 => 20,  60 => 22,  56 => 21,  54 => 13,  42 => 8,  386 => 160,  383 => 159,  377 => 158,  375 => 157,  368 => 156,  364 => 155,  360 => 153,  358 => 152,  355 => 151,  352 => 150,  342 => 147,  340 => 146,  331 => 141,  328 => 140,  325 => 139,  323 => 138,  318 => 135,  312 => 131,  309 => 130,  306 => 129,  304 => 128,  299 => 125,  290 => 120,  287 => 119,  285 => 118,  280 => 115,  278 => 114,  273 => 111,  271 => 110,  266 => 107,  262 => 105,  256 => 103,  252 => 101,  245 => 97,  238 => 93,  232 => 89,  229 => 88,  224 => 86,  219 => 83,  213 => 79,  210 => 78,  207 => 77,  205 => 76,  200 => 73,  194 => 69,  191 => 68,  188 => 67,  186 => 66,  181 => 63,  175 => 59,  172 => 58,  169 => 57,  167 => 59,  160 => 53,  141 => 43,  128 => 39,  105 => 27,  101 => 25,  95 => 23,  86 => 31,  80 => 28,  77 => 18,  74 => 17,  71 => 25,  65 => 14,  59 => 12,  45 => 9,  34 => 5,  68 => 15,  61 => 9,  44 => 14,  37 => 6,  20 => 1,  161 => 57,  153 => 50,  150 => 56,  147 => 55,  143 => 53,  137 => 45,  121 => 35,  118 => 40,  113 => 39,  109 => 38,  106 => 42,  104 => 36,  99 => 33,  96 => 39,  94 => 31,  90 => 21,  78 => 24,  72 => 22,  62 => 19,  53 => 9,  50 => 15,  48 => 10,  41 => 9,  39 => 8,  35 => 7,  30 => 4,  27 => 6,  350 => 149,  341 => 159,  337 => 145,  334 => 157,  329 => 156,  327 => 155,  314 => 145,  307 => 141,  300 => 137,  293 => 121,  286 => 129,  279 => 125,  272 => 121,  257 => 109,  250 => 100,  243 => 96,  236 => 97,  226 => 87,  223 => 88,  215 => 83,  212 => 82,  209 => 81,  204 => 78,  201 => 77,  196 => 74,  190 => 72,  182 => 70,  180 => 60,  170 => 64,  163 => 54,  156 => 56,  152 => 48,  149 => 47,  146 => 46,  138 => 42,  133 => 47,  129 => 51,  126 => 45,  123 => 47,  117 => 43,  114 => 44,  111 => 40,  108 => 39,  102 => 36,  98 => 40,  91 => 31,  87 => 29,  84 => 30,  81 => 28,  73 => 23,  70 => 22,  67 => 24,  64 => 20,  58 => 8,  52 => 6,  49 => 12,  46 => 13,  40 => 7,  36 => 5,  33 => 5,  31 => 4,  28 => 3,);
    }
}
