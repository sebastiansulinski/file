<?php

namespace SSD\File;

use SSD\File\Exception\MethodNotFound;

class Size
{
    /**
     * Value to use in kilobyte multiplication.
     *
     * @var int
     */
    const KB_MULTIPLY_VALUE = 1024;

    /**
     * Value to use in megabyte multiplication.
     *
     * @var int
     */
    const MB_MULTIPLY_VALUE = 1048576;

    /**
     * Byte postfix.
     *
     * @var string
     */
    const B_POSTFIX = "B";

    /**
     * Kilobyte postfix.
     *
     * @var string
     */
    const KB_POSTFIX = "KB";

    /**
     * Megabyte postfix.
     *
     * @var string
     */
    const MB_POSTFIX = "MB";

    /**
     * File size in bytes.
     *
     * @var int
     */
    private $size;

    /**
     * Size constructor.
     *
     * @param \SSD\File\File $file
     */
    public function __construct(File $file)
    {
        $this->size = filesize($file->path());
    }

    /**
     * Return file size in bytes.
     *
     * @return int
     */
    public function inBytes(): int
    {
        return $this->size;
    }

    /**
     * Return file size in bytes with postfix.
     *
     * @param  string $concatenator
     * @return string
     */
    public function inBytesPostfix(string $concatenator = ''): string
    {
        return $this->size.$concatenator.static::B_POSTFIX;
    }

    /**
     * Return file size in KB.
     *
     * @param  int $decimal
     * @return float
     */
    public function inKiloBytes(int $decimal = 2): float
    {
        return number_format($this->size / static::KB_MULTIPLY_VALUE, $decimal);
    }

    /**
     * Return file size in KB with postfix.
     *
     * @param  int $decimal
     * @param  string $concatenator
     * @return string
     */
    public function inKiloBytesPostfix(int $decimal = 2, string $concatenator = ''): string
    {
        return $this->inKiloBytes($decimal).$concatenator.static::KB_POSTFIX;
    }

    /**
     * Return file size in MB.
     *
     * @param  int $decimal
     * @return float
     */
    public function inMegaBytes(int $decimal = 2): float
    {
        return number_format($this->size / static::MB_MULTIPLY_VALUE, $decimal);
    }

    /**
     * Return file size in MB with postfix.
     *
     * @param  int $decimal
     * @param  string $concatenator
     * @return string
     */
    public function inMegaBytesPostfix($decimal = 2, string $concatenator = ''): string
    {
        return $this->inMegaBytes($decimal).$concatenator.static::MB_POSTFIX;
    }

    /**
     * Get Size instance as string.
     *
     * @return string
     */
    public function toString(): string
    {
        return $this->__toString();
    }

    /**
     * Get Size instance as string..
     *
     * @return string
     */
    public function __toString(): string
    {
        return json_encode([
            'bytes' => $this->inBytes(),
            'bytes_postfix' => $this->inBytesPostfix(),
            'kilobytes' => $this->inKiloBytes(),
            'kilobytes_postfix' => $this->inKiloBytesPostfix(),
            'megabytes' => $this->inMegaBytes(),
            'megabytes_postfix' => $this->inMegaBytesPostfix(),
        ]);
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
        throw new MethodNotFound;
    }
}