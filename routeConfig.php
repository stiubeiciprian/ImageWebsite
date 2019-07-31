<?php

return [

    // Default action
    "/" => [$productController, 'showProducts'],

    // Product actions
    "/products" => [$productController, 'showProducts'],
    "/product" => [$productController, 'showProduct'],
    "/product/upload" => [$productController, 'uploadProduct'],
    "/product/buy" => [$productController, 'buyProduct'],

    // User actions
    "/user/login" => [$userController, 'login'],
    "/user/logout" => [$userController, 'logout'],
    "/user/register" => [$userController, 'register'],
    "/user/orders" => [$userController, 'showOrders'],
    "/user/uploads" => [$userController, 'showUploads']

];