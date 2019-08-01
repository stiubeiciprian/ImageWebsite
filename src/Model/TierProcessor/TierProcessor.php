<?php


namespace App\Model\TierProcessor;


use App\Core\Request;
use App\Model\Domain\Product;
use App\Model\Domain\Tier;
use App\Model\ImageTool\ImageTool;


/**
 * Class TierProcessor
 * @package App\Model\TierProcessor
 */
class TierProcessor
{

     const PATH_WITH_WATERMARK_SMALL = "data/images/watermarks/small/small";
     const PATH_WITH_WATERMARK_MEDIUM = "data/images/watermarks/medium/medium";
     const PATH_WITH_WATERMARK_LARGE = "data/images/watermarks/large/large";

     const PATH_ORIGINAL_SMALL = "data/images/original/small/small";
     const PATH_ORIGINAL_MEDIUM = "data/images/original/medium/medium";
     const PATH_ORIGINAL_LARGE = "data/images/original/large/large";

     const PATH_SOURCE = "data/images/tmp_image";
     const PATH_WATERMARK = "data/watermark/watermark.png";


    private const SMALL_WIDTH = "200";
    private const MEDIUM_WIDTH = "500";

    private $imageTool;
    private $product;

    /**
     * TierProcessor constructor.
     * @param ImageTool $imageTool
     */
    public function __construct(ImageTool $imageTool)
    {
        $this->imageTool = $imageTool;
    }

    /**
     * @param Product $product
     */
    public function generateTiers(Product $product, float $price)
    {
        $this->product = $product;

        $large = $this->generateLargeTier($price);
        $medium = $this->generateMediumTier($price);
        $small = $this->generateSmallTier($price);

        return [$small, $medium, $large];

    }


    /**
     * @return Tier
     */
    public function generateSmallTier($price) : Tier
    {
        $productId = $this->product->getId();
        $price =0.4 * $price;

        $this->imageTool->resizeImageWidth(self::PATH_SOURCE, self::PATH_ORIGINAL_SMALL.$productId, self::SMALL_WIDTH);
        $this->imageTool->resizeImageWidthWatermark(self::PATH_SOURCE, self::PATH_WITH_WATERMARK_SMALL.$productId, self::PATH_WATERMARK, self::SMALL_WIDTH);

        return new Tier(0, $productId,"small",$price, self::PATH_WITH_WATERMARK_SMALL.$productId, self::PATH_ORIGINAL_SMALL.$productId);
    }

    /**
     * @return Tier
     */
    public function generateMediumTier($price) : Tier
    {
        $productId = $this->product->getId();
        $price = 0.75 * $price;

        $this->imageTool->resizeImageWidth(self::PATH_SOURCE, self::PATH_ORIGINAL_MEDIUM.$productId, self::MEDIUM_WIDTH);
        $this->imageTool->resizeImageWidthWatermark(self::PATH_SOURCE, self::PATH_WITH_WATERMARK_MEDIUM.$productId, self::PATH_WATERMARK, self::MEDIUM_WIDTH);

        return new Tier(0, $productId,"medium",$price, self::PATH_WITH_WATERMARK_MEDIUM.$productId, self::PATH_ORIGINAL_MEDIUM.$productId);
    }


    /**
     * @return Tier
     */
    public function generateLargeTier($price) : Tier
    {
        $productId = $this->product->getId();
        $price = $price;

        $this->imageTool->saveImage(self::PATH_SOURCE, self::PATH_ORIGINAL_LARGE.$productId);
        $this->imageTool->saveImageWithWatermark(self::PATH_SOURCE, self::PATH_WITH_WATERMARK_LARGE.$productId, self::PATH_WATERMARK);

        return new Tier(0, $productId,"large", $price,self::PATH_WITH_WATERMARK_LARGE.$productId, self::PATH_ORIGINAL_LARGE.$productId);
    }
}