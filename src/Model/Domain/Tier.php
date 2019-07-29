<?php


namespace App\Model\Domain;

/**
 * Class Tier
 * @package App\Model\Domain
 */
class Tier
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $productId;

    /**
     * @var string
     */
    private $size;

    /**
     * @var float
     */
    private $price;

    /**
     * @var string
     */
    private $pathWithWatermark;

    /**
     * @var string
     */
    private $pathWithoutWatermark;

    public function __construct(int $id, int $productId, string $size,
                                float $price, string $pathWithWatermark, string $pathWithoutWatermark)
    {
        $this->id = $id;
        $this->productId = $productId;
        $this->size = $size;
        $this->price = $price;
        $this->pathWithWatermark = $pathWithWatermark;
        $this->pathWithoutWatermark = $pathWithoutWatermark;
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
    public function getProductId(): int
    {
        return $this->productId;
    }

    /**
     * @return string
     */
    public function getSize(): string
    {
        return $this->size;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getPathWithWatermark(): string
    {
        return $this->pathWithWatermark;
    }

    /**
     * @return string
     */
    public function getPathWithoutWatermark(): string
    {
        return $this->pathWithoutWatermark;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param int $productId
     */
    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
    }

    /**
     * @param string $size
     */
    public function setSize(string $size): void
    {
        $this->size = $size;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @param string $pathWithWatermark
     */
    public function setPathWithWatermark(string $pathWithWatermark): void
    {
        $this->pathWithWatermark = $pathWithWatermark;
    }

    /**
     * @param string $pathWithoutWatermark
     */
    public function setPathWithoutWatermark(string $pathWithoutWatermark): void
    {
        $this->pathWithoutWatermark = $pathWithoutWatermark;
    }



}