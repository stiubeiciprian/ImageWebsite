<?php

//USER TABLE
const SQL_USER_TABLE = "user";

const SQL_USER_ID = "id";
const SQL_USER_NAME = "name";
const SQL_USER_EMAIL = "email";
const SQL_USER_PASSWORD = "password";

//PRODUCT TABLE
const SQL_PRODUCT_TABLE = "product";

const SQL_PRODUCT_ID = "id";
const SQL_PRODUCT_TITLE = "title";
const SQL_PRODUCT_DESCRIPTION = "description";
const SQL_PRODUCT_CAMERA_SPECS = "cameraSpecs";
const SQL_PRODUCT_CAPTURE_DATE = "captureDate";
const SQL_PRODUCT_THUMBNAIL_PATH = "thumbnailPath";
const SQL_PRODUCT_USER_ID = "user_id";

//TIER TABLE
const SQL_TIER_TABLE = "tier";

const SQL_TIER_ID = "id";
const SQL_TIER_PRICE = "price";
const SQL_TIER_PATH_WITH_WATERMARK = "pathWithWatermark";
const SQL_TIER_PATH_WITHOUT_WATERMARK = "pathWithoutWatermark";
const SQL_TIER_SIZE = "size";
const SQL_TIER_PRODUCT_ID = "product_id";

//ORDER_ITEM TABLE
const SQL_ORDER_ITEM_TABLE = "orderItem";

const SQL_ORDER_ITEM_ID = "id";
const SQL_ORDER_ITEM_CREATED_AT = "createdAt";
const SQL_ORDER_ITEM_USER_ID = "user_id";
const SQL_ORDER_ITEM_TIER_ID = "tier_id";

//PRODUCT_TAG TABLE
const SQL_PRODUCT_TAG_TABLE = "ProductTag";

const SQL_PRODUCT_TAG_ID = "id";
const SQL_PRODUCT_TAG_PRODUCT_ID = "product_id";
const SQL_PRODUCT_TAG_TAG_ID = "tag_id";

//TAG TABLE
const SQL_TAG_TABLE = "tag";

const SQL_TAG_ID = "id";
const SQL_TAG_NAME = "name";