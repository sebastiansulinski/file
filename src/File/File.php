<?php

namespace SSD\File;


use \SSD\File\Exception\InvalidArgument;
use \SSD\File\Mime\Mime;


class File {

    /**
     * @var
     */
    private $fileWithPath;

    /**
     * @var
     */
    private $fileName;

    /**
     * @var
     */
    private $fileNameWithoutExtension;

    /**
     * @var
     */
    private $extension;


    /**
     * @var Mime
     */
    private $mime;



    /**
     * @param $fileWithPath
     *
     * @throws InvalidArgument
     */
    function __construct($fileWithPath)
    {

        $this->validateFile($fileWithPath);

        $this->extractProperties($fileWithPath);

    }


    /**
     * @param $fileWithPath
     *
     * @throws InvalidArgument
     *
     * @return void
     */
    private function validateFile($fileWithPath)
    {

        if (! is_file($fileWithPath)) {

            throw new InvalidArgument;

        }

    }


    /**
     * @return void
     */
    private function extractFileName()
    {

        $pathArray = explode(
            DIRECTORY_SEPARATOR,
            $this->fileWithPath
        );

        $this->fileName = array_pop($pathArray);

    }


    /**
     * @return void
     */
    private function extractExtension()
    {

        $nameParts = explode('.', $this->fileName);
        $this->extension = strtolower(array_pop($nameParts));

    }


    /**
     * @return void
     */
    private function extractFileNameWithoutExtension()
    {

        $this->fileNameWithoutExtension = rtrim($this->fileName, $this->extension(true));

    }


    /**
     * @return void
     */
    private function extractMime()
    {

        $this->mime = new Mime($this);

    }


    /**
     * @param $fileWithPath
     *
     * @return void
     */
    private function extractProperties($fileWithPath)
    {

        $this->fileWithPath = $fileWithPath;

        $this->extractFileName();

        $this->extractExtension();

        $this->extractFileNameWithoutExtension();

        $this->extractMime();

    }


    /**
     * @return mixed
     */
    public function withPath()
    {

        return $this->fileWithPath;

    }


    /**
     * @return mixed
     */
    public function name()
    {

        return $this->fileName;

    }


    /**
     * @return mixed
     */
    public function nameWithoutExtension()
    {

        return $this->fileNameWithoutExtension;

    }


    /**
     * @param bool $dot
     *
     * @return string
     */
    public function extension($dot = false)
    {

        return $dot ? '.'.$this->extension : $this->extension;

    }


    /**
     * @return Mime
     */
    public function mime()
    {

        return $this->mime;

    }




}