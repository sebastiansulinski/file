File information package
====

File information package for different file types.
Currently contains only Image implementation.


## Usage

```
require_once "vendor/autoload.php";

use SSD\File\File;
use SSD\File\Type\Image;


$image = new Image(new File('/path/to/the/file'));

echo $image->width();
echo $image->height();
echo $image->type();
echo $image->attributes();

echo $image->extension();
echo $image->fileName();
echo $image->fileWithPath();
echo $image->fileNameWithoutExtension();
echo $image->mimeType();

echo $image->fileSize();
echo $image->fileSize()->inBytes();
echo $image->fileSize()->inBytesPostfix();
echo $image->fileSize()->inKiloBytes();
echo $image->fileSize()->inKiloBytesPostfix();
echo $image->fileSize()->inMegaBytes();
echo $image->fileSize()->inMegaBytesPostfix();

echo $image; // __toString() with all of the above returned as string

```