<?php 


use Core\Response;


function dd($values_array) 
{
    foreach ($values_array as $key => $value) {
        echo "<pre>";
        echo "<strong>{$key}: </strong>";
        echo "<br>";
        echo "<br>";
        var_dump($value);
        echo "<br>";
        echo "<hr>";
        echo "</pre>";
    }
    
    die();
}


function urlIS($value) {
    return $_SERVER['REQUEST_URI'] === $value;
};


function abort($code = 404) {
    http_response_code($code);

    view("404.php");

    die();
}


function authorize($condition, $status = Response::FORBIDDEN) {
    if (! $condition) {
        abort($status);
    }
};


function base_path($path)
{
    return BASE_PATH . $path;
}


function view($path, $attributes = [])
{
    extract($attributes);   
    require base_path('views/' . $path);
}


function redirect($path)
{
    header("location: {$path}");
    exit();
}


function old($key, $default = '')
{
    return Core\Session::get('old')[$key] ?? $default;
}


function isset_post($key, $default = null) {

    if (isset($_POST[$key])) {
        return $_POST[$key];
    } else {
        return $default;
    }
    
}