<?php

session_start();

class SwitchRouter
{
    public function route($uri, $method, $body, $path)
    {
        switch ($uri) {
            case '':
                break;
            default:
                echo '404 not found';
                http_response_code(404);
        }
    }
}
