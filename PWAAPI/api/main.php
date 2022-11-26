<?php
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];
$method = isset($_REQUEST['_METHOD']) ? $_REQUEST['_METHOD'] : $method;
$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));
include 'method.php';
// include 'putMethod.php';
switch ($method) {
    case 'PUT':
        process_put($request);
        break;
    case 'POST':
        process_post($request);
        break;
    case 'GET':
        process_get($request);
        break;
    case 'DELETE':
        process_delete($request);
        break;
    case 'OPTIONS':
        process_options($request);
        break;
    default:
        header('HTTP/1.1 405 Method Not Allowed');
        header('Allow: GET, POST, PUT, DELETE, OPTIONS');
        break;
}