<?php

use SSD\File\File;


class FileTest extends PHPUnit_Framework_TestCase {


    protected $file;


    protected function setUp()
    {

        $this->file = '';

    }



    /**
     * @expectedException \SSD\File\Exception\InvalidArgument
     */
    public function testConstructor()
    {

        $file = new File('/some/file');

    }


}