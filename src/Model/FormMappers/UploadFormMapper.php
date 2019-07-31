<?php


namespace App\Model\FormMappers;

use App\Core\Session
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
            IMAGE_NAME,
            IMAGE_DESCRIPTION,
            [],
            IMAGE_CAMERA_SPECS,
            IMAGE_DATE,
            ''
        );

    }
}