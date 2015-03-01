<?php namespace SSD\File\Mime\Extractor;


use finfo;

use SSD\File\File;


class FileInfoExtractor implements ExtractorInterface {

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
     * Return the right constant.
     *
     * @return int
     */
    private function getConstant()
    {

        return (
            defined("FILEINFO_MIME_TYPE") ?
                FILEINFO_MIME_TYPE :
                FILEINFO_MIME
        );

    }


    /**
     * Return the file type.
     *
     * @return string
     */
    public function type()
    {

        $fileInfo = new finfo($this->getConstant());

        $type = $fileInfo->file($this->file);

        return substr($type, 0, strpos($type, ';'));

    }





} 