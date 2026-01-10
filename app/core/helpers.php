<?php

function abort(int $code = 404, string $message = '')
{
    http_response_code($code);

    if ($code === 403) {
        require __DIR__ . '/../views/errors/403.php';
    } elseif ($code === 404) {
        require __DIR__ . '/../views/errors/404.php';
    } else {
        echo $message ?: 'Error';
    }

    exit;
}
function dd($data)
{
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die();
}
function redirect(string $path)
{
    header('Location: ' . BASE_URL . trim($path, '/'));
    exit;
}
