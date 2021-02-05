<?php

namespace TopDown\Exceptions;

trait Log {
    public function log($message) {
        echo "Gerado log {$message}";
    }
}