<?php

namespace SSD\File\Mime\Extractor;


use \SSD\File\File;
use \SSD\File\Mime\MimeMap;


class ExtensionExtractor implements ExtractorInterface {


    private $file;



    public function __construct(File $file)
    {

        $this->file = $file;

    }


    public function type() {

        return MimeMap::byExtension($this->file->extension());

    }





} 