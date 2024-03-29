<?php

use Phroute\Phroute\RouteCollector;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector();

// filter check đăng nhập
// $router->filter('auth', function(){
//     if(!isset($_SESSION['auth']) || empty($_SESSION['auth'])){
//         header('location: ' . BASE_URL . 'login');die;
//     }
// });


//bắt đầu định nghĩa ra các đường dẫn
// $router->get('/', function(){
//     return "trang chủ";
// });

// Admin
$router->get('danhmuc', [App\controller\Admin\AdminController::class, 'getAllDM']);
$router->get('formadddm', [App\controller\Admin\AdminController::class, 'formadddm']);
$router->post('add', [App\controller\Admin\AdminController::class, 'addDM']);
$router->get('delete', [App\controller\Admin\AdminController::class, 'deleteDM']);
$router->get('formupdate', [App\controller\Admin\AdminController::class, 'formupdate']);
$router->post('update', [App\controller\Admin\AdminController::class, 'updateDM']);
// Admin-Sản phẩm
$router->get('admin', [App\controller\Admin\AdminController::class, 'admin']);
$router->get('sanpham', [App\controller\Admin\AdminController::class, 'getAllSP']);
$router->get('formaddsp', [App\controller\Admin\AdminController::class, 'formaddSP']);
$router->post('addSP', [App\controller\Admin\AdminController::class, 'addSPam']);
$router->get('formupdateSP', [App\controller\Admin\AdminController::class, 'formupdateSP']);
$router->post('updateSP', [App\controller\Admin\AdminController::class, 'updateSP']);
$router->get('deleteSP', [App\controller\Admin\AdminController::class, 'deleteSP']);
//Admin-Liên hệ
$router->get('lienhe', [App\controller\Admin\AdminController::class, 'alllienhe']);
$router->get('formupdateLH', [App\controller\Admin\AdminController::class, 'formupdateLH']);

//Chức vụ
$router->get('chucvu', [App\controller\Admin\AdminController::class, 'getAllCV']);
$router->get('formaddCV', [App\controller\Admin\AdminController::class, 'formaddCV']);
$router->post('addCV', [App\controller\Admin\AdminController::class, 'addCV']);
$router->get('formupdateCV', [App\controller\Admin\AdminController::class, 'formupdateCV']);
$router->post('updateCV', [App\controller\Admin\AdminController::class, 'updateCV']);
$router->get('deleteCV', [App\controller\Admin\AdminController::class, 'deleteCV']);
// Client
$router->get('/', [App\controller\Client\ClientController::class, 'index']);
$router->get('index', [App\controller\Client\ClientController::class, 'index']);
$router->get('formdangnhap', [App\controller\Client\ClientController::class, 'formdangnhap']);
$router->get('formdangky', [App\controller\Client\ClientController::class, 'formdangky']);
$router->get('formquenmk', [App\controller\Client\ClientController::class, 'formquenMK']);
$router->post('quenmk', [App\controller\Client\ClientController::class, 'quenMK']);
//San Pham
$router->post('dangky', [App\controller\Client\ClientController::class, 'dangkyTK']);
$router->post('dangnhap', [App\controller\Client\ClientController::class, 'dangnhapTK']);
$router->get('dangxuat', [App\controller\Client\ClientController::class, 'dangxuat']);
$router->get('myaccount', [App\controller\Client\ClientController::class, 'formaccount']);
$router->post('editTK', [App\controller\Client\ClientController::class, 'editTK']);
$router->get('formgiohang', [App\controller\Client\ClientController::class, 'formgiohang']);
$router->get('sanphamct', [App\controller\Client\ClientController::class, 'sanphamct']);
$router->get('sanpham-dmsp', [App\controller\Client\ClientController::class, 'sanphamDM']);
$router->get('allsanpham', [App\controller\Client\ClientController::class, 'allSanPham']);
$router->get('delSpCart', [App\controller\Client\ClientController::class, 'delCart']);

//Giỏ hàng
$router->post('addtocart', [App\controller\Client\ClientController::class, 'addtocart']);
$router->get('formthanhtoan', [App\controller\Client\ClientController::class, 'formthanhtoan']);
$router->post('thanhtoan', [App\controller\Client\ClientController::class, 'addHoaDon']);
$router->get('mycart', [App\controller\Client\ClientController::class, 'mycart']);
$router->get('xemcthoadon', [App\controller\Client\ClientController::class, 'ctDonHang']);




//Client-liên hệ
$router->get('formlienhe', [App\controller\Client\ClientController::class, 'formlienhe']);
$router->post('addlienhe', [App\controller\Client\ClientController::class, 'addLH']);










// $router->get('home', [App\controller\Client\ClientController::class, 'index']);












// Client

# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;


?>