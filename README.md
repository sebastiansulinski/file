File information package
====

File information package for different file types.
Currently contains only Image file type implementation.

[![Build Status](https://travis-ci.org/sebastiansulinski/file.svg?branch=master)](https://travis-ci.org/sebastiansulinski/file)


## Usage

```php
require_once "vendor/autoload.php";

use SSD\File\File;
use SSD\File\Type\Image;


$image = new Image(new File('/path/to/the/file.jpg'));

// File specific info
echo $image->path(); // /path/to/the/file.jpg
echo $image->name(); // file.jpg
echo $image->nameWithoutExtension(); // file
echo $image->extension(); // jpg
echo $image->extension(true); // .jpg
echo $image->mimeType(); // image/jpeg

// Size specific info
echo $image->sizeInBytes(); // 49275
echo $image->sizeInBytesPostfix(); // 49275B
echo $image->sizeInKiloBytes(); // 48.12
echo $image->sizeInKiloBytesPostfix(); // 48.12KB
echo $image->sizeInMegaBytes(); // 0.05
echo $image->sizeInMegaBytesPostfix(); // 0.05MB
echo $image->sizeInMegaBytesPostfix(3, ' '); // 0.047 MB

// Image specific info
echo $image->width(); // 600
echo $image->height(); // 450
echo $image->type(); // 1
echo $image->attributes(); // width="600" height="450"
echo $image->isLandscape(); // true / false
echo $image->isPortrait(); // true / false
echo $image->isOfType(IMG_JPG, IMG_PNG); // true / false

// Methods returning all of the above

// as array
$image->toArray();

// as json
$image->toJson();

// as json
$image->toString();

// as json using __toString()
echo $image;
```