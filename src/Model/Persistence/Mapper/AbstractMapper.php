<?php


namespace App\Model\Persistence\Mapper;

use PDO;

/**
 * Class AbstractMapper
 * @package App\Model\Persistence\Mapper
 */
abstract class AbstractMapper
{
    /**
     * @var PDO
     */
    private $pdo;

    /**
     * AbstractMapper constructor.
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @return PDO
     */
    protected function getPDO() : PDO
    {
        return $this->pdo;
    }

}

