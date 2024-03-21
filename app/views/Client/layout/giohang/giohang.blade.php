<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Cart</title>
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

    /* Custom styles for shopping cart */
    .product-img {
      max-width: 100px;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="index"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRrLnCBOxLUndyDnLhApSKbVX17IYayufW9mw6EewH6Y_Bco3w0Z0sbLK1Dmar7tNipLJ0&usqp=CAU" alt="Logo" height="40"></a>
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
  <div class="container">
    <h2>Shopping Cart</h2>
    <div class="row">
      <div class="col-md-8">
        <table class="table">
          <thead>
            <tr>
              <th>Product</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <img src="product1.jpg" alt="Product 1" class="product-img"> Product 1
              </td>
              <td>$50.00</td>
              <td>2</td>
              <td>$100.00</td>
            </tr>
            <tr>
              <td>
                <img src="product2.jpg" alt="Product 2" class="product-img"> Product 2
              </td>
              <td>$30.00</td>
              <td>1</td>
              <td>$30.00</td>
            </tr>
            <!-- Add more rows for other products -->
          </tbody>
        </table>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Cart Summary</h5>
            <p class="card-text">Total Items: 3</p>
            <p class="card-text">Total Price: $130.00</p>
            <a href="#" class="btn btn-primary">Checkout</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>