<?php
require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../config.php';
define("BASE_PATH", realpath(__DIR__.'/../'));
$viewPath = BASE_PATH.'/src/views';

use GuzzleHttp\Psr7\ServerRequest;

$client = ServerRequest::fromGlobals();
$uri = $client->getRequestTarget();
$httpMethod = $client->getMethod();

$uri = rawurldecode($uri);

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/sw/api/user', 'Api/user');
    $r->addRoute('GET', '/sw/api/user/{id:\d+}', 'Api/user');
    $r->addRoute('GET', '/sw/user', 'user/index');
    $r->addRoute('GET', '/articles/{id:\d+}[/{title}]', 'get_article_handler');
});
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo "404 Not Found";
    break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        echo "405 Method Not Allowed";
    break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        list($class, $method) = explode("/", $handler, 2);
        $class = "\Controllers\\".ucfirst($class)."Controller";
        call_user_func_array(array(new $class, $method), $vars);
    break;
}

function getParameter(&$var)
{
    if (isset($var)) {
        return $var;
    }
}

function message($msg, $code)
{
    header($_SERVER['SERVER_PROTOCOL']." $code $msg");
    header("Content-Type: document");
    echo render('message', [
        'error' => true,
        'message' => $msg,
    ]);
}

function render($view, $scope=[])
{
    global $viewPath;
    global $assestsPath;

    foreach (['view', 'viewPath', 'assestsPath'] as $reserved) {
        if (isset($scope[$reserved])) {
            throw new \InvalidArgumentException("Attempted to use reserved key '$reserved'");
        }
    }

    foreach ($scope as $k=>$v) {
        $$k = $v;
    }
    $view = preg_replace('/[^a-zA-Z\-0-9\/]/', '', $view);

    ob_start();
    require $viewPath.'/'.$view.'.php';
    $out = ob_get_clean();
    echo $out;
}

