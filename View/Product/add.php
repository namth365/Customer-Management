<?php include_once 'View/Layouts/header.php' ?>
<?php
if (isset($_SESSION['alert']))
    echo $_SESSION['alert'];
unset($_SESSION['alert']);
?>


<div class="container-fluid">
    <h1 class="text-center mt-5">Thêm </h1>
    <div class="row mt-2 justify-content-center">
        <div class="col-md-6">
            <form method="post" action="">

                <div class="form-group">
                    <label>Tên</label>
                    <input type="text" class="form-control" placeholder="Tên" name="ten">
                    <small class="form-text text-danger">
                        <?php
                        if (isset($errors['ten'])) {
                            echo $errors['ten'];
                        }
                        ?>
                    </small>
                </div>
                <div class="form-group">
                    <label>Loại</label>
                    <input type="text" class="form-control" placeholder="Tên" name="loai">
                    <small class="form-text text-danger">
                        <?php
                        if (isset($errors['loai'])) {
                            echo $errors['loai'];
                        }
                        ?>
                    </small>
                </div>
                <div class="form-group">
                    <label>Mô Tả</label>
                    <input type="text" class="form-control" placeholder="Mô Tả" name="mo_ta">
                    <small class="form-text text-danger">
                        <?php
                        if (isset($errors['mo_ta'])) {
                            echo $errors['mo_ta'];
                        }
                        ?>
                    </small>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select name="category_id">

                        <?php foreach ($categorys as $key => $category) : ?>
                            <option value="<?= $category->id; ?>"> <?= $category->ten; ?> </option>
                        <?php endforeach; ?>
                    </select>
                    <small class="form-text text-danger">
                        <?php
                        if (isset($errors['category_id'])) {
                            echo $errors['category_id'];
                        }
                        ?>
                    </small>
                </div>

                <div class="row form-group mt-2 justify-content-end">
                    <div class="col-md-10">
                        <input type="submit" value="Lưu" class="btn btn-primary">
                        <a href="index.php?prod=list" class="btn btn-secondary">Hủy</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once 'View/Layouts/footer.php' ?>