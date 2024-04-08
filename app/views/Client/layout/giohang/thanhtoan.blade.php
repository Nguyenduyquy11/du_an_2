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
            margin-bottom: -150px;
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

        body {
            margin-bottom: 50px;
            /* Khoảng cách giữa body và footer */
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
    <div class="container">
        <h2 class="mt-4 mb-4">Thanh toán</h2>
        <form action="thanhtoan" method="post">
            <div class="row">



                <div class="col-md-3">
                    <div class="form-group">
                        <label for="ho_ten">Họ và tên</label>
                        <input type="text" class="form-control" name="hoten" placeholder="Nhập họ và tên" required>
                    </div>
                    <div class="form-group">
                        <label for="so_dien_thoai">Số điện thoại</label>
                        <input type="text" class="form-control" name="sdt" placeholder="Nhập số điện thoại" required>
                    </div>
                    <div class="form-group">
                        <label for="dia_chi">Địa chỉ</label>
                        <input type="text" class="form-control" name="diachi" placeholder="Nhập địa chỉ" required>
                    </div>
                </div>
                <div class="col-md-9">
                    <!-- Danh sách sản phẩm trong giỏ hàng -->
                    <h4 class="mb-3">Danh sách sản phẩm trong giỏ hàng</h4>
                    <!-- Đoạn code PHP để hiển thị danh sách sản phẩm trong giỏ hàng -->

                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <h4>Ảnh sản phẩm</h4>
                            <div>
                                <h4 class="my-0">Tên sản phẩm</h4>

                            </div>
                            <h4 class="my-0">Giá</h4>
                            <h4 class="my-0">Số lượng</h4>
                        </li>
                        <?php
                        $tong = 0;
                        foreach ($_SESSION['my_cart'] as $key => $value) {
                            $tong = $tong + $value['5']
                        ?>
                            <li class="list-group-item d-flex justify-content-between">
                                <span><img src="<?php echo $value['3'] ?>" width="100px" height="100px" alt=""></span>
                                <span><?php echo $value['1'] ?></span>
                                <span> <?php echo $value['2'] . ' <strong style="color:red;">VNĐ</strong>' ?></span>
                                <span><?php echo $value['4'] ?></span>

                            </li>
                    </ul>
                <?php } ?> <br>
                <h4 class="mb-3">Phương thức thanh toán</h4>
                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="thanh_toan_khi_nhan_hang" name="pt_thanh_toan" type="radio" class="custom-control-input" value="thanh_toan_khi_nhan_hang">
                        <label class="custom-control-label" for="thanh_toan_khi_nhan_hang">Thanh toán khi nhận hàng</label>
                    </div>
                </div>
                <!-- Tổng tiền -->
                <h5 class="mb-3">Tổng tiền: <strong><?php echo $tong . ' <strong style="color:red;">VNĐ</strong>' ?></strong></h5>
                <!-- Nút thanh toán -->
                <button class="btn btn-primary btn-lg btn-block" name="thanhtoan" type="submit">Thanh toán</button>
                </div>
            </div>
        </form>
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