<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng ký </title>
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
        <div class="card-header">Đăng ký</div>
        <div class="card-body">
          <form action="quenmk" method="post">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Tên đăng nhập</label>
              <input type="text" class="form-control" name="tendangnhap" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary" name="quenmk">Quên mật khẩu</button>
            <button type="reset" class="btn btn-info">Nhập lại</button>
            <a href="formdangnhap"> <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#registerModal">Đăng nhập</button></a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Register Modal -->
<footer class="text-center">
    <div class="container">
      <p>&copy; 2024 Your Website</p>
    </div>
</footer>
<!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
 
</html>
