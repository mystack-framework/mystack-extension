<?php
/**
 * Mystack Developer Environment Updater
 * This script regenerates IDE stubs and VS Code snippets to match the latest framework state.
 * Usage: php update_dev.php
 */

require_once 'library/library.php';

echo "Updating Mystack Developer Environment...\n";

$classes = [
    'DIR', 'Importer', 'PHAI', 'PHAP', 'PHAU', 'PHCD', 'PHCO', 'PHCS', 
    'PHDB', 'PHDE', 'PHED', 'PHEM', 'PHEV', 'PHJC', 'PHJS', 'PHJT', 
    'PHLS', 'PHML', 'PHOB', 'PHOP', 'PHQR', 'PHRO', 'PHRQ', 'PHSE', 
    'PHTM', 'PHTP', 'PHTR', 'PHUI', 'PHVD', 'PHPA', 'PHPA_BaseGateway', 'PHPA_Stripe', 'PHPA_Paypal', 'PHPA_Razorpay', 'PHPA_Braintree', 'PHPA_Authorize', 'PHPA_Twocheckout', 'PHPA_Payoneer', 'PHPA_Square', 'PHPA_Adyen', 'PHPA_Mollie', 'PHPA_Coinbase', 'PHPA_Binance', 'PHPA_Coinpayments', 'PHPA_Bitpay', 'PHPA_Nowpayments', 'PHPA_Cryptocom', 'PHPA_Coingate', 'PHPA_Trustwallet', 'PHPA_Btcpay', 'PHPA_Metamask', 'PHPA_Bkash', 'PHPA_Nagad', 'PHPA_Rocket', 'PHPA_Sslcommerz', 'PHPA_Aamarpay', 'PHPA_Surjopay', 'PHPA_Portwallet', 'PHPA_Upay', 'PHPA_Shurjomukhi', 'PHPA_Nexuspay'
];

// --- 1. Regenerate _mystack_stubs.php ---
$stubs = "<?php\n\n";
foreach ($classes as $className) {
    if (!class_exists($className)) continue;
    
    $reflection = new ReflectionClass($className);
    $doc = $reflection->getDocComment();
    if ($doc) $stubs .= "$doc\n";
    $stubs .= "class $className {\n";
    
    foreach ($reflection->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
        if ($method->getDeclaringClass()->getName() !== $className && !in_array($method->getDeclaringClass()->getName(), $classes)) continue;
        
        $mDoc = $method->getDocComment();
        if ($mDoc) $stubs .= "    $mDoc\n";
        
        $isStatic = $method->isStatic() ? 'static ' : '';
        $params = [];
        foreach ($method->getParameters() as $param) {
            $pStr = '';
            if ($param->hasType()) {
                $type = $param->getType();
                $pStr .= ($type instanceof ReflectionUnionType ? implode('|', $type->getTypes()) : $type->getName()) . ' ';
            }
            if ($param->isVariadic()) $pStr .= '...';
            $pStr .= '$' . $param->getName();
            if ($param->isDefaultValueAvailable()) {
                $val = $param->getDefaultValue();
                $export = var_export($val, true);
                $export = preg_replace('/\'[A-Z]:\\\\.*?(src|library|app|component)(.*?)\'/', "'./$1$2'", $export);
                $pStr .= ' = ' . $export;
            }
            $params[] = $pStr;
        }
        
        $ret = '';
        if ($method->hasReturnType()) {
            $rType = $method->getReturnType();
            $ret = ': ' . ($rType instanceof ReflectionUnionType ? implode('|', $rType->getTypes()) : $rType->getName());
        }
        
        $stubs .= "    public $isStatic function {$method->getName()}(" . implode(', ', $params) . ")$ret {}\n";
    }
    $stubs .= "}\n\n";
}

if (class_exists('PHML')) {
    $defined = [];
    foreach (PHML::$tagAliases as $canonical => $aliases) {
        foreach ($aliases as $alias) {
            $low = strtolower($alias);
            if (isset($defined[$low])) continue;
            $defined[$low] = true;
            if (!isset(array_flip(PHML::$unsafeKeywords)[$low])) {
                $stubs .= "function $alias(...\$args): PHML { return new PHML('', [], []); }\n";
            }
            $stubs .= "function _$alias(...\$args): PHML { return new PHML('', [], []); }\n";
        }
    }
}
$stubs .= "function import(...\$args) {}\nfunction phml(\$dsl): string { return ''; }\n";
file_put_contents('_mystack_stubs.php', $stubs);
echo " - _mystack_stubs.php updated.\n";

