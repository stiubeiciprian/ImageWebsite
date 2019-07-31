<?php


namespace App\Model\Persistence\Finder;


use App\Model\Domain\Tier;
use PDO;

/**
 * Class TierFinder
 * @package App\Model\Persistence\Finder
 */
class TierFinder extends AbstractFinder
{
    /**
     * @param $productId
     * @return array
     */
    public function findByProductId($productId) : array
    {
        $sql = "SELECT * FROM tier WHERE product_id=?";

        $statement = $this->getPdo()->prepare($sql);
        $statement->bindParam(1, $productID, PDO::PARAM_INT);
        $statement->execute();

        $tiersList = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $this->translateToTierArray($tiersList);
    }

    /**
     * @param $row
     * @return Tier
     */
    private function translateToTier($row) : Tier
    {
        return new Tier(
            $row[SQL_TIER_ID],
            $row[SQL_PRODUCT_ID],
            $row[SQL_TIER_SIZE],
            $row[SQL_TIER_PRICE],
            $row[SQL_TIER_PATH_WITH_WATERMARK],
            $row[SQL_TIER_PATH_WITHOUT_WATERMARK]
        );
    }

    /**
     * Creates an array of Tiers from a given array.
     * @param array $tiers
     * @return array
     */
    private function translateToTierArray(array $tiers) : array
    {
        foreach ($tiers as $item){
            $tiersArray[] = $this->translateToTier($item);
        }

        return $tiersArray;
    }
}