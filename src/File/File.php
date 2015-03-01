<?php

namespace SSD\File;


use SSD\File\Exception\InvalidArgument;
use SSD\File\Mime\Mime;


class File {

    /**
     * Path to the file including file name.
     *
     * @var string
     */
    private $fileWithPath;

    /**
     * File name.
     *
     * @var string
     */
    private $fileName;

    /**
     * File name without extension.
     *
     * @var string
     */
    private $fileNameWithoutExtension;

    /**
     * Extension without a dot.
     *
     * @var string
     */
    private $extension;


    /**
     * Mime object instance.
     *
     * @var Mime
     */
    private $mime;



    /**
     * Constructor.
     *
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
     * Check if file exists.
     *
     * @param $fileWithPath
     *
     * @throws InvalidArgument
     *
     * @return void
     */
    private function validateFile($fileWithPath)
    {

        if ( ! is_file($fileWithPath)) {

            throw new InvalidArgument;

        }

    }


    /**
     * Extract the name of the file.
     *
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
     * Extract extension of the file.
     *
     * @return void
     */
    private function extractExtension()
    {

        $nameParts = explode('.', $this->fileName);
        $this->extension = strtolower(array_pop($nameParts));

    }


    /**
     * Extract file name without the extension.
     *
     * @return void
     */
    private function extractFileNameWithoutExtension()
    {

        $this->fileNameWithoutExtension = rtrim($this->fileName, $this->extension(true));

    }


    /**
     * Instantiate Mime object based on current object.
     *
     * @return void
     */
    private function extractMime()
    {

        $this->mime = new Mime($this);

    }


    /**
     * Extract all necessary properties.
     *
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
     * Return name of the file with full path.
     *
     * @return string
     */
    public function withPath()
    {

        return $this->fileWithPath;

    }


    /**
     * Return name of the file.
     *
     * @return mixed
     */
    public function name()
    {

        return $this->fileName;

    }


    /**
     * Return name of the file without extension.
     *
     * @return mixed
     */
    public function nameWithoutExtension()
    {

        return $this->fileNameWithoutExtension;

    }


    /**
     * Return extension with or without a dot.
     *
     * @param bool $dot
     *
     * @return string
     */
    public function extension($dot = false)
    {

        return $dot ? '.'.$this->extension : $this->extension;

    }


    /**
     * Return Mime object instance.
     *
     * @return Mime
     */
    public function mime()
    {

        return $this->mime;

    }




}