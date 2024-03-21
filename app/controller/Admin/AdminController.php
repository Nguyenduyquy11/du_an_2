<?php
    namespace App\controller\Admin;

    use App\model\Admin\AdminModel as AdminAdminModel;
    use App\model\AdminModel;
    class AdminController extends AdminBaseController{
        protected $model;
        function __construct()
        {
            $this->model = new  AdminAdminModel();
        }
        function getAllDM(){
            $listDM = $this->model->getAllDanhMuc();
            return $this->render('Admin.layout.danhmuc.list', ['listDM' => $listDM]);
        }
        function admin(){
            return $this->render('Admin.layout.header');
        }
        function formadddm(){
            return $this->render('Admin.layout.danhmuc.add');
        }
        function addDM(){
            if(isset($_POST['add'])){
                $error = [];
                if(empty($_POST['tendanhmuc'])){
                    $error['tendanhmuc'] = "Không được bỏ trống";
                }
                if(count($error) >0){
                    redirect('errors' , $error , 'formadddm' );
                    
                }else{
                    $this->model->addDanhMuc($_POST['tendanhmuc']);
                    header("Location: danhmuc");
                }
               
            }
        }
        function formupdate(){
           if(isset($_GET['id'])){
            $oneDM = $this->model->getOneDanhMuc($_GET['id']);
            return $this->render('Admin.layout.danhmuc.update', ['oneDM' => $oneDM]);
           }
        }
        function updateDM(){
            if(isset($_POST['update'])){
                    $this->model->updateDanhMuc($_POST['id'], $_POST['tendanhmuc']);
                    header("Location: danhmuc");
            }
        }
        function deleteDM(){
            if(isset($_GET['id'])){
                $this->model->deleteDanhMuc($_GET['id']);
                header("Location: danhmuc");
            }
        }
        //Sản phẩm
        function getAllSP(){
            $listSP = $this->model->getAllSanPham();
            return $this->render('Admin.layout.sanpham.list', ['listSP' => $listSP]);
        }
        function formaddSP(){
            $getDM = $this->model->getAllDanhMuc();
            return $this->render('Admin.layout.sanpham.add', ['getDM' => $getDM]);
        }
        function addSPam(){
            if(isset($_POST['addSP'])){
                if(isset($_FILES['anh'])){
                    $target_dir = "app/img/";
                    $image = $_FILES['anh']['name'];
                    $target_file = $target_dir . $image;
                    move_uploaded_file($_FILES['anh']['tmp_name'], $target_file);
                }
                // $error = [];
                // if(empty($_POST['tensanpham'])){
                //     $error['tensanpham'] = "Tên sản phẩm không được để trống";
                // }
                // if(empty($_POST['tendanhmuc'])){
                //     $error['tendanhmuc'] = "Danh mục không được để trống";
                // }
                // if(empty($_POST['gia'])){
                //     $error['gia'] = "Giá sản phẩm không được để trống";
                // }
                // if(!is_numeric($_POST['gia'])){
                //     $error['gia'] = "Số lượng phải là kiểu số";
                // }
                // if(empty($_POST['anh'])){
                //     $error['anh'] = "Ảnh sản phẩm không được để trống";
                // }
                // if(empty($_POST['mota'])){
                //     $error['mota'] = "Mô tả  sản phẩm không được để trống";
                // }
                // if(count($error) >0){
                //     redirect('errors',  $error, 'formaddSP');
                // }else{
                //     $this->model->addSanPham($_POST['tensanpham'],$_POST['tendanhmuc'],$_POST['gia'],$target_file,$_POST['mota']);
                //     header("Location: index.php");
                // }
                $this->model->addSanPham($_POST['tensanpham'],$_POST['gia'],$target_file,$_POST['mota'],$_POST['ten_danh_muc']);
                header("Location: sanpham");

            }
        }
        function formupdateSP(){
            if(isset($_GET['id'])){
            $getAllDM = $this->model->getAllDanhMuc();
             $oneSP = $this->model->getOneSanPham($_GET['id']);
             return $this->render('Admin.layout.sanpham.update', ['oneSP' => $oneSP , 'getAllDM' => $getAllDM]);
            }
         }
        function updateSP(){
            if(isset($_POST['updateSP'])){
                if(isset($_FILES['anh'])){
                    $target_dir = "app/img/";
                    $image = $_FILES['anh']['name'];
                    $target_file = $target_dir . $image;
                    move_uploaded_file($_FILES['anh']['tmp_name'], $target_file);
                }
                    $this->model->updateSanPham($_POST['id'],$_POST['tensanpham'],$_POST['gia'],$target_file,$_POST['mota'],$_POST['ten_danh_muc']);
                    header("Location: sanpham");
            }
        }
        function deleteSP(){
            if(isset($_GET['id'])){
                $this->model->deleteSanPham($_GET['id']);
                header("Location: sanpham");
            }
        }
        // Chức vụ
        function getAllCV(){
            $getCV = $this->model->getAllChucVu();
            return $this->render('Admin.layout.chucvu.list', ['getCV' => $getCV]);
        }
        function formaddCV(){
            return $this->render('Admin.layout.chucvu.add');
        }
        function addCV(){
            if(isset($_POST['addCV'])){
                $this->model->addChucVu($_POST['tenchucvu']);
                header("Location: chucvu");
            }
        }
        function formupdateCV(){
           if(isset($_GET['id'])){
            $getOneCV = $this->model->getOneChucVu($_GET['id']);
            return $this->render('Admin.layout.chucvu.update', ['getOneCV' => $getOneCV]);
           }
        }
        function updateCV(){
            if(isset($_POST['updateCV'])){
                $this->model->updateChucVu($_POST['id'], $_POST['tenchucvu']);
                header("Location: chucvu");
            }
        }
        function deleteCV(){
            if(isset($_GET['id'])){
                $this->model->deleteChucVU($_GET['id']);
                header("Location: chucvu");
            }
        }
        //Liên hệ
        function alllienhe(){
           $allLH =  $this->model->getAllLienHe();
            return $this->render('Admin.layout.lienhe.list', ['allLH' => $allLH]);
        }
        function formupdateLH(){
            return $this->render('Admin.layout.lienhe.update');
        }
    }
?>