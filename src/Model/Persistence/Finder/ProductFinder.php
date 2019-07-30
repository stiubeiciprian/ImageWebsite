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
        $sql = "SELECT * FROM ". SQL_PRODUCT_TABLE . " WHERE " . SQL_PRODUCT_ID . "=?";

        $statement = $this->getPdo()->prepare($sql);
        $statement->bindValue(1, $id, PDO::PARAM_INT);
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);

        return $this->translateToProduct($row);
    }

    /**
     * @return array
     */
    public function getAll() : array
    {
        $sql = "SELECT * FROM ". SQL_PRODUCT_TABLE;

        $statement = $this->getPdo()->prepare($sql);
        $statement->execute();

        $productsList = $statement->fetchAll();

        return $this->translateToProductArray($productsList);
    }

    /**
     * Creates product from given associative array.
     * @param array $row
     * @return Product
     */
    private function translateToProduct(array $row) : Product
    {
        $product = new Product(
            $row[SQL_PRODUCT_ID],
            $row[SQL_PRODUCT_USER_ID],
            $row[SQL_PRODUCT_TITLE],
            $row[SQL_PRODUCT_DESCRIPTION],
            [],
            $row[SQL_PRODUCT_CAMERA_SPECS],
            $row[SQL_PRODUCT_CAPTURE_DATE],
            $row[SQL_PRODUCT_THUMBNAIL_PATH]
        );

        return $product;
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