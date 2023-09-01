<?php

namespace config;

class Env
{
    public function __construct()
    {
        $envFilePath = __DIR__ . '/../.env';
        if (file_exists($envFilePath)) {
           
            $lines = file($envFilePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                list($key, $value) = explode('=', $line, 2);
                putenv("$key=$value");
            }
        }
    }
    public function get($key)
    {  
        
        $value = getenv("{$key}");
        return $value;
    }
}
