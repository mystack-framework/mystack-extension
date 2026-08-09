<?php
declare(strict_types=1);

/**
 * Regenerate extension stubs and snippets from an explicit MyStack checkout.
 * Maintainer tool only; it never runs automatically inside VS Code.
 */

$extensionRoot = dirname(__DIR__);
$frameworkRoot = dirname($extensionRoot);
foreach (array_slice($argv, 1) as $argument) {
    if (str_starts_with($argument, '--framework=')) $frameworkRoot = substr($argument, 12);
}
$frameworkRoot = realpath($frameworkRoot) ?: '';
$loader = $frameworkRoot !== '' ? $frameworkRoot . DIRECTORY_SEPARATOR . 'library' . DIRECTORY_SEPARATOR . 'library.php' : '';
if ($frameworkRoot === '' || !is_file($loader)) {
    fwrite(STDERR, "MyStack loader not found. Use --framework=/absolute/path/to/mystack\n");
    exit(1);
}

$beforeClasses = get_declared_classes();
$beforeInterfaces = get_declared_interfaces();
$beforeTraits = get_declared_traits();
$beforeFunctions = get_defined_functions()['user'];
require_once $loader;

$libraryRoot = strtolower(str_replace('\\', '/', realpath($frameworkRoot . '/library') ?: '')) . '/';
$symbols = array_unique(array_merge(
    array_diff(get_declared_classes(), $beforeClasses),
    array_diff(get_declared_interfaces(), $beforeInterfaces),
    array_diff(get_declared_traits(), $beforeTraits)
));
$symbols = array_values(array_filter($symbols, static function (string $symbol) use ($libraryRoot): bool {
    $reflection = new ReflectionClass($symbol);
    $file = $reflection->getFileName();
    return is_string($file) && str_starts_with(strtolower(str_replace('\\', '/', $file)), $libraryRoot);
}));
sort($symbols, SORT_NATURAL | SORT_FLAG_CASE);

function typeText(?ReflectionType $type): string {
    if ($type === null) return '';
    if ($type instanceof ReflectionUnionType) return implode('|', array_map('typeText', $type->getTypes()));
    if ($type instanceof ReflectionIntersectionType) return implode('&', array_map('typeText', $type->getTypes()));
    $name = $type->getName();
    $prefix = $type->allowsNull() && !in_array($name, ['mixed', 'null'], true) ? '?' : '';
    return $prefix . (!$type->isBuiltin() && !in_array($name, ['self', 'parent', 'static'], true) ? '\\' : '') . $name;
}

function defaultText(ReflectionParameter $parameter): ?string {
    global $frameworkRoot;
    if (!$parameter->isDefaultValueAvailable()) return null;
    if ($parameter->isDefaultValueConstant()) return $parameter->getDefaultValueConstantName();
    $portable = static function (mixed $value) use (&$portable, $frameworkRoot): mixed {
        if (is_array($value)) return array_map($portable, $value);
        if (!is_string($value)) return $value;
        $normalized = str_replace('\\', '/', $value);
        $root = rtrim(str_replace('\\', '/', $frameworkRoot), '/');
        return str_starts_with(strtolower($normalized), strtolower($root . '/'))
            ? './' . ltrim(substr($normalized, strlen($root)), '/')
            : $value;
    };
    $value = $portable($parameter->getDefaultValue());
    if (is_array($value)) return $value === [] ? '[]' : preg_replace('/\s+/', ' ', var_export($value, true));
    return var_export($value, true);
}

function parametersText(ReflectionFunctionAbstract $function): string {
    $parameters = [];
    foreach ($function->getParameters() as $parameter) {
        $text = typeText($parameter->getType());
        if ($text !== '') $text .= ' ';
        if ($parameter->isPassedByReference()) $text .= '&';
        if ($parameter->isVariadic()) $text .= '...';
        $text .= '$' . $parameter->getName();
        $default = defaultText($parameter);
        if ($default !== null && !$parameter->isVariadic()) $text .= ' = ' . $default;
        $parameters[] = $text;
    }
    return implode(', ', $parameters);
}

function summaryText(ReflectionFunctionAbstract $function): string {
    $doc = $function->getDocComment() ?: '';
    foreach (preg_split('/\R/', $doc) ?: [] as $line) {
        $line = trim((string) preg_replace('/^\s*\/\*\*|\*\/\s*$|^\s*\*\s?/', '', $line));
        if ($line !== '' && !str_starts_with($line, '@')) return preg_replace('/\s+/', ' ', $line) ?: $line;
    }
    return '';
}

function snippetDefault(ReflectionParameter $parameter): string {
    $default = defaultText($parameter);
    if ($default !== null) return str_replace(['$', '}'], ['\\$', '\\}'], $default);
    return '$' . $parameter->getName();
}

