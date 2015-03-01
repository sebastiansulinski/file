<?php

namespace SSD\File\Type;


use \SSD\File\FileInterface;


class Image extends BaseType implements FileInterface {

    /**
     * Width of the image.
     *
     * @var int
     */
    private $width;

    /**
     * Height of the image.
     *
     * @var int
     */
    private $height;

    /**
     * Type of the image.
     *
     * @var string
     */
    private $type;

    /** Additional attributes
     *
     * @var array
     */
    private $attributes = [];




    /**
     * Extract information about the file.
     *
     * @return void
     */
    private function processGetImageSize()
    {

        list(
            $this->width,
            $this->height,
            $this->type,
            $this->attributes
            ) = getimagesize($this->file->withPath());
    }


    /**
     * Return width of the file.
     *
     * @return int
     */
    public function width()
    {

        if (empty($this->width)) {

            $this->processGetImageSize();

        }

        return $this->width;

    }


    /**
     * Return height of the file.
     *
     * @return int
     */
    public function height()
    {

        if (empty($this->height)) {

            $this->processGetImageSize();

        }

        return $this->height;

    }


    /**
     * Return type of the file.
     *
     * @return string
     */
    public function type()
    {

        if (empty($this->type)) {

            $this->processGetImageSize();

        }

        return $this->type;

    }


    /**
     * Return additional attributes.
     *
     * @return array
     */
    public function attributes()
    {

        if (empty($this->attributes)) {

            $this->processGetImageSize();

        }

        return $this->attributes;

    }


    /**
     * Return file data as string.
     *
     * @return string
     */
    public function __toString()
    {

        return $this->formatToString(
            [
                'width' => $this->width(),
                'height' => $this->height(),
                'type' => $this->type(),
                'extension' => $this->extension(),
                'size in bytes' => $this->fileSize()->inBytes(),
                'size in bytes postfix' => $this->fileSize()->inBytesPostfix(),
                'size in kilo bytes' => $this->fileSize()->inKiloBytes(2),
                'size in kilo bytes postfix' => $this->fileSize()->inKiloBytesPostfix(2),
                'size in mega bytes' => $this->fileSize()->inMegaBytes(2),
                'size in mega bytes postfix' => $this->fileSize()->inMegaBytesPostfix(2),
                'file name' => $this->fileName(),
                'file name without extension' => $this->fileNameWithoutExtension(),
                'file with path' => $this->fileWithPath(),
                'mime type' => $this->mimeType()
            ]
        );

    }



}