<?php namespace SSD\File;


interface FileInterface {


    /**
     * @param $dot
     *
     * @return string
     */
    public function extension($dot);

    /**
     * @return FileSize
     */
    public function fileSize();

    /**
     * @return string
     */
    public function fileWithPath();

    /**
     * @return string
     */
    public function fileName();

    /**
     * @return string
     */
    public function mimeType();

    /**
     * @return string
     */
    public function __toString();


} 