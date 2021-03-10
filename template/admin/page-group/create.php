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
    <title>ایجاد گروه جدید</title>
</head>
<body dir="rtl">
    <?php require_once BASE_DIR . "/template/admin/partial/sidebar.php"; ?>
    <main class="content-admin">
    <?php require_once BASE_DIR . "/template/admin/partial/navbar-admin.php"; ?>
        <h5 class="container-fluid mt-2">ایجاد گروه جدید</h5>
        <form action="<?php url('page-group/store'); ?>" method="post" class="p-2 mt-1" id="form-group">
            <div class="mt-2">
                <label for="title">عنوان گروه</label>
                <input type="text" class="form-control mt-2" id="title" name="title" placeholder="عنوان گروه را وارد کنید">
            </div>
            <div class="m2">
                <?php if ($groupRootCount > 0) { ?>
                <label for="parent_id">زیر گروه</label>
                <select class='form-control mt-2' id="parent_id" name="parent_id">
                    <option value="">گروه اصلی</option>
                    <?php
                    foreach ($groupRoots as $gr) {
                        echo "<option value='$gr[id]'>$gr[title]</option>";
                    }
                    ?>
                </select>
                <?php } ?>
            </div>
            <input type="submit" class="btn btn-success mt-2 mr-60px" value="ذخیره">
        </form>
        <div class="line"></div>
        <div class="container-fluid w-auto mr-30px mt-2">
            <a class="btn btn-sm btn-primary" href="<?php url('page-group'); ?>">بازگشت</a>
        </div>
    </main>
    <?php require_once BASE_DIR."/template/admin/partial/scripts.php"; ?>
</body>
</html>