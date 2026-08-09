<?php
/**
 * MyStack Framework IDE stubs.
 * Generated from executable library source by scripts/sync-framework.php.
 * IDE metadata only; never require this file at application runtime.
 */

/** Source: library/library.php */
class DIR {
    /** Initializes the DIR class with root directory and base URL. */
    public static function initialize(array $options = []) {}
    /** Gets the absolute filesystem path for a given resource using colon notation. */
    public static function path($key) {}
    /** Gets the full web URL for a given resource using colon notation. */
    public static function link($key, $cacheBust = false) {}
    /** Gets the raw content of a given resource using colon notation. */
    public static function raw($key) {}
    /** Safely requires a PHP file and passes data to it. */
    public static function secureRequire($key, array $data = []) {}
    /** Returns the detected or set project root directory. */
    public static function getRootDir() {}
    /** Returns the detected or set project base URL. */
    public static function getBaseUrl() {}
}

/** Source: library/library.php */
class Importer {
    /** Gets the single instance of the Importer. */
    public static function getInstance(): self {}
    /** Sets the variables from the caller's context (e.g., from the router). */
    public function setContext(array $vars): void {}
    /** Clears the context to prevent data leaks. */
    public function clearContext(): void {}
    /** The main method to load files, replacing the old import() function. */
    public function load(...$args) {}
}

/** Source: library/PHAI.php */
class PHAI {
    /** Sets AI provider accounts. */
    public static function setAccounts(array $accounts) {}
    /** Sets AI provider priority order. */
    public static function setPriority(array $priority) {}
    /** Sets AI models for providers. */
    public static function setModels(array $models) {}
    /** Sets the default timeout for AI requests. */
    public static function setTimeout(int $seconds) {}
    /** Gets models for a specific provider. */
    public static function getModels(string $provider) {}
    /** Registers a bridge process and its pipes. */
    public static function registerBridgeProcess($key, $process, $pipes) {}
    /** Gets a registered bridge process. */
    public static function getBridgeProcess($key) {}
    /** Cleans up all registered bridge processes. */
    public static function cleanup() {}
    /** AI API SERVE (Universal Compatibility Bridge - Final) */
    public static function serve(string $prefix = '/v1', ?string $apiKey = NULL) {}
    public static function clusterAPI(string $path = '/v1/chat/completions', ?string $apiKey = NULL) {}
    public static function cluster(mixed $input, array $options = []) {}
    public static function getInstance(): \PHAI {}
    public static function routes(string $path = '/mcp') {}
    public static function tool(string $name, string $description, array $schema, mixed $handler): \PhaiBuilder {}
    public static function prompt(string $name, string $description, array $arguments, mixed $handler): \PhaiBuilder {}
    public static function resource(string $uri, string $name, string $description, mixed $handler): \PhaiBuilder {}
    public static function resourceTemplate(string $uriTemplate, string $name, string $description, mixed $handler): \PhaiBuilder {}
    public static function alias(string $customAlias, string $targetMethod) {}
    public static function middleware(callable $middleware) {}
    public function handleRequest($data) {}
    public static function bridge(string $target, string $method, array $params = [], $options = []) {}
}

/** Source: library/PHAI.php */
class PhaiBuilder {
    public function __construct(array &$reference) {}
    public function middleware(callable $callback): self {}
    public function retries(int $amount): self {}
}

/** Source: library/PHAI.php */
class PhaiMemory {
    public function set(string $key, $value, ?int $expiration = NULL, array $tags = []) {}
    public function remove(string $key) {}
}

/** Source: library/PHAI.php */
class PHAI_AI {
    public static function call(string $provider, mixed $input, string $apiKey, array $options = []) {}
}

/** Source: library/PHAP.php */
class PHAP {
    /** MASTER API METHOD (Positional - The Easiest Way) */
    public static function api(string $signature, mixed $middleware = false, array $rules = [], mixed $logic = NULL, string $msg = 'Success'): void {}
    /** PHAP::all('users') -> Returns paginated list */
    public static function all(string $table, array $where = [], int $limit = 15): void {}
    /** PHAP::get('users', 5) -> Returns single item */
    public static function get(string $table, mixed $id, string $col = 'id'): void {}
    /** PHAP::add('users', ['email' => 'required|email']) -> Inserts data */
    public static function add(string $table, array $rules = [], string $msg = 'Record created'): void {}
    /** PHAP::up('users', 5, ['name' => 'required']) -> Updates data */
    public static function up(string $table, mixed $id, array $rules = [], string $col = 'id'): void {}
    /** PHAP::rm('users', 5) -> Deletes data */
    public static function rm(string $table, mixed $id, string $col = 'id'): void {}
    /** A-Z API EXECUTION ENGINE */
    public static function run(callable $logic, array $rules = [], string $successMsg = 'Action Successful'): void {}
    /** Universal Input Handler (JSON, POST, GET, Route Params) */
    public static function input(?string $key = NULL, mixed $default = NULL): mixed {}
    /** Smart Resource Transformer */
    public static function resource(mixed $data, ?callable $callback = NULL): mixed {}
    /** Quick Success Response (200 OK) */
    public static function ok(mixed $data = [], string $msg = 'Success'): void {}
    /** Quick Failure Response */
    public static function fail(string $msg = 'Action Failed', int $code = 400): void {}
    /** Auto-Validate Request and Exit on Failure */
    public static function valid(array $rules, array $customData = []): array {}
    /** Smart Database Pagination Response */
    public static function page(string $table, array $where = [], int $limit = 15, ?callable $callback = NULL): void {}
    /** Quick Auth Check (Returns user data or fails) */
    public static function auth(string $table = 'users'): array {}
    /** Standardized JSON Response */
    public static function send(mixed $data = [], string $message = 'Success', int $code = 200, bool $status = true): void {}
    /** Transforms a single item. */
    public static function item(mixed $data, ?callable $callback = NULL): array {}
    /** Transforms a collection of items. */
    public static function collection(array $data, ?callable $callback = NULL): array {}
    /** Cleans sensitive fields from data. */
    public static function clean(mixed $data, array $extraFields = []): mixed {}
}

/** Source: library/PHAU.php */
class PHAU {
    /** Registers identity library routes and JS. */
    public static function identityLib($url = '/identity-lib', array $options = []) {}
    public static function make(string $table, array $dbMap = [], array $inputData = [], array $options = []): array {}
    public static function check(string $table, array|string $tokenCol = 'token', ?string $inputToken = NULL, ?string $identyCol = NULL): array {}
    public static function verifyMake($account = [], $accountRequired = [], $mode = 'OTP', $length = 24, $digits = 6, $time = 180, $offset = 0, $algo = 'sha1', $from = NULL, $name = NULL, $cc = '', $bcc = '') {}
    public static function verifyCheck($table = NULL, $account = [], $setData = [], $secret = NULL, $code = 400, $mode = 'OTP', $digits = 6, $time = 180, $offset = 0, $algo = 'sha1') {}
    /** List built-in sign-in providers; custom OAuth/OIDC is config-driven. */
    public static function socialProviders(): array {}
    /** Generate Provider Login URL */
    public static function socialUrl(string $provider, array $config): array {}
    /** UNIVERSAL ROUTER CALLBACK (`/callback`) */
    public static function listenCallback(string $route, array $configs, callable $onSuccess) {}
}

/** Source: library/PHCD.php */
class PHCD {
    /** Initializes the PHCD class with custom paths and state. */
    public static function initialize($state = '/cdn', $css = './library/../src/css/', $js = './library/../src/js/', ?callable $authorize = NULL) {}
    /** Handles incoming POST requests related to CDN operations. */
    public static function handleRequest() {}
    /** Retrieves a list of files for specified packages based on their type (JavaScript or CSS). */
    public static function get($package = true, $type = true, $skipPKG = true, $skipFILE = true) {}
    /** Generates HTML <link> or <script> tags for the specified packages and file types. */
    public static function use($package = true, $type = true, $skipPKG = true, $skipFILE = true, $defer = false) {}
}

/** Source: library/PHCO.php */
class PHCO {
    /** http or https */
    public static function isSecure(): bool {}
    /** Get the project-specific base path for cookies */
    public static function path(): string {}
    /** Auto-generate project-specific cookie prefix from PHRO::root() */
    public static function pre(): string {}
    /** Adds a new cookie or updates an existing one. */
    public static function add(string $name, $value, int $expireMinutes = 0): bool {}
    /** Updates a cookie. Since setcookie overwrites, this is an alias for add. */
    public static function update(string $name, $value, int $expireMinutes = 0): bool {}
    /** Removes a cookie ONLY from the current project's path. */
    public static function remove(string $name): bool {}
    /** Retrieves the ACTUAL value of the cookie. */
    public static function get(string $name) {}
    /** Checks if a cookie exists. */
    public static function exists(string $name): bool {}
    /** Checks if a cookie has theoretically expired based on stored metadata. */
    public static function expired(string $name): bool {}
    /** Checks if a cookie is active. */
    public static function active(string $name): bool {}
    /** Retrieves remaining seconds until expiration. */
    public static function getExpiredDetails(string $name): ?int {}
    /** Forces a cookie to expire immediately. */
    public static function makeExpired(string $name): bool {}
    /** Retrieves all cookies (decoded values). */
    public static function getAll(): array {}
}

/** Source: library/PHCS.php */
class PHCS {
    public function __construct(array $customConfig = []) {}
    public static function config(array $config): void {}
    public static function HTML(string $htmlContent): void {}
    public function addHtml(string $htmlContent): self {}
    public static function CSS(string $cssContent): void {}
    public function addCss(string $cssContent): self {}
    public static function process(string $content, string $type = 'html'): string {}
    public static function build(bool $modular = false): string {}
    public function registerUtilityHandler(string $pattern, callable|string $handlerMethod, int $priority = 0): void {}
    public function processHtml(string $html): string {}
    public function processCss(string $cssContent): string {}
    public function generateCss(array $classes): string {}
    public function buildCss(bool $modular = false): string {}
}

