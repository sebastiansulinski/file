<?php

namespace SSD\File\Exception;

use Exception;

class DependencyNotFound extends Exception
{
    protected $message = 'Dependency not found';
}
