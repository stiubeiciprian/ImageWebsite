<?php


namespace App\Model\Domain;

/**
 * Class Product
 * @package App\Model\Domain
 */
class Product
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $userId;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var array
     */
    private $tags;

    /**
     * @var string
     */
    private $cameraSpecs;

    /**
     * @var string
     */
    private $captureDate;

    /**
     * @var string
     */
    private $thumbnailPath;

    /**
     * Product constructor.
     * @param int $id
     * @param int $userId
     * @param string $title
     * @param string $description
     * @param array $tags
     * @param string $cameraSpecs
     * @param string $captureDate
     * @param string $thumbnailPath
     */
    public function __construct(int $id, int $userId, string $title, string $description, array $tags,
                                string $cameraSpecs, string $captureDate, string $thumbnailPath)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->title = $title;
        $this->description = $description;
        $this->tags = $tags;
        $this->cameraSpecs = $cameraSpecs;
        $this->captureDate = $captureDate;
        $this->thumbnailPath = $thumbnailPath;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return array
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @return string
     */
    public function getCameraSpecs(): string
    {
        return $this->cameraSpecs;
    }

    /**
     * @return string
     */
    public function getCaptureDate(): string
    {
        return $this->captureDate;
    }

    /**
     * @return string
     */
    public function getThumbnailPath(): string
    {
        return $this->thumbnailPath;
    }
}