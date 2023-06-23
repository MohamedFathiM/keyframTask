<?php

namespace App\Keyframe;

use App\Keyframe\Contracts\IConfig;

require "../vendor/autoload.php";

class Config implements IConfig
{
    private $configs = [];

    public function feedFromEnv(): array
    {
        $envContent = file_get_contents(__DIR__ . '/../.env');
        $partial = explode(PHP_EOL, $envContent);

        $final = [];
        array_walk($partial, function ($val, $key) use (&$final) {
            list($key, $value) = explode('=', $val);
            $final[$key] = $value;
        });

        return $final;
    }

    public function readFile($file)
    {
        $configs = include "../config/$file.php";

        $this->configs = $configs;

        return $this;
    }

    public function get(string $key): ?string
    {
        return $this->configs[$key];
    }
}
