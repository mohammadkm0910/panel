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
    <title>ایجاد صفحه جدید</title>
</head>
<body dir="rtl">
<?php require_once BASE_DIR . "/template/admin/partial/sidebar.php"; ?>
<main class="content-admin">
<?php require_once BASE_DIR . "/template/admin/partial/navbar-admin.php"; ?>
    <h5 class="container-fluid mt-2">ایجاد صفحه جدید</h5>
    <form action="<?php url('page/store'); ?>" method="post" enctype="multipart/form-data" class="p-2 m-2" id="form-page">
        <div class="mt-3">
            <label for="group_id" class="form-label">گروه صفحه</label>
            <select class="form-control" name="group_id" id="group_id">
                <?php
                foreach ($childPageGroups as $childPageGroup) {
                    echo "<option value='$childPageGroup[id]'>$childPageGroup[title]</option>";
                }
                ?>
            </select>
        </div>
        <div class="mt-2">
            <label for="title" class="form-label">عنوان صفحه</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="عنوان صفحه را وارد کنید">
        </div>
        <div class="mt-2">
            <label for="summary" class="form-label">توضیح مختصر</label>
            <textarea type="text" class="form-control" id="summary" name="summary" placeholder="توضیح مختصر صفحه را وارد کنید"></textarea>
        </div>
        <div class="mt-2">
            <label for="body" class="form-label">متن صفحه</label>
            <textarea type="text" class="form-control" id="body" name="body" placeholder="متن صفحه خود را وارد کنید"></textarea>
        </div>
        <div class="mt-2">
            <label class="form-label" for="image">تصویر</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="mt-2">
            <label class="form-label" for="status">وضعیت</label>
            <select class="form-control" id="status" name="status">
                <option value="enable">قابل نمایش</option>
                <option value="disable">غیر قابل نمایش</option>
            </select>
        </div>
        <div class="d-flex mt-2">
            <div>
                <label class="user-select-none form-label" for="slider">اسلایدر</label>
            </div>
            <div class="form-check form-switch mt-1 mr-8px">
                <input class="form-check-input" type="checkbox" id="slider" name="slider">
            </div>
        </div>
        <input type="submit" class="btn btn-success mt-3 mr-60px" value="ذخیره">
    </form>
    <div class="line"></div>
    <div class="container-fluid w-auto mr-30px mt-2 mb-2">
        <a class="btn btn-sm btn-primary" href="<?php url('page'); ?>">بازگشت</a>
    </div>
</main>
<?php require_once BASE_DIR."/template/admin/partial/scripts.php"; ?>
</body>
</html>