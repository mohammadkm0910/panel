<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php asset('public/admin/css/mdb.rtl.min.css'); ?>">
    <link rel="stylesheet" href="<?php asset('public/admin/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php asset('public/shared/font-awesome-free-5.15.2/all.css'); ?>">
    <script src="<?php asset('public/shared/js/jquery.min.js') ?>"></script>
    <script src="<?php asset('public/admin/js/main.js'); ?>" defer></script>
    <script src="<?php asset('public/admin/js/mdb.min.js'); ?>" defer></script>
    <title>جزئیات گروه</title>
</head>
<body dir="rtl">
    <?php require_once BASE_DIR . "/template/admin/partial/sidebar.php"; ?>
    <main class="content-admin">
    <?php require_once BASE_DIR . "/template/admin/partial/navbar-admin.php"; ?>
        <div class="container-fluid">
            <h5 class="container-fluid mt-2">جزئیات گروه <q>موبایل</q></h5>
            <hr>
        </div>
        <dl>
            <dt class="fw-bold">عنوان گروه</dt>
            <dd><?php echo $pageGroup['title']; ?></dd>
            <dt class="fw-bold">تاریخ ایجاد گروه</dt>
            <dd><?php echo $pageGroup['created_at']; ?></dd>
            <dt class="fw-bold">آخرین بروزرسانی گروه</dt>
            <dd><?php echo $pageGroup['updated_at']; ?></dd>
            <dt class="fw-bold">زیرگروه</dt>
            <dd><?php echo $pageGroup['parent_title']; ?></dd>
        </dl>
        <div class="line"></div>
        <div class="container-fluid w-auto mr-60px mt-4">
            <a class="btn btn-sm btn-primary" href="<?php url('page-group'); ?>">بازگشت</a>
            <a class="btn btn-sm btn-warning" href="<?php url('page-group/edit/'.$id); ?>">ویرایش</a>
        </div>
    </main>
</body>
</html>