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
echo $image->path();
echo $image->name();
echo $image->nameWithoutExtension();
echo $image->extension();
echo $image->mimeType();

// Size specific info
echo $image->sizeInBytes();
echo $image->sizeInBytesPostfix();
echo $image->sizeInKiloBytes();
echo $image->sizeInKiloBytesPostfix();
echo $image->sizeInMegaBytes();
echo $image->sizeInMegaBytesPostfix();

// Image specific info
echo $image->width();
echo $image->height();
echo $image->type();
echo $image->attributes();
echo $image->isLandscape();
echo $image->isPortrait();

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