/** Source: library/PHDB.php */
class PHDB {
    /** Retrieve the last error message encountered. */
    public static function error() {}
    /** Get the ID generated from the last INSERT query. */
    public static function id() {}
    /** Get the number of affected rows in the last query. */
    public static function affected() {}
    /** Performs a read-only database availability check without creating or */
    public static function checker(): array {}
    /** Connect to the database. */
    public static function connect() {}
    /** Disconnect from the database. */
    public static function disconnect() {}
    /** The Ultimate Auto-Healing, Bulletproof Query Executor. */
    public static function query(string $query, array $params = [], bool $single = false) {}
    /** Stream a database result one row at a time without buffering the full */
    public static function fast(string $query, array $params = [], array|string $columns = '*'): \Generator {}
    /** Execute a SELECT and return its first row, or null when no row matches. */
    public static function first(string $query, array $params = []): ?array {}
    /** Execute a SELECT and return the first value from its first row. */
    public static function scalar(string $query, array $params = []): mixed {}
    /** Smart Save: Insert, Update, or Skip. */
    public static function save(string $table, array $data, mixed $uniqueKeys = NULL) {}
    /** Insert a record into the database. */
    public static function insert(string $table, array $data, bool $overwrite = false) {}
    /** Insert multiple records in a single query with optional overwrite */
    public static function batchInsert(string $table, array $data, bool $overwrite = false) {}
    /** Update records in the database based on specified conditions. */
    public static function update(string $table, array $data, array $where = []) {}
    /** Delete records from the database based on specified conditions. */
    public static function delete(string $table, array $where = [], bool $allow_all = false) {}
    /** Select records from the database based on specified conditions. */
    public static function select(string $table, string $columns = '*', array $where = [], ?int $limit = NULL, ?int $offset = NULL, ?string $orderBy = NULL, ?string $groupBy = NULL, ?array $joins = NULL, bool $distinct = false) {}
    /** Find a record by its primary key (ID). */
    public static function find(string $table, $id, string $columns = '*') {}
    /** Perform a specific selection from the database. */
    public static function specificSelect(string $query, array $params = []) {}
    /** Get a single value from the database. */
    public static function getValue(string $table, string $column, array $where = []) {}
    /** Get a specific value from the database. */
    public static function getSpecificValue(string $query, array $params = []) {}
    /** Create a database manually (Utility function). */
    public static function addDB(string $dbname, string $collation = 'utf8mb4_unicode_ci') {}
    /** Create or fully synchronize a table from one schema definition. */
    public static function createTable(string $table_name, array $columns, mixed $sync = true) {}
    /** Drop a table from the database. */
    public static function dropTable(string $table_name) {}
    /** Alter a table in the database. */
    public static function alterTable(string $table_name, array $changes) {}
    /** Truncate a table in the database. */
    public static function truncateTable(string $table_name) {}
    /** Find records in the database based on specific conditions. */
    public static function findBy(string $table, string $columns = '*', array $conditions = [], ?int $limit = NULL, ?int $offset = NULL) {}
    /** Search records in the database based on specified conditions. */
    public static function search(string $table, string $columns = '*', array|string $conditions = [], ?int $limit = NULL, ?int $offset = NULL, ?string $orderBy = NULL, ?string $groupBy = NULL, ?array $joins = NULL) {}
    /** Get the available columns from a specified table in the database. */
    public static function columns(string $table, array|string|null $filter = NULL, array|string|null $skip = NULL) {}
    /** Delete records from the database based on specific conditions. */
    public static function deleteBy(string $table, array $conditions) {}
    /** Paginate results with total count information */
    public static function paginate(string $table, string $columns = '*', array $where = [], int $page = 1, int $per_page = 10) {}
    /** Get sum of a column safely. */
    public static function sum(string $table, string $column, array $where = []) {}
    /** Get average of a column safely. */
    public static function avg(string $table, string $column, array $where = []) {}
    /** Get maximum value of a column safely. */
    public static function max(string $table, string $column, array $where = []) {}
    /** Get minimum value of a column safely. */
    public static function min(string $table, string $column, array $where = []) {}
    /** Count records safely. */
    public static function count(string $table, array|string|null $column = NULL, ?array $conditions = NULL): int {}
    /** Check if a record exists in the database. */
    public static function exists(string $table, array $where = []) {}
    /** Serving JSON API responses instantly with Smart Pagination & Formatting. */
    public static function api(string $table, array|string $columns = '*', array $where = [], array $options = [], bool $return = false) {}
    /** Execute operations within a database transaction. */
    public static function transaction(callable $callback) {}
    /** Clean database records with various options */
    public static function clean(string $table, array $options = []) {}
    /** Universal array/JSON/serialized/list management wrapper. */
    public static function array(string|bool $action, string $table, string $column, array $where, ...$args): mixed {}
    /** Gets a value from a column containing array-like data. */
    public static function array_get(string $table, string $column, array $where, $key = NULL, $default = NULL) {}
    /** Sets a value in a column containing array-like data. */
    public static function array_set(string $table, string $column, array $where, $key = NULL, $value = NULL, bool $force = false) {}
    /** Close the database connection. */
    public static function close() {}
}

/** Source: library/PHDE.php */
class PHDE {
    /** Initializes the error reporting settings. */
    public function __construct($state = false) {}
    /** Enables comprehensive error reporting and sets custom handlers. */
    public static function enableErrorReporting() {}
    /** Disables error reporting and hides all errors. */
    public static function disableErrorReporting() {}
    /** Custom error handler to capture errors into a buffer. */
    public static function customErrorHandler($errno, $errstr, $errfile, $errline) {}
    /** Initialize error reporting settings. */
    public static function debug($state = true) {}
    public static function isDebug(): bool {}
    /** Get collected error messages as a string. */
    public static function errors($state = true) {}
    /** Processes errors from the error buffer and returns a structured JSON representation of the errors. */
    public static function errorJSON() {}
    /** Retrieves the content type from HTTP headers. */
    public static function getType() {}
    /** Display captured errors from the error buffer. */
    public static function displayErrors($state = true) {}
    /** Set HTTP response headers for API responses. */
    public static function api($method = 'application/json') {}
    /** Initializes the API testing tool (APIBAR) with a specified URL path. */
    public static function apibar($url = '/apibar') {}
    /** Set HTTP response headers for file downloads. */
    public static function file($name, $length) {}
    /** Set memory limit for PHP script. */
    public static function memory($limit) {}
}

/** Source: library/PHED.php */
class PHED {
    /** Encrypts or decrypts the string based on the provided action. */
    public function hide($string, $key, $action) {}
    /** Public interface to encrypt or decrypt a string using the default key. */
    public static function make($string, $action) {}
    /** Evaluates the security score based on key length, algorithm, and integrity measures. */
    public static function score() {}
    /** Updates the default encryption key. */
    public static function key($new_key) {}
}

/** Source: library/PHEM.php */
class PHEM {
    /** Configure SMTP settings. */
    public static function smtp($smtpHost, $smtpPort, $smtpSecure) {}
    /** Configure IMAP settings. */
    public static function imap($imapHost, $imapPort, $imapSecure, $folder = 'INBOX') {}
    /** Configure POP3 settings. */
    public static function pop($popHost, $popPort, $popSecure, $folder = 'INBOX') {}
    /** Set SMTP login credentials. */
    public static function smtpLogin($username, $password) {}
    /** Set IMAP login credentials. */
    public static function imapLogin($username, $password) {}
    /** Set POP3 login credentials. */
    public static function popLogin($username, $password) {}
    /** Retrieve emails using SMTP settings (alias for IMAP get). */
    public static function smtpGet($filter, $limit) {}
    /** Send an email using IMAP settings (alias for SMTP send). */
    public static function imapSend($from, $name, $to, $cc, $bcc, $subject, $message) {}
    /** Send an email using POP3 settings (alias for SMTP send). */
    public static function popSend($from, $name, $to, $cc, $bcc, $subject, $message) {}
    /** Retrieve emails using IMAP settings. */
    public static function imapGet($filter, $limit) {}
    /** Retrieve emails using POP3 settings. */
    public static function popGet($filter, $limit) {}
    /** Send an email using SMTP settings. */
    public static function smtpSend($from, $name, $to, $cc, $bcc, $subject, $message) {}
    /** Display the SMTP log. */
    public static function showLog() {}
}

/** Source: library/PHEV.php */
class PHEV {
    /** Explicit compatibility switch for hosts that intentionally run a socket loop in a web worker. */
    public static function allowWebWorker(bool $allow = true): void {}
    public static function initialize($path = '/websocket', $address = '0.0.0.0', $port = 8000) {}
    public static function start() {}
    public static function restart() {}
    public static function stop() {}
    public static function running(): bool {}
    public static function clients() {}
    public static function debugClients() {}
    public static function getHandler($message) {}
    public static function handler($requestPath, $action, $handler) {}
    public static function message($clientId, $message) {}
    public static function broadcast($message) {}
    public static function disconnect($clientId = NULL) {}
    /** Initialize SSE headers */
    public static function initHeaders() {}
    /** Send data to the client */
    public static function sendSE($data, $event = NULL, $id = NULL) {}
    /** Set a retry interval for the client */
    public static function setRetry($milliseconds) {}
    /** Start streaming data continuously */
    public static function stream(callable $callback, int $interval = 10000) {}
    public static function streamUInew(string $key, int $interval = 10000) {}
    public static function streamUI(string $name = '/streamui', int $interval = 10000) {}
}

/** Source: library/PHFY.php */
class PHFY {
    public static function configure(array $options = []): array {}
    public static function config(): array {}
    public static function public(string $message, array $options = []): array {}
    public static function private(string $message, array $options = []): array {}
    public static function send(string $message, array $options = []): array {}
    public static function clientConfig(array $context = []): array {}
    public static function webPushCapability(): array {}
    /** Performs an in-memory hosting capability test without storing keys. */
    public static function cryptoCapability(): array {}
    public static function registerRoutes(): void {}
    public static function privateFeed(): void {}
}

/** Source: library/PHJC.php */
class PHJC {
    public static function fastUI(): void {}
    public static function ui(string $type, array $attr = [], string $content = ''): string {}
    public static function icon(string $name, string $style = ''): string {}
    public static function slot(string $name, ?string $content = NULL) {}
    public static function layout(string $title, string $bodyContent): string {}
    /** ক্যাশ পরিষ্কার করার মেথড */
    public static function clearCache(): bool {}
    /** মূল রেন্ডার মেথড */
    public static function view(string $view, array $data = [], ?string $fragment = NULL): string {}
    public static function includeView(string $view, array $data = []): string {}
    public static function startLoop($array): void {}
    public static function currentLoop(): object {}
    public static function endLoop(): void {}
    public static function share($key, $value = NULL): void {}
    public static function directive(string $name, callable $handler): void {}
    public static function minify(bool $state = true): void {}
    public static function metaPreset(string $type, array $data = []): void {}
    public static function breadcrumb(array $crumbs): void {}
    public static function reset() {}
    public static function head(array $data) {}
    public static function buildHead() {}
    public static function newHTML($tag = NULL, $attributes = [], $content = '') {}
    public static function singleHTML($html = []) {}
    public static function mergeHTML(array $htmlParts) {}
    public static function p2j($php, $json = true) {}
    public static function h2p($html, $json = true, $echo = false, $pre = false) {}
    public static function css($rules) {}
    public static function countElements($input) {}
    public static function generateId($fullTag, $attributeString, $content) {}
    public static function import($type, $source, $location = 'head', $version = NULL) {}
    public static function header($content) {}
    public static function body($content, $bodyPram = []) {}
    public static function streamJS($thisPath = '', $stream = '', $rootPath = '') {}
    public static function newJS($js) {}
    public static function phjs($js): void {}
    public static function use(array|string $libs): void {}
    public static function render_h(): string {}
    public static function render_c(): string {}
    public static function render_b(): string {}
    public static function render_j($state = true) {}
    public static function app(string $stream, callable $producer) {}
    public static function render(): string {}
    public function __call(string $name, array $arguments) {}
    public static function __callStatic(string $name, array $arguments) {}
    public static function set(string $varName, string $value, string $type = 'var'): string {}
    public static function op(string $f1, string $op, string $f2): string {}
    public static function get(string ...$varNames): string {}
    public static function endFun(): string {}
    public static function endCod(): string {}
}

