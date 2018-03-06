<?php

namespace SSD\File\Exception;

use Exception;

class InvalidFile extends Exception
{
    protected $message = 'Invalid file type';
}