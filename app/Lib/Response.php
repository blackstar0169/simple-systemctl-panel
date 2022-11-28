<?php

namespace App\Lib;


class Response {
    private $body = '';
    private $headers = [];
    public function setBody(string $body) {
        $this->body = $body;
    }

    public function setHeader(string $name, string $value) {
        $this->headers[$name] = $value;
    }

    public function send() {
        foreach ($this->headers as $key => $value) {
            header($key.': '.$value);
        }
        echo $this->body;
    }
}