/** Source: library/PHJS.php */
class PHJS {
    /** Smart Asset Manager */
    public static function assets(array $options = []): string {}
    /** Fluent Entry Point */
    public static function js(): \PHJS_Chain {}
    /** Magic Static Caller for full JS support */
    public static function __callStatic($name, $args) {}
    /** Smart HTML Renderer */
    public static function render(string $html): string {}
    public static function parse(string $dsl): string {}
    public static function alpineData(string $name, array $obj): string {}
    public static function alpineStore(string $name, array $obj): string {}
    public static function alpineBind(string $name, array $obj): string {}
    public static function el(): string {}
    public static function refs(string $name = ''): string {}
    public static function store(string $name): string {}
    public static function watch(string $prop, string $callback): string {}
    public static function dispatch(string $event, array $detail = []): string {}
    public static function nextTick(string $callback): string {}
    public static function root(): string {}
    public static function data(): string {}
    public static function id(string $name): string {}
    public static function state_magic(): string {}
    public static function params_magic(): string {}
    public static function route_magic(): string {}
    public static function ui_magic(): string {}
    public static function os_magic(): string {}
    public static function t_magic(): string {}
    public static function router_magic(): string {}
    public static function clipboard_magic(): string {}
    public static function hxProcess(string $sel): string {}
    public static function hxTrigger(string $sel, string $event): string {}
    public static function hxAjax(string $method, string $url, string $target): string {}
    public static function hxRemove(string $sel): string {}
    public static function hxAddClass(string $sel, string $cls): string {}
    public static function hxRemoveClass(string $sel, string $cls): string {}
    public static function hxToggleClass(string $sel, string $cls): string {}
    public static function hxConfig(array $config): string {}
    public static function const($name, $value = NULL): string {}
    public static function let($name, $value = NULL): string {}
    public static function var($name, $value = NULL): string {}
    public static function log($msg): string {}
    public static function error($msg): string {}
    public static function warn($msg): string {}
    public static function table($msg): string {}
    public static function localSet(string $key, $val): string {}
    public static function localGet(string $key): string {}
    public static function localRemove(string $key): string {}
    public static function sessionSet(string $key, $val): string {}
    public static function sessionGet(string $key): string {}
    public static function cookieSet(string $name, string $value, int $days = 7): string {}
    public static function html(string $sel, string $html): string {}
    public static function text(string $sel, string $text): string {}
    public static function val(string $sel, $val): string {}
    public static function addClass(string $sel, string $cls): string {}
    public static function removeClass(string $sel, string $cls): string {}
    public static function toggleClass(string $sel, string $cls): string {}
    public static function css(string $sel, string $prop, string $val): string {}
    public static function attr(string $sel, string $attr, string $val): string {}
    public static function remove(string $sel): string {}
    public static function event(string $sel, string $evt, string $code): string {}
    public static function onReady(string $code): string {}
    public static function redirect(string $url): string {}
    public static function reload(): string {}
    public static function alert($msg): string {}
    public static function fetch(string $url, array $opts = []): string {}
    public static function raw(string $code): string {}
    public static function appReady(string $code): string {}
    public static function appNavigate(string $url): string {}
    public static function appLink(string $url): string {}
    public static function appApi(string $url): string {}
    public static function appRoutePath(string $url = ''): string {}
    public static function appToast(string $msg, string $type = 'info'): string {}
    public static function appModal(string $id, string $action = 'open'): string {}
    public static function appProgress(bool $start = true): string {}
    public static function appTheme(string $name): string {}
    public static function appThemeToggle(): string {}
    public static function appValidate(string $selector): string {}
    public static function appCheck(string $selector, ?string $successMsg = NULL): string {}
    public static function appSeo(array $config): string {}
    public static function appI18n(string $lang): string {}
    public static function appStoreGet(string $name): string {}
    public static function appStoreSet(string $name, $value): string {}
    public static function appStoreDispatch(string $action, $payload = NULL): string {}
    public static function appDbStorageSet(string $key, $val): string {}
    public static function appDbStorageGet(string $key): string {}
    public static function appDbStorageDel(string $key): string {}
    public static function appDbSync(string $namespace, string $url): string {}
    public static function appRequest(string $url, array $opts = []): string {}
    public static function appUpload(string $fileVar, string $endpoint, array $options = []): string {}
    public static function appSearch(string $indexName, string $query): string {}
    public static function appSearchIndex(string $indexName, array $data): string {}
    public static function appHardware(string $type, string $action = 'connect', array $args = []): string {}
    public static function appDrmProtect(string $selector, array $config = []): string {}
    public static function appFsRead(string $accept = '.txt,.json,.md'): string {}
    public static function appFsSave(string $content, string $defaultName = 'export.txt'): string {}
    public static function appMediaInit(string $selector, array $options = []): string {}
    public static function appChartInit(string $selector, array $options = []): string {}
    public static function appWorker(string $task, array $data = []): string {}
    public static function appInspector(): string {}
    public static function appPalette(): string {}
    public static function appA11yTrap(string $selector): string {}
    public static function appDesignSet(string $name, string $value): string {}
    public static function appDesignGet(string $name): string {}
    public static function appTimeFormat(string $dateVar = 'new Date()', string $pattern = 'YYYY-MM-DD HH:mm:ss'): string {}
    public static function appTimeAgo(string $dateVar): string {}
    /** Local enrollment-preview helper only; server-side PHTP must verify codes. */
    public static function appAuthTotp(string $secret, array $options = []): string {}
    public static function appOAuthStart(string $url, array $options = []): string {}
    public static function appOAuthCallback(array $result = [], array $options = []): string {}
    public static function appTwoFactorSubmit(string $endpoint, string $codeExpression, array $options = []): string {}
    public static function appPaymentStart(string $endpoint, array $data = [], array $options = []): string {}
    public static function appPaymentStatus(string $endpoint, array $options = []): string {}
    public static function appHeroUpdate(string $selector): string {}
    public static function appAnimateTo(string $selector, array $props, array $options = []): string {}
    public static function appAnimateSpring(string $selector, array $props): string {}
    public static function appFontLoad(string $name, string $url): string {}
    public static function appAi(string $prompt, array $opts = []): string {}
    public static function appXrInit(array $opts = []): string {}
    public static function appPwaEnable(array $opts = []): string {}
    public static function appHydrate(): string {}
    /** Mark trusted input as executable JavaScript instead of a JS string. */
    public static function expr(string $code): \PHJSExpression {}
    /** Translate a PHP value into a JavaScript value. */
    public static function value(mixed $value): string {}
    public static function translate(mixed $value): string {}
    public static function arrayValue(array $values): \PHJSExpression {}
    public static function object(object|array $values): \PHJSExpression {}
    /** Build a JavaScript template literal. */
    public static function template(string $template, array $values = []): \PHJSExpression {}
    public static function statement(\PHJSExpression|string $code): string {}
    public static function program(mixed ...$parts): string {}
    public static function compile(mixed $definition): string {}
    public static function module(array $definitions): string {}
    /** Declarative JavaScript compiler. */
    public static function build(mixed $definition): string {}
    public static function arrow(array|string $params, mixed $body, bool $async = false, bool $expression = false): \PHJSExpression {}
    public static function functionDef(string $name, array $params, mixed $body, bool $async = false, bool $generator = false): string {}
    public static function assign(string $target, mixed $value, string $operator = '='): string {}
    public static function returnValue(mixed $value = NULL): string {}
    public static function throwValue(mixed $value): string {}
    public static function awaitValue(mixed $value): \PHJSExpression {}
    public static function invoke(\PHJSExpression|string $callable, mixed ...$args): \PHJSExpression {}
    public static function construct(string $className, mixed ...$args): \PHJSExpression {}
    public static function dynamicImport(string $from): \PHJSExpression {}
    public static function ternary(mixed $test, mixed $truthy, mixed $falsy): \PHJSExpression {}
    public static function ifBlock(mixed $test, mixed $then, mixed $else = NULL): string {}
    public static function forOf(string $value, mixed $iterable, mixed $body, string $key = ''): string {}
    public static function whileBlock(mixed $test, mixed $body): string {}
    public static function doWhileBlock(mixed $body, mixed $test): string {}
    public static function forBlock(mixed $init, mixed $test, mixed $update, mixed $body): string {}
    public static function switchBlock(mixed $test, array $cases, mixed $default = NULL): string {}
    public static function tryCatch(mixed $try, string $catch, mixed $catchBody, mixed $finally = NULL): string {}
    public static function classDef(string $name, array $methods, ?string $extends = NULL): string {}
    public static function importModule(string $from, ?string $default = NULL, array $named = []): string {}
    public static function exportDefault(mixed $value): string {}
    public static function exportNamed(array $names): string {}
    /** Explicit JS Function Caller */
    public static function call(string $name, ...$args): string {}
    /** Wrap JS in Script Tag */
    public static function script(string $js, bool $module = false): string {}
    public static function moduleScript(array|string $definition): string {}
    public static function gen(string $humanLanguage): string {}
}

/** Source: library/PHJS.php */
class PHJSExpression {
    public function __construct(string $code) {}
    public function code(): string {}
    public function __toString(): string {}
}

/** Source: library/PHJS.php */
class PHJS_Chain {
    public function __call($name, $args) {}
    public function render(): string {}
    public function __toString(): string {}
}

/** Source: library/PHJT.php */
class PHJT {
    /** Updates the encryption key. */
    public static function key(string $new_key): array {}
    /** Rotate the secret key. */
    public static function rotate(string $newSecretKey): array {}
    /** Set a new default algorithm for signing */
    public static function algorithm(string $newAlgorithm): array {}
    /** Create a JWT token with claims */
    public static function create(array $payload, int $expiresIn = 3600, ?string $algorithm = NULL): array {}
    /** Verify and decode the JWT token */
    public static function verify(string $jwt, ?string $algorithm = NULL): array {}
}

/** Source: library/PHLS.php */
class PHLS {
    /** Closes the database connection. Intended for use with register_shutdown_function. */
    public static function disconnect() {}
    /** Sets the storage file path. Must be called before any other method. */
    public static function setFile(string $path) {}
    /** Checks storage availability and optionally verifies an actual write/read/delete cycle. */
    public static function checker(bool $write_test = false): array {}
    /** Adds or updates a key-value pair, wrapping the operation in a transaction. */
    public static function add(string $key, $value, ?int $expiration = NULL, array $tags = []): bool {}
    /** Stores a value only when the key does not already exist. */
    public static function addIfAbsent(string $key, $value, ?int $expiration = NULL, array $tags = []): bool {}
    /** Alias for add(). Included for API completeness. */
    public static function update(string $key, $value, ?int $expiration = NULL, array $tags = []): bool {}
    /** Removes a key-value pair. Handles nested keys automatically. */
    public static function remove(string $key) {}
    /** Manually expires a specific key. */
    public static function expire(string $key) {}
    /** Manually expires all keys. */
    public static function expireAllExpired() {}
    /** Checks if a key exists and has expired. */
    public static function isExpired(string $key): bool {}
    /** Gets details (value and expiration) of all expired keys. */
    public static function getExpiredDetails(): array {}
    /** Gets details (value and expiration) of all active (non-expired) keys. */
    public static function getActiveDetails(): array {}
    /** Adds a value to an array, keeping the array size at a specified limit. */
    public static function limitizer(string $key, $value, int $limit = 20, ?int $expiration = NULL) {}
    /** Retrieves a value by its key. Handles nested keys automatically. */
    public static function get(string $key) {}
    /** Retrieves all active (non-expired) key-value pairs. */
    public static function getAll(): array {}
    /** *** NEW: "Cache & Fetch" atomic operation. *** */
    public static function remember(string $key, int $expiration, callable $callback, array $tags = []) {}
    /** Atomically increments a numeric value. */
    public static function increment(string $key, int $amount = 1, ?int $expiration = NULL): int {}
    /** Atomically decrements a numeric value. */
    public static function decrement(string $key, int $amount = 1, ?int $expiration = NULL): int {}
    /** Flushes (removes) all cache entries associated with a given tag. */
    public static function flushByTag(string $tag) {}
    /** Removes all entries from the database. Use with caution! */
    public static function removeAll(bool $shrink = true) {}
}

