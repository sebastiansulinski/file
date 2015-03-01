<?php namespace SSD\File\Mime;


use SSD\File\Exception\NonExistentIndex;


class MimeMap {

    /**
     * Array of mime types.
     *
     * @var array
     */
    private static $types;


    /**
     * Return array of types.
     *
     * @return array
     */
    public static function get()
    {

        if (empty(static::$types)) {

            static::$types = require "types.php";

        }

        return static::$types;

    }


    /**
     * Return mime type by extension.
     *
     * @param $extension
     *
     * @return string
     * @throws NonExistentIndex
     */
    public static function byExtension($extension)
    {

        if ( ! static::extensionExists($extension)) {

            throw new NonExistentIndex;

        }

        return static::get()[$extension];

    }


    /**
     * Check whether extension exists in the $types array.
     *
     * @param $extension
     *
     * @return bool
     */
    private static function extensionExists($extension)
    {

        return array_key_exists($extension, static::get());

    }





} 