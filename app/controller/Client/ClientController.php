<?php

namespace App\controller\Client;

use App\model\Client\ClientModel;

class ClientController extends ClientBaseController
{
    protected $modelClient;
    function __construct()
    {
        $this->modelClient = new ClientModel();
    }
    function index()
    {
        $getAllSp = $this->modelClient->getALLSanPham();
        $getAllDM = $this->modelClient->getAllDanhMuc();
        return $this->render('Client.layout.header', ['getAllSp' => $getAllSp, 'getAllDM' => $getAllDM]);
    }
    function formdangnhap()
    {
        return $this->render('Client.layout.taikhoan.dangnhap');
    }
    function dangnhapTK()
    {
        if (isset($_POST['dangnhap'])) {
            $checkuser = $this->modelClient->dangnhap($_POST['tendangnhap'], $_POST['matkhau']);
            if (is_array($checkuser)) {
                $_SESSION['taikhoan'] = $checkuser;
                header("Location: index.php");
            } else {
                echo "<script>
                        alert('Tài khoản không tồn tại');
                        window.location = '{$_SERVER['HTTP_REFERER']}' 
                     </script>";
            }
        }
    }
    function formdangky()
    {
        return $this->render('Client.layout.taikhoan.dangky');
    }
    function dangkyTK()
    {
        if (isset($_POST['dangky'])) {
            $this->modelClient->dangky($_POST['hoten'], $_POST['tendangnhap'], $_POST['matkhau'], $_POST['sdt']);
        }
        echo "<script>
                        alert('Đăng ký thành công! Vui lòng đăng nhập');
                        window.location.href = 'index.php';
                    </script>";
    }
    function dangxuat()
    {
        session_unset();
        header("Location: index.php");
    }
    function formaccount()
    {
        $getAllDM = $this->modelClient->getAllDanhMuc();
        return $this->render('Client.layout.taikhoan.myaccount', ['getAllDM' => $getAllDM]);
    }
    function editTK()
    {
        if (isset($_POST['editTK'])) {
            $this->modelClient->updateTaiKhoan($_POST['id'], $_POST['hoten'], $_POST['tendangnhap'], $_POST['matkhau'], $_POST['sdt']);
            $_SESSION['taikhoan'] = $this->modelClient->dangnhap($_POST['tendangnhap'], $_POST['matkhau']);
            // header("Location: index.php");
        }
        echo "<script>
                        alert('Cập nhật thành công!');
                        window.location.href = 'myaccount';
                    </script>";
    }
    function formgiohang()
    {

        $getAllDM = $this->modelClient->getAllDanhMuc();
        return $this->render('Client.layout.giohang.giohang', ['getAllDM' => $getAllDM]);
    }
    function sanphamct()
    {
        $idtk = '';
        if (isset($_GET['id'])) {
            if(isset($_SESSION['taikhoan'])){
                $idtk = $_SESSION['taikhoan']['id'];
            }
            $getAllSp = $this->modelClient->getALLSanPham();
            $getAllBL = $this->modelClient->getAllBinhLuan($_GET['id'], $idtk);
            $oneSanPham = $this->modelClient->getOneSanPham($_GET['id']);
            return $this->render('Client.layout.sanpham.sanphamct', ['oneSanPham' => $oneSanPham, 'getAllBL' => $getAllBL, 'getAllSp' => $getAllSp]);
        }
    }
    function allSanPham()
    {
        $getAllSp = $this->modelClient->getALLSanPham();
        $getAllDM = $this->modelClient->getAllDanhMuc();

        return $this->render('Client.layout.sanpham.allsanpham', ['getAllSp' => $getAllSp, 'getAllDM' => $getAllDM]);
    }
    function sanphamDM()
    {
        if (isset($_GET['id']) && $_GET['id']) {
            $dssp = $this->modelClient->loaddsp_dm($_GET['id']);
            $getAllDM = $this->modelClient->getAllDanhMuc();
            return $this->render('Client.layout.sanpham.sanpham', ['dssp' => $dssp, 'getAllDM' => $getAllDM]);
        }
    }
    function formlienhe()
    {
        return $this->render('Client.layout.lienhe.index');
    }
    function addLH()
    {
        if (isset($_POST['addlienhe'])) {
            $this->modelClient->addLienHe($_POST['ten'], $_POST['email'], $_POST['noidung']);
            echo "<script>
                alert('Cập nhật thành công!');
                window.location.href = 'formlienhe';
            </script>";
        }
    }
    function formquenMK()
    {
        return $this->render('Client.layout.taikhoan.quenmk');
    }
    function quenMK()
    {
        if (isset($_POST['quenmk'])) {
            $tendangnhap = $_POST['tendangnhap'];
            // var_dump($tendangnhap);
            $check = $this->modelClient->checkMK($tendangnhap);
            // var_dump($check);
            if (is_array($check)) {
                $matkhau = $check['mat_khau'];
                echo "Mật khẩu của bạn là: " . $matkhau;
            } else {
                echo "Tài khoản không tồn tại";
            }
            return $this->render('Client.layout.taikhoan.quenmk');
        }
    }
    function setAvt(){
        if(isset($_POST['addAvt'])){
            if(isset($_SESSION['taikhoan'])){
                $idtk = $_SESSION['taikhoan']['id'];
            }
           if(isset($_FILES['avt'])){
                $target_dir = 'app/img/';
                $image = $_FILES['avt']['name'];
                $target_file = $target_dir . $image;
                move_uploaded_file($_FILES['avt']['tmp_name'], $target_file);
           }
           $this->modelClient->addAvatar($idtk, $target_file);
           header('Location: myaccount');
           echo "Thêm thành công";
        }
    }
    // Giỏ hàng

