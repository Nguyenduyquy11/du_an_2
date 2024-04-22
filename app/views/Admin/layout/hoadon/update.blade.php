<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #ecf0f1;
      display: flex;
      min-height: 100vh;
    }

    #sidebar {
      width: 250px;
      background-color: #f48fb1;
      /* Màu hồng nhạt */
      color: #fff;
      box-shadow: 2px 0px 5px rgba(0, 0, 0, 0.1);
      padding-top: 20px;
    }

    #sidebar ul {
      list-style-type: none;
      padding: 0;
      margin: 0;
    }

    #sidebar ul li {
      padding: 15px;
      border-bottom: 1px solid #d81b60;
      /* Màu hồng đậm nhạt */
    }

    #sidebar ul li a {
      text-decoration: none;
      color: #fff;
      font-size: 1.2em;
      display: block;
    }

    #sidebar ul li:hover {
      background-color: #d81b60;
      /* Màu hồng đậm nhạt */
    }

    #content {
      flex: 1;
      padding: 20px;
    }

    header {
      background-color: #f48fb1;
      /* Màu hồng nhạt */
      color: #fff;
      padding: 15px;
      text-align: center;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    }

    footer {
      background-color: #f48fb1;
      /* Màu hồng nhạt */
      color: #fff;
      padding: 10px;
      text-align: center;
      width: 100%;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    table,
    th,
    td {
      border: 1px solid #ddd;
    }

    th,
    td {
      padding: 15px;
      text-align: left;
    }

    th {
      background-color: #d81b60;
      /* Màu hồng đậm nhạt */
      color: #fff;
    }

    .styled-button {
      background-color: #3498db;
      /* Màu nền */
      color: #fff;
      /* Màu chữ */
      padding: 10px 20px;
      /* Độ dày nền và chiều rộng nút */
      border: none;
      /* Không có đường viền */
      border-radius: 5px;
      /* Góc bo tròn */
      cursor: pointer;
      /* Hình con trỏ khi di chuột qua nút */
      font-size: 16px;
      /* Kích thước chữ */
      transition: background-color 0.3s ease;
      /* Hiệu ứng chuyển đổi màu nền */
    }

    /* Hiệu ứng hover khi di chuột qua nút */
    .styled-button:hover {
      background-color: #2980b9;
      /* Màu nền khi hover */
    }

    @media (max-width: 768px) {
      #sidebar {
        width: 100%;
        position: fixed;
        z-index: 1;
        height: 100%;
        overflow-y: auto;
      }

      #content {
        margin-left: 0;
      }
    }
  </style>
</head>

<body>

  <div id="sidebar">
    <ul>
      <li><a href="admin">Dashboard</a></li>
      <li><a href="danhmuc"> Manager Category</a></li>
      <li><a href="sanpham">Manager Products</a></li>
      <li><a href="chucvu">Manager Role</a></li>
      <li><a href="lienhe">Manager Contact</a></li>
      <li><a href="hoadon">Manager Bill</a></li>
      <li><a href="index.php">Back Home</a></li>
    </ul>
  </div>

  <div id="content">
    <header>
      <h1>Admin Dashboard</h1>
    </header>
    <h2>Update Status</h2>
    <?php 
        if(is_array($oneHoaDon)){
            extract($oneHoaDon);
        }
    ?>
        <form action="updateTt" method="POST">
            <label for="status">Status:</label>
            <select id="status" name="status" class="form-control" required>
                <?php if($trang_thai == 0 ){ ?>
                <option value="0" <?php echo $trang_thai == 0 ? 'selected' : '' ?>>Chờ xác nhận</option>
                <option value="1" <?php echo $trang_thai == 1 ? 'selected' : '' ?>>Đã xác nhận</option>
                <option value="2" <?php echo $trang_thai == 2 ? 'selected' : '' ?>>Đang giao hàng</option>
                <option value="3" <?php echo $trang_thai == 3 ? 'selected' : '' ?>>Đã giao hàng</option>
                <option value="5" <?php echo $trang_thai == 4 ? 'selected' : '' ?>>Đơn hàng đã hủy</option>
                <?php }elseif ($trang_thai == 1) { ?>
                    <option value="1" <?php echo $trang_thai == 1 ? 'selected' : '' ?>>Đã xác nhận</option>
                    <option value="2" <?php $trang_thai == 2 ? 'selected' : '' ?>>Đang giao hàng</option>
                    <option value="3" <?php $trang_thai == 3 ? 'selected' : '' ?>>Đã giao hàng</option>
                <?php }elseif ($trang_thai == 2) { ?>
                    <option value="2" <?php echo $trang_thai == 2 ? 'selected' : '' ?>>Đang giao hàng</option>
                    <option value="3" <?php echo $trang_thai == 3 ? 'selected' : '' ?>>Đã giao hàng</option>
                <?php }elseif ($trang_thai == 3) { ?>
                    <option value="3" <?php echo $trang_thai == 3 ? 'selected' : '' ?>>Đã giao hàng</option>
                <?php } ?>
            </select> <br>
            <input type="hidden" name="id" value="{{$id}}">
            <button type="submit" name="updateTt" class="styled-button">Update Status</button>
            
        </form>
        <br><a href="hoadon"><button type="submit" name="update" class="styled-button">Back To List</button></a>
  </div>
</body>
</html>