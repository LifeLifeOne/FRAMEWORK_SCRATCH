<?php

namespace App\Core;

class Request
{
    /**
     * return the request path
     * @return string
     */
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $pos = strpos($path, '?');

        if ($pos === false) {
            return $path;
        }
        return substr($path, 0, $pos);
    }

    /**
     * return the request method
     * @return string
     */
    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']) ?? 'get'; // ?-> 'get'
    }

    /**
     * return the request body
     * @return array
     */
    public function getBody()
    {
        $body = [];
        if ($this->getMethod() === 'post') {
//            foreach ($_POST as $key => $value) {
//                if ($key == 'email') {
//                    $body['email'] = filter_var($key, FILTER_SANITIZE_EMAIL);
//                    $body['email'] = filter_var($key, FILTER_VALIDATE_EMAIL);
//                }
//                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
//            }
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if ($this->getMethod() === 'get') {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $body;
    }

    /**
     * @return bool
     */
    public function isPost() {
        if ($_POST)
        return true;
    }
}
