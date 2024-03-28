<?php
session_start();
if (!isset($_SESSION['my_cart'])) {
    $_SESSION['my_cart'] = [];
}
require_once 'env.php';
require_once 'vendor/autoload.php';
require_once 'app/common/route.php';
