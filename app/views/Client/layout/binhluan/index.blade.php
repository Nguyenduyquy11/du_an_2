   <div class="container">
       <h1 class="mt-4 mb-4">Bình Luận</h1>
       <?php foreach ($getAllBL as $key => $value) { ?> 
           <div class="comment-box">
               <img src="<?php echo $value['avt_user'] ?>" width="50px" height="50px" class="user-avatar" alt="Avatar">
               <div>
                   <h5><?php echo $value['ten_nguoi_binh_luan'] ?></h5>
                   <p><?php echo $value['noi_dung'] ?></p>
                   <div class="comment-meta"><?php echo $value['ngay_binh_luan'] ?></div>
               </div>
           </div>
       <?php } ?>
        <?php 
            if(isset($_GET['id'])){
                $idsp = $_GET['id'];
            }
        ?>
            <form id="commentForm" action="binhluan" method="post">
           <div class="form-group">
            <input type="hidden" name="idsp" value="<?php echo isset($idsp) ? $idsp : ''; ?>">
               <label for="comment">Bình Luận:</label>
               <textarea class="form-control" id="comment" name="noidung" rows="3" placeholder="Nhập bình luận của bạn"></textarea>
           </div>
           <button type="submit" name="binhluan" class="btn btn-primary">Gửi</button>
       </form>
       
       
   </div>