<?php

// TODO: Implement security checks: Shopify HMAC and Domain from headers
use WPS\DB\Products;
use WPS\Config;

$DB_Products = new Products(new Config());

$product = json_decode( file_get_contents('php://input') );

$DB_Products->update_product($product);