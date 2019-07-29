<?php


namespace App\Model\Domain;

/**
 * Class OrderItem
 * @package App\Model\Domain
 */
class OrderItem
{
    /**
     * @var int
     */
    private $userId;

    /**
     * @var int
     */
    private $tierId;

    /**
     * @var string
     */
    private $timeStamp;

    /**
     * OrderItem constructor.
     * @param int $userId
     * @param int $tierId
     * @param string $timeStamp
     */
    public function __construct(int $userId, int $tierId, string $timeStamp)
    {
        $this->userId = $userId;
        $this->tierId = $tierId;
        $this->timeStamp = $timeStamp;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return int
     */
    public function getTierId(): int
    {
        return $this->tierId;
    }

    /**
     * @return string
     */
    public function getTimeStamp(): string
    {
        return $this->timeStamp;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @param int $tierId
     */
    public function setTierId(int $tierId): void
    {
        $this->tierId = $tierId;
    }

    /**
     * @param string $timeStamp
     */
    public function setTimeStamp(string $timeStamp): void
    {
        $this->timeStamp = $timeStamp;
    }


}
