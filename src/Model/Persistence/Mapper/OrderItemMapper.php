<?php


namespace App\Model\Persistence\Mapper;


use App\Model\Domain\OrderItem;

class OrderItemMapper extends AbstractMapper
{
    /**
     * @param OrderItem $orderItem
     */
    public function save(OrderItem $orderItem)
    {
        return $this->insert($orderItem);
    }

    /**
     * @param OrderItem $orderItem
     * @throws \Exception
     */
    private function insert(OrderItem $orderItem)
    {
        $sql = "INSERT INTO orderItem (user_id, tier_id, createdAt) 
                VALUES (:userId, :tierId, :createdAt) ";

        $statement = $this->getPdo()->prepare($sql);
        $statement->bindValue('userId', $orderItem->getUserId());
        $statement->bindValue('tierId', $orderItem->getTierId());
        $statement->bindValue('createdAt', $orderItem->getTimeStamp());

        $statement->execute();
    }
}