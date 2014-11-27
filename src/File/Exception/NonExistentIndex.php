<?php

namespace SSD\File\Exception;


use \Exception;


class NonExistentIndex extends Exception {

    /**
     * @var string
     */
    protected $message = 'Index does not exist';


} 