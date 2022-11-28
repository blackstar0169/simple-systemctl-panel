<?php
namespace App\Lib;


class JsonResponse extends Response {

    protected $headers = [
        'Content-Type' => 'application/json'
    ];
}
