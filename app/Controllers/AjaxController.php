<?php

namespace App\Controllers;

class AjaxController {
    public function status() {
        return json([
            'status' => 'active',
            'enabled' => true
        ]);
    }
    public function start() {
        return json([]);
    }
    public function stop() {
        return json([]);
    }
    public function restart() {
        return json([]);
    }
}
