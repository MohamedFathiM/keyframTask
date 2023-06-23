<?php

namespace App\Keyframe;

use App\Keyframe\Exceptions\FileNotFoundException;

class CheckFile
{
    /**
     * Constructor
     *
     * @param string $file
     * absolute path
     */
    public function __construct(private string $file)
    {
    }

    /**
     * Check if file exists
     *
     */
    public function isFileFound(): bool|FileNotFoundException
    {
        if (is_file($this->file) && file_exists($this->file)) {
            return true;
        }

        throw new FileNotFoundException("File Not Found", 422);
    }
}
