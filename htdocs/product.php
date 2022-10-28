<?php
require('products_db.php');
require('components/header.php');

$id = 1;

$title = get_product_title($id);
$img_url = get_img_url($id);

require('components/product_info.php');
require('components/footer.php');