    function addtocart()
    {
        if (isset($_POST['addtocart'])) {
            $id = $_POST['idsp'];
            $tensp = $_POST['ten_san_pham'];
            $gia = $_POST['gia'];
            $gia = intval($gia);
            $anhsp = $_POST['anh_sp'];
            if (isset($_POST['soluong'])) {
                $soluong = $_POST['soluong'];
            } else {
                $soluong = 1;
            }
            $tinhtien = $soluong * $gia;
            $spAddToCart = [$id, $tensp, $gia, $anhsp, $soluong, $tinhtien];
            array_push($_SESSION['my_cart'], $spAddToCart);
        }
        $getAllDM = $this->modelClient->getAllDanhMuc();
        return $this->render('Client.layout.giohang.giohang', ['getAllDM' => $getAllDM]);
    }
    function delCart()
    {
        if (isset($_SESSION['my_cart']) && is_array($_SESSION['my_cart'])) {

            if (isset($_GET['idsp'])) {
                var_dump($_GET['idsp']);
                $idsp = intval($_GET['idsp']);
                array_splice($_SESSION['my_cart'], $idsp, 1);
                // var_dump($_SESSION['my_cart']);
            } else {
                $_SESSION['my_cart'] = [];
            }
        } else {
            $_SESSION['my_cart'] = [];
        }
        header("Location: formgiohang");
        exit();
    }
    //Thanh toán
    function formthanhtoan()
    {
        $getAllDM = $this->modelClient->getAllDanhMuc();
        return $this->render('Client.layout.giohang.thanhtoan', ['getAllDM' => $getAllDM]);
    }
    function tonggiatridonhang()
    {
        $tong = 0;
        foreach ($_SESSION['my_cart'] as $key => $value) {
            $tong = $tong + $value['5'];
            return $tong;
        }
    }
    function addHoaDon()
    {
        if (isset($_SESSION['taikhoan'])) {
            if (isset($_POST['thanhtoan'])) {
                if (isset($_SESSION['taikhoan'])) {
                    $iduser = $_SESSION['taikhoan']['id'];
                } else {
                    $iduser = 0;
                }
                $tonggiatridonhang = $this->tonggiatridonhang();
                date_default_timezone_set("Asia/Shanghai");
                $ngaydathang = date("Y-m-d H:i:s");
                $idHoaHon =  $this->modelClient->addHD($iduser, $_POST['hoten'], $_POST['sdt'], $_POST['diachi'], $ngaydathang, $_POST['pt_thanh_toan'], $tonggiatridonhang);
                // var_dump($idHoaHon);
                foreach ($_SESSION['my_cart'] as $key => $value) {
                    // $spAddToCart = [$id, $tensp, $gia, $anhsp, $soluong, $tinhtien];
                    $this->modelClient->addHDCT($idHoaHon, $value['0'], $value['1'], $value['3'], $value['2'], $value['4'], $value['5']);
                }
                unset($_SESSION['my_cart']);
                header("Location: index.php");
            }
        } else {
            echo "<script> alert('Bạn cần đăng nhập để mua hàng');
                           window.location = '{$_SERVER['HTTP_REFERER']}'
                </script>";
        }
    }
    function mycart()
    {
        if(isset($_GET['id'])){
            // $list = $this->modelClient->loadAllHoaDon($_SESSION['taikhoan']['id']);
            $getAllHD = $this->modelClient->getAllHoaDon($_GET['id']);
            $getAllDM = $this->modelClient->getAllDanhMuc();
            $listTtdh = $this->modelClient->getTtdh();
            return $this->render('Client.layout.giohang.donhang', ['getAllDM' => $getAllDM, 'getAllHD' => $getAllHD, 'listTtdh' => $listTtdh]);
        }
    }
    function ctDonHang()
    {
        if (isset($_GET['id'])) {
            $getOneHoaDonCt = $this->modelClient->getOneHoaDonCt($_GET['id']);
            $getOneHoaDon = $this->modelClient->getOneHoaDon($_GET['id']);
            $getAllDM = $this->modelClient->getAllDanhMuc();
            return $this->render('Client.layout.giohang.donhangct', ['getAllDM' => $getAllDM, 'getOneHoaDon' => $getOneHoaDon, 'getOneHoaDonCt' => $getOneHoaDonCt]);
        }
    }
    function huyhd(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $this->modelClient->huyDonHang($id);
            echo "<script>
                    window.location = '{$_SERVER['HTTP_REFERER']}'
                 </script>";
        }
    }
    function danhanhang(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $this->modelClient->ghThanhCong($id);
            echo "<script> 
                    window.location = '{$_SERVER['HTTP_REFERER']}'
                </script>";
        }
    }
    function addbinhluan()
    {
        if (isset($_POST['binhluan'])) {
            if (isset($_SESSION['taikhoan'])) {
                $tendn = $_SESSION['taikhoan']['ho_ten_nguoi_dung'];
                $iduser = $_SESSION['taikhoan']['id'];
                $avtuser = $_SESSION['taikhoan']['img'];
            }
            else {
                echo "<script> alert('Bạn cần đăng nhập để bình luận');
                               window.location = '{$_SERVER['HTTP_REFERER']}'
                     </script>";
            }
            date_default_timezone_set("Asia/Shanghai");
            $ngaybinhluan = date("Y-m-d H:i:s");
            $this->modelClient->addBL($tendn, $_POST['noidung'], $ngaybinhluan,$_POST['idsp'],$iduser,$avtuser);
            if (isset($_SERVER['HTTP_REFERER'])) {
                header("Location: " . $_SERVER['HTTP_REFERER']);
            }
            exit;
        }
    }
}
