<?php

namespace SSD\File\Type;


use SSD\File\FileSize;
use SSD\File\File;


abstract class BaseType {

    /**
     * File object instance.
     *
     * @var File
     */
    protected $file;

    /**
     * FileSize object instance.
     * @var FileSize
     *
     */
    private $fileSize;


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
     * Instantiate FileSize object.
     *
     * @return void
     */
    final protected function processFileSize()
    {

        $this->fileSize = new FileSize($this->file);
    }


    /**
     * Return the file extension.
     *
     * @param bool $dot
     *
     * @return string
     */
    final public function extension($dot = false)
    {

        return $this->file->extension($dot);

    }


    /**
     * Return FileSize object.
     *
     * @return FileSize
     */
    final public function fileSize()
    {

        if (empty($this->fileSize)) {

            $this->processFileSize();

        }

        return $this->fileSize;

    }


    /**
     * Return file name with full path.
     *
     * @return string
     */
    final public function fileWithPath()
    {

        return $this->file->withPath();

    }


    /**
     * Return file name.
     *
     * @return string
     */
    final public function fileName()
    {

        return $this->file->name();

    }


    /**
     * Return file name without extension.
     *
     * @return string
     */
    final public function fileNameWithoutExtension()
    {

        return $this->file->nameWithoutExtension();

    }


    /**
     * Return mime type.
     *
     * @return string
     */
    final public function mimeType()
    {

        return $this->file->mime()
                          ->type();

    }


    /**
     * Create new value.
     *
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
     * Return all data to string.
     *
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