$stub = "<?php\n/**\n * MyStack Framework IDE stubs.\n * Generated from executable library source by scripts/sync-framework.php.\n * IDE metadata only; never require this file at application runtime.\n */\n\n";
$snippetsFile = $extensionRoot . '/snippets/snippets.json';
$existing = is_file($snippetsFile) ? json_decode((string) file_get_contents($snippetsFile), true) : [];
$snippets = [];
if (is_array($existing)) {
    foreach ($existing as $name => $definition) if (!str_starts_with((string) $name, 'Mystack ')) $snippets[$name] = $definition;
}

foreach ($symbols as $symbol) {
    $reflection = new ReflectionClass($symbol);
    $stub .= '/** Source: ' . str_replace('\\', '/', substr((string) $reflection->getFileName(), strlen($frameworkRoot) + 1)) . " */\n";
    $stub .= 'class ' . $reflection->getShortName() . " {\n";
    foreach ($reflection->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
        if ($method->getDeclaringClass()->getName() !== $symbol) continue;
        $summary = summaryText($method);
        if ($summary !== '') $stub .= '    /** ' . str_replace('*/', '* /', $summary) . " */\n";
        $stub .= '    public ' . ($method->isStatic() ? 'static ' : '') . 'function ';
        if ($method->returnsReference()) $stub .= '&';
        $stub .= $method->getName() . '(' . parametersText($method) . ')';
        $return = typeText($method->getReturnType());
        if ($return !== '') $stub .= ': ' . $return;
        $stub .= " {}\n";

        if ($method->isConstructor() || $method->isDestructor()) continue;
        $arguments = []; $position = 1;
        foreach ($method->getParameters() as $parameter) $arguments[] = '${' . $position++ . ':' . snippetDefault($parameter) . '}';
        $short = $reflection->getShortName();
        $target = $method->isStatic() ? $short . '::' : '$' . lcfirst($short) . '->';
        $prefix = strtolower($short) . ':' . $method->getName();
        $snippets['Mystack ' . $short . ' ' . $method->getName()] = [
            'prefix' => [$prefix],
            'body' => [$target . $method->getName() . '(' . implode(', ', $arguments) . ');'],
            'description' => $summary !== '' ? $summary : $short . '::' . $method->getName() . ' from current MyStack source',
        ];
    }
    $stub .= "}\n\n";
}

$functions = array_diff(get_defined_functions()['user'], $beforeFunctions);
sort($functions, SORT_NATURAL | SORT_FLAG_CASE);
foreach ($functions as $function) {
    $reflection = new ReflectionFunction($function); $file = $reflection->getFileName();
    if (!is_string($file) || !str_starts_with(strtolower(str_replace('\\', '/', $file)), $libraryRoot)) continue;
    $stub .= 'function ' . $reflection->getName() . '(' . parametersText($reflection) . ')';
    $return = typeText($reflection->getReturnType()); if ($return !== '') $stub .= ': ' . $return;
    $stub .= " {}\n";
}

if (class_exists('PHUI') && method_exists('PHUI', 'catalog')) {
    foreach (array_keys(PHUI::catalog()) as $slug) {
        $name = 'PHUI ' . $slug;
        $snippets[$name] = ['prefix' => ['ui:' . $slug], 'body' => ["PHUI::ui('" . str_replace("'", "\\'", $slug) . "', [\n    '\${1:key}' => '\${2:value}',\n]);"], 'description' => 'MyStack PHUI component: ' . $slug];
    }
}

$snippets['MyStack bootstrap'] = [
    'prefix' => ['mystack:bootstrap'],
    'body' => ["require_once 'library/library.php';", '', 'PHDE::debug(${1:true});', "PHTM::setZone('\${2:UTC}');", 'PHRO::guard();', "PHRO::key('\${3:replace-with-secret}', false);", "PHJT::key('\${4:replace-with-jwt-secret}');", "PHJT::algorithm('HS512');", '', '${5:// Register routes}', 'PHRO::listen();'],
    'description' => 'Canonical MyStack application bootstrap',
];

$voidTags = ['area','base','br','col','embed','hr','img','input','link','meta','param','source','track','wbr'];
foreach ($voidTags as $tag) {
    $key = 'HTML ' . $tag;
    if (isset($snippets[$key])) $snippets[$key]['body'] = ['<' . $tag . '${1:}>'];
}

ksort($snippets, SORT_NATURAL | SORT_FLAG_CASE);
$stub = function_exists('mb_scrub') ? mb_scrub($stub, 'UTF-8') : $stub;
$encoded = json_encode($snippets, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_SUBSTITUTE) . "\n";

function atomicWrite(string $path, string $content): void {
    $temporary = $path . '.tmp-' . bin2hex(random_bytes(4));
    if (file_put_contents($temporary, $content, LOCK_EX) !== strlen($content) || !rename($temporary, $path)) { @unlink($temporary); throw new RuntimeException('Unable to write ' . $path); }
}

atomicWrite($extensionRoot . '/stubs/mystack-stubs.php', $stub);
atomicWrite($snippetsFile, $encoded);
echo 'Generated ' . count($symbols) . ' symbols and ' . count($snippets) . " snippets.\n";
