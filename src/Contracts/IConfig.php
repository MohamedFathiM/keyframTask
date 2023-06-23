<?php

namespace App\Keyframe\Contracts;

interface IConfig
{
    public function get(string $key): ?string;
}