/** Source: library/PHML.php */
class PHML {
    /** Share data globally across all PHML renders. */
    public static function share(array $data) {}
    /** Render DSL from a file. */
    public static function partial(string $filePath, array $localData = []): string {}
    /** Set the layout for the current page. */
    public static function layout(string $dsl, array $data = []) {}
    /** Define a block of content for a layout. */
    public static function block(string $name, string $content) {}
    /** Output a block in a layout. */
    public static function yieldBlock(string $name, string $default = ''): string {}
    /** Register a new UI component with optional assets. */
    public static function component(string $name, $template, array $assets = []) {}
    /** Check if a component exists. */
    public static function hasComponent(string $name): bool {}
    /** Get the flattened attribute alias map. */
    public static function getFlatAttrMap() {}
    /** Main render function for PHML DSL. */
    public static function render(string $dsl, array $localData = []): string {}
    /** Magic call for static tag functions and components. */
    public static function __callStatic($name, $arguments) {}
    /** PHML Constructor. */
    public function __construct(string $tag, array $attrs, array $children) {}
    /** Convert PHML object to HTML string. */
    public function __toString(): string {}
    /** Initialize PHML output buffering. */
    public static function init() {}
    /** Enable or disable the automatic application-script tag. */
    public static function autoAssets(bool $enabled = true): void {}
    /** Alias for init(). */
    public static function use() {}
    /** Set global meta configuration. */
    public static function meta(array $config) {}
    /** Set the page title. */
    public static function title($text) {}
    /** Add JavaScript code to the stack. */
    public static function js(...$codes) {}
    /** Add CSS code to the stack. */
    public static function css(...$codes) {}
    /** Set UI configuration for PHCS. */
    public static function uiConfig(array $config) {}
    /** Add content to the head section stack. */
    public static function head(...$codes) {}
    /** Add content to the footer section stack. */
    public static function footer(...$codes) {}
    /** Set attributes for the <html> tag. */
    public static function html(array $attributes) {}
    /** Set attributes for the <body> tag. */
    public static function body(array $attributes) {}
    /** Clear the generated cache files. */
    public static function clearCache() {}
    /** Post-process HTML content for output buffering. */
    public static function process($htmlContent) {}
}

/** Source: library/PHMO.php */
class PHMO {
    public static function configure(array $options = []): array {}
    public static function config(): array {}
    public static function requestId(): string {}
    public static function traceId(): string {}
    public static function isProbeRequest(): bool {}
    public static function registerRoutes(): void {}
    /** Registers a self-contained, read-only observability dashboard. */
    public static function dashboard(string $url = '/monitor'): void {}
    /** Builds a bounded log report suitable for dashboards and local tooling. */
    public static function report(?string $date = NULL, int $limit = 500, string $level = '', string $search = ''): array {}
    public static function health(bool $withDependencies = false): array {}
    /** Returns today's request metrics by reading PHMO's own structured logs. */
    public static function metrics(?string $date = NULL): array {}
    public static function log(string $level, string $event, array $context = []): bool {}
    public static function finishRequest(): void {}
}

/** Source: library/PHOB.php */
class PHOB {
    public static function capability(): array {}
    /** Protect a PHP file by generating a secure, obfuscated output file */
    public static function build(array|string $input, array|string $output, array $skip = [], array $skipName = [], array $customName = [], array $config = []) {}
    /** Execute a PHOB-protected file after verifying security constraints */
    public static function use(string $file, string $lisense) {}
    /** Get the unique device ID for the current machine */
    public static function deviceID() {}
}

/** Source: library/PHOP.php */
class PHOP {
    /** 🌟 THE MAIN IMAGE OPTIMIZER ENGINE (With Target Size AI) 🌟 */
    public static function img($source, $output = 'preview', $options = []) {}
    /** 🎬 FULL POTENTIAL VIDEO ENGINE (Video to High-Quality GIF / Single Image) */
    public static function video($source, $output = 'preview', $options = []) {}
    /** 🗜️ ZIP Compressor */
    public static function zip($source, $output_path) {}
    /** 📝 Text & Data Optimizer */
    public static function text($data, $action = 'compress') {}
}

/** Source: library/PHPA.php */
class PHPA {
    public static function courier(string $name): \PHPACourierInterface {}
    public static function extendCourier(string $name, callable $factory): void {}
    public static function courierAvailable(?string $region = NULL): array {}
    public static function courierProfile(string $name): array {}
    public static function extend(string $name, string $className): void {}
    public static function available(): array {}
    public static function gatewayCapabilities(string $name): array {}
    public static function __callStatic($name, $arguments): \PHPAGatewayInterface {}
}

/** Source: library/PHPA.php */
class PHPACourierInterface {
    public function setKeys(string $key1, string $key2 = '', string $key3 = '', string $key4 = ''): self {}
    public function configure(array $options): self {}
    public function sandbox(bool $status = true): self {}
    public function setTransport(?callable $callback): self {}
    public function create(array $shipment): array {}
    public function track(string $trackingId, array $options = []): array {}
    public function rate(array $shipment): array {}
    public function cancel(string $trackingId, array $options = []): array {}
    public function label(string $trackingId, array $options = []): array {}
    public function pickup(array $pickup): array {}
    public function call(string $operation, array $payload = [], array $options = []): array {}
    public function capabilities(): array {}
}

/** Source: library/PHPA.php */
class PHPAGatewayInterface {
    public function setKeys(string $key1, string $key2 = '', string $key3 = '', string $key4 = ''): self {}
    public function setLogic(?callable $chargeCallback = NULL, ?callable $verifyCallback = NULL): self {}
    public function charge(float $amount, string $currency, string $orderId, array $options = []): array {}
    public function verify(string $transactionId): array {}
}

/** Source: library/PHPA.php */
class PHPA_Aamarpay {
    public function charge(float $amount, string $currency, string $orderId, array $options = []): array {}
    public function verify(string $transactionId): array {}
    public function refund(string $transactionId, ?float $amount = NULL): array {}
}

/** Source: library/PHPA.php */
class PHPA_Adyen {
    public function charge(float $amount, string $currency, string $orderId, array $options = []): array {}
    public function verify(string $transactionId): array {}
    public function refund(string $transactionId, ?float $amount = NULL): array {}
    public function webhook(string $payload, array $headers = [], array $context = []): array {}
}

/** Source: library/PHPA.php */
class PHPA_Authorize {
    public function charge(float $amount, string $currency, string $orderId, array $options = []): array {}
    public function verify(string $transactionId): array {}
    public function refund(string $transactionId, ?float $amount = NULL): array {}
}

/** Source: library/PHPA.php */
class PHPA_BaseGateway {
    public function setLogic(?callable $chargeCallback = NULL, ?callable $verifyCallback = NULL): self {}
    public function setRefundLogic(?callable $callback): self {}
    public function setWebhookLogic(?callable $callback): self {}
    /** Injectable transport for deterministic tests and private gateway adapters. */
    public function setTransport(?callable $callback): self {}
    public function timeout(int $seconds, ?int $connectSeconds = NULL): self {}
    public function expect(string $orderId, ?float $amount = NULL, ?string $currency = NULL): self {}
    public function setKeys(string $key1, string $key2 = '', string $key3 = '', string $key4 = ''): self {}
    public function sandbox(bool $status = true): self {}
    public function capabilities(): array {}
    public function refund(string $transactionId, ?float $amount = NULL): array {}
    public function webhook(string $payload, array $headers = [], array $context = []): array {}
}

/** Source: library/PHPA.php */
class PHPA_Binance {
    public function charge(float $amount, string $currency, string $orderId, array $options = []): array {}
    public function verify(string $transactionId): array {}
    public function refund(string $transactionId, ?float $amount = NULL): array {}
}

/** Source: library/PHPA.php */
class PHPA_Bitpay {
    public function charge(float $amount, string $currency, string $orderId, array $options = []): array {}
    public function verify(string $transactionId): array {}
    public function refund(string $transactionId, ?float $amount = NULL): array {}
}

/** Source: library/PHPA.php */
class PHPA_Bkash {
    public function charge(float $amount, string $currency, string $orderId, array $options = []): array {}
    public function verify(string $paymentId): array {}
    public function execute(string $paymentId): array {}
    public function refundPayment(string $paymentId, string $trxId, float $amount, string $sku = 'refund', string $reason = 'Customer refund'): array {}
    public function refund(string $transactionId, ?float $amount = NULL): array {}
}

/** Source: library/PHPA.php */
class PHPA_Braintree {
    public function charge(float $amount, string $currency, string $orderId, array $options = []): array {}
    public function verify(string $transactionId): array {}
    public function refund(string $transactionId, ?float $amount = NULL): array {}
}

/** Source: library/PHPA.php */
class PHPA_Btcpay {
    public function charge(float $amount, string $currency, string $orderId, array $options = []): array {}
    public function verify(string $transactionId): array {}
    public function refund(string $transactionId, ?float $amount = NULL): array {}
    public function webhook(string $payload, array $headers = [], array $context = []): array {}
}

/** Source: library/PHPA.php */
class PHPA_Coinbase {
    public function charge(float $amount, string $currency, string $orderId, array $options = []): array {}
    public function verify(string $transactionId): array {}
    public function webhook(string $payload, array $headers = [], array $context = []): array {}
    public function refund(string $transactionId, ?float $amount = NULL): array {}
}

/** Source: library/PHPA.php */
class PHPA_Coingate {
    public function charge(float $amount, string $currency, string $orderId, array $options = []): array {}
    public function verify(string $transactionId): array {}
    public function refund(string $transactionId, ?float $amount = NULL): array {}
}

/** Source: library/PHPA.php */
class PHPA_Coinpayments {
    public function charge(float $amount, string $currency, string $orderId, array $options = []): array {}
    public function verify(string $transactionId): array {}
    public function refund(string $transactionId, ?float $amount = NULL): array {}
}

/** Source: library/PHPA.php */
class PHPA_Courier {
    public function __construct(array $profile) {}
    public function setKeys(string $key1, string $key2 = '', string $key3 = '', string $key4 = ''): self {}
    public function configure(array $options): self {}
    public function sandbox(bool $status = true): self {}
    public function setTransport(?callable $callback): self {}
    public function profile(): array {}
    public function name(): string {}
    public function capabilities(): array {}
    public function create(array $shipment): array {}
    public function track(string $trackingId, array $options = []): array {}
    public function rate(array $shipment): array {}
    public function cancel(string $trackingId, array $options = []): array {}
    public function label(string $trackingId, array $options = []): array {}
    public function pickup(array $pickup): array {}
    public function call(string $operation, array $payload = [], array $options = []): array {}
}

/** Source: library/PHPA.php */
class PHPA_Cryptocom {
    public function charge(float $amount, string $currency, string $orderId, array $options = []): array {}
    public function verify(string $transactionId): array {}
    public function refund(string $transactionId, ?float $amount = NULL): array {}
}

/** Source: library/PHPA.php */
class PHPA_Metamask {
    public function charge(float $amount, string $currency, string $orderId, array $options = []): array {}
    public function verify(string $transactionId): array {}
    public function refund(string $transactionId, ?float $amount = NULL): array {}
}

/** Source: library/PHPA.php */
class PHPA_Mollie {
    public function charge(float $amount, string $currency, string $orderId, array $options = []): array {}
    public function verify(string $transactionId): array {}
    public function refund(string $transactionId, ?float $amount = NULL): array {}
    public function webhook(string $payload, array $headers = [], array $context = []): array {}
}

/** Source: library/PHPA.php */
class PHPA_Nagad {
    public function charge(float $amount, string $currency, string $orderId, array $options = []): array {}
    public function verify(string $paymentRefId): array {}
    public function refund(string $transactionId, ?float $amount = NULL): array {}
}

/** Source: library/PHPA.php */
class PHPA_Nexuspay {
    public function charge(float $amount, string $currency, string $orderId, array $options = []): array {}
    public function verify(string $transactionId): array {}
    public function refund(string $transactionId, ?float $amount = NULL): array {}
}

