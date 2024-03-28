<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập </title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Custom styles for footer */
    footer {
      background-color: #f8f9fa;
      padding: 20px 0;
      position: absolute;
      bottom: 0;
      width: 100%;
    }
  </style>
</head>
<body>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">Đăng nhập</div>
        <div class="card-body">
          <form action="dangnhap" method="post">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Tên người dùng</label>
              <input type="text" class="form-control" name="tendangnhap" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
              <input type="password" class="form-control" name="matkhau" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary" name="dangnhap">Đăng nhập</button>
            <a href="formdangky"><button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#registerModal">Đăng ký</button></a>
            <a href="formquenmk"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#registerModal">Quên mật khẩu</button></a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Register Modal -->

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<footer class="text-center">
    <div class="container">
      <p>&copy; 2024 Your Website</p>
    </div>
  </footer>
</body>


  
</html>
