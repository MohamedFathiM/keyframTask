<?php

namespace App\Keyframe\Contracts;

interface ILogViewer
{
    public function streamFile(int $page = 1): string;
    public function getLastPage(): string;
}
