<?php

namespace SSD\File\Type;

class Image extends BaseType
{
    /**
     * Image width.
     *
     * @var int
     */
    private $width;

    /**
     * Image height.
     *
     * @var int
     */
    private $height;

    /**
     * Image type.
     *
     * @var int
     */
    private $type;

    /**
     * Height and width attributes.
     *
     * @var string
     */
    private $attributes;

    /**
     * Determine if file is valid.
     *
     * @return bool
     */
    protected function isValid(): bool
    {
        return explode('/', $this->file->mimeType())[0] === 'image';
    }

    /**
     * Parse file.
     *
     * @return void
     */
    protected function parseFile(): void
    {
        [
            $this->width,
            $this->height,
            $this->type,
            $this->attributes
        ] = getimagesize($this->file->path());
    }

    /**
     * Get width.
     *
     * @return int
     */
    public function width(): int
    {
        return $this->width;
    }

    /**
     * Get height.
     *
     * @return int
     */
    public function height(): int
    {
        return $this->height;
    }

    /**
     * Get type.
     *
     * @return int
     */
    public function type(): int
    {
        return $this->type;
    }

    /**
     * Get additional attributes.
     *
     * @return string
     */
    public function attributes(): string
    {
        return $this->attributes;
    }

    /**
     * Determine if image is landscape.
     *
     * @return bool
     */
    public function isLandscape(): bool
    {
        return $this->width > $this->height;
    }

    /**
     * Determine if image is portrait.
     *
     * @return bool
     */
    public function isPortrait(): bool
    {
        return !$this->isLandscape();
    }

    /**
     * Determine if image is one of the specified types.
     *
     * @param  array ...$types
     * @return bool
     */
    public function isOfType(...$types): bool
    {
        return in_array($this->type, $types);
    }

    /**
     * Get class instance as array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'path' => $this->path(),
            'name' => $this->name(),
            'name_without_extension' => $this->nameWithoutExtension(),
            'extension' => $this->extension(),
            'mime_type' => $this->mimeType(),
            'size_in_bytes' => $this->sizeInBytes(),
            'size_in_bytes_postfix' => $this->sizeInBytesPostfix(),
            'size_in_kilobytes' => $this->sizeInKiloBytes(),
            'size_in_kilobytes_postfix' => $this->sizeInKiloBytesPostfix(),
            'size_in_megabytes' => $this->sizeInMegaBytes(),
            'size_in_megabytes_postfix' => $this->sizeInMegaBytesPostfix(),
            'width' => $this->width,
            'height' => $this->height,
            'type' => $this->type,
            'attributes' => $this->attributes,
            'is_landscape' => $this->isLandscape(),
            'is_portrait' => $this->isPortrait(),
        ];
    }
}