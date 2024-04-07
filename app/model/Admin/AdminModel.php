<?php

namespace App\model\Admin;

use App\model\Admin\AdminBaseModel;

class AdminModel extends AdminBaseModel
{
    function getAllDanhMuc()
    {
        $sql = "select * from danhmuc";
        return $this->getAllData($sql);
    }
    function addDanhMuc($tendanhmuc)
    {
        $sql = "INSERT INTO danhmuc (ten_danh_muc) VALUES ('$tendanhmuc')";
        return $this->getRowData($sql);
    }
    function getOneDanhMuc($id)
    {
        $sql = "SELECT *FROM danhmuc WHERE id ='$id'";
        return $this->getRowData($sql);
    }
    function updateDanhMuc($id, $tendanhmuc)
    {
        $sql = "UPDATE danhmuc SET ten_danh_muc = '$tendanhmuc' WHERE id = '$id'";
        return $this->getRowData($sql);
    }
    function deleteDanhMuc($id)
    {
        $sql = "DELETE FROM danhmuc WHERE id = '$id'";
        return $this->getRowData($sql);
    }
    // Sản phẩm
    function addSanPham($tensanpham, $giasanpham, $target_file, $mota, $danhmucsanpham)
    {
        $sql = "INSERT INTO sanpham (ten_san_pham,gia,anh_sp,mo_ta,danh_muc_id) VALUES
             ('$tensanpham', '$giasanpham', '$target_file', '$mota', '$danhmucsanpham')";
        return $this->getRowData($sql);
    }
    function getAllSanPham()
    {
        $sql = " SELECT sanpham .*, danhmuc.ten_danh_muc 
            FROM sanpham INNER JOIN danhmuc ON sanpham.danh_muc_id = danhmuc.id";
        return $this->getAllData($sql);
    }
    function getOneSanPham($id)
    {
        $sql = "SELECT *FROM sanpham WHERE id ='$id'";
        return $this->getRowData($sql);
    }
    function deleteSanPham($id)
    {
        $sql = "DELETE FROM sanpham WHERE id = '$id'";
        return $this->getRowData($sql);
    }
    function updateSanPham($id, $tensanpham, $gia, $target_file, $mota, $danhmucid)
    {
        $sql = "UPDATE sanpham SET ten_san_pham = '$tensanpham' , gia = '$gia',
            anh_sp = '$target_file' , mo_ta = '$mota', danh_muc_id = '$danhmucid' WHERE id = '$id'";
        return $this->getRowData($sql);
    }
    //Chức vụ
    function getAllChucVu()
    {
        $sql = "select * from chucvu";
        return $this->getAllData($sql);
    }
    function addChucVu($tenchucvu)
    {
        $sql = "INSERT INTO chucvu (ten_chuc_vu) VALUES ('$tenchucvu')";
        return $this->getRowData($sql);
    }
    function getOneChucVu($id)
    {
        $sql = "SELECT *FROM chucvu WHERE id ='$id'";
        return $this->getRowData($sql);
    }
    function updateChucVu($id, $tenchucvu)
    {
        $sql = "UPDATE chucvu SET ten_chuc_vu = '$tenchucvu' WHERE id = '$id'";
        return $this->getRowData($sql);
    }
    function deleteChucVu($id)
    {
        $sql = "DELETE FROM chucvu WHERE id = '$id'";
        return $this->getRowData($sql);
    }
    //Liên hệ
    function getAllLienHe()
    {
        $sql = "SELECT *FROM lienhe";
        return $this->getAllData($sql);
    }
    //Hóa đơn
    private $ttdh = [
        '0' => "Chờ xác nhận",
        '1' => "Đã xác nhận",
        '2' => "Đang giao hàng",
        '3' => "Đã giao hàng",
        '4' => "Giao hàng thành công",
        '5' => "Đơn hàng đã hủy"
    ];
    public function getTtdh(){
        return $this->ttdh;
    }
    function getAllHoaDon()
    {
        $sql = "SELECT * FROM hoadon";
        return $this->getAllData($sql);
    }
    function get_one_hoa_don($id){
        $sql = "SELECT * FROM hoadon WHERE id = '$id' ";
        return $this->getRowData($sql);
    }
    function update_tt($id, $tt){
        $sql = "UPDATE hoadon SET trang_thai = '$tt' WHERE id = '$id' ";
        return $this->getRowData($sql);
    }
}
