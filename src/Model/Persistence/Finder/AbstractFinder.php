<?php


namespace App\Model\Persistence\Finder;

use PDO;
/**
 * Class AbstractFinder
 * @package App\Model\Persistence\Finder
 */
abstract class AbstractFinder
{
    /**
     * @var PDO
     */
    private $pdo;

    /**
     * AbstractFinder constructor.
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