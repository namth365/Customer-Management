<?php include_once 'View/Layouts/header.php'; ?>

<div class="container">
<?php
if (isset($_SESSION['alert']))
    echo $_SESSION['alert'];
unset($_SESSION['alert']);
?>
<div class="row">
    <div class="col-lg-12">
        <h3 class="text-center"> User
        </h3>

        <form class="form-inline" action="index.php?user1=list">
            <input type="hidden" name="user1" value="list">
            <a href="index.php?user1=add" class="btn btn-primary">Thêm </a>
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="s">
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
                    <th scope="col">Nghề</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($users) > 0) : ?>
                    <?php foreach ($users as $key => $user) : ?>
                        <tr>
                            <th scope="row"><?= $user->id ?></th>
                            <td><?= $user->ten; ?></td>
                            <td><?= $user->nghe; ?></td>
                            <td>
                                <a href="index.php?user1=edit&id=<?= $user->id; ?>" class="btn btn-info">Edit </a>
                                <a href="index.php?user1=delete&id=<?= $user->id; ?>" class="btn btn-danger" onclick="return confirm('Xóa thật chứ ?')">Delete </a>

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