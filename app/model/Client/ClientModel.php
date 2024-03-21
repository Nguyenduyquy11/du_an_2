<?php 
    namespace App\model\Client;
    use App\model\Client\ClientBaseModel;
    class ClientModel extends ClientBaseModel{
        //sản phẩm
        function getALLSanPham(){
            $sql = "SELECT *FROM sanpham";
            return $this->getAllData($sql);
        }
        function getOneSanPham($id){
            $sql = "SELECT *FROM sanpham WHERE id = '$id'";
            return $this->getAllData($sql);
        }
        //Tài khoản
        function dangky($hoten,$tendangnhap,$matkhau,$sdt,){
            $sql = "INSERT INTO taikhoan (ho_ten_nguoi_dung,ten_dang_nhap,mat_khau,sdt) VALUES ('$hoten','$tendangnhap','$matkhau','$sdt')";
            return $this->getRowData($sql);
        }
        function dangnhap($tendangnhap,$matkhau){
            $sql = "SELECT *FROM taikhoan WHERE ten_dang_nhap='$tendangnhap' AND mat_khau = '$matkhau' ";
            return $this->getRowData($sql);
        }
        function updateTaiKhoan($id, $hotennguoidung,$tendangnhap,$matkhau,$sdt){
            $sql = "UPDATE taikhoan SET ho_ten_nguoi_dung = '$hotennguoidung' ,
            ten_dang_nhap = '$tendangnhap' , mat_khau = '$matkhau' , sdt = '$sdt' WHERE id = '$id'";
            return $this->getRowData($sql);
        }
        //Liên hệ
        function addLienHe($ten, $email, $noidung){
            $sql = "INSERT INTO lienhe (ten,email,noi_dung) VALUES ('$ten' , '$email' , '$noidung')";
            return $this->getRowData($sql);
        }
        
    }   

?>