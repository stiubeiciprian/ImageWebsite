<?php

return [

    // Default action
    "/" => [$productController, 'showProducts'],

    // Product actions
    "/products" => [$productController, 'showProducts'],
    "/product" => [$productController, 'showProduct'],
    "/product/upload" => [$productController, 'upload'],
    "/product/buy" => [$productController, 'buy'],

    // User actions
    "/user/login" => [$userController, 'login'],
    "/user/logout" => [$userController, 'logout'],
    "/user/register" => [$userController, 'register'],
    "/user/orders" => [$userController, 'showOrders'],
    "/user/uploads" => [$userController, 'showUploads']

];