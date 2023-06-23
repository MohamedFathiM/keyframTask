<?php

namespace App\Keyframe;

use App\Keyframe\Contracts\ILogViewer;
use App\Keyframe\Exceptions\EndOfFileException;
use LimitIterator;
use SplFileObject;


class LogViewer implements ILogViewer
{
    /**
     * Spl File Object
     */
    private SplFileObject $splFileObject;


    /**
     * Constructor
     *
     * @param string $file
     * absolute path
     */
    public function __construct(private string $file, private int $limit = 10)
    {
        (new CheckFile($this->file))->isFileFound();

        $this->splFileObject = new \SplFileObject($this->file);
    }

    /**
     * Read file line by line
     *
     */
    public function streamFile(int $page = 1): string
    {
        $offset = $this->limit * (max($page, 1) - 1);
        $content = iterator_to_array(new \LimitIterator($this->splFileObject, $offset, $this->limit));

        if (!$content) throw new EndOfFileException("File Is End", 422);

        return implode('<br />', $content);
    }

    /**
     * Get last page of file
     */
    public function getLastPage(): string
    {
        $this->splFileObject->seek($this->splFileObject->getSize());
        $last_line = $this->splFileObject->key();

        $content = iterator_to_array(new LimitIterator($this->splFileObject, $last_line - $this->limit, $this->limit));

        return implode('<br />', $content);
    }
}
