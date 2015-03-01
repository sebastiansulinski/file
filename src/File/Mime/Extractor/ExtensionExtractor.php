<?php namespace SSD\File\Mime\Extractor;


use SSD\File\File;
use SSD\File\Mime\MimeMap;


class ExtensionExtractor implements ExtractorInterface {


    /**
     * Instance of the File object.
     *
     * @var File
     */
    private $file;


    /**
     * Constructor.
     *
     * @param File $file
     */
    public function __construct(File $file)
    {

        $this->file = $file;

    }


    /**
     * Return MimeMap instance.
     *
     * @throws \SSD\File\Exception\NonExistentIndex
     *
     * @return string
     */
    public function type() {

        return MimeMap::byExtension($this->file->extension());

    }





} 