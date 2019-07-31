<?php


namespace App\Model\Persistence\Finder;


use App\Model\Domain\Tag;
use PDO;

class TagFinder extends AbstractFinder
{
    /**
     * Returns tag with given id or with id 0 if not found.
     * @param int $id
     * @return Tag
     */
    public function findById(Tag $tag): Tag
    {
        $sql = "SELECT * FROM tag WHERE id=?";

        $statement = $this->getPdo()->prepare($sql);
        $statement->bindValue(1, $tag->getId(), PDO::PARAM_INT);
        $statement->execute();

        $fetchResult = $statement->fetch(PDO::FETCH_ASSOC);

        return $this->translateToTag($fetchResult);
    }


    /**
     * @param Tag $tag
     * @return array
     */
    public function getAll(): array
    {
        $sql = "SELECT * FROM tag";

        $statement = $this->getPdo()->prepare($sql);
        $statement->execute();

        $fetchResult = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $this->translateToTagsArray($fetchResult);
    }

    /**
     * Creates a tag from the given associative array.
     * @param array $fetchResult
     * @return Tag
     */
    private function translateToTag($fetchResult): Tag
    {
        if (false == $fetchResult) {
           return new Tag(0, '');
        }

        return new Tag(
            $fetchResult[SQL_TAG_ID],
            $fetchResult[SQL_TAG_NAME]
        );
    }

    /**
     * Creates an array of Tags from a given array.
     * @param array $products
     * @return array
     */
    private function translateToTagsArray(array $tags) : array
    {
        $tagsArray = [];

        foreach ($tags as $item){
  ;
            $tagsArray[] = $this->translateToTag($item);
        }

        return $tagsArray;
    }
}