/** Source: library/PHPA.php */
class PHPA_Nowpayments {
    public function charge(float $amount, string $currency, string $orderId, array $options = []): array {}
    public function verify(string $transactionId): array {}
    public function webhook(string $payload, array $headers = [], array $context = []): array {}
    public function refund(string $transactionId, ?float $amount = NULL): array {}
}

/** Source: library/PHPA.php */
class PHPA_Payoneer {
    public function charge(float $amount, string $currency, string $orderId, array $options = []): array {}
    public function verify(string $transactionId): array {}
    public function refund(string $transactionId, ?float $amount = NULL): array {}
}

/** Source: library/PHPA.php */
class PHPA_Paypal {
    public function charge(float $amount, string $currency, string $orderId, array $options = []): array {}
    public function capture(string $orderId): array {}
    public function verify(string $transactionId): array {}
    public function refund(string $transactionId, ?float $amount = NULL): array {}
}

/** Source: library/PHPA.php */
class PHPA_Portwallet {
    public function charge(float $amount, string $currency, string $orderId, array $options = []): array {}
    public function verify(string $transactionId): array {}
    public function refund(string $transactionId, ?float $amount = NULL): array {}
}

/** Source: library/PHPA.php */
class PHPA_Razorpay {
    public function charge(float $amount, string $currency, string $orderId, array $options = []): array {}
    public function verify(string $transactionId): array {}
    public function verifySignature(string $orderId, string $paymentId, string $signature): bool {}
    public function refund(string $transactionId, ?float $amount = NULL): array {}
    public function webhook(string $payload, array $headers = [], array $context = []): array {}
}

/** Source: library/PHPA.php */
class PHPA_Rocket {
    public function charge(float $amount, string $currency, string $orderId, array $options = []): array {}
    public function verify(string $transactionId): array {}
    public function refund(string $transactionId, ?float $amount = NULL): array {}
}

/** Source: library/PHPA.php */
class PHPA_Shurjomukhi {
    public function charge(float $amount, string $currency, string $orderId, array $options = []): array {}
    public function verify(string $transactionId): array {}
    public function refund(string $transactionId, ?float $amount = NULL): array {}
}

/** Source: library/PHPA.php */
class PHPA_Square {
    public function charge(float $amount, string $currency, string $orderId, array $options = []): array {}
    public function verify(string $transactionId): array {}
    public function refund(string $transactionId, ?float $amount = NULL): array {}
}

/** Source: library/PHPA.php */
class PHPA_Sslcommerz {
    public function charge(float $amount, string $currency, string $orderId, array $options = []): array {}
    public function verify(string $transactionId): array {}
    public function refund(string $transactionId, ?float $amount = NULL): array {}
    public function webhook(string $payload, array $headers = [], array $context = []): array {}
}

/** Source: library/PHPA.php */
class PHPA_Stripe {
    public function charge(float $amount, string $currency, string $orderId, array $options = []): array {}
    public function verify(string $transactionId): array {}
    public function refund(string $transactionId, ?float $amount = NULL): array {}
    public function webhook(string $payload, array $headers = [], array $context = []): array {}
    public function capabilities(): array {}
}

/** Source: library/PHPA.php */
class PHPA_Surjopay {
    public function charge(float $amount, string $currency, string $orderId, array $options = []): array {}
    public function verify(string $transactionId): array {}
    public function refund(string $transactionId, ?float $amount = NULL): array {}
}

/** Source: library/PHPA.php */
class PHPA_Trustwallet {
    public function charge(float $amount, string $currency, string $orderId, array $options = []): array {}
    public function verify(string $transactionId): array {}
    public function refund(string $transactionId, ?float $amount = NULL): array {}
}

/** Source: library/PHPA.php */
class PHPA_Twocheckout {
    public function charge(float $amount, string $currency, string $orderId, array $options = []): array {}
    public function verify(string $transactionId): array {}
    public function refund(string $transactionId, ?float $amount = NULL): array {}
}

/** Source: library/PHPA.php */
class PHPA_Upay {
    public function charge(float $amount, string $currency, string $orderId, array $options = []): array {}
    public function verify(string $transactionId): array {}
    public function refund(string $transactionId, ?float $amount = NULL): array {}
}

/** Source: library/PHQR.php */
class PHQR {
    /** Generate a memory-safe PNG data URI. */
    public static function make($data, int $size = 8, int $margin = 4): string {}
}

/** Source: library/PHRO.php */
class PHRO {
    /** Initializes the router. This can be called manually to set a custom base path, */
    public static function initialize($custom_base_path = NULL) {}
    /** Configures and enables the security guard (WAF). */
    public static function guard(array $config = []) {}
    /** Public proxy-aware HTTPS check for framework components such as PHCO. */
    public static function secure(): bool {}
    /** Return the session CSRF token, creating it when necessary. */
    public static function getToken(): string {}
    /** Return a ready-to-render hidden CSRF field. */
    public static function csrfField(): string {}
    /** Rotate and return the current session CSRF token. */
    public static function regenerateToken(): string {}
    /** Trust forwarding headers only from these reverse-proxy IP addresses. */
    public static function trustProxies(array $ipAddresses): void {}
    /** Get the root URL for the application. */
    public static function root() {}
    /** Public accessor to get the variables from the current route's callback context. */
    public static function getCallbackContext(): array {}
    /** Define a route for GET method. */
    public static function get(string $url, $callback): self {}
    /** Define a route for POST method. */
    public static function post(string $url, $callback): self {}
    /** Define a route for PUT method. */
    public static function put(string $url, $callback): self {}
    /** Define a route for PATCH method. */
    public static function patch(string $url, $callback): self {}
    /** Define a route for DELETE method. */
    public static function delete(string $url, $callback): self {}
    /** Define a route for HEAD method. */
    public static function head(string $url, $callback): self {}
    /** Define a route for OPTIONS method. */
    public static function options(string $url, $callback): self {}
    /** Creates a route group with shared attributes that can be chained. */
    public static function group(string $prefix, callable $callback): self {}
    /** Registers a full set of CRUD routes. */
    public static function crud(string $uri, array|string $controller, array $options = []): self {}
    /** Registers a common set of routes for a resource using only GET and POST methods. */
    public static function gap(string $uri, array|string $controller, array $options = []): self {}
    /** Registers two essential routes for a single resource URI: a GET and a POST. */
    public static function sgap(string $uri, array|string $controller, array $options = []): self {}
    /** Define a route for custom HTTP method. */
    public static function add($method, $url, $callback) {}
    /** Assigns a name to the most recently defined route or group of routes. */
    public function name(string $name): self {}
    /** Attach middleware(s) to the most recently defined route. */
    public function middleware($middleware): self {}
    /** Attaches response headers to the most recently defined route or group. */
    public function header($header, ?string $value = NULL): self {}
    /** ⚡ THE ULTIMATE AI BRIDGE (MCP INTEGRATION) ⚡ */
    public function mcp(string $type, string $name, string $description, array $schema = []): self {}
    /** Gets the full filesystem path for a given resource using colon notation. */
    public static function gatherRequestData(): array {}
    /** Tracks failed attempts and enforces a block if the limit is exceeded. */
    public static function attempt($config_or_message = 'generic_attempt_fail', bool $return_details_override = false) {}
    /** Resets the failed attempt count for a specific event and client. */
    public static function resetAttempt(string $event_name): void {}
    /** ⚡ PHOP Ultimate Async & Parallel Engine (Simplified SSL Auto - Final) ⚡ */
    public static function task(...$tasks): void {}
    /** ⚡ PHOP Real-Time SSE Engine (Final - Heartbeat + Last-Event-ID Support) ⚡ */
    public static function stream(callable $messageProvider): void {}
    /** Open a Real-Time Channel (Receiver Route Setup). */
    public static function channel(string $channel_id): \PhroChannel {}
    /** Publish data/command to a specific channel (Sender Route Setup). */
    public static function publish(string $channel_id, string $command_name, $data = NULL): bool {}
    /** Get all defined routes or filter by short, link, and method. */
    public static function routes($path = NULL, $method = 'GET') {}
    /** Finds routes, generates URLs, or returns the current route details. */
    public static function route(?string $identifier = NULL, ?array $params = []) {}
    /** Get the source code of the callback for the specified route. */
    public static function source($short, $method = 'GET') {}
    /** Get the user's IP address. */
    public static function getUserIP() {}
    /** Gathers all HTTP request headers. */
    public static function gatherHeaders() {}
    /** Fetches Server/Caller Geolocation with multiple fallbacks. */
    public static function getGeolocationData() {}
    /** Extracts client identity data from the cookie if available. */
    public static function extractIdentityFromCookie() {}
    /** Create an unchangeable network identity key. */
    public static function netKey($data): string {}
    /** Create an unchangeable device identity key (The Fingerprint Master). */
    public static function deviceKey($data): string {}
    /** Decrypt the encrypted data */
    public static function decrypt($encryptedData) {}
    /** Updates the default encryption key. */
    public static function key($new_key, $dataPrint = false) {}
    /** Init the footprint/track. */
    public static function track($footprint = false) {}
    /** Collects and processes exhaustive request data, generates robust unique identifiers, */
    public static function footprint(): array {}
    /** Sets the identity cookie with encrypted user identity data. */
    public static function setIdentityCookie($params, $expiryTime = 525600): bool {}
    /** Extract comprehensive information from the HTTP_USER_AGENT string and store it in $params. */
    public static function userAgentInfo() {}
    /** Creates a clean, URL-safe, SEO-friendly slug from ANY language. */
    public static function createSlug(string $string, string $separator = '-'): string {}
    /** The Ultimate AI-Aware Sitemap Configuration Engine. */
    public function sitemap($options = true): self {}
    /** Marks a route to be "Disallowed" in robots.txt for specific user agents. */
    public function disallow($user_agents = '*'): self {}
    /** Marks a route to be "Allowed" in robots.txt. */
    public function allow($user_agents = '*'): self {}
    /** Generates a complete list of URLs for the sitemap. */
    public static function getSitemapRoutes(): array {}
    /** Configures and enables a universally compatible, auto-generated manifest.json. */
    public static function manifest(array $config): void {}
    /** Adds a custom URL entry to the sitemap. */
    public static function addSitemapEntry(string $loc, array $options = []): void {}
    /** Adds a custom line to the robots.txt file. */
    public static function addRobotsRule(string $rule): void {}
    /** Listen for incoming HTTP requests and execute matching route callback. */
    public static function listen($error_handler = NULL) {}
}

/** Source: library/PHRO.php */
class PhroAttemptShield {
    public function inspect(array $request_data, array $config) {}
    public function checkAndIncrementAttempt(string $event_name, int $max_attempts, int $block_duration_minutes, int $reset_after_minutes, string $block_message): array {}
    public function performAttemptReset(string $event_name): void {}
}

/** Source: library/PHRO.php */
class PhroChannel {
    public function __construct(string $channel_id) {}
    public function authorize(callable $callback): self {}
    public function worker(string $name, callable $handler, int $max_runs = 0, int $interval_seconds = 0): self {}
    public function listen(): void {}
}

/** Source: library/PHRO.php */
class PhroContentTypeShield {
    public function inspect(array $request_data, array $config) {}
}

/** Source: library/PHRO.php */
class PhroCsrfShield {
    public function inspect(array $request_data, array $config) {}
}

/** Source: library/PHRO.php */
class PhroFileUploadShield {
    public function inspect(array $request_data, array $config) {}
}

