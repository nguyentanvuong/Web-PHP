<?php
$cart = loadClass('cart');
//Đăng nhập mới mua được giõ hàng
if (!isset($_SESSION['user_customer']))
{
    // chuyển hướng đang nhập trang người dùng
    redirect('index.php?option=customer&cat=login');
}else
{
    //đặt mua
    require_once('views/cart-buy.php');

}