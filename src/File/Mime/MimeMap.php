<?php

namespace SSD\File\Mime;


use \SSD\File\Exception\NonExistentIndex;


class MimeMap {

    /**
     * @var array
     */
    private static $types;


    /**
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
     * @param $extension
     *
     * @return string
     * @throws NonExistentIndex
     */
    public static function byExtension($extension)
    {

        if (!static::extensionExists($extension)) {

            throw new NonExistentIndex;

        }

        return static::get()[$extension];

    }


    /**
     * @param $extension
     *
     * @return bool
     */
    private static function extensionExists($extension)
    {

        return array_key_exists($extension, static::get());

    }





} 