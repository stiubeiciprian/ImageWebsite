<?php


namespace App\Model\Persistence\Finder;


use App\Model\Domain\OrderItem;
use PDO;

/**
 * Class OrderItemFinder
 * @package App\Model\Persistence\Finder
 */
class OrderItemFinder extends AbstractFinder
{

    /**
     * @param int $tierId
     * @return array
     */
    public function findByTierId(int $tierId) : array
    {
        $sql = "SELECT * FROM orderItem WHERE tier_id=?";

        $statement = $this->getPdo()->prepare($sql);
        $statement->bindParam(1, $tierId, PDO::PARAM_INT);
        $statement->execute();

        $orderItems = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $this->translateToOrderItemsArray($orderItems);
    }

    /**
     * @param int $userId
     * @return array
     */
    public function findByUserId(int $userId) : array
    {
        $sql = "SELECT * FROM orderItem WHERE user_id=?";

        $statement = $this->getPdo()->prepare($sql);
        $statement->bindParam(1, $userId, PDO::PARAM_INT);
        $statement->execute();

        $orderItems = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $this->translateToOrderItemsArray($orderItems);
    }

    /**
     * @param $row
     * @return OrderItem
     */
    private function translateToOrderItem($row) : OrderItem
    {
        return new OrderItem(
            $row[SQL_ORDER_ITEM_USER_ID],
            $row[SQL_ORDER_ITEM_TIER_ID],
            $row[SQL_ORDER_ITEM_CREATED_AT]
        );
    }

    /**
     * @param array $orderItems
     * @return array
     */
    private function translateToOrderItemsArray(array $orderItems) : array
    {
        $orderItemsArray = [];

        foreach ($orderItems as $item){
            $orderItemsArray[] = $this->translateToOrderItem($item);
        }

        return $orderItemsArray;
    }
}