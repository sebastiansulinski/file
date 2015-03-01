<?php namespace SSD\File;


class FileSize {

    const KB_MULTIPLY_VALUE = 1024;

    const MB_MULTIPLY_VALUE = 1048576;

    const B_POSTFIX = "B";

    const KB_POSTFIX = "KB";

    const MB_POSTFIX = "MB";

    const CONCATENATOR = " ";

    /**
     * File size in bytes.
     *
     * @var int
     */
    private $size;



    /**
     * Constructor.
     *
     * @param File $file
     */
    function __construct(File $file)
    {

        $this->size = filesize($file->withPath());

    }


    /**
     * Return file size in bytes.
     *
     * @return int
     */
    public function inBytes()
    {

        return $this->size;

    }


    /**
     * Return file size in bytes with postfix.
     *
     * @return string
     */
    public function inBytesPostfix()
    {

        return $this->size.static::CONCATENATOR.static::B_POSTFIX;

    }


    /**
     * Return file size in KB.
     *
     * @param int $decimal
     *
     * @return float
     */
    public function inKiloBytes($decimal = 2)
    {

        return round($this->size / static::KB_MULTIPLY_VALUE, $decimal);

    }


    /**
     * Return file size in KB with postfix.
     *
     * @param int $decimal
     *
     * @return string
     */
    public function inKiloBytesPostfix($decimal = 2)
    {

        return $this->inKiloBytes($decimal).static::CONCATENATOR.static::KB_POSTFIX;

    }


    /**
     * Return file size in MB.
     *
     * @param int $decimal
     *
     * @return float
     */
    public function inMegaBytes($decimal = 2)
    {

        return round($this->size / static::MB_MULTIPLY_VALUE, $decimal);

    }


    /**
     * Return file size in MB with postfix.
     *
     * @param int $decimal
     *
     * @return string
     */
    public function inMegaBytesPostfix($decimal = 2)
    {

        return $this->inMegaBytes($decimal).static::CONCATENATOR.static::MB_POSTFIX;

    }


    /**
     * Return file size in bytes as string.
     *
     * @return string
     */
    public function __toString()
    {

        return "{$this->inBytes()}";

    }


}