// --- 2. Regenerate mystack.code-snippets ---
$snippets = [];
foreach ($classes as $className) {
    if (!class_exists($className)) continue;
    $reflection = new ReflectionClass($className);
    $modulePrefix = strtolower(str_replace('PH', '', $className));
    if ($modulePrefix === 'dir') $modulePrefix = 'dir';
    if ($modulePrefix === 'importer') $modulePrefix = 'imp';

    foreach ($reflection->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
        if ($method->isConstructor()) continue;
        $bodyParams = [];
        $i = 1;
        foreach ($method->getParameters() as $param) {
            $default = $param->isDefaultValueAvailable() ? var_export($param->getDefaultValue(), true) : '';
            if ($default === 'array ()') $default = '[]';
            $bodyParams[] = $default !== '' ? "\${{$i}:$default}" : "\${{$i}:\${$param->getName()}}";
            $i++;
        }
        $call = $method->isStatic() ? '::' : '->';
        $snippets["Mystack $className {$method->getName()}"] = [
            "prefix" => [strtolower($className) . ':' . $method->getName(), $modulePrefix . ':' . $method->getName()],
            "body" => ["$className$call{$method->getName()}(" . implode(', ', $bodyParams) . ");"],
            "description" => $method->getDocComment() ? trim(preg_replace("/\/\*\*\s*\*\s*([^@
]+).*/s", "$1", $method->getDocComment())) : "Mystack $className::{$method->getName()} shortcut"
        ];
    }
}

if (class_exists("PHUI")) {
    foreach (array_keys(PHUI::catalog()) as $uiTag) {
        $snippets["PHUI $uiTag"] = ["prefix" => ["ui:$uiTag"], "body" => array("ui('$uiTag', [\$\{1:data\}])"), "description" => "PHUI component $uiTag"];
    }
}


