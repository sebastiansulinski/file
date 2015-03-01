<?php namespace SSD\File\Mime\Extractor;


use SSD\File\File;


interface ExtractorInterface {


    public function __construct(File $file);

    public function type();


} 