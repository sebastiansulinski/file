<?php

namespace SSD\File\Type;


use \SSD\File\FileInterface;


class Image extends BaseType implements FileInterface {

    /**
     * @var
     */
    private $width;

    /**
     * @var
     */
    private $height;

    /**
     * @var
     */
    private $type;

    /**
     * @var
     */
    private $attributes;




    /**
     * @return void
     */
    protected function processPath()
    {

        $this->processGetImageSize();

        $this->processFileSize();

    }


    /**
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
     * @return mixed
     */
    public function width()
    {

        return $this->width;

    }


    /**
     * @return mixed
     */
    public function height()
    {

        return $this->height;

    }


    /**
     * @return mixed
     */
    public function type()
    {

        return $this->type;

    }


    /**
     * @return mixed
     */
    public function attributes()
    {

        return $this->attributes;

    }


    /**
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