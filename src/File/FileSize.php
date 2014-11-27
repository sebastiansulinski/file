<?php

namespace SSD\File;


class FileSize {

    const KB_MULTIPLY_VALUE = 1024;

    const MB_MULTIPLY_VALUE = 1048576;

    const B_POSTFIX = "B";

    const KB_POSTFIX = "KB";

    const MB_POSTFIX = "MB";

    const CONCATENATOR = " ";

    /**
     * @var int
     */
    private $size;



    /**
     * @param File $file
     */
    function __construct(File $file)
    {

        $this->size = filesize($file->withPath());

    }


    /**
     * @return int
     */
    public function inBytes()
    {

        return $this->size;

    }


    /**
     * @return string
     */
    public function inBytesPostfix()
    {

        return $this->size.static::CONCATENATOR.static::B_POSTFIX;

    }


    /**
     * @param int $decimal
     *
     * @return float
     */
    public function inKiloBytes($decimal = 2)
    {

        return round($this->size / static::KB_MULTIPLY_VALUE, $decimal);

    }


    /**
     * @param int $decimal
     *
     * @return string
     */
    public function inKiloBytesPostfix($decimal = 2)
    {

        return $this->inKiloBytes($decimal).static::CONCATENATOR.static::KB_POSTFIX;

    }


    /**
     * @param int $decimal
     *
     * @return float
     */
    public function inMegaBytes($decimal = 2)
    {

        return round($this->size / static::MB_MULTIPLY_VALUE, $decimal);

    }


    /**
     * @param int $decimal
     *
     * @return string
     */
    public function inMegaBytesPostfix($decimal = 2)
    {

        return $this->inMegaBytes($decimal).static::CONCATENATOR.static::MB_POSTFIX;

    }


    /**
     * @return string
     */
    public function __toString()
    {

        return "{$this->inBytes()}";

    }


}