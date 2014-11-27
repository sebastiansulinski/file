<?php

namespace SSD\File\Type;


use \SSD\File\FileSize;
use \SSD\File\File;


abstract class BaseType {

    /**
     * @var File
     */
    protected $file;

    /**
     * @var FileSize
     *
     */
    private $fileSize;


    /**
     * @param File $file
     */
    public function __construct(File $file)
    {

        $this->file = $file;

        $this->processPath();

    }


    /**
     * @return mixed
     */
    abstract protected function processPath();


    /**
     * @return void
     */
    final protected function processFileSize()
    {

        $this->fileSize = new FileSize($this->file);
    }


    /**
     * @param bool $dot
     *
     * @return string
     */
    final public function extension($dot = false)
    {

        return $this->file->extension($dot);

    }


    /**
     * @return FileSize
     */
    final public function fileSize()
    {

        return $this->fileSize;

    }


    /**
     * @return string
     */
    final public function fileWithPath()
    {

        return $this->file->withPath();

    }


    /**
     * @return string
     */
    final public function fileName()
    {

        return $this->file->name();

    }


    /**
     * @return string
     */
    final public function fileNameWithoutExtension()
    {

        return $this->file->nameWithoutExtension();

    }


    /**
     * @return string
     */
    final public function mimeType()
    {

        return $this->file->mime()
                          ->type();

    }


    /**
     * @param $value
     * @param $key
     *
     * @return void
     */
    final private function arrayToString(&$value, $key)
    {

        $value = "[{$key}] : {$value}";

    }


    /**
     * @param array $elements
     *
     * @return string
     */
    final protected function formatToString(array $elements)
    {

        array_walk_recursive($elements, [$this, "arrayToString"]);

        return implode(
            PHP_EOL,
            $elements
        );

    }




} 