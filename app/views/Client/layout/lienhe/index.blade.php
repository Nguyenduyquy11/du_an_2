<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        .btn-search {
            min-width: 100px;
        }

        * {
            box-sizing: border-box;
        }

        .navbar-nav .login-btn {
            margin-left: auto;
        }

        footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        .card {
            height: 100%;
        }

        .product-wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .product-item {
            flex: 0 0 calc(25% - 1rem);
            margin-bottom: 2rem;
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
            <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index">Trang chủ</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Sản phẩm
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown" id="productDropdown">
                            <li><a class="dropdown-item" href="#">Áo</a></li>
                            <li><a class="dropdown-item" href="#">Quần</a></li>
                            <li><a class="dropdown-item" href="#">Dép</a></li>
                            <li><a class="dropdown-item" href="#">Mũ</a></li>
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
                <form class="form-inline my-2 my-lg-0 mr-auto">
                    <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm" aria-label="Tìm kiếm">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
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
    <div class="container py-5">
        <h1 class="mb-4">Liên Hệ</h1>
        <form action="addlienhe" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Họ và Tên</label>
                <input type="text" name="ten" class="form-control" id="name" placeholder="Nhập họ và tên của bạn">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Nhập địa chỉ email của bạn">
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Nội dung</label>
                <textarea class="form-control" name="noidung" id="message" rows="5" placeholder="Nhập nội dung"></textarea>
            </div>
            <button type="submit" name="addlienhe" class="btn btn-primary">Gửi</button>

        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-RPPtJO3C4clI5u8sO1D4BrAKWDZO/7tNcEck6FsFwbaWuFlj7Vb5FItK9Ksgzm/r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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