/** Source: library/PHRO.php */
class PhroGuard {
    public function __construct(array $config, array $request_data) {}
    /** Adds a custom shield to the guard. */
    public function addShield(string $key, \PhroShield $shield) {}
    /** Retrieves a shield instance by its key. */
    public function getShield(string $key): ?\PhroShield {}
    /** Removes a shield from the guard. */
    public function removeShield(string $key) {}
    /** Executes all enabled shields to protect the application. */
    public function protect() {}
    /** Blocks the request immediately and displays a forbidden message. */
    public static function block(string $message = 'Forbidden', int $code = 403) {}
}

/** Source: library/PHRO.php */
class PhroHeaderInspectionShield {
    public function inspect(array $request_data, array $config) {}
}

/** Source: library/PHRO.php */
class PhroHoneypotShield {
    public function inspect(array $request_data, array $config) {}
}

/** Source: library/PHRO.php */
class PhroOpenRedirectShield {
    public function inspect(array $request_data, array $config) {}
}

/** Source: library/PHRO.php */
class PhroRateLimitShield {
    public function inspect(array $request_data, array $config) {}
}

/** Source: library/PHRO.php */
class PhroSecurityException {
    public function __construct(string $message = '', int $code = 403, ?\Throwable $previous = NULL) {}
}

/** Source: library/PHRO.php */
class PhroShield {
    public function inspect(array $request_data, array $config) {}
}

/** Source: library/PHRO.php */
class PhroSqlInjectionShield {
    public function inspect(array $request_data, array $config) {}
}

/** Source: library/PHRO.php */
class PhroXssShield {
    public function inspect(array $request_data, array $config) {}
}

/** Source: library/PHRQ.php */
class PHRQ {
    /** Send an HTTP request from PHP using cURL. */
    public static function php($method, $url, $headers = [], $body = NULL, $options = []) {}
    /** Generate JavaScript code for sending an HTTP request using XHR. */
    public static function js($method, $url, $headers = [], $body = NULL, $options = []) {}
    /** Set HTTP response headers for API responses. */
    public static function header($method = 'GET', $origin = '*', $contentType = 'application/json', $additionalHeaders = []) {}
    /** Enable or disable CORS for API responses. */
    public static function cross($enable = true, array|string $origin = '*', bool $credentials = false) {}
    /** Set HTTP response headers for API responses. */
    public static function status(int $code = 200, ?string $msg = NULL) {}
    /** Set HTTP response headers for file downloads. */
    public static function file($name, $length) {}
    /** Handle live map data collection and processing based on the request. */
    public static function livemap($url = '/livemap', $skipList = [], $limit = 10, $time = 1440) {}
    /** Stream data to the client. */
    public static function stream(int $sleep = 1, string $type = 'text', ?callable $callback = NULL) {}
}

/** Source: library/PHSE.php */
class PHSE {
    /** সেশন স্টার্ট করার সময় ডিফল্ট সিকিউরিটি কনফিগারেশন চেক করা। */
    public static function start() {}
    /** সেশন ভেরিয়েবল সেট করা। */
    public static function add($key, $value, $expiry = NULL) {}
    /** সেশন ভ্যালু আপডেট করা (শুধু যদি আগে থেকে সেট করা থাকে)। */
    public static function update($key, $value) {}
    /** সেশন ভ্যালু ডিলিট করা। */
    public static function remove($key) {}
    /** সেশন ভ্যালু পাওয়া। */
    public static function get($key, $default = NULL) {}
    /** সেশন ভেরিয়েবলটি ? */
    public static function isActive($key) {}
    /** সব সেশন ভেরিয়েবল ক্লিন করা। */
    public static function expireAll() {}
    /** সেশন ধ্বংস করা (Logout বা Reset এর জন্য)। */
    public static function removeAll() {}
    /** সিকিউরিটির জন্য সেশন আইডি রি-জেনারেট করা। */
    public static function regenerateId() {}
    /** সমস্ত ভ্যালিড সেশন ডাটা রিটার্ন করা। */
    public static function getAll() {}
    /** ডিবাগিং মেথড: সেশন কখন এক্সপায়ার হবে তা দেখার জন্য। */
    public static function getExpiryTime($key) {}
}

/** Source: library/PHTM.php */
class PHTM {
    /** Set the default timezone. */
    public static function setZone($timezone) {}
    /** Get the current default timezone. */
    public static function getZone() {}
    /** Get the current date and time in the specified format. */
    public static function getTime($format = 'Y-m-d H:i:s') {}
    /** Format a given timestamp according to the specified format. */
    public static function setTime($timestamp, $format = 'Y-m-d H:i:s') {}
    /** Calculate the difference between two date/times. */
    public static function calculate($datetime1, $datetime2 = NULL) {}
    /** Modify a date/time string by adding or subtracting a specified interval. */
    public static function modify($datetime, $modifier, $format = 'Y-m-d H:i:s') {}
    /** Change the format of a date/time string. */
    public static function format($datetime, $outputFormat) {}
    /** Convert a date/time string from 24-hour format to 12-hour format with a custom output format. */
    public static function to12h($datetime, $outputFormat = 'g:i:s A') {}
    /** Convert a date/time string from 12-hour format to 24-hour format with a custom output format. */
    public static function to24h($datetime, $outputFormat = 'H:i:s') {}
}

/** Source: library/PHTP.php */
class PHTP {
    /** Configure the account-level Authenticator service. */
    public static function configure(array $config = []): array {}
    /** Generate a Base32 secret. */
    public static function key($length = 24, $mode = 'TOTP') {}
    /** Generate an OTP/TOTP code. Offset is expressed in seconds. */
    public static function code($secret, $mode = 'TOTP', $digits = 6, $time = 30, $offset = 0, $algo = 'sha1') {}
    /** Verify an OTP/TOTP. The optional window checks adjacent TOTP periods. */
    public static function verify($otp, $secret, $mode = 'TOTP', $digits = 6, $time = 30, $offset = 0, $algo = 'sha1', $window = 0) {}
    /** Build a standards-compatible otpauth URI. */
    public static function url($account, $secret, $digits = NULL, $time = NULL, $issuer = NULL, $algo = NULL) {}
    /** Begin enrollment or rotation without replacing an active factor yet. */
    public static function enroll(string|int $account, array $options = []): array {}
    /** Confirm a pending enrollment and atomically activate it for the account. */
    public static function confirm(string|int $account, string|int $code): array {}
    /** Verify an Authenticator or one-time recovery code for an active account. */
    public static function authenticate(string|int $account, string|int $code): array {}
    /** Return non-sensitive enrollment status. */
    public static function status(string|int $account): array {}
    /** Replace recovery codes after proving possession of the current factor. */
    public static function recovery(string|int $account, string|int $currentCode): array {}
    /** Disable the factor. Force mode is intended only for an already-authorized administrator. */
    public static function disable(string|int $account, string|int|null $code = NULL, bool $force = false): array {}
}

/** Source: library/PHTR.php */
class PHTR {
    /** Translate a given input using a specified translation server. */
    public static function translate($input, $serverName = 'google', $source = 'auto', $target = 'English') {}
    /** Automatically detect and translate using all available servers. */
    public static function auto($input, $targetLanguage = 'en') {}
    /** Build the appropriate translation URL based on the server name. */
    public static function buildUrl($serverName, $text, $sourceLang, $targetLang) {}
    /** Parses the response from the translation server based on the server name. */
    public static function parseResponse($response, $serverName) {}
}

/** Source: library/PHUI.php */
class PHUI {
    public static function ui(string $slug, array $data = []): string {}
    public static function element(string $slug, array $data = []): string {}
    public static function section(string $slug, array $data = []): string {}
    public static function layout(string $slug, array $data = []): string {}
    public static function page(string $slug, array $data = []): string {}
    public static function exists(string $slug): bool {}
    public static function register(string $slug, callable|string $template, array $meta = [], bool $replace = false): bool {}
    public static function registerMany(array $components, bool $replace = false): int {}
    public static function alias(string $alias, string $target, bool $replace = false): bool {}
    public static function search(string $query = '', ?string $group = NULL, int $limit = 50): array {}
    public static function categories(): array {}
    public static function count(): int {}
    public static function attributes(array|string|null $attributes): string {}
    /** Inspect dynamic component content without changing the component template. */
    public static function check(string $value): array {}
    public static function render(string $slug, array $data = []): string {}
    public static function boot(): void {}
    public static function catalog(): array {}
}

/** Source: library/PHVD.php */
class PHVD {
    public static function check(array $rules, array|bool|null $data = NULL, bool $debug = false): array {}
}

/** Source: library/PHVD.php */
class PhvdInternalException {
}

/** Source: library/PHVD.php */
class PhvdRule {
    public static function unique(string $table, string $column, $except = NULL): string {}
    public static function exists(string $table, string $column): string {}
}

/** Source: library/PHQR.php */
class QR8BitByte {
    public function __construct($data) {}
    public function write(&$buffer) {}
}

/** Source: library/PHQR.php */
class QRAlphaNum {
    public function __construct($data) {}
    public function write(&$buffer) {}
    public static function getCode($c) {}
}

/** Source: library/PHQR.php */
class QRBitBuffer {
    public function __construct() {}
    public function getBuffer() {}
    public function getLengthInBits() {}
    public function __toString(): string {}
    public function get($index) {}
    public function put($num, $length) {}
    public function putBit($bit) {}
}

/** Source: library/PHQR.php */
class QRCode {
    public function __construct() {}
    public function getTypeNumber() {}
    public function setTypeNumber($typeNumber) {}
    public function getErrorCorrectLevel() {}
    public function setErrorCorrectLevel($errorCorrectLevel) {}
    public function addData($data, $mode = 0) {}
    public function clearData() {}
    public function addDataImpl($qrData) {}
    public function getDataCount() {}
    public function getData($index) {}
    public function isDark($row, $col) {}
    public function getModuleCount() {}
    public function hex2rgb($hex = 0) {}
    public function make() {}
    public function getBestMaskPattern() {}
    public function createNullArray($length) {}
    public function makeImpl($test, $maskPattern) {}
    public function mapData(&$data, $maskPattern) {}
    public function setupPositionAdjustPattern() {}
    public function setupPositionProbePattern($row, $col) {}
    public function setupTimingPattern() {}
    public function setupTypeNumber($test) {}
    public function setupTypeInfo($test, $maskPattern) {}
    public function createData($typeNumber, $errorCorrectLevel, $dataArray) {}
    /** / */
    public function createBytes(&$buffer, &$rsBlocks) {}
    public static function getMinimumQRCode($data, $errorCorrectLevel) {}
    public function createImage($size = 2, $margin = 2, $fg = 0, $bg = 16777215, $bgtrans = false) {}
    public function printHTML($size = '2px') {}
    public function printSVG($size = 2) {}
}

/** Source: library/PHQR.php */
class QRData {
    public function __construct($mode, $data) {}
    public function getMode() {}
    public function getData() {}
    /** / */
    public function getLength() {}
    /** / */
    public function write(&$buffer) {}
    public function getLengthInBits($type) {}
}

/** Source: library/PHQR.php */
class QRKanji {
    public function __construct($data) {}
    public function write(&$buffer) {}
    public function getLength() {}
}

/** Source: library/PHQR.php */
class QRMath {
    public static function init() {}
    public static function createNumArray($length) {}
    public static function glog($n) {}
    public static function gexp($n) {}
}

/** Source: library/PHQR.php */
class QRNumber {
    public function __construct($data) {}
    public function write(&$buffer) {}
    public static function parseInt($s) {}
    public static function parseIntAt($c) {}
}

/** Source: library/PHQR.php */
class QRPolynomial {
    public function __construct($num, $shift = 0) {}
    public function get($index) {}
    public function getLength() {}
    public function __toString(): string {}
    public function toString() {}
    public function toLogString() {}
    /** / */
    public function multiply($e) {}
    /** / */
    public function mod($e) {}
}

