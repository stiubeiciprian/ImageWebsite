<?php


namespace App\Model\Persistence\Mapper;

use App\Model\Domain\Product;
use App\Model\Domain\Tag;
use App\Model\Persistence\PersistenceFactory;

/**
 * Class ProductMapper
 * @package App\Model\Persistence\Mapper
 */
class ProductMapper extends AbstractMapper
{
    /**
     * @param Product $product
     */
    public function save(Product $product) : Product
    {

            if ($product->getId() == null) {
                return $this->insert($product);
            }

            return $this->update($product);
    }

    /**
     * @param Product $product
     */
    private function insert(Product $product) : Product
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

        $productId = $this->getPDO()->lastInsertId();
        $product->setId($productId);

        $this->insertProductTags($product);

        return $product;
    }

    /**
     * @param Product $product
     */
    private function update(Product $product)
    {

        $sql = "UPDATE product SET title=?, description=?, cameraSpecs=?, captureDate=?, thumbnailPath=? WHERE  id=?";
        $statement = $this->getPdo()->prepare($sql);

        $statement->bindValue(1, $product->getTitle());
        $statement->bindValue(2, $product->getDescription());
        $statement->bindValue(3, $product->getCameraSpecs());
        $statement->bindValue(4, $product->getCaptureDate());
        $statement->bindValue(5, $product->getThumbnailPath());
        $statement->bindValue(6, $product->getId());
        $statement->execute();

        return $product;
    }



    private function insertProductTags(Product $product) : void
    {
        $tagsList= $product->getTags();


        foreach($tagsList as $tagName)
        {
            $tag = PersistenceFactory::createFinder(Tag::class)->findByName($tagName);
            $this->insertProductTag($tag, $product->getId());
        }
    }

    private function insertProductTag(Tag $tag, $productId)
    {
        $sql = "INSERT INTO ProductTag (tag_id, product_id) VALUES (:tagId, :productId) ";

        $statement = $this->getPdo()->prepare($sql);

        $statement->bindValue('tagId', $tag->getId());
        $statement->bindValue('productId', $productId);
        $statement->execute();
    }
}