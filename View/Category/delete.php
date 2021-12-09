<?php include_once 'View/Layouts/header.php' ?>

<div class="row">
    <div class="col-lg-12">
        <form action="" method="post">
            <div class="form-group">
                <label>Tên</label>
                <input type="text" class="form-control" placeholder="Tên" name="ten" value="<?= $category->ten; ?>">
                <small class="form-text text-danger">
                    <?php
                    if (isset($errors['ten'])) {
                        echo $errors['ten'];
                    } ?>
                </small>
            </div>
            <div class="form-group">
                <label>Mô Tả</label>
                <input type="text" class="form-control" placeholder="Mô Tả" name="mo_ta" value="<?= $category->mo_ta; ?>">
                <small class="form-text text-danger">
                    <?php echo (isset($errors['mo_ta'])) ? $errors['mo_ta'] : ''; ?>
                </small>
            </div>
      
            <a href="delete.php?id=<?= $category->id; ?>" class="btn btn-danger" onclick="return confirm('Xóa thật chứ ?') ">Delete </a>
            <a href="index.php?cate=list" class="btn btn-danger">Quay Lại </a>

        </form>
    </div>


</div>


<?php include_once 'View/Layouts/footer.php' ?>




