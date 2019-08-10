<?php

namespace SSD\File\Type;

use SSD\File\File;
use SSD\File\Exception\InvalidFile;

/**
 * Class BaseType
 *
 * @package SSD\File\Type
 *
 * @method string path()
 * @method string name()
 * @method string nameWithoutExtension()
 * @method string extension(bool $withDot = false)
 * @method string mimeType()
 *
 * @method int sizeInBytes()
 * @method string sizeInBytesPostfix(string $concatenator = '')
 * @method float sizeInKiloBytes(int $decimal = 2)
 * @method string sizeInKiloBytesPostfix(int $decimal = 2, string $concatenator = '')
 * @method float sizeInMegaBytes(int $decimal = 2)
 * @method string sizeInMegaBytesPostfix($decimal = 2, string $concatenator = '')
 * @method string sizeToString()
 */
abstract class BaseType
{
    /**
     * File object instance.
     *
     * @var \SSD\File\File
     */
    protected $file;

    /**
     * BaseType constructor.
     *
     * @param  \SSD\File\File $file
     * @throws \SSD\File\Exception\InvalidFile
     */
    public function __construct(File $file)
    {
        $this->file = $file;

        $this->validateFile();
        $this->parseFile();
    }

    /**
     * Validate file.
     *
     * @return void
     * @throws \SSD\File\Exception\InvalidFile
     */
    private function validateFile(): void
    {
        if (!$this->isValid()) {
            throw new InvalidFile;
        }
    }

    /**
     * Determine if file is valid.
     *
     * @return bool
     */
    abstract protected function isValid(): bool;

    /**
     * Parse file.
     *
     * @return void
     */
    abstract protected function parseFile(): void;

    /**
     * Get class instance as array.
     *
     * @return array
     */
    abstract public function toArray(): array;

    /**
     * Get class instance as json.
     *
     * @return string
     */
    public function toJson(): string
    {
        return json_encode($this->toArray());
    }

    /**
     * Get class instance as string.
     *
     * @return string
     */
    public function toString(): string
    {
        return $this->__toString();
    }

    /**
     * Get class instance as string.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }

    /**
     * Delegate method call.
     *
     * @param  string $name
     * @param  array $arguments
     * @return mixed
     */
    public function __call(string $name, array $arguments = [])
    {
        return $this->file->{$name}(...$arguments);
    }
}
