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
    <title>جزئیات صفحه</title>
</head>
<body dir="rtl">
<?php require_once BASE_DIR . "/template/admin/partial/sidebar.php"; ?>
<main class="content-admin">
   <?php require_once BASE_DIR . "/template/admin/partial/navbar-admin.php"; ?>
    <div class="container-fluid">
        <h5 class="container-fluid mt-2">جزئیات صفحه</h5>
        <hr>
    </div>
    <dl>
        <dt class="fw-bold">عنوان گروه</dt>
        <dd><?php echo $joinPage['title'][1]; ?></dd>
        <dt class="fw-bold">عنوان</dt>
        <dd><?php echo $joinPage['title'][0]; ?></dd>
        <dt class="fw-bold">توضیح مختصر</dt>
        <dd class="justify-text"><?php echo $joinPage['summary']; ?></dd>
        <dt class="fw-bold">متن</dt>
        <dd class="justify-text"><?php echo $joinPage['body']; ?></dd>
        <dt>
            <span class="fw-bold">بازدید: </span>
            <span class="fw-normal"><?php echo $joinPage['visit']; ?></span>
        </dt>
        <dt class="fw-bold">تصویر</dt>
        <dd>
            <img class="img-thumbnail" src="<?php asset($joinPage['image']); ?>" alt="#">
        </dd>
        <dt>
            <span>اسلایدر: </span>
            <i class="text-primary <?php echo $joinPage['slider']? 'fas fa-check-square' : 'fas fa-square' ?>"></i>
        </dt>
        <dt>
            <span>قابلیت نمایش: </span>
            <i class="text-success <?php echo $joinPage['status'] == "enable" ? 'fas fa-eye' : 'fas fa-eye-slash' ?>"></i>
        </dt>
        <dt class="fw-bold">تاریخ ایجاد صفحه</dt>
        <dd><?php echo $joinPage['created_at'][0]; ?></dd>
        <dt class="fw-bold">آخرین بروزرسانی صفحه</dt>
        <dd><?php echo $joinPage['updated_at'][0]; ?></dd>
    </dl>
    <div class="container-fluid w-auto mr-60px mt-4 mb-4">
        <a class="btn btn-sm btn-primary" href="<?php url('page'); ?>">بازگشت</a>
        <a class="btn btn-sm btn-warning" href="<?php url('page/edit/'. $joinPage['id'][0]); ?>">ویرایش</a>
    </div>
</main>
</body>
</html>