<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header với Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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

        /* Custom CSS */
        .comment-box {
            background-color: #f8f9fa;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 15px;
        }

        .comment-meta {
            margin-top: 5px;
            font-size: 0.8em;
            color: #6c757d;
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
                            <li><a class="dropdown-item" href="#">Sản phẩm 1</a></li>
                            <li><a class="dropdown-item" href="#">Sản phẩm 2</a></li>
                            <li><a class="dropdown-item" href="#">Sản phẩm 3</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Xem tất cả sản phẩm</a></li>
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
    <?php foreach ($oneSanPham as $key => $value) { ?>
        <div class="container py-5">
            <div class="row">
                <div class="col-md-6">
                    <img src="<?php echo $value['anh_sp'] ?>" width="400px" alt="Product" class="product-image">
                </div>
                <div class="col-md-6">
                    <h1 class="mb-4">Tên sản phẩm: <br></h1>
                    <h3><?php echo $value['ten_san_pham'] ?></h3>
                    <p><?php echo $value['mo_ta'] ?>.</p>
                    <p class="price"><?php echo $value['gia'] ?></p>

                    <form action="addtocart" method="post">
                        <input type="hidden" name="idsp" value="<?php echo $id ?>">
                        <input type="hidden" name="ten_san_pham" value="{{$value['ten_san_pham']}}">
                        <input type="hidden" name="gia" value="{{$value['gia']}}">
                        <input type="number" class="form-control" name="soluong" value="1"><br>
                        <input type="hidden" name="anh_sp" value="{{$value['anh_sp']}}">
                        <input type="submit" class="btn btn-success" name="addtocart" value="Thêm vào giỏ hàng">
                    </form>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col">
                    <h2>Mô tả sản phẩm</h2>
                    <p><?php echo $value['mo_ta'] ?></p>
                </div>
            </div>
        </div>
    <?php } ?>
    @include('Client.layout.binhluan.index')
        

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-RPPtJO3C4clI5u8sO1D4BrAKWDZO/7tNcEck6FsFwbaWuFlj7Vb5FItK9Ksgzm/r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>