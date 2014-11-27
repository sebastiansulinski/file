<?php

namespace SSD\File\Mime;


use \SSD\File\File;

use \SSD\File\Mime\Extractor\ExtensionExtractor;
use \SSD\File\Mime\Extractor\FileInfoExtractor;


class Mime {

    /**
     * @var File
     */
    private $file;

    /**
     * @var
     */
    private $type;


    /**
     * @param File $file
     */
    public function __construct(File $file)
    {

        $this->file = $file;

        $this->extract();

    }


    /**
     * @return ExtensionExtractor|ExtractorInterface
     */
    private function extractor()
    {

        if (function_exists("finfo_fopen")) {

            return new FileInfoExtractor($this->file);

        }

        return new ExtensionExtractor($this->file);

    }


    /**
     * @return void
     */
    private function extract()
    {

        $this->type = $this->extractor()->type();

    }


    /**
     * @return string
     */
    public function type()
    {

        return $this->type;

    }






} 