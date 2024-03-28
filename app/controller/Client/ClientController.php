<?php
    namespace App\controller\Client;
   use App\model\Client\ClientModel;
    class ClientController extends ClientBaseController{
        protected $modelClient;
        function __construct()
        {
            $this->modelClient = new ClientModel();
        }
        function index(){
            $getAllSp = $this->modelClient->getALLSanPham();
            $getAllDM = $this->modelClient->getAllDanhMuc();
            return $this->render('Client.layout.header', ['getAllSp' => $getAllSp, 'getAllDM' => $getAllDM]);
        }
        function formdangnhap(){
            return $this->render('Client.layout.taikhoan.dangnhap');
        }
        function dangnhapTK(){
            if(isset($_POST['dangnhap'])){
                $checkuser = $this->modelClient->dangnhap($_POST['tendangnhap'],$_POST['matkhau']);
                if(is_array($checkuser)){
                    $_SESSION['taikhoan'] = $checkuser;
                    echo "<script>
                            alert('Đăng nhập thành công!');
                            window.location.href = 'index.php';
                        </script>";
                }else{
                    echo $thongbao = "Tài khoản không tồn tại";
                }
            }
        }
        function formdangky(){
            return $this->render('Client.layout.taikhoan.dangky');
        }
        function dangkyTK(){
            if(isset($_POST['dangky'])){
                $this->modelClient->dangky($_POST['hoten'],$_POST['tendangnhap'],$_POST['matkhau'],$_POST['sdt']);
            }
            echo "<script>
                        alert('Đăng ký thành công! Vui lòng đăng nhập');
                        window.location.href = 'index.php';
                    </script>";
        }
        function dangxuat(){
            session_unset();
            header("Location: index.php");
        }
        function formaccount(){
             return $this->render('Client.layout.taikhoan.myaccount');
         }
         function editTK(){
            if(isset($_POST['editTK'])){
                $this->modelClient->updateTaiKhoan($_POST['id'],$_POST['hoten'],$_POST['tendangnhap'],$_POST['matkhau'],$_POST['sdt']);
                $_SESSION['taikhoan'] = $this->modelClient->dangnhap($_POST['tendangnhap'],$_POST['matkhau']);
                // header("Location: index.php");
            }
            echo "<script>
                        alert('Cập nhật thành công!');
                        window.location.href = 'myaccount';
                    </script>";
         }
         function formgiohang(){
            $getAllDM = $this->modelClient->getAllDanhMuc();
            return $this->render('Client.layout.giohang.giohang', ['getAllDM' => $getAllDM]);
         }
         function sanphamct(){
           if(isset($_GET['id'])){
            $oneSanPham = $this->modelClient->getOneSanPham($_GET['id']);
            return $this->render('Client.layout.sanpham.sanphamct', ['oneSanPham' => $oneSanPham]);
           }
         }
         function allSanPham(){
            $getAllSp = $this->modelClient->getALLSanPham();
            $getAllDM = $this->modelClient->getAllDanhMuc();

            return $this->render('Client.layout.sanpham.allsanpham', ['getAllSp' => $getAllSp, 'getAllDM' => $getAllDM]);
         }
         function sanphamDM(){
            if(isset($_GET['id']) && $_GET['id']){
             $dssp = $this->modelClient->loaddsp_dm($_GET['id']);
             $getAllDM = $this->modelClient->getAllDanhMuc();
             return $this->render('Client.layout.sanpham.sanpham', ['dssp' => $dssp, 'getAllDM' =>$getAllDM]);
            }
          }
         function formlienhe(){
            return $this->render('Client.layout.lienhe.index');
         }
         function addLH(){
            if(isset($_POST['addlienhe'])){
                $this->modelClient->addLienHe($_POST['ten'],$_POST['email'],$_POST['noidung']);
                echo "<script>
                alert('Cập nhật thành công!');
                window.location.href = 'formlienhe';
            </script>";
            }
         }
         function formquenMK(){
            return $this->render('Client.layout.taikhoan.quenmk');
         }
         function quenMK(){
            if(isset($_POST['quenmk'])){
                $tendangnhap = $_POST['tendangnhap'];
                // var_dump($tendangnhap);
                $check = $this->modelClient->checkMK($tendangnhap);
                // var_dump($check);
                if(is_array($check)){
                    $matkhau = $check['mat_khau'];
                    echo "Mật khẩu của bạn là: ".$matkhau;
                }else{
                    echo "Tài khoản không tồn tại";
                }
                return $this->render('Client.layout.taikhoan.quenmk');
            }
         }
         // Gior hangf
         
         function addtocart(){
            if(isset($_POST['addtocart'])){
                $id = $_POST['idsp'];
                $tensp = $_POST['ten_san_pham'];
                $gia = $_POST['gia'];
                $gia = intval($gia);
                $anhsp = $_POST['anh_sp'];
                if(isset($_POST['soluong'])){
                    $soluong = $_POST['soluong'];
                }else{
                    $soluong = 1;
                }
                $tinhtien = $soluong * $gia;
                $spAddToCart = [$id, $tensp, $gia, $anhsp, $soluong, $tinhtien];
                array_push($_SESSION['my_cart'], $spAddToCart);
            }
            $getAllDM = $this->modelClient->getAllDanhMuc();
           return $this->render('Client.layout.giohang.giohang', ['getAllDM' => $getAllDM]);
         }
         function delCart(){
            if(isset($_SESSION['my_cart']) && is_array($_SESSION['my_cart'])){
                
                if(isset($_GET['idsp'])){
                    var_dump($_GET['idsp']);
                    $idsp = intval($_GET['idsp']);
                    array_splice($_SESSION['my_cart'],$idsp,1);
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
        
    }
?>
