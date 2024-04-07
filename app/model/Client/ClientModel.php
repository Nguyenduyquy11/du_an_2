<?php

namespace App\model\Client;

use App\model\Client\ClientBaseModel;

class ClientModel extends ClientBaseModel
{

    private $ttdh = [
        '0' => "Chờ xác nhận",
        '1' => "Đã xác nhận",
        '2' => "Đang giao hàng",
        '3' => "Đã giao hàng",
        '4' => "Giao hàng thành công",
        '5' => "Đơn hàng đã hủy"
    ];

    public function getTtdh()
    {
        return $this->ttdh;
    }

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
    function addAvatar($idtk, $avt)
    {
        $sql = "UPDATE taikhoan SET img = '$avt' WHERE id = '$idtk'";
        return $this->getRowData($sql);
    }
    function getImg($id)
    {
        $sql = "SELECT img FROM taikhoan WHERE id = '$id'";
        return $this->getRowData($sql);
    }
    //Liên hệ
    function addLienHe($ten, $email, $noidung)
    {
        $sql = "INSERT INTO lienhe (ten,email,noi_dung) VALUES ('$ten' , '$email' , '$noidung')";
        return $this->getRowData($sql);
    }
    //Thanh toán
    function addHD($iduser, $tennguoinhan, $sdt, $diachi, $ngaydat, $pttt, $tonggiatridonhang,)
    {
        $sql = "INSERT INTO hoadon (id_nguoi_nhan,ten_nguoi_nhan,sdt_nguoi_nhan,dia_chi,ngay_dat_hang,
        pt_thanh_toan,tong_tien) VALUES ('$iduser' ,'$tennguoinhan' , '$sdt' , '$diachi', '$ngaydat', '$pttt', '$tonggiatridonhang')";
        $idHoaDon = $this->insertAndGetLastInsertId($sql);
        return $idHoaDon;
    }
    function addHDCT($idhoadon, $idsanpham, $tensanpham, $anhsp, $gia_sp, $soluong, $dongia)
    {
        $sql = "INSERT INTO hoadonchitiet (hoa_don_id,san_pham_id,ten_san_pham,anh_sp,gia_sp,so_luong,don_gia)
        VALUES ('$idhoadon','$idsanpham','$tensanpham','$anhsp','$gia_sp','$soluong','$dongia') ";
        return $this->getRowData($sql);
    }
    //Hóa đơn
    function getAllHoaDon($id)
    {
        $sql = "SELECT *FROM hoadon WHERE id_nguoi_nhan = '$id'";
        return $this->getAllData($sql);
    }

    function getOneHoaDon($id)
    {
        $sql = "SELECT *FROM hoadon WHERE id = '$id'";
        return $this->getRowData($sql);
    }
    function getOneHoaDonCt($id)
    {
        $sql = "SELECT hoadonchitiet .*, hoadon.ten_nguoi_nhan, hoadon.sdt_nguoi_nhan, hoadon.dia_chi, 
        hoadon.ngay_dat_hang FROM hoadonchitiet JOIN hoadon ON hoadonchitiet.hoa_don_id = hoadon.id WHERE
        hoadonchitiet.hoa_don_id = '$id' ORDER BY hoadonchitiet.hoa_don_id DESC ";
        return $this->getRowData($sql);
    }
    function loadAllHoaDon($iduser)
    {
        $sql = "SELECT * FROM hoadon WHERE 1 ";
        if ($iduser > 0) {
            $sql .= "AND id_nguoi_nhan ='$iduser' ";
        }
        $sql .= "ORDER BY id DESC";
        return $this->getRowData($sql);
    }
    // function getTrangThai($variable)
    // {
    //     switch ($variable) {
    //         case '0':
    //             $tt = "Chờ xác nhận";
    //             break;
    //         case '1':
    //             $tt = "Đã xác nhận";
    //             break;
    //         case '2':
    //             $tt = "Đang giao hàng";
    //             break;
    //         case '3':
    //             $tt = "Đã giao hàng";
    //             break;
    //         case '4':
    //             $tt = "Giao hàng thành công";
    //             break;
    //         case '5':
    //             $tt = "Đơn hàng đã hủy";
    //             break;

    //         default:
    //             $tt = "Đơn hàng mới";
    //             break;
    //     }
    //     return $tt;
    // }
    //Binh luan
    function addBL($tendn, $noidung, $ngaybinhluan, $idsp, $iduser, $avtuser)
    {
        $sql = "INSERT INTO binhluan (ten_nguoi_binh_luan,noi_dung,ngay_binh_luan,id_san_pham,id_user,avt_user ) VALUES ('$tendn','$noidung','$ngaybinhluan','$idsp','$iduser','$avtuser')";
        return $this->getRowData($sql);
    }
    function getAllBinhLuan($idsp, $iduser)
    {
        // $sql = "SELECT binhluan .*, taikhoan.ten_dang_nhap, taikhoan.img, sanpham.id FROM binhluan
        // JOIN taikhoan ON binhluan.ten_nguoi_binh_luan = taikhoan.id
        // JOIN sanpham ON binhluan.id_san_pham = sanpham.id WHERE id_san_pham = '$idsp'";
        $sql = "SELECT * FROM binhluan WHERE id_san_pham = '$idsp' AND id_user = '$iduser'";
        return $this->getAllData($sql);
    }
}
