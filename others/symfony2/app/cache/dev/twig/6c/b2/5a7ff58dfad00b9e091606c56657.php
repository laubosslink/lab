<?php

/* WebProfilerBundle:Profiler:toolbar_style.html.twig */
class __TwigTemplate_6cb25a7ff58dfad00b9e091606c56657 extends Twig_Template
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
        echo "<style type=\"text/css\">
    .sf-toolbarreset {
        position: fixed;
        background-color: #f7f7f7;
        left: 0;
        right: 0;
        height: 38px;
        margin: 0;
        padding: 0 40px 0 0;
        z-index: 6000000;
        font: 11px Verdana, Arial, sans-serif;
        text-align: left;
        color: #2f2f2f;

        background-image: -moz-linear-gradient(-90deg, #e4e4e4, #ffffff);
        background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#e4e4e4), to(#ffffff));
        bottom: 0;
        border-top: 1px solid #bbb;
    }
    .sf-toolbarreset img {
        width: auto;
        display: inline;
    }

    .sf-toolbarreset .hide-button {
        display: block;
        position: absolute;
        top: 12px;
        right: 10px;
        width: 15px;
        height: 15px;
        cursor: pointer;
        background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAPCAMAAAAMCGV4AAAAllBMVEXDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PExMTPz8/Q0NDR0dHT09Pb29vc3Nzf39/h4eHi4uLj4+P6+vr7+/v8/Pz9/f3///+Nh2QuAAAAIXRSTlMABgwPGBswMzk8QktRV4SKjZOWmaKlq7TAxszb3urt+fy1vNEpAAAAiklEQVQIHUXBBxKCQBREwRFzDqjoGh+C2YV//8u5Sll2S0E/dof1tKdKM6GyqCto7PjZRJIS/mbSELgXOSd/BzpKIH1ZefVWpDDTHsi8mZVnwImPi5ndCLbaAZk3M58Bay0h9VbeSvMpjDUAHj4jL55AW1rxN5fU2PLjIgVRzNdxVFOlGzvnJi0Fb1XNGBHA9uQOAAAAAElFTkSuQmCC');
    }

    .sf-toolbar-block {
        white-space: nowrap;
        color: #2f2f2f;
        display: block;
        min-height: 28px;
        border-right: 1px solid #e4e4e4;
        padding: 0;
        float: left;
        cursor: default;
    }

    .sf-toolbar-block span {
        display: inline-block;
    }

    .sf-toolbar-block .sf-toolbar-info-piece {
        padding-bottom: 5px;
    }

    .sf-toolbar-block .sf-toolbar-info-piece:last-child {
        padding-bottom: 0;
    }

    .sf-toolbar-block .sf-toolbar-info-piece b {
        display: inline-block;
        width: 110px;
    }

    .sf-toolbar-block .sf-toolbar-info-with-next-pointer:after {
        content: ' :: ';
        color: #999;
    }

    .sf-toolbar-block .sf-toolbar-info-with-delimiter {
        border-right: 1px solid #999;
        padding-right: 5px;
        margin-right: 5px;
    }

    .sf-toolbar-block .sf-toolbar-info {
        display: none;
        position: absolute;
        background-color: #fff;
        border: 1px solid #bbb;
        padding: 10px 8px;
        margin-left: -1px;

        bottom: 38px;
        border-bottom: 1px solid #fff;
    }

    .sf-toolbar-block .sf-toolbar-info:empty {
        visibility: hidden;
    }

    .sf-toolbar-block .sf-toolbar-status {
        display: inline-block;
        color: #fff;
        background-color: #666;
        padding: 3px 6px;
        border-radius: 3px;
        margin-bottom: 2px;
        vertical-align: middle;
        min-width: 6px;
        min-height: 13px;
    }

    .sf-toolbar-block .sf-toolbar-status-green {
        background-color: #759e1a;
    }

    .sf-toolbar-block .sf-toolbar-status-red {
        background-color: #a33;
    }

    .sf-toolbar-block .sf-toolbar-status-yellow {
        background-color: #ffcc00;
        color: #000;
    }

    .sf-toolbar-block .sf-toolbar-status-black {
        background-color: #000;
    }

    .sf-toolbar-block .sf-toolbar-icon {
        display: block;
    }

    .sf-toolbar-block .sf-toolbar-icon > a,
    .sf-toolbar-block .sf-toolbar-icon > span {
        display: block;
        text-decoration: none;
        margin: 0;
        padding: 5px 8px;
        min-width: 20px;
        text-align: center;
        vertical-align: middle;
    }

    .sf-toolbar-block .sf-toolbar-icon > a,
    .sf-toolbar-block .sf-toolbar-icon > a:link
    .sf-toolbar-block .sf-toolbar-icon > a:hover {
        color: black !important;
    }

    .sf-toolbar-block .sf-toolbar-icon img {
        border-width: 0;
        vertical-align: middle;
    }

    .sf-toolbar-block .sf-toolbar-icon img + span {
        margin-left: 5px;
        margin-top: 2px;
    }

    .sf-toolbar-block .sf-toolbar-icon .sf-toolbar-status {
        border-radius: 12px;
        border-bottom-left-radius: 0px;
        margin-top: 0;
    }

    .sf-toolbar-block .sf-toolbar-info-method {
        border-bottom: 1px dashed #ccc;
        cursor: help;
    }

    .sf-toolbar-block .sf-toolbar-info-method[onclick=\"\"] {
        border-bottom: none;
        cursor: inherit;
    }

    .sf-toolbar-info-php {}
    .sf-toolbar-info-php-ext {}

    .sf-toolbar-info-php-ext .sf-toolbar-status {
        margin-left: 2px;
    }

    .sf-toolbar-info-php-ext .sf-toolbar-status:first-child {
        margin-left: 0;
    }

    .sf-toolbar-block a .sf-toolbar-info-piece-additional,
    .sf-toolbar-block a .sf-toolbar-info-piece-additional-detail {
        display: inline-block;
    }

    .sf-toolbar-block a .sf-toolbar-info-piece-additional:empty,
    .sf-toolbar-block a .sf-toolbar-info-piece-additional-detail:empty {
        display: none;
    }

    .sf-toolbarreset:hover {
        box-shadow: rgba(0, 0, 0, 0.3) 0 0 50px;
    }

    .sf-toolbar-block:hover {
        box-shadow: rgba(0, 0, 0, 0.3) 0 0 5px;
    }

    .sf-toolbar-block:hover .sf-toolbar-icon {
        background-color: #fff;
    }
    .sf-toolbar-block:hover .sf-toolbar-info {
        display: block;
    }

    /***** Override the setting when the toolbar is on the top *****/
    ";
        // line 204
        if (($this->getContext($context, "position") == "top")) {
            // line 205
            echo "        .sf-toolbarreset {
            background-image: -moz-linear-gradient(-90deg, #ffffff, #e4e4e4);
            background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#ffffff), to(#e4e4e4));
            top: 0;
            bottom: auto;
            border-bottom: 1px solid #bbb;
        }

        .sf-toolbar-block .sf-toolbar-info {
            top: 38px;
            bottom: auto;
            border-top: 1px solid #fff;
            border-bottom: 1px solid #bbb;
        }
    ";
        }
        // line 220
        echo "
    ";
        // line 221
        if ((!$this->getContext($context, "floatable"))) {
            // line 222
            echo "        .sf-toolbarreset {
            position: static;
            background: #cbcbcb;
            background-image: -moz-linear-gradient(-90deg, #e8e8e8, #cbcbcb) !important;
            background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#e8e8e8), to(#cbcbcb)) !important;
        }

        .sf-toolbarreset abbr {
            border-bottom: 1px dotted #000000;
            cursor: help;
        }
    ";
        }
        // line 234
        echo "
    /***** Media query *****/
    @media screen and (max-width: 779px) {
        .sf-toolbar-block .sf-toolbar-icon > * > :first-child ~ * {
            display: none;
        }

        .sf-toolbar-block .sf-toolbar-icon > * > .sf-toolbar-info-piece-additional,
        .sf-toolbar-block .sf-toolbar-icon > * > .sf-toolbar-info-piece-additional-detail {
            display: none !important;
        }
    }

    @media screen and (min-width: 880px) {
        .sf-toolbar-block .sf-toolbar-icon a[href\$=\"config\"] .sf-toolbar-info-piece-additional {
            display: inline-block;
        }
    }

    @media screen and (min-width: 980px) {
        .sf-toolbar-block .sf-toolbar-icon a[href\$=\"security\"] .sf-toolbar-info-piece-additional {
            display: inline-block;
        }
    }

    @media screen and (max-width: 1179px) {
        .sf-toolbar-block .sf-toolbar-icon > * > .sf-toolbar-info-piece-additional {
            display: none;
        }
    }

    @media screen and (max-width: 1439px) {
        .sf-toolbar-block .sf-toolbar-icon > * > .sf-toolbar-info-piece-additional-detail {
            display: none;
        }
    }
</style>
";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:toolbar_style.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  260 => 234,  246 => 222,  244 => 221,  241 => 220,  222 => 204,  22 => 3,  17 => 1,  295 => 100,  289 => 96,  283 => 94,  281 => 93,  276 => 90,  270 => 86,  267 => 85,  264 => 84,  239 => 77,  216 => 73,  214 => 72,  198 => 66,  177 => 60,  154 => 57,  97 => 34,  127 => 45,  115 => 42,  85 => 28,  76 => 24,  155 => 56,  151 => 56,  136 => 47,  134 => 44,  131 => 43,  83 => 24,  55 => 12,  26 => 3,  761 => 457,  758 => 456,  747 => 454,  743 => 453,  739 => 451,  726 => 450,  700 => 445,  697 => 444,  678 => 442,  661 => 441,  657 => 439,  653 => 438,  649 => 437,  645 => 436,  641 => 435,  637 => 434,  634 => 433,  632 => 432,  615 => 431,  604 => 430,  589 => 425,  584 => 423,  580 => 422,  577 => 421,  563 => 420,  530 => 389,  512 => 386,  495 => 385,  492 => 384,  490 => 383,  485 => 381,  480 => 379,  179 => 61,  176 => 66,  168 => 80,  162 => 77,  145 => 52,  135 => 69,  122 => 63,  120 => 37,  116 => 61,  47 => 17,  25 => 4,  192 => 63,  171 => 58,  165 => 60,  157 => 59,  130 => 47,  100 => 35,  93 => 33,  88 => 28,  82 => 27,  79 => 25,  164 => 58,  140 => 49,  110 => 41,  103 => 41,  63 => 23,  43 => 8,  32 => 5,  29 => 6,  24 => 3,  75 => 24,  69 => 20,  66 => 19,  60 => 25,  56 => 21,  54 => 24,  42 => 10,  386 => 160,  383 => 159,  377 => 158,  375 => 157,  368 => 156,  364 => 155,  360 => 153,  358 => 152,  355 => 151,  352 => 150,  342 => 147,  340 => 146,  331 => 141,  328 => 140,  325 => 139,  323 => 138,  318 => 135,  312 => 131,  309 => 130,  306 => 129,  304 => 128,  299 => 125,  290 => 120,  287 => 119,  285 => 118,  280 => 115,  278 => 114,  273 => 111,  271 => 110,  266 => 107,  262 => 83,  256 => 103,  252 => 101,  245 => 97,  238 => 93,  232 => 89,  229 => 88,  224 => 205,  219 => 83,  213 => 79,  210 => 78,  207 => 77,  205 => 69,  200 => 73,  194 => 69,  191 => 68,  188 => 62,  186 => 66,  181 => 67,  175 => 64,  172 => 58,  169 => 62,  167 => 59,  160 => 57,  141 => 48,  128 => 42,  105 => 27,  101 => 25,  95 => 23,  86 => 28,  80 => 28,  77 => 23,  74 => 17,  71 => 19,  65 => 19,  59 => 16,  45 => 9,  34 => 5,  68 => 20,  61 => 16,  44 => 14,  37 => 9,  20 => 2,  161 => 57,  153 => 75,  150 => 74,  147 => 55,  143 => 51,  137 => 45,  121 => 49,  118 => 40,  113 => 44,  109 => 32,  106 => 42,  104 => 37,  99 => 33,  96 => 34,  94 => 33,  90 => 27,  78 => 24,  72 => 21,  62 => 15,  53 => 9,  50 => 18,  48 => 10,  41 => 9,  39 => 8,  35 => 7,  30 => 4,  27 => 3,  350 => 149,  341 => 159,  337 => 145,  334 => 157,  329 => 156,  327 => 155,  314 => 145,  307 => 141,  300 => 137,  293 => 121,  286 => 95,  279 => 125,  272 => 121,  257 => 80,  250 => 100,  243 => 79,  236 => 97,  226 => 87,  223 => 88,  215 => 83,  212 => 82,  209 => 70,  204 => 78,  201 => 77,  196 => 71,  190 => 72,  182 => 70,  180 => 60,  170 => 64,  163 => 58,  156 => 76,  152 => 48,  149 => 52,  146 => 58,  138 => 50,  133 => 68,  129 => 51,  126 => 45,  123 => 44,  117 => 47,  114 => 46,  111 => 59,  108 => 39,  102 => 36,  98 => 49,  91 => 45,  87 => 26,  84 => 30,  81 => 28,  73 => 23,  70 => 22,  67 => 24,  64 => 20,  58 => 13,  52 => 19,  49 => 10,  46 => 9,  40 => 15,  36 => 6,  33 => 8,  31 => 4,  28 => 3,);
    }
}
