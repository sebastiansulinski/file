<?php

namespace SSD\File;

use SSD\File\Exception\MethodNotFound;
use SSD\File\Exception\InvalidArgument;

/**
 * Class File
 *
 * @package SSD\File
 *
 * @method int sizeInBytes()
 * @method string sizeInBytesPostfix(string $concatenator = '')
 * @method float sizeInKiloBytes(int $decimal = 2)
 * @method string sizeInKiloBytesPostfix(int $decimal = 2, string $concatenator = '')
 * @method float sizeInMegaBytes(int $decimal = 2)
 * @method string sizeInMegaBytesPostfix($decimal = 2, string $concatenator = '')
 * @method string sizeToString()
 */
class File
{
    /**
     * File info.
     *
     * @var array
     */
    private $fileInfo = [];

    /**
     * Absolute file path.
     *
     * @var string
     */
    private $path;

    /**
     * Size instance.
     *
     * @var \SSD\File\Size
     */
    private $size;

    /**
     * Mime instance.
     *
     * @var \SSD\File\Mime
     */
    private $mime;

    /**
     * File constructor.
     *
     * @param  string $filePath
     * @throws \SSD\File\Exception\InvalidArgument
     * @throws \SSD\File\Exception\DependencyNotFound
     */
    public function __construct($filePath)
    {
        $this->path = $filePath;

        $this->validateFile();
        $this->extractProperties();
    }

    /**
     * Check if file exists.
     *
     * @return void
     * @throws \SSD\File\Exception\InvalidArgument
     */
    private function validateFile(): void
    {
        if (!is_file($this->path)) {
            throw new InvalidArgument;
        }
    }

    /**
     * Extract all necessary properties.
     *
     * @return void
     * @throws \SSD\File\Exception\DependencyNotFound
     */
    private function extractProperties(): void
    {
        $this->fileInfo = pathinfo($this->path);

        $this->extractSize();
        $this->extractMime();
    }

    /**
     * Instantiate FileSize.
     *
     * @return void
     */
    private function extractSize(): void
    {
        $this->size = new Size($this);
    }

    /**
     * Instantiate Mime.
     *
     * @return void
     * @throws \SSD\File\Exception\DependencyNotFound
     */
    private function extractMime(): void
    {
        $this->mime = new Mime($this);
    }

    /**
     * Get absolute file path.
     *
     * @return string
     */
    public function path(): string
    {
        return $this->path;
    }

    /**
     * Get file name with extension.
     *
     * @return string
     */
    public function name(): string
    {
        return $this->fileInfo['basename'];
    }

    /**
     * Get name of the file without extension.
     *
     * @return string
     */
    public function nameWithoutExtension(): string
    {
        return $this->fileInfo['filename'];
    }

    /**
     * Get extension with or without a dot.
     *
     * @param  bool $withDot
     * @return string
     */
    public function extension(bool $withDot = false): string
    {
        if ($withDot) {
            return '.'.$this->fileInfo['extension'];
        }

        return $this->fileInfo['extension'];
    }

    /**
     * Get Mime.
     *
     * @return string
     */
    public function mimeType(): string
    {
        return $this->mime->type();
    }

    /**
     * Delegate method call.
     *
     * @param  string $name
     * @param  array $arguments
     * @return mixed
     * @throws \SSD\File\Exception\MethodNotFound
     */
    public function __call(string $name, array $arguments = [])
    {
        if (substr($name, 0, 4) !== 'size') {
            throw new MethodNotFound;
        }

        $methodName = lcfirst(substr($name, 4));

        return $this->size->{$methodName}(...$arguments);
    }
}