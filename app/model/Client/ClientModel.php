<?php

namespace App\model\Client;

use App\model\Client\ClientBaseModel;

class ClientModel extends ClientBaseModel
{
    //sản phẩm
    function getALLSanPham()
    {
        $sql = "SELECT *FROM sanpham";
        return $this->getAllData($sql);
    }
    function getOneSanPham($id)
    {
        $sql = "SELECT *FROM sanpham WHERE id = '$id'";
        return $this->getAllData($sql);
    }
    function getOneDanhMuc($id)
    {
        $sql = "SELECT *FROM danhmuc WHERE id = '$id'";
        return $this->getAllData($sql);
    }
    function loaddsp_dm($dmid)
    {
        $sql = "SELECT *FROM sanpham WHERE danh_muc_id = '$dmid'";
        return $this->getAllData($sql);
    }
    //Danh mục
    function getAllDanhMuc()
    {
        $sql = "SELECT *FROM danhmuc";
        return $this->getAllData($sql);
    }
    //Tài khoản
    function dangky($hoten, $tendangnhap, $matkhau, $sdt,)
    {
        $sql = "INSERT INTO taikhoan (ho_ten_nguoi_dung,ten_dang_nhap,mat_khau,sdt) VALUES ('$hoten','$tendangnhap','$matkhau','$sdt')";
        return $this->getRowData($sql);
    }
    function dangnhap($tendangnhap, $matkhau)
    {
        $sql = "SELECT *FROM taikhoan WHERE ten_dang_nhap='$tendangnhap' AND mat_khau = '$matkhau' ";
        return $this->getRowData($sql);
    }
    function updateTaiKhoan($id, $hotennguoidung, $tendangnhap, $matkhau, $sdt)
    {
        $sql = "UPDATE taikhoan SET ho_ten_nguoi_dung = '$hotennguoidung' ,
            ten_dang_nhap = '$tendangnhap' , mat_khau = '$matkhau' , sdt = '$sdt' WHERE id = '$id'";
        return $this->getRowData($sql);
    }
    function checkMK($tendangnhap)
    {
        $sql = "SELECT *FROM taikhoan WHERE ten_dang_nhap = '$tendangnhap'";
        return $this->getRowData($sql);
    }
    //Liên hệ
    function addLienHe($ten, $email, $noidung)
    {
        $sql = "INSERT INTO lienhe (ten,email,noi_dung) VALUES ('$ten' , '$email' , '$noidung')";
        return $this->getRowData($sql);
    }
    //Thanh toán
    function addHD($tennguoinhan,$sdt,$diachi,$ngaydat,$pttt,$tonggiatridonhang,)
    {
        $sql = "INSERT INTO hoadon (ten_nguoi_nhan,sdt_nguoi_nhan,dia_chi,ngay_dat_hang,
        pt_thanh_toan,tong_tien) VALUES ('$tennguoinhan' , '$sdt' , '$diachi', '$ngaydat', '$pttt', '$tonggiatridonhang')";
        return $this->getRowData($sql);
    }
    //Hóa đơn
    function getAllHoaDon(){
        $sql = "SELECT *FROM hoadon";
        return $this->getAllData($sql);
    }
}
