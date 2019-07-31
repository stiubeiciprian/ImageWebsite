<?php


namespace App\Model\FormMappers;

use App\Core\Session;
use App\Model\Domain\Product;

class UploadFormMapper
{
    /**
     * @param array $formArray
     * @return Product
     */
    public static function mapToObject(array $formArray){

        return new Product(
            0,
            Session::getSessionValue(SESSION_USER_ID),
            $formArray[IMAGE_NAME],
            $formArray[IMAGE_DESCRIPTION],
            [],
            $formArray[IMAGE_CAMERA_SPECS],
            $formArray[IMAGE_DATE],
            ''
        );

    }
}