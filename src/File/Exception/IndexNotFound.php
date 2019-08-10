<?php

namespace SSD\File\Exception;

use Exception;

class IndexNotFound extends Exception
{
    protected $message = 'Index does not exist';
}
