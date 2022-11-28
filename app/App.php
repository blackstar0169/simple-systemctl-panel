<?php

namespace App;

/**
 * Main class
 */
class App {
    protected $singletons = [];
    protected $instances = [];

    protected static $self_instance;

    private function __construct() {

    }

    /**
     * Get instance for class or instance name
     */
    public function make(string $name) {
        if (isset($this->instances[$name])) {
            return $this->instances[$name];
        } if (isset($this->singletons[$name])) {
            $object = $this->singletons[$name];
            if (is_string($object)) {
                $object = new $object();
            } else if (is_callable($object)) {
                $object = $object($this);
            }

            return $object;
        }

        return null;
    }

    /**
     * Get instance for class or instance name
     */
    public function singleton(string $name, $instance = null) {
        if (!$instance) {
            if (class_exists($name)) {
                $instance = $name;
            } else {
                throw new \Exception('Undefined class '.$name);
            }
        }
        $this->singletons[$name] = $instance;
    }

    /**
     * Singleton
     */
    public static function getInstance() {

        if(is_null(self::$self_instance)) {
          self::$self_instance = new self();
        }

        return self::$self_instance;
    }
}