$phcsClasses = array (
  0 => 'block',
  1 => 'inline-block',
  2 => 'inline',
  3 => 'flex',
  4 => 'inline-flex',
  5 => 'grid',
  6 => 'inline-grid',
  7 => 'table',
  8 => 'inline-table',
  9 => 'table-row',
  10 => 'table-cell',
  11 => 'contents',
  12 => 'list-item',
  13 => 'hidden',
  14 => 'static',
  15 => 'fixed',
  16 => 'absolute',
  17 => 'relative',
  18 => 'sticky',
  19 => 'flex-row',
  20 => 'flex-row-reverse',
  21 => 'flex-col',
  22 => 'flex-col-reverse',
  23 => 'flex-wrap',
  24 => 'flex-wrap-reverse',
  25 => 'flex-nowrap',
  26 => 'grow',
  27 => 'grow-0',
  28 => 'shrink',
  29 => 'shrink-0',
  30 => 'justify-start',
  31 => 'justify-end',
  32 => 'justify-center',
  33 => 'justify-between',
  34 => 'justify-around',
  35 => 'justify-evenly',
  36 => 'items-start',
  37 => 'items-end',
  38 => 'items-center',
  39 => 'items-baseline',
  40 => 'items-stretch',
  41 => 'content-start',
  42 => 'content-end',
  43 => 'content-center',
  44 => 'content-between',
  45 => 'content-around',
  46 => 'content-evenly',
  47 => 'self-auto',
  48 => 'self-start',
  49 => 'self-end',
  50 => 'self-center',
  51 => 'self-stretch',
  52 => 'grid-cols-',
  53 => 'grid-rows-',
  54 => 'col-span-',
  55 => 'row-span-',
  56 => 'col-start-',
  57 => 'row-start-',
  58 => 'p-',
  59 => 'pt-',
  60 => 'pr-',
  61 => 'pb-',
  62 => 'pl-',
  63 => 'px-',
  64 => 'py-',
  65 => 'm-',
  66 => 'mt-',
  67 => 'mr-',
  68 => 'mb-',
  69 => 'ml-',
  70 => 'mx-',
  71 => 'my-',
  72 => 'space-x-',
  73 => 'space-y-',
  74 => 'w-',
  75 => 'min-w-',
  76 => 'max-w-',
  77 => 'h-',
  78 => 'min-h-',
  79 => 'max-h-',
  80 => 'text-',
  81 => 'font-',
  82 => 'leading-',
  83 => 'tracking-',
  84 => 'align-',
  85 => 'whitespace-',
  86 => 'break-',
  87 => 'truncate',
  88 => 'uppercase',
  89 => 'lowercase',
  90 => 'capitalize',
  91 => 'normal-case',
  92 => 'italic',
  93 => 'not-italic',
  94 => 'underline',
  95 => 'overline',
  96 => 'line-through',
  97 => 'no-underline',
  98 => 'bg-',
  99 => 'from-',
  100 => 'via-',
  101 => 'to-',
  102 => 'bg-opacity-',
  103 => 'bg-cover',
  104 => 'bg-contain',
  105 => 'bg-center',
  106 => 'bg-no-repeat',
  107 => 'bg-repeat',
  108 => 'border',
  109 => 'border-',
  110 => 'border-t',
  111 => 'border-r',
  112 => 'border-b',
  113 => 'border-l',
  114 => 'border-solid',
  115 => 'border-dashed',
  116 => 'border-dotted',
  117 => 'border-double',
  118 => 'border-none',
  119 => 'rounded',
  120 => 'rounded-',
  121 => 'rounded-t-',
  122 => 'rounded-r-',
  123 => 'rounded-b-',
  124 => 'rounded-l-',
  125 => 'shadow',
  126 => 'shadow-',
  127 => 'opacity-',
  128 => 'mix-blend-',
  129 => 'bg-blend-',
  130 => 'blur',
  131 => 'blur-',
  132 => 'brightness-',
  133 => 'contrast-',
  134 => 'drop-shadow',
  135 => 'drop-shadow-',
  136 => 'grayscale',
  137 => 'grayscale-',
  138 => 'hue-rotate-',
  139 => 'invert',
  140 => 'invert-',
  141 => 'saturate-',
  142 => 'sepia',
  143 => 'sepia-',
  144 => 'border-collapse',
  145 => 'border-separate',
  146 => 'table-auto',
  147 => 'table-fixed',
  148 => 'transition',
  149 => 'transition-',
  150 => 'duration-',
  151 => 'ease-',
  152 => 'delay-',
  153 => 'animate-',
  154 => 'scale-',
  155 => 'rotate-',
  156 => 'translate-x-',
  157 => 'translate-y-',
  158 => 'skew-x-',
  159 => 'skew-y-',
  160 => 'origin-',
  161 => 'cursor-',
  162 => 'pointer-events-none',
  163 => 'pointer-events-auto',
  164 => 'resize-none',
  165 => 'resize',
  166 => 'resize-y',
  167 => 'resize-x',
  168 => 'select-none',
  169 => 'select-text',
  170 => 'select-all',
  171 => 'select-auto',
  172 => 'glass',
  173 => 'glass-',
  174 => 'glass-noise',
  175 => 'glass-tilt',
  176 => 'glass-glow',
  177 => 'mesh-',
);
foreach ($phcsClasses as $c) {
    $snippets["PHCS $c"] = ["prefix" => ["class:$c"], "body" => ["$c"], "description" => "PHCS Tailwind utility class $c"];
}
$htmlTags = array (
  0 => 'a',
  1 => 'abbr',
  2 => 'address',
  3 => 'area',
  4 => 'article',
  5 => 'aside',
  6 => 'audio',
  7 => 'b',
  8 => 'base',
  9 => 'bdi',
  10 => 'bdo',
  11 => 'blockquote',
  12 => 'body',
  13 => 'br',
  14 => 'button',
  15 => 'canvas',
  16 => 'caption',
  17 => 'cite',
  18 => 'code',
  19 => 'col',
  20 => 'colgroup',
  21 => 'data',
  22 => 'datalist',
  23 => 'dd',
  24 => 'del',
  25 => 'details',
  26 => 'dfn',
  27 => 'dialog',
  28 => 'div',
  29 => 'dl',
  30 => 'dt',
  31 => 'em',
  32 => 'embed',
  33 => 'fieldset',
  34 => 'figcaption',
  35 => 'figure',
  36 => 'footer',
  37 => 'form',
  38 => 'h1',
  39 => 'h2',
  40 => 'h3',
  41 => 'h4',
  42 => 'h5',
  43 => 'h6',
  44 => 'head',
  45 => 'header',
  46 => 'hr',
  47 => 'html',
  48 => 'i',
  49 => 'iframe',
  50 => 'img',
  51 => 'input',
  52 => 'ins',
  53 => 'kbd',
  54 => 'label',
  55 => 'legend',
  56 => 'li',
  57 => 'link',
  58 => 'main',
  59 => 'map',
  60 => 'mark',
  61 => 'meta',
  62 => 'meter',
  63 => 'nav',
  64 => 'noscript',
  65 => 'object',
  66 => 'ol',
  67 => 'optgroup',
  68 => 'option',
  69 => 'output',
  70 => 'p',
  71 => 'param',
  72 => 'picture',
  73 => 'pre',
  74 => 'progress',
  75 => 'q',
  76 => 'rp',
  77 => 'rt',
  78 => 'ruby',
  79 => 's',
  80 => 'samp',
  81 => 'script',
  82 => 'section',
  83 => 'select',
  84 => 'small',
  85 => 'source',
  86 => 'span',
  87 => 'strong',
  88 => 'style',
  89 => 'sub',
  90 => 'summary',
  91 => 'sup',
  92 => 'table',
  93 => 'tbody',
  94 => 'td',
  95 => 'template',
  96 => 'textarea',
  97 => 'tfoot',
  98 => 'th',
  99 => 'thead',
  100 => 'time',
  101 => 'title',
  102 => 'tr',
  103 => 'track',
  104 => 'u',
  105 => 'ul',
  106 => 'var',
  107 => 'video',
  108 => 'wbr',
);
foreach ($htmlTags as $t) {
    $snippets["HTML $t"] = ["prefix" => ["html:$t"], "body" => ["<$t></$t>"], "description" => "Standard HTML5 tag $t"];
}




$snippets["phml dsl"] = ["prefix" => "phml", "body" => ["phml(<<<DSL\n\${1:div {\n    class: \"\${2:p-4}\";\n    \"\${3:Content}\";\n}}\nDSL);"]];
$snippets["import"] = ["prefix" => "import", "body" => ["import('\${1:library:PHDB}');"]];

if (!is_dir('.vscode')) mkdir('.vscode');
file_put_contents('mystack-extension/snippets/snippets.json', json_encode($snippets, JSON_PRETTY_PRINT));
echo " - .vscode/mystack.code-snippets updated.\n";

echo "Done! Restart VS Code if changes don't appear immediately.\n";
