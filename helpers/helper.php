<?php
function siteUri($uri = '')
{
    return $_ENV["BASE_URL"] . $uri;
}
function redirect($path = "")
{
    header("Location:" . siteUri($path));
}
function niceDD($input)
{
    echo "<pre>";
    var_dump($input);
    echo "</pre>";
}

function view($path, $data = [])
{
    $path = str_replace(".", "/", $path);
    extract($data);
    include BASE_PATH . "app/views/$path.php";
}