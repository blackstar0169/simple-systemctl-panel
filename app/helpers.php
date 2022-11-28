<?php
use App\Lib\Response;
use App\App;
use App\Lib\JsonResponse;

function env() {

}

function app() {
    return App::getInstance();
}

function view(string $name, $args = [], $code = 200): Response {
    ob_start();
    extract($args);
    unset($args);
    require BASEDIR.'/resources/views/'.$name.'.php';

    $html = ob_get_clean();
    $response = new Response();
    $response->setBody($html);
    $response->setHeader('Content-Type', 'text/html');
    return $response;
}

function json(array $data = [], $code = 200): JsonResponse {
    ob_start();
    $response = new JsonResponse();
    $response->setBody(json_encode($data));
    $response->setHeader('Content-Type', 'application/json');
    return $response;
}

function assets(string $path): string {
    return BASEURL.'/public/'.ltrim($path, '/\\');
}
