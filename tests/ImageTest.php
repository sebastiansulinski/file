<?php

namespace SSDTest;

use SSD\File\File;
use SSD\File\Type\Image;
use PHPUnit\Framework\TestCase;

class ImageTest extends TestCase
{
    /**
     * @test
     * @throws \SSD\File\Exception\DependencyNotFound
     * @throws \SSD\File\Exception\InvalidArgument
     * @throws \SSD\File\Exception\InvalidFile
     */
    public function returns_correct_image_data()
    {
        $filePath = realpath(__DIR__.'/stubs/beetle.jpg');

        $image = new Image(new File($filePath));

        $data = [
            'path' => $image->path(),
            'name' => $image->name(),
            'name_without_extension' => $image->nameWithoutExtension(),
            'extension' => $image->extension(),
            'mime_type' => $image->mimeType(),
            'size_in_bytes' => $image->sizeInBytes(),
            'size_in_bytes_postfix' => $image->sizeInBytesPostfix(),
            'size_in_kilobytes' => $image->sizeInKiloBytes(),
            'size_in_kilobytes_postfix' => $image->sizeInKiloBytesPostfix(),
            'size_in_megabytes' => $image->sizeInMegaBytes(),
            'size_in_megabytes_postfix' => $image->sizeInMegaBytesPostfix(),
            'width' => $image->width(),
            'height' => $image->height(),
            'type' => $image->type(),
            'attributes' => $image->attributes(),
            'is_landscape' => $image->isLandscape(),
            'is_portrait' => $image->isPortrait(),
        ];

        $this->assertEquals($filePath, $data['path']);
        $this->assertEquals('beetle.jpg', $data['name']);
        $this->assertEquals('beetle', $data['name_without_extension']);
        $this->assertEquals('jpg', $data['extension']);
        $this->assertEquals('.jpg', $image->extension(true));
        $this->assertEquals('image/jpeg', $data['mime_type']);
        $this->assertEquals(49275, $data['size_in_bytes']);
        $this->assertEquals('49275B', $data['size_in_bytes_postfix']);
        $this->assertEquals('49275 B', $image->sizeInBytesPostfix(' '));
        $this->assertEquals(48.12, $data['size_in_kilobytes']);
        $this->assertEquals('48.12KB', $data['size_in_kilobytes_postfix']);
        $this->assertEquals('48.12 KB', $image->sizeInKiloBytesPostfix(3, ' '));
        $this->assertEquals(0.05, $data['size_in_megabytes']);
        $this->assertEquals('0.05MB', $data['size_in_megabytes_postfix']);
        $this->assertEquals('0.047 MB', $image->sizeInMegaBytesPostfix(3, ' '));
        $this->assertEquals(600, $data['width']);
        $this->assertEquals(450, $data['height']);
        $this->assertEquals(IMG_JPEG, $data['type']);
        $this->assertEquals(IMG_JPG, $data['type']);
        $this->assertTrue($image->isOfType(IMG_JPEG, IMG_JPG));
        $this->assertFalse($image->isOfType(IMG_PNG, IMG_GIF, IMG_WBMP));
        $this->assertEquals('width="600" height="450"', $data['attributes']);
        $this->assertTrue($data['is_landscape']);
        $this->assertFalse($data['is_portrait']);

        $this->assertEquals(
            json_encode([
                'bytes' => $image->sizeInBytes(),
                'bytes_postfix' => $image->sizeInBytesPostfix(),
                'kilobytes' => $image->sizeInKiloBytes(),
                'kilobytes_postfix' => $image->sizeInKiloBytesPostfix(),
                'megabytes' => $image->sizeInMegaBytes(),
                'megabytes_postfix' => $image->sizeInMegaBytesPostfix(),
            ]),
            $image->sizeToString()
        );

        $this->assertEquals(
            $data,
            $image->toArray()
        );

        $this->assertEquals(
            $toString = json_encode($data),
            $image->toString()
        );

        $this->assertEquals(
            $toString,
            $image->toJson()
        );

        $this->assertEquals(
            $toString,
            $image
        );
    }
}