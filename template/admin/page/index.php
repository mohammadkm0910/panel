<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php asset('public/admin/css/mdb.rtl.min.css'); ?>">
    <link rel="stylesheet" href="<?php asset('public/admin/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php asset('public/shared/font-awesome-free-5.15.2/all.css'); ?>">
    <script src="<?php asset('public/shared/js/jquery.min.js') ?>"></script>
    <script src="<?php asset('public/admin/js/main.js'); ?>" defer></script>
    <script src="<?php asset('public/admin/js/mdb.min.js'); ?>" defer></script>
    <title>نمایش تمام صفحات</title>
</head>
<body dir="rtl">
    <?php require_once BASE_DIR."/template/admin/partial/sidebar.php"; ?>
    <div class="modal fade" id="my-modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="my-modal-title"></h5>
                    <button class="btn-close" data-mdb-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="my-modal-body"></div>
            </div>
        </div>
    </div>
    <main class="content-admin">
    <?php require_once BASE_DIR . "/template/admin/partial/navbar-admin.php"; ?>
        <div class="d-flex justify-content-between flex-wrap p-2">
            <span class="mt-2 user-select-none">لیست صفحات</span>
            <a class="btn btn-sm btn-success mt-2" href="<?php url('page/create'); ?>">ایجاد صفحه جدید</a>
        </div>
        <div class="table-responsive m-2">
            <table class="table">
                <thead class="user-select-none bg-info text-white">
                    <tr>
                        <th>تصویر</th>
                        <th>عنوان گروه</th>
                        <th class="miw-120px">عنوان</th>
                        <th>بازدید</th>
                        <th>اسلایدر</th>
                        <th>قابل نمایش</th>
                        <th>تاریخ ایجاد</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($joinPages as $joinPage) { ?>
                    <tr>
                        <td>
                            <img class="img-thumbnail" src="<?php asset($joinPage['image']); ?>" alt="#">
                        </td>
                        <td><?php echo $joinPage['title'][1]; ?></td>
                        <td>
                            <div class="width-lg">
                                <?php echo substr($joinPage['title'][0],0); ?>
                            </div>
                            <div class="width-md">
                                <?php echo substr($joinPage['title'][0],0,100)."..."; ?>
                            </div>
                        </td>
                        <td><?php echo substr($joinPage['visit'],0); ?></td>
                        <td>
                            <i class="text-primary <?php echo $joinPage['slider']? 'fas fa-check-square' : 'fas fa-square' ?>"></i>
                        </td>
                        <td>
                            <i class="text-success <?php echo $joinPage['status'] == "enable" ? 'fas fa-eye' : 'fas fa-eye-slash' ?>"></i>
                        </td>
                        <td><?php echo $joinPage['created_at'][0]; ?></td>
                        <td class="white-space-no-wrap">
                            <a class="btn my-sm btn-warning" href="<?php url('page/edit/'.$joinPage['id'][0]); ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn my-sm btn-info" href="<?php url('page/show/'.$joinPage['id'][0]); ?>">
                                <i class="fas fa-info"></i>
                            </a>
                            <a onclick="deletePage('<?php echo $joinPage['id'][0]; ?>')" class="btn my-sm btn-danger"
                               data-mdb-toggle="modal" data-mdb-target="#my-modal">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <script>
                function deletePage(id) {
                    $.get("/panel/page/delete/" + id, function (result) {
                        $("#my-modal-body").html(result);
                        $("#my-modal-title").html("حذف صفحه");
                    });
                }
            </script>
        </div>
    </main>
</body>
</html>