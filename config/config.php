<?php

use App\Keyframe\Config;

$configs = (new Config)->feedFromEnv();

return [
    'limit' => $configs['limit']
];
