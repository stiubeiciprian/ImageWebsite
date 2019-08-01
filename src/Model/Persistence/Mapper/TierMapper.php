<?php


namespace App\Model\Persistence\Mapper;


use App\Model\Domain\Tier;

/**
 * Class TierMapper
 * @package App\Model\Persistence\Mapper
 */
class TierMapper extends AbstractMapper
{

    public function save(Tier $tier) : Tier
    {
        return $this->insert($tier);
    }

    private function insert(Tier $tier) : Tier
    {
        $sql = "INSERT INTO tier (price, pathWithWatermark, pathWithoutWatermark, size, product_id) 
                VALUES (:price, :pathWW, :pathWOW, :size, :productId) ";

        $statement = $this->getPdo()->prepare($sql);
        $statement->bindValue('price', $tier->getPrice());
        $statement->bindValue('pathWW', $tier->getPathWithWatermark());
        $statement->bindValue('pathWOW', $tier->getPathWithoutWatermark());
        $statement->bindValue('size', $tier->getSize());
        $statement->bindValue('productId', $tier->getProductId());

        $statement->execute();

        $tierId = $this->getPDO()->lastInsertId();
        $tier->setId($tierId);

        return $tier;
    }
}