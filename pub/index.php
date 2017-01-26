<?php
require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../config.php';
define("BASE_PATH", realpath(__DIR__.'/../'));

$viewPath = BASE_PATH.'/src/views';

$urlPath = trim($_SERVER['REDIRECT_URL'], '/');
$url = explode('/', $urlPath);

$assestsPath = '//'.$_SERVER['SERVER_NAME'].'/'.$url[0].'/';
$controller = $url[1];

$action = 'index';
if (isset($url[2])) {
    $action = $url[2];
}

$class = "\Controllers\\".$controller."Controller";
if (empty($controller) && !class_exists($class)) {
    message('Page not found ', 404);
} else {
    $controller = new $class();
    if (method_exists($controller, $action)) {
        preg_match("/sw\/api\/user\/(\d+)$/", $urlPath, $match);
        if (!empty($match)) {
            $id = $url[3];
            $response = $controller->$action($id);
        } else {
            $response = $controller->$action();
        }

        if ($response) {
            echo $response;
        }
    } else {
        message('Unknown Action: ' . $action, 404);
    }
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
    return $out;
}

