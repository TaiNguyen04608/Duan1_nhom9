<?php
$binh_luan_list = binh_luan_select_by_hang_hoa($_GET['ma_hh']);
?>
<link rel="stylesheet" href="./assets/css/comment.css">

<div class="d-flex align-items-center py-5 justify-content-center">
    <div class="container">
        <div class="row justify-content-center">
            <?php
            foreach ($binh_luan_list as $bl) {
                extract($bl);
            ?>
                <div class="col-lg-12">
                    <div class="d-flex px-3 py-4 border border-bottom-0 border-light rounded-top">
                        <div class="flex-shrink-0">
                            <div class="avatar avatar-sm rounded-circle">
                                <img class="avatar-img" src="./images/<?php echo $hinh ?>" alt="">
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-2 ms-md-3">
                            <div class="d-flex align-items-baseline">
                                <h6 class="me-2"><?php echo $ho_ten ?></h6>
                                <span class="badge py-1 bg-light text-dark fw-normal"><?php echo $ngay_bl ?></span>
                            </div>
                            <div><?php echo $noi_dung ?></div>
                        </div>
                    </div>

                </div>
            <?php
            }
            ?>
        </div>
        <?php
        if (!isset($_SESSION['user'])) {
        ?>
            <h5 class="text-success">Đăng nhập để bình luận</h5>
        <?php

        } else {
        ?>
            <form action="Trang-chinh/insert_cmt.php?ma_hh=<?php echo $_GET['ma_hh'] ?>" method="post" class="form-block">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <input type="hidden" name="id_kh" value="<?php echo $_SESSION['user']['ma_kh'] ?>">
                            <textarea class="form-input text-dark" name="binh_luan" placeholder="Your text"></textarea>
                        </div>
                    </div>
                    <button style="width: 100px;margin-left: auto;" class="btn btn-primary">submit</button>
                </div>
            </form>
        <?php
        }
        ?>
    </div>
</div>