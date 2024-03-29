<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        .btn-search {
            min-width: 100px;
            /* Điều chỉnh kích thước chiều rộng của nút */
        }
        * {
            box-sizing: border-box
        }
        /* Đẩy nút "Đăng nhập" sang phải */
        .navbar-nav .login-btn {
            margin-left: auto;
        }
        /* Thêm biểu tượng icon */
        .login-icon {
            margin-right: 5px;
        }
        /* Custom styles for footer */
        footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            position: absolute;
            bottom: 0;
            width: 100%;
        }
        .card {
            height: 100%;
            /* Thiết lập chiều cao của thẻ card */
        }
        .product-wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .product-item {
            flex: 0 0 calc(25% - 1rem);
            /* Đặt kích thước của mỗi ô sản phẩm */
            margin-bottom: 2rem;
            /* Khoảng cách giữa các ô sản phẩm */
        }
        /* Custom styles for shopping cart */
        .product-img {
            max-width: 100px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="index"><img src="./app/img/—Pngtree—am or ma abstract_6950476.png" alt="Logo" height="60" width="60"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index">Trang chủ</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Sản phẩm
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown" id="productDropdown">
                            <?php foreach ($getAllDM as $key => $value) { ?>
                                <li><a class="dropdown-item" href="sanpham-dmsp&id={{$value['id']}}">{{$value['ten_danh_muc']}}</a></li>
                            <?php } ?>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="allsanpham">Xem tất cả sản phẩm</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Dịch vụ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="formlienhe">Liên hệ</a>
                    </li>
                </ul>
                <!-- Form tìm kiếm -->
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Tìm kiếm">
                    <button class="btn btn-outline-success btn-search" type="submit">Tìm kiếm</button>
                </form>
                <!-- Nút "Đăng nhập" -->
                <?php if (isset($_SESSION['taikhoan'])) { ?>
                    <?php extract($_SESSION['taikhoan']); ?>
                    <ul class="navbar-nav login-btn">
                        <li class="nav-item">
                            <a class="nav-link" href="formgiohang"> <button class="btn btn-info">Giỏ hàng</button></a>
                        </li>
                        <li class="nav-item">
                            <?php if ($chuc_vu_id !== 2) { ?>
                                <a class="nav-link" href="admin"> <button class="btn btn-info">Admin</button></a>
                            <?php } ?>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="dangxuat"><button class="btn btn-info">Thoát</button></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="myaccount"><button class="btn btn-info">Tài khoản</button></a>
                        </li>
                    <?php } else { ?>
                    </ul>
                    <!-- Nút "Đăng ký" -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="formdangky"><button class="btn btn-info">Đăng ký</button></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="formdangnhap"><button class="btn btn-info">Đăng nhập</button></a>
                        </li>
                    </ul>
                <?php  } ?>
            </div>
        </div>
    </nav> <br>
    <body>
        <div class="container mt-5">
            <h2 class="mb-4">Chi Tiết Đơn Hàng</h2>
            <!-- Bảng chi tiết đơn hàng -->
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Mã Sản Phẩm</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Ảnh Sản Phẩm</th>
                                <th>Giá Sản Phẩm</th>
                                <th>Số Lượng</th>
                                <th>Thành Tiền</th>
                            </tr>
                        </thead>
                        <!-- Dữ liệu chi tiết đơn hàng -->
                        <tbody>
                            <tr>
                                <td><?php echo $getOneHoaDonCt['hoa_don_id'] ?></td>
                                <td><?php echo $getOneHoaDonCt['ten_san_pham'] ?></td>
                                <td><img src="<?php echo $getOneHoaDonCt['anh_sp'] ?>" alt="" width="100px" height="100px" ></td>
                                <td><?php echo $getOneHoaDonCt['gia_sp']. ' <strong style="color: red;">VNĐ</strong>'  ?></td>
                                <td><?php echo $getOneHoaDonCt['so_luong'] ?></td>
                                <td><?php echo $getOneHoaDonCt['don_gia']. ' <strong style="color: red;">VNĐ</strong>'   ?></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="5">Tổng Tiền Đơn Hàng</th>
                                <td><?php echo $getOneHoaDonCt['don_gia']. ' <strong style="color: red;">VNĐ</strong>' ?></td> <!-- Tổng tiền của đơn hàng -->
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <!-- Thông tin người đặt hàng -->
            <div class="row">
                    <div class="col-md-12">
                        
                        <h2 class="mb-4">Thông Tin Người Đặt Hàng</h2>
                        <p><strong>Tên:</strong> <?php echo $getOneHoaDon['ten_nguoi_nhan'] ?></p>
                        <p><strong>Địa chỉ:</strong> <?php echo $getOneHoaDon['dia_chi'] ?></p>
                        <p><strong>Số điện thoại:</strong> <?php echo $getOneHoaDon['sdt_nguoi_nhan'] ?></p>
                    </div>
            </div>
        </div>
        <!-- Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
    <footer class="bg-dark text-light py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>Thông tin liên hệ</h5>
                    <p>Địa chỉ: 147 Phú Đô, Quận Nam Từ Liêm Thành Phố Hà Nội</p>
                    <p>Email: quynguyenduy150@gmail.com</p>
                    <p>Facebook: <a href="https://www.facebook.com/quy.nguyenduy.7712">https://www.facebook.com/quy.nguyenduy.7712</a></p>
                    <p>Điện thoại: 0379648268</p>
                </div>
                <div class="col-md-6">
                    <h5>Liên kết nhanh</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Trang chủ</a></li>
                        <li><a href="#">Sản phẩm</a></li>
                        <li><a href="#">Dịch vụ</a></li>
                        <li><a href="#">Liên hệ</a></li>
                    </ul>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12 text-center">
                    <p>&copy; 2024 Thế giới quần áo. Bảo lưu mọi quyền.</p>
                </div>
            </div>
        </div>
    </footer>

</html>