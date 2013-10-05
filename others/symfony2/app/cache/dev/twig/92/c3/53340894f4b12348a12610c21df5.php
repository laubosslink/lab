<?php

/* SensioDistributionBundle::Configurator/form.html.twig */
class __TwigTemplate_92c353340894f4b12348a12610c21df5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("form_div_layout.html.twig");

        $this->blocks = array(
            'field_rows' => array($this, 'block_field_rows'),
            'field_row' => array($this, 'block_field_row'),
            'field_label' => array($this, 'block_field_label'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "form_div_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_field_rows($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"symfony-form-errors\">
        ";
        // line 5
        echo $this->env->getExtension('form')->renderErrors($this->getContext($context, "form"));
        echo "
    </div>
    ";
        // line 7
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "form"), "children"));
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 8
            echo "        ";
            echo $this->env->getExtension('form')->renderRow($this->getContext($context, "child"));
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
    }

    // line 12
    public function block_field_row($context, array $blocks = array())
    {
        // line 13
        echo "    <div class=\"symfony-form-row\">
        ";
        // line 14
        echo $this->env->getExtension('form')->renderLabel($this->getContext($context, "form"));
        echo "
        <div class=\"symfony-form-field\">
            ";
        // line 16
        echo $this->env->getExtension('form')->renderWidget($this->getContext($context, "form"));
        echo "
            <div class=\"symfony-form-errors\">
                ";
        // line 18
        echo $this->env->getExtension('form')->renderErrors($this->getContext($context, "form"));
        echo "
            </div>
        </div>
    </div>
";
    }

    // line 24
    public function block_field_label($context, array $blocks = array())
    {
        // line 25
        echo "    <label for=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\">
        ";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getContext($context, "label")), "html", null, true);
        echo "
        ";
        // line 27
        if ($this->getContext($context, "required")) {
            // line 28
            echo "            <span class=\"symfony-form-required\" title=\"This field is required\">*</span>
        ";
        }
        // line 30
        echo "    </label>
";
    }

    public function getTemplateName()
    {
        return "SensioDistributionBundle::Configurator/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 28,  91 => 27,  70 => 18,  60 => 14,  54 => 12,  43 => 8,  34 => 5,  31 => 4,  28 => 3,  1154 => 329,  1148 => 328,  1142 => 327,  1136 => 326,  1130 => 325,  1124 => 324,  1118 => 323,  1112 => 322,  1106 => 321,  1090 => 315,  1083 => 314,  1081 => 313,  1078 => 312,  1055 => 308,  1030 => 307,  1028 => 306,  1025 => 305,  1013 => 300,  1009 => 299,  1004 => 298,  1002 => 297,  999 => 296,  990 => 290,  984 => 288,  981 => 287,  976 => 286,  974 => 285,  971 => 284,  964 => 279,  957 => 277,  954 => 273,  950 => 272,  947 => 271,  944 => 270,  942 => 269,  939 => 268,  931 => 264,  929 => 263,  926 => 262,  919 => 257,  916 => 256,  907 => 251,  901 => 249,  898 => 248,  894 => 243,  891 => 242,  889 => 241,  886 => 240,  878 => 236,  876 => 235,  873 => 234,  852 => 228,  849 => 227,  846 => 226,  843 => 225,  840 => 224,  837 => 223,  834 => 222,  832 => 221,  829 => 220,  821 => 214,  818 => 213,  816 => 212,  813 => 211,  805 => 207,  802 => 206,  800 => 205,  797 => 204,  789 => 200,  786 => 199,  784 => 198,  781 => 197,  773 => 193,  770 => 192,  768 => 191,  765 => 190,  757 => 186,  754 => 185,  752 => 184,  749 => 183,  741 => 179,  738 => 178,  736 => 177,  733 => 176,  725 => 172,  723 => 171,  720 => 170,  712 => 166,  709 => 165,  707 => 164,  704 => 163,  696 => 159,  693 => 158,  691 => 157,  689 => 156,  686 => 155,  679 => 150,  671 => 149,  666 => 148,  660 => 146,  657 => 145,  655 => 144,  652 => 143,  644 => 137,  642 => 133,  637 => 132,  631 => 130,  628 => 129,  626 => 128,  623 => 127,  614 => 121,  610 => 120,  606 => 119,  602 => 118,  597 => 117,  591 => 115,  588 => 114,  586 => 113,  583 => 112,  567 => 108,  565 => 107,  562 => 106,  546 => 102,  544 => 101,  541 => 100,  532 => 96,  520 => 94,  516 => 92,  501 => 90,  497 => 89,  492 => 88,  489 => 87,  484 => 86,  482 => 85,  479 => 84,  470 => 79,  467 => 78,  464 => 77,  458 => 75,  456 => 74,  451 => 73,  448 => 72,  445 => 71,  439 => 69,  437 => 68,  429 => 67,  427 => 66,  424 => 65,  418 => 61,  410 => 59,  405 => 58,  401 => 57,  396 => 56,  394 => 55,  391 => 54,  382 => 49,  376 => 47,  373 => 46,  371 => 45,  368 => 44,  358 => 40,  356 => 39,  353 => 38,  345 => 34,  342 => 33,  339 => 32,  336 => 31,  334 => 30,  331 => 29,  323 => 24,  319 => 23,  314 => 22,  312 => 21,  309 => 20,  293 => 16,  290 => 15,  288 => 14,  285 => 13,  276 => 8,  270 => 6,  267 => 5,  265 => 4,  262 => 3,  258 => 329,  256 => 328,  254 => 327,  252 => 326,  250 => 325,  248 => 324,  246 => 323,  244 => 322,  242 => 321,  239 => 320,  236 => 318,  234 => 312,  231 => 311,  229 => 305,  226 => 304,  224 => 296,  221 => 295,  218 => 293,  216 => 284,  213 => 283,  211 => 268,  208 => 267,  206 => 262,  203 => 261,  200 => 259,  198 => 256,  195 => 255,  193 => 240,  190 => 239,  188 => 234,  185 => 233,  182 => 231,  180 => 220,  177 => 219,  174 => 217,  172 => 211,  169 => 210,  167 => 204,  164 => 203,  162 => 197,  159 => 196,  157 => 190,  154 => 189,  152 => 183,  149 => 182,  147 => 176,  144 => 175,  142 => 170,  139 => 169,  137 => 163,  134 => 162,  132 => 155,  129 => 154,  127 => 143,  124 => 142,  122 => 127,  119 => 126,  117 => 112,  114 => 111,  112 => 106,  109 => 105,  107 => 100,  104 => 99,  102 => 84,  99 => 83,  97 => 30,  94 => 64,  92 => 54,  89 => 53,  87 => 26,  84 => 43,  82 => 25,  79 => 24,  77 => 29,  74 => 28,  72 => 20,  69 => 19,  64 => 12,  62 => 3,  59 => 2,  56 => 14,  50 => 13,  46 => 11,  44 => 10,  35 => 7,  24 => 3,  20 => 2,  17 => 1,  67 => 13,  49 => 16,  47 => 15,  41 => 9,  29 => 5,  25 => 5,  19 => 1,  81 => 24,  75 => 21,  71 => 20,  65 => 16,  61 => 6,  57 => 13,  52 => 17,  48 => 12,  42 => 8,  39 => 7,  36 => 6,  33 => 7,  27 => 4,);
    }
}
