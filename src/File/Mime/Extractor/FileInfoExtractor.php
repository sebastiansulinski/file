<?php

namespace SSD\File\Mime\Extractor;


use \finfo;

use \SSD\File\File;


class FileInfoExtractor implements ExtractorInterface {

    private $file;



    public function __construct(File $file)
    {

        $this->file = $file;

    }


    /**
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



    public function type()
    {

        $fileInfo = new finfo($this->getConstant());

        $type = $fileInfo->file($this->file);

        return substr($type, 0, strpos($type, ';'));

    }





} 