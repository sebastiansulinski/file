<?php

namespace SSD\File\Exception;


use \Exception;


class PropertyNotAvailable extends Exception {

    /**
     * @var string
     */
    protected $message = 'Property is not available';


} 