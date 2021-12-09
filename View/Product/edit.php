<?php include_once 'View/Layouts/header.php' ?>
<?php
if (isset($_SESSION['alert']))
    echo $_SESSION['alert'];
unset($_SESSION['alert']);
?>
<div class="row">
    <div class="col-lg-12">
        <form action="" method="post">
            <div class="form-group">
                <label>Tên</label>
                <input type="text" class="form-control" placeholder="Tên" name="ten" value="<?= $product->ten; ?>">
                <small class="form-text text-danger">
                    <?php
                    if (isset($errors['ten'])) {
                        echo $errors['ten'];
                    } ?>
                </small>
            </div>
            <div class="form-group">
                <label>Loại</label>
                <input type="text" class="form-control" placeholder="Loai" name="loai" value="<?= $product->loai; ?>">
                <small class="form-text text-danger">
                    <?php
                    if (isset($errors['loai'])) {
                        echo $errors['loai'];
                    } ?>
                </small>
            </div>
            <div class="form-group">
                <label>Mô Tả</label>
                <input type="text" class="form-control" placeholder="Mô Tả" name="mo_ta" value="<?= $product->mo_ta; ?>">
                <small class="form-text text-danger">
                    <?php echo (isset($errors['mo_ta'])) ? $errors['mo_ta'] : ''; ?>
                </small>
            </div>
            <div class="form-group">
                <label>Category</label>
                <input class="form-control" placeholder="Category" name="category_id" value="<?= $category->ten; ?>">
                <small class="form-text text-danger">
                    <?php echo (isset($errors['category_id'])) ? $errors['category_id'] : ''; ?>
                </small>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="index.php?prod=list" class="btn btn-danger">Quay Lại </a>

        </form>
    </div>


</div>


<?php include_once 'View/Layouts/footer.php' ?>