/** Source: library/PHQR.php */
class QRRSBlock {
    public function __construct($totalCount, $dataCount) {}
    public function getDataCount() {}
    public function getTotalCount() {}
    public static function getRSBlocks($typeNumber, $errorCorrectLevel) {}
    public static function getRsBlockTable($typeNumber, $errorCorrectLevel) {}
}

/** Source: library/PHQR.php */
class QRUtil {
    public static function getPatternPosition($typeNumber) {}
    public static function getMaxLength($typeNumber, $mode, $errorCorrectLevel) {}
    public static function getErrorCorrectPolynomial($errorCorrectLength) {}
    public static function getMask($maskPattern, $i, $j) {}
    /** / */
    public static function getLostPoint($qrCode) {}
    public static function getMode($s) {}
    public static function isNumber($s) {}
    public static function isAlphaNum($s) {}
    public static function isKanji($s) {}
    public static function toCharCode($s) {}
    public static function getBCHTypeInfo($data) {}
    public static function getBCHTypeNumber($data) {}
    public static function getBCHDigit($data) {}
}

function a(...$a): \PHML {}
function abbr(...$a): \PHML {}
function abbreviation(...$a): \PHML {}
function accordion(...$a): \PHML {}
function action(...$a): \PHML {}
function address(...$a): \PHML {}
function anchor(...$a): \PHML {}
function area(...$a): \PHML {}
function art(...$a): \PHML {}
function article(...$a): \PHML {}
function aside(...$a): \PHML {}
function audio(...$a): \PHML {}
function avatar(...$a): \PHML {}
function b(...$a): \PHML {}
function bld(...$a): \PHML {}
function block(...$a): \PHML {}
function blockquote(...$a): \PHML {}
function blueprint(...$a): \PHML {}
function body(...$a): \PHML {}
function bold(...$a): \PHML {}
function box(...$a): \PHML {}
function br(...$a): \PHML {}
function bt(...$a): \PHML {}
function btn(...$a): \PHML {}
function bullets(...$a): \PHML {}
function bullet_list(...$a): \PHML {}
function button(...$a): \PHML {}
function c(...$a): \PHML {}
function caption(...$a): \PHML {}
function cell(...$a): \PHML {}
function chapter(...$a): \PHML {}
function char(...$a): \PHML {}
function choice(...$a): \PHML {}
function chooser(...$a): \PHML {}
function circle(...$a): \PHML {}
function citation(...$a): \PHML {}
function click(...$a): \PHML {}
function clip(...$a): \PHML {}
function cmd(...$a): \PHML {}
function code(...$a): \PHML {}
function col(...$a): \PHML {}
function colgroup(...$a): \PHML {}
function cols(...$a): \PHML {}
function column(...$a): \PHML {}
function cont(...$a): \PHML {}
function container(...$a): \PHML {}
function content(...$a): \PHML {}
function css(...$a): \PHML {}
function css_link(...$a): \PHML {}
function d(...$a): \PHML {}
function dd(...$a): \PHML {}
function def(...$a): \PHML {}
function definitions(...$a): \PHML {}
function deleted(...$a): \PHML {}
function desc(...$a): \PHML {}
function description(...$a): \PHML {}
function description_list(...$a): \PHML {}
function details(...$a): \PHML {}
function dialog(...$a): \PHML {}
function div(...$a): \PHML {}
function divider(...$a): \PHML {}
function division(...$a): \PHML {}
function dlist(...$a): \PHML {}
function doc(...$a): \PHML {}
function drawer(...$a): \PHML {}
function dropdown(...$a): \PHML {}
function dt(...$a): \PHML {}
function dv(...$a): \PHML {}
function edit(...$a): \PHML {}
function element(...$a): \PHML {}
function em(...$a): \PHML {}
function emphasis(...$a): \PHML {}
function enter(...$a): \PHML {}
function entry(...$a): \PHML {}
function excerpt(...$a): \PHML {}
function expandable(...$a): \PHML {}
function f(...$a): \PHML {}
function feDisplacementMap(...$a): \PHML {}
function feTurbulence(...$a): \PHML {}
function field(...$a): \PHML {}
function fieldset(...$a): \PHML {}
function fig(...$a): \PHML {}
function figcap(...$a): \PHML {}
function figcaption(...$a): \PHML {}
function figure(...$a): \PHML {}
function filter(...$a): \PHML {}
function foot(...$a): \PHML {}
function footer(...$a): \PHML {}
function form(...$a): \PHML {}
function frame(...$a): \PHML {}
function frm(...$a): \PHML {}
function g(...$a): \PHML {}
function gap(...$a): \PHML {}
function go(...$a): \PHML {}
function graphic(...$a): \PHML {}
function grid(...$a): \PHML {}
function group(...$a): \PHML {}
function h1(...$a): \PHML {}
function h2(...$a): \PHML {}
function h3(...$a): \PHML {}
function h4(...$a): \PHML {}
function h5(...$a): \PHML {}
function h6(...$a): \PHML {}
function head(...$a): \PHML {}
function head1(...$a): \PHML {}
function head2(...$a): \PHML {}
function head3(...$a): \PHML {}
function head4(...$a): \PHML {}
function head5(...$a): \PHML {}
function head6(...$a): \PHML {}
function highlight(...$a): \PHML {}
function horizontal_rule(...$a): \PHML {}
function hr(...$a): \PHML {}
function href(...$a): \PHML {}
function html(...$a): \PHML {}
function hyperlink(...$a): \PHML {}
function i(...$a): \PHML {}
function icon(...$a): \PHML {}
function iframe(...$a): \PHML {}
function illustration(...$a): \PHML {}
function image(...$a): \PHML {}
function img(...$a): \PHML {}
function import(...$args) {}
function important(...$a): \PHML {}
function in(...$a): \PHML {}
function info(...$a): \PHML {}
function inline(...$a): \PHML {}
function inp(...$a): \PHML {}
function input(...$a): \PHML {}
function italic(...$a): \PHML {}
function item(...$a): \PHML {}
function javascript(...$a): \PHML {}
function js(...$a): \PHML {}
function label(...$a): \PHML {}
function lbl(...$a): \PHML {}
function legend(...$a): \PHML {}
function li(...$a): \PHML {}
function line(...$a): \PHML {}
function lines(...$a): \PHML {}
function line_break(...$a): \PHML {}
function location(...$a): \PHML {}
function main(...$a): \PHML {}
function mark(...$a): \PHML {}
function media(...$a): \PHML {}
function meta(...$a): \PHML {}
function metadata(...$a): \PHML {}
function modal(...$a): \PHML {}
function movie(...$a): \PHML {}
function music(...$a): \PHML {}
function nav(...$a): \PHML {}
function navbar(...$a): \PHML {}
function navigation(...$a): \PHML {}
function newline(...$a): \PHML {}
function node(...$a): \PHML {}
function note(...$a): \PHML {}
function numbered(...$a): \PHML {}
function ol(...$a): \PHML {}
function olist(...$a): \PHML {}
function opt(...$a): \PHML {}
function optgroup(...$a): \PHML {}
function option(...$a): \PHML {}
function options(...$a): \PHML {}
function ordered(...$a): \PHML {}
function orderedList(...$a): \PHML {}
function overlay(...$a): \PHML {}
function p(...$a): \PHML {}
function page_header(...$a): \PHML {}
function page_top(...$a): \PHML {}
function panel(...$a): \PHML {}
function para(...$a): \PHML {}
function paragraph(...$a): \PHML {}
function part(...$a): \PHML {}
function path(...$a): \PHML {}
function phjs($human) {}
function phml($dsl) {}
function phml_internal_builder(string $tag, ...$args): \PHML {}
function photo(...$a): \PHML {}
function phrase(...$a): \PHML {}
function pic(...$a): \PHML {}
function picker(...$a): \PHML {}
function picture(...$a): \PHML {}
function point(...$a): \PHML {}
function polygon(...$a): \PHML {}
function polyline(...$a): \PHML {}
function popup(...$a): \PHML {}
function post(...$a): \PHML {}
function pre(...$a): \PHML {}
function preformatted(...$a): \PHML {}
function press(...$a): \PHML {}
function push(...$a): \PHML {}
function quote(...$a): \PHML {}
function r(...$a): \PHML {}
function rect(...$a): \PHML {}
function ref(...$a): \PHML {}
function requireDirectory($directory) {}
function resource(...$a): \PHML {}
function root(...$a): \PHML {}
function row(...$a): \PHML {}
function rows(...$a): \PHML {}
function rule(...$a): \PHML {}
function s(...$a): \PHML {}
function script(...$a): \PHML {}
function sec(...$a): \PHML {}
function section(...$a): \PHML {}
function segment(...$a): \PHML {}
function select(...$a): \PHML {}
function selection(...$a): \PHML {}
function separator(...$a): \PHML {}
function sheet(...$a): \PHML {}
function short(...$a): \PHML {}
function sidebar(...$a): \PHML {}
function small(...$a): \PHML {}
function snippet(...$a): \PHML {}
function sound(...$a): \PHML {}
function source(...$a): \PHML {}
function sp(...$a): \PHML {}
function span(...$a): \PHML {}
function spreadsheet(...$a): \PHML {}
function statement(...$a): \PHML {}
function steps(...$a): \PHML {}
function story(...$a): \PHML {}
function strike(...$a): \PHML {}
function strong(...$a): \PHML {}
function style(...$a): \PHML {}
function stylesheet(...$a): \PHML {}
function style_link(...$a): \PHML {}
function sub(...$a): \PHML {}
function submit(...$a): \PHML {}
function subscript(...$a): \PHML {}
function subtitle(...$a): \PHML {}
function summary(...$a): \PHML {}
function sup(...$a): \PHML {}
function superscript(...$a): \PHML {}
function svg(...$a): \PHML {}
function syntax(...$a): \PHML {}
function ta(...$a): \PHML {}
function table(...$a): \PHML {}
function tbl(...$a): \PHML {}
function tbody(...$a): \PHML {}
function td(...$a): \PHML {}
function template(...$a): \PHML {}
function term(...$a): \PHML {}
function text(...$a): \PHML {}
function textarea(...$a): \PHML {}
function textbox(...$a): \PHML {}
function tfoot(...$a): \PHML {}
function th(...$a): \PHML {}
function thead(...$a): \PHML {}
function thumb(...$a): \PHML {}
function tiny(...$a): \PHML {}
function title(...$a): \PHML {}
function title1(...$a): \PHML {}
function title2(...$a): \PHML {}
function title3(...$a): \PHML {}
function title4(...$a): \PHML {}
function title5(...$a): \PHML {}
function title6(...$a): \PHML {}
function tjs($dsl) {}
function tmp(...$a): \PHML {}
function tmpl(...$a): \PHML {}
function to(...$a): \PHML {}
function tpl(...$a): \PHML {}
function tr(...$a): \PHML {}
function track(...$a): \PHML {}
function trigger(...$a): \PHML {}
function txt(...$a): \PHML {}
function u(...$a): \PHML {}
function ul(...$a): \PHML {}
function ulist(...$a): \PHML {}
function underline(...$a): \PHML {}
function unordered(...$a): \PHML {}
function uri(...$a): \PHML {}
function url(...$a): \PHML {}
function variable(...$a): \PHML {}
function vector(...$a): \PHML {}
function vertical_divider(...$a): \PHML {}
function vertical_line(...$a): \PHML {}
function vertical_rule(...$a): \PHML {}
function vid(...$a): \PHML {}
function video(...$a): \PHML {}
function visual(...$a): \PHML {}
function vline(...$a): \PHML {}
function vr(...$a): \PHML {}
function word(...$a): \PHML {}
function wrap(...$a): \PHML {}
function wrapper(...$a): \PHML {}
function zone(...$a): \PHML {}
function _a(...$a): \PHML {}
function _abbr(...$a): \PHML {}
function _abbreviation(...$a): \PHML {}
function _accordion(...$a): \PHML {}
function _action(...$a): \PHML {}
function _address(...$a): \PHML {}
function _anchor(...$a): \PHML {}
function _area(...$a): \PHML {}
function _art(...$a): \PHML {}
function _article(...$a): \PHML {}
function _aside(...$a): \PHML {}
function _audio(...$a): \PHML {}
function _avatar(...$a): \PHML {}
function _b(...$a): \PHML {}
function _bld(...$a): \PHML {}
function _block(...$a): \PHML {}
function _blockquote(...$a): \PHML {}
function _blueprint(...$a): \PHML {}
function _body(...$a): \PHML {}
function _bold(...$a): \PHML {}
function _box(...$a): \PHML {}
function _br(...$a): \PHML {}
function _break(...$a): \PHML {}
function _bt(...$a): \PHML {}
function _btn(...$a): \PHML {}
function _bullets(...$a): \PHML {}
function _bullet_list(...$a): \PHML {}
function _button(...$a): \PHML {}
function _c(...$a): \PHML {}
function _caption(...$a): \PHML {}
function _cell(...$a): \PHML {}
function _chapter(...$a): \PHML {}
function _char(...$a): \PHML {}
function _choice(...$a): \PHML {}
function _chooser(...$a): \PHML {}
function _circle(...$a): \PHML {}
function _citation(...$a): \PHML {}
function _click(...$a): \PHML {}
function _clip(...$a): \PHML {}
function _cmd(...$a): \PHML {}
function _code(...$a): \PHML {}
function _col(...$a): \PHML {}
function _colgroup(...$a): \PHML {}
function _cols(...$a): \PHML {}
function _column(...$a): \PHML {}
function _cont(...$a): \PHML {}
function _container(...$a): \PHML {}
function _content(...$a): \PHML {}
function _css(...$a): \PHML {}
function _css_link(...$a): \PHML {}
function _d(...$a): \PHML {}
function _dd(...$a): \PHML {}
function _def(...$a): \PHML {}
function _definitions(...$a): \PHML {}
function _deleted(...$a): \PHML {}
function _desc(...$a): \PHML {}
function _description(...$a): \PHML {}
function _description_list(...$a): \PHML {}
function _details(...$a): \PHML {}
function _dialog(...$a): \PHML {}
function _div(...$a): \PHML {}
function _divider(...$a): \PHML {}
function _division(...$a): \PHML {}
function _dl(...$a): \PHML {}
function _dlist(...$a): \PHML {}
function _doc(...$a): \PHML {}
function _drawer(...$a): \PHML {}
function _dropdown(...$a): \PHML {}
function _dt(...$a): \PHML {}
function _dv(...$a): \PHML {}
function _edit(...$a): \PHML {}
function _element(...$a): \PHML {}
function _em(...$a): \PHML {}
function _emphasis(...$a): \PHML {}
function _enter(...$a): \PHML {}
function _entry(...$a): \PHML {}
function _excerpt(...$a): \PHML {}
function _expandable(...$a): \PHML {}
function _f(...$a): \PHML {}
function _feDisplacementMap(...$a): \PHML {}
function _feTurbulence(...$a): \PHML {}
function _field(...$a): \PHML {}
function _fieldset(...$a): \PHML {}
function _fig(...$a): \PHML {}
function _figcap(...$a): \PHML {}
function _figcaption(...$a): \PHML {}
function _figure(...$a): \PHML {}
function _filter(...$a): \PHML {}
function _foot(...$a): \PHML {}
function _footer(...$a): \PHML {}
function _form(...$a): \PHML {}
function _frame(...$a): \PHML {}
function _frm(...$a): \PHML {}
function _g(...$a): \PHML {}
function _gap(...$a): \PHML {}
function _go(...$a): \PHML {}
function _graphic(...$a): \PHML {}
function _grid(...$a): \PHML {}
function _group(...$a): \PHML {}
function _h1(...$a): \PHML {}
function _h2(...$a): \PHML {}
function _h3(...$a): \PHML {}
function _h4(...$a): \PHML {}
function _h5(...$a): \PHML {}
function _h6(...$a): \PHML {}
function _head(...$a): \PHML {}
function _head1(...$a): \PHML {}
function _head2(...$a): \PHML {}
function _head3(...$a): \PHML {}
function _head4(...$a): \PHML {}
function _head5(...$a): \PHML {}
function _head6(...$a): \PHML {}
function _header(...$a): \PHML {}
function _highlight(...$a): \PHML {}
function _horizontal_rule(...$a): \PHML {}
function _hr(...$a): \PHML {}
function _href(...$a): \PHML {}
function _html(...$a): \PHML {}
function _hyperlink(...$a): \PHML {}
function _i(...$a): \PHML {}
function _icon(...$a): \PHML {}
function _iframe(...$a): \PHML {}
function _illustration(...$a): \PHML {}
function _image(...$a): \PHML {}
function _img(...$a): \PHML {}
function _important(...$a): \PHML {}
function _in(...$a): \PHML {}
function _info(...$a): \PHML {}
function _inline(...$a): \PHML {}
function _inp(...$a): \PHML {}
function _input(...$a): \PHML {}
function _italic(...$a): \PHML {}
function _item(...$a): \PHML {}
function _javascript(...$a): \PHML {}
function _js(...$a): \PHML {}
function _label(...$a): \PHML {}
function _lbl(...$a): \PHML {}
function _legend(...$a): \PHML {}
function _li(...$a): \PHML {}
function _line(...$a): \PHML {}
function _lines(...$a): \PHML {}
function _line_break(...$a): \PHML {}
function _link(...$a): \PHML {}
function _list(...$a): \PHML {}
function _location(...$a): \PHML {}
function _main(...$a): \PHML {}
function _mark(...$a): \PHML {}
function _media(...$a): \PHML {}
function _meta(...$a): \PHML {}
function _metadata(...$a): \PHML {}
function _modal(...$a): \PHML {}
function _movie(...$a): \PHML {}
function _music(...$a): \PHML {}
function _nav(...$a): \PHML {}
function _navbar(...$a): \PHML {}
function _navigation(...$a): \PHML {}
function _newline(...$a): \PHML {}
function _node(...$a): \PHML {}
function _note(...$a): \PHML {}
function _numbered(...$a): \PHML {}
function _ol(...$a): \PHML {}
function _olist(...$a): \PHML {}
function _opt(...$a): \PHML {}
function _optgroup(...$a): \PHML {}
function _option(...$a): \PHML {}
function _options(...$a): \PHML {}
function _ordered(...$a): \PHML {}
function _orderedList(...$a): \PHML {}
function _overlay(...$a): \PHML {}
function _p(...$a): \PHML {}
function _page_header(...$a): \PHML {}
function _page_top(...$a): \PHML {}
function _panel(...$a): \PHML {}
function _para(...$a): \PHML {}
function _paragraph(...$a): \PHML {}
function _part(...$a): \PHML {}
function _path(...$a): \PHML {}
function _photo(...$a): \PHML {}
function _phrase(...$a): \PHML {}
function _pic(...$a): \PHML {}
function _picker(...$a): \PHML {}
function _picture(...$a): \PHML {}
function _point(...$a): \PHML {}
function _polygon(...$a): \PHML {}
function _polyline(...$a): \PHML {}
function _popup(...$a): \PHML {}
function _post(...$a): \PHML {}
function _pre(...$a): \PHML {}
function _preformatted(...$a): \PHML {}
function _press(...$a): \PHML {}
function _push(...$a): \PHML {}
function _quote(...$a): \PHML {}
function _r(...$a): \PHML {}
function _rect(...$a): \PHML {}
function _ref(...$a): \PHML {}
function _resource(...$a): \PHML {}
function _root(...$a): \PHML {}
function _row(...$a): \PHML {}
function _rows(...$a): \PHML {}
function _rule(...$a): \PHML {}
function _s(...$a): \PHML {}
function _script(...$a): \PHML {}
function _sec(...$a): \PHML {}
function _section(...$a): \PHML {}
function _segment(...$a): \PHML {}
function _select(...$a): \PHML {}
function _selection(...$a): \PHML {}
function _separator(...$a): \PHML {}
function _sheet(...$a): \PHML {}
function _short(...$a): \PHML {}
function _sidebar(...$a): \PHML {}
function _small(...$a): \PHML {}
function _snippet(...$a): \PHML {}
function _sound(...$a): \PHML {}
function _source(...$a): \PHML {}
function _sp(...$a): \PHML {}
function _span(...$a): \PHML {}
function _spreadsheet(...$a): \PHML {}
function _statement(...$a): \PHML {}
function _steps(...$a): \PHML {}
function _story(...$a): \PHML {}
function _strike(...$a): \PHML {}
function _strong(...$a): \PHML {}
function _style(...$a): \PHML {}
function _stylesheet(...$a): \PHML {}
function _style_link(...$a): \PHML {}
function _sub(...$a): \PHML {}
function _submit(...$a): \PHML {}
function _subscript(...$a): \PHML {}
function _subtitle(...$a): \PHML {}
function _summary(...$a): \PHML {}
function _sup(...$a): \PHML {}
function _superscript(...$a): \PHML {}
function _svg(...$a): \PHML {}
function _syntax(...$a): \PHML {}
function _ta(...$a): \PHML {}
function _table(...$a): \PHML {}
function _tbl(...$a): \PHML {}
function _tbody(...$a): \PHML {}
function _td(...$a): \PHML {}
function _template(...$a): \PHML {}
function _term(...$a): \PHML {}
function _text(...$a): \PHML {}
function _textarea(...$a): \PHML {}
function _textbox(...$a): \PHML {}
function _tfoot(...$a): \PHML {}
function _th(...$a): \PHML {}
function _thead(...$a): \PHML {}
function _thumb(...$a): \PHML {}
function _tiny(...$a): \PHML {}
function _title(...$a): \PHML {}
function _title1(...$a): \PHML {}
function _title2(...$a): \PHML {}
function _title3(...$a): \PHML {}
function _title4(...$a): \PHML {}
function _title5(...$a): \PHML {}
function _title6(...$a): \PHML {}
function _tmp(...$a): \PHML {}
function _tmpl(...$a): \PHML {}
function _to(...$a): \PHML {}
function _tpl(...$a): \PHML {}
function _tr(...$a): \PHML {}
function _track(...$a): \PHML {}
function _trigger(...$a): \PHML {}
function _txt(...$a): \PHML {}
function _u(...$a): \PHML {}
function _ul(...$a): \PHML {}
function _ulist(...$a): \PHML {}
function _underline(...$a): \PHML {}
function _unordered(...$a): \PHML {}
function _uri(...$a): \PHML {}
function _url(...$a): \PHML {}
function _var(...$a): \PHML {}
function _variable(...$a): \PHML {}
function _vector(...$a): \PHML {}
function _vertical_divider(...$a): \PHML {}
function _vertical_line(...$a): \PHML {}
function _vertical_rule(...$a): \PHML {}
function _vid(...$a): \PHML {}
function _video(...$a): \PHML {}
function _visual(...$a): \PHML {}
function _vline(...$a): \PHML {}
function _vr(...$a): \PHML {}
function _word(...$a): \PHML {}
function _wrap(...$a): \PHML {}
function _wrapper(...$a): \PHML {}
function _zone(...$a): \PHML {}
