<?php

require_once __DIR__ . '/../vendor/autoload.php';

use controllers\ProductController;
use controllers\GroupController;

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch (true) {
    case str_starts_with($uri, '/products/create'):
        (new ProductController())->create();
        break;
    case str_starts_with($uri, '/products/edit'):
        (new ProductController())->update();
        break;
    case str_starts_with($uri, '/products/delete'):
        (new ProductController())->delete();
        break;
    case str_starts_with($uri, '/products'):
        (new ProductController())->readList();
        break;

    case $uri === '/groups/create':
        (new GroupController())->create();
        break;
    case $uri === '/groups/edit':
        (new GroupController())->update();
        break;
    case $uri === '/groups/delete':
        (new GroupController())->delete();
        break;
    case $uri === '/groups':
        (new GroupController())->readList();
        break;

    default:
        echo '404 Not Found';
        break;
}
