<?php

namespace SSD\File;


interface FileInterface {


    /**
     * @param $dot
     *
     * @return mixed
     */
    public function extension($dot);

    /**
     * @return mixed
     */
    public function fileSize();

    /**
     * @return mixed
     */
    public function fileName();

    /**
     * @return mixed
     */
    public function mimeType();

    /**
     * @return mixed
     */
    public function __toString();


} 