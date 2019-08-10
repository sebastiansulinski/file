<?php

namespace SSD\File;

use finfo;
use SSD\File\Exception\DependencyNotFound;

class Mime
{
    /**
     * Instance of the File object.
     *
     * @var \SSD\File\File
     */
    private $file;

    /**
     * File type.
     *
     * @var string
     */
    private $type;

    /**
     * Mime constructor.
     *
     * @param  \SSD\File\File $file
     * @throws \SSD\File\Exception\DependencyNotFound
     */
    public function __construct(File $file)
    {
        $this->file = $file;

        $this->extract();
    }

    /**
     * Extract mime type.
     *
     * @return void
     * @throws \SSD\File\Exception\DependencyNotFound
     */
    private function extract(): void
    {
        if (!class_exists("finfo")) {
            throw new DependencyNotFound("Class 'finfo' is not available");
        }

        $this->type = (new finfo(FILEINFO_MIME_TYPE))->file($this->file->path());
    }

    /**
     * Return the mime type.
     *
     * @return string
     */
    public function type(): string
    {
        return $this->type;
    }
}
