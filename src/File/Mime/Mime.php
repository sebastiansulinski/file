<?php namespace SSD\File\Mime;


use SSD\File\File;

use SSD\File\Mime\Extractor\ExtensionExtractor;
use SSD\File\Mime\Extractor\FileInfoExtractor;


class Mime {

    /**
     * Instance of the File object.
     *
     * @var File
     */
    private $file;

    /**
     * File type.
     *
     * @var string
     */
    private $type;


    /**
     * Constructor.
     *
     * @param File $file
     */
    public function __construct(File $file)
    {

        $this->file = $file;

        $this->extract();

    }


    /**
     * Return extractor instance.
     *
     * @return ExtensionExtractor|ExtensionExtractor
     */
    private function extractor()
    {

        if (function_exists("finfo_fopen")) {

            return new FileInfoExtractor($this->file);

        }

        return new ExtensionExtractor($this->file);

    }


    /**
     * Extract the mime type of the file.
     *
     * @return void
     */
    private function extract()
    {

        $this->type = $this->extractor()->type();

    }


    /**
     * Return the mime type.
     *
     * @return string
     */
    public function type()
    {

        return $this->type;

    }






} 