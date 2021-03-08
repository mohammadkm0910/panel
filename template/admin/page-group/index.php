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
    <title>لیست تمامی گروه ها</title>
</head>
<body dir="rtl">
<?php require_once BASE_DIR . "/template/admin/partial/sidebar.php"; ?>
<main class="content-admin">
<?php require_once BASE_DIR . "/template/admin/partial/navbar-admin.php"; ?>
    <div class="d-flex justify-content-between flex-wrap p-2">
        <span class="mt-2 user-select-none">لیست گروه ها</span>
        <a class="btn btn-sm btn-success mt-2" href="<?php url('page-group/create'); ?>">ایجاد گروه جدید</a>
    </div>
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
    <div class="table-responsive m-2">
        <table class="table table-striped">
            <thead class="user-select-none bg-primary text-light">
            <tr>
                <th class="col-1">تعداد</th>
                <th class="col-3">عنوان گروه</th>
                <th class="col-3">زیر گروه</th>
                <th class="col-3">تاریخ انتشار</th>
                <th class="col-3"></th>
            </tr>
            </thead>
            <tbody>
            <?php
            $counter = 1;
            foreach ($pageGroups as $pg) {
                $classParentId = $pg['parent_id'] != null ? "fw-bold font-italic" : "fw-bold text-primary";
                ?>
                <tr>
                    <td><?php echo $counter++; ?></td>
                    <td><?php echo $pg['title']; ?></td>
                    <td class="<?php echo $classParentId; ?>"><?php echo $pgModel->titleParentById($pg['parent_id']); ?></td>
                    <td><?php echo $pg['created_at']; ?></td>
                    <td class="white-space-no-wrap">
                        <a class="btn my-sm btn-warning" href="<?php url('page-group/edit/' . $pg['id']); ?>">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn my-sm btn-info" href="<?php url('page-group/show/' . $pg['id']); ?>">
                            <i class="fas fa-info"></i>
                        </a>
                        <a onclick="deleteGroup('<?php echo $pg['id']; ?>')" class="btn my-sm btn-danger"
                           data-mdb-toggle="modal" data-mdb-target="#my-modal">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <script>
            function deleteGroup(id) {
                $.get("/panel/page-group/delete/" + id, function (result) {
                    $("#my-modal-body").html(result);
                    $("#my-modal-title").html("حذف گروه");
                });
            }
        </script>
    </div>
</main>
</body>
</html>