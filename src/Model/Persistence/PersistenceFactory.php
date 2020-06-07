<?php


namespace App\Model\Persistence;

use App\Model\Persistence\Finder\AbstractFinder;
use App\Model\Persistence\Mapper\AbstractMapper;
use PDO;

/**
 * Class PersistenceFactory
 * @package App\Model\Persistence
 */
class PersistenceFactory
{
    /**
     * @var \PDO
     */
    private static $pdo;

    /**
     * @var array
     */
    private static $mappers = [];

    /**
     * @var array
     */
    private static $finders = [];



    /**
     * Returns PDO instance.
     * @return \PDO
     */
    private static function createPDO() : \PDO
    {
        if (null === self::$pdo) {
            self::$pdo = new \PDO("mysql:host=localhost;dbname=App", "cipri", "paroladb");

            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$pdo->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
        }

        return self::$pdo;
    }

    /**
     * @param string $entityClass
     * @return AbstractMapper
     */
    public static function createMapper (string $entityClass) : AbstractMapper
    {
        $mapperClass = self::getMapperClassName($entityClass);

        if(!isset(self::$mappers[$mapperClass])) {
            self::$mappers[$mapperClass] = new $mapperClass(self::createPDO());
        }

        return self::$mappers[$mapperClass];
    }

    /**
     * @param string $entityClass
     * @return AbstractFinder
     */
    public static function createFinder(string $entityClass) : AbstractFinder
    {
        $finderClass = self::getFinderClassName($entityClass);

        if(!isset(self::$finders[$finderClass])) {
            self::$finders[$finderClass] = new $finderClass(self::createPDO());
        }

        return self::$finders[$finderClass];
    }

    /**
     * @param string $entityClass
     * @return string
     */
    private static function getMapperClassName(string $entityClass) : string
    {
        $entityClass = explode('\\', $entityClass);
        $entityClass = array_pop($entityClass);

        return "\\App\\Model\\Persistence\\Mapper\\".$entityClass."Mapper";
    }

    /**
     * @param string $entityClass
     * @return string
     */
    private static function getFinderClassName(string  $entityClass) :string
    {
        $entityClass = explode('\\', $entityClass);
        $entityClass = array_pop($entityClass);

        return "\\App\\Model\\Persistence\\Finder\\".$entityClass."Finder";
    }




}

