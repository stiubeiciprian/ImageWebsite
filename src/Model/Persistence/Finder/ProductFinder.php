<?php


namespace App\Model\Persistence\Finder;

require_once "src/Model/Persistence/propertyNames.php";

use App\Model\Domain\Product;
use PDO;

/**
 * Class ProductFinder
 * @package App\Model\Persistence\Finder
 */
class ProductFinder extends AbstractFinder
{

    /**
     * Returns product with given id
     * @param int $id
     * @return Product
     */
    public function findById(int $id) : Product
    {
        $sql = "SELECT * FROM product WHERE product_id=?";

        $statement = $this->getPdo()->prepare($sql);
        $statement->bindValue(1, $id, PDO::PARAM_INT);
        $statement->execute();

        $fetchResult = $statement->fetch(PDO::FETCH_ASSOC);

        return $this->translateToProduct($fetchResult);
    }

    /**
     * @return array
     */
    public function getAll() : array
    {
        $sql = "SELECT * FROM product";

        $statement = $this->getPdo()->prepare($sql);
        $statement->execute();

        $productsList = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $this->translateToProductArray($productsList);
    }

    public function findByUserId(int $id) : array
    {
        $sql = "SELECT * FROM product WHERE user_id=?";

        $statement = $this->getPdo()->prepare($sql);
        $statement->bindValue(1, $id, PDO::PARAM_INT);
        $statement->execute();

        $productsList = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $this->translateToProductArray($productsList);
    }

    /**
     * Creates product from given associative array.
     * @param array $productFetchResult
     * @param array $tierFetchList
     * @return Product
     */
    private function translateToProduct(array $productFetchResult, array $tierFetchList = []) : Product
    {
            return  new Product(
                $productFetchResult[SQL_PRODUCT_ID],
                $productFetchResult[SQL_PRODUCT_USER_ID],
                $productFetchResult[SQL_PRODUCT_TITLE],
                $productFetchResult[SQL_PRODUCT_DESCRIPTION],
                $tierFetchList,
                $productFetchResult[SQL_PRODUCT_CAMERA_SPECS],
                $productFetchResult[SQL_PRODUCT_CAPTURE_DATE],
                $productFetchResult[SQL_PRODUCT_THUMBNAIL_PATH]
            );
    }

    /**
     * Creates an array of Products from a given array.
     * @param array $products
     * @return array
     */
    private function translateToProductArray(array $products) : array
    {
        foreach ($products as $item){
            $productsArray[] = $this->translateToProduct($item);
        }

        return $productsArray;
    }
}