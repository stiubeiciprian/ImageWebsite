<?php


namespace App\Model\Persistence\Mapper;

use App\Model\Domain\Product;

/**
 * Class ProductMapper
 * @package App\Model\Persistence\Mapper
 */
class ProductMapper extends AbstractMapper
{
    /**
     * @param Product $product
     */
    public function save(Product $product) : void
    {
            $this->insert($product);
    }

    /**
     * @param Product $product
     */
    private function insert(Product $product) : void
    {
        $sql = "INSERT INTO product (user_id, title, description, cameraSpecs, captureDate, thumbnailPath )
                VALUES (:userId, :title, :description, :cameraSpecs, :captureDate, :thumbnailPath) ";

        $statement = $this->getPdo()->prepare($sql);

        $statement->bindValue('userId', $product->getUserId());
        $statement->bindValue('title', $product->getTitle());
        $statement->bindValue('description', $product->getDescription());
        $statement->bindValue('cameraSpecs', $product->getCameraSpecs());
        $statement->bindValue('captureDate', $product->getCaptureDate());
        $statement->bindValue('thumbnailPath', $product->getThumbnailPath());
        $statement->execute();

//      $this->insertProductTags($product);
//      $this->insertProductTiers($product);
    }



    private function insertProductTags(Product $product) : void
    {
    }

    private function insertProductTiers(Product$product) : void
    {
    }

}