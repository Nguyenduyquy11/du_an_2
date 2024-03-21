<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Danh Mục</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
    crossorigin="anonymous"></script>
<style>
            body {
        background-color: #f8f9fa; /* Màu nền của trang */
    }

    header {
        background-color: #f48fb1; /* Màu nền của header */
        padding: 20px 0; /* Khoảng cách giữa header và nội dung */
    }

    h1 {
        color: #fff; /* Màu chữ của tiêu đề */
        text-align: center; /* Căn giữa tiêu đề */
    }

    .container {
        background-color: #fff; /* Màu nền của container */
        padding: 20px; /* Khoảng cách bên trong container */
        border-radius: 10px; /* Bo góc của container */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Đổ bóng cho container */
        max-width: 500px; /* Độ rộng tối đa của container */
        margin: 0 auto; /* Canh giữa container */
    }

    .mb-3 {
        margin-bottom: 1rem; /* Khoảng cách dưới */
    }

    .mt-5 {
        margin-top: 3rem; /* Khoảng cách trên */
    }

    .form-label {
        font-weight: bold; /* Chữ in đậm cho nhãn form */
    }

    .btn-success {
        background-color: #28a745; /* Màu nền của nút Thêm mới */
        border-color: #28a745; /* Màu viền của nút Thêm mới */
    }

    .btn-success:hover {
        background-color: #218838; /* Màu nền khi hover của nút Thêm mới */
        border-color: #1e7e34; /* Màu viền khi hover của nút Thêm mới */
    }

    .form-control {
        border-color: #ced4da; /* Màu viền của ô input */
    }

</style>
</head>
<body >
<header>
    <h1 class="text-center" style="background-color: #f48fb1;">Admin Add</h1>
  </header>
<br><br><div class="container">
    <form action="updateSP" method="post" enctype="multipart/form-data">
    <div class="mb-3 mt-5">
        <label  class="form-label">Tên sản phẩm </label>
        <input type="text" class="form-control" name="tensanpham" value="<?php echo $oneSP['ten_san_pham'] ?>"> <br>
        @if(isset($_SESSION['errors']['tensanpham']))
            <span style="color:red">{{$_SESSION['errors']['tensanpham']}}</span><br><br>
            <?php unset($_SESSION['errors']['tensanpham']) ?>
        @endif

        <label  class="form-label">Mô tả </label>
        <input type="text" class="form-control" name="mota" value="<?php echo $oneSP['mo_ta'] ?>"> <br>
        @if(isset($_SESSION['errors']['mota']))
            <span style="color:red">{{$_SESSION['errors']['mota']}}</span><br><br>
            <?php unset($_SESSION['errors']['mota']) ?>
        @endif
        
        <label  class="form-label">Giá sản phẩm </label>
        <input type="text" class="form-control" name="gia" value="<?php echo $oneSP['gia'] ?>"> <br>
        @if(isset($_SESSION['errors']['gia']))
            <span style="color:red">{{$_SESSION['errors']['gia']}}</span><br><br>
            <?php unset($_SESSION['errors']['gia']) ?>
        @endif

        <label  class="form-label">Ảnh sản phẩm </label>
        <input type="file" class="form-control" name="anh" > <br>
       
        <select class="form-control" name="ten_danh_muc" id="">
            <option value="">Chọn danh mục</option>
            <?php foreach ($getAllDM as $key => $value) { ?>
                <option value="<?php echo $value['id'] ?>"><?php echo $value['ten_danh_muc'] ?></option>
            <?php } ?>
        </select> <br> <br>
         
        <input type="hidden" name="id" value="<?php echo $oneSP['id'] ?>">
        <button type="submit" class="btn btn-success" name="updateSP">Cập nhật</button>
    </div>
            
    </form>
</div>
</body>
</html>
