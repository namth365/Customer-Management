<?php include 'View/Layouts/header.php'; ?>


<div class="container">
  
    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-center"> Product
            </h3>

            <form class="form-inline">
                <a href="index.php?prod=add" class="btn btn-primary">Thêm </a>
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-success" type="submit">Search</button>
            </form>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Loại</th>
                        <th scope="col">Mô Tả</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php if (count($products) > 0) : ?>
                        <?php foreach ($products as $key => $product) : ?>
                            <tr>
                                <th scope="row"><?= $product->id ?></th>
                                <td><?= $product->ten; ?></td>
                                <td><?= $product->loai; ?></td>
                                <td><?= $product->mo_ta; ?></td>
                                <td><?= $product->category_id; ?></td>
                                <td>
                                    <a href="index.php?prod=edit&id=<?= $product->id; ?>" class="btn btn-info">Edit </a>
                                    <a href="index.php?prod=delete&id=<?= $product->id; ?>" class="btn btn-danger" onclick="return confirm('Xóa thật chứ ?')">Delete </a>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'View/Layouts/footer.php'; ?>