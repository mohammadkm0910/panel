<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php asset('public/admin/css/mdb.rtl.min.css'); ?>">
    <link rel="stylesheet" href="<?php asset('public/admin/css/style.css'); ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <script src="<?php asset('public/admin/js/jquery.min.js'); ?>"></script>
    <script src="<?php asset('public/admin/js/main.js'); ?>" defer></script>
    <script src="<?php asset('public/admin/js/mdb.min.js'); ?>" defer></script>
    <title>ثبت نام کاربر</title>
</head>
<body dir="rtl">
    <div class="d-flex justify-content-center align-items-center page-auth style-2">
        <form action="<?php url('register/store'); ?>" method="post" class="p2 m-2 w-350px bg-white p-4 bg-round" id="form-register">
            <div class="mt-2 form-info">
                <h5>فرم ثبت نام کاربران</h5>
                <a class="btn btn-info btn-floating"href="javascript:history.go(-1)" title="بازگشت به قبل">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>
            <div class="mt-3">
                <label for="username" class="form-label">نام کاربری</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="نام کاربری خود را وارد کنید">
            </div>
            <div class="mt-3" dir="rtl">
                <label for="email" class="form-label">ایمیل کاربر</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="ایمیل خود را وارد کنید">
            </div>
            <div class="form-normal mt-2">
                <label for="password" class="form-label">پسورد کاربر</label>
                <i class="fas fa-eye trailing show-password"></i>
                <input type="password" class="form-control" name="password" id="password" placeholder="پسورد خود را وارد کنید">
            </div>
            <input type="submit" class="btn btn-success btn-block mt-2" value="ثبت نام کاربر">
        </form>
    </div>
    <?php require_once BASE_DIR . "/template/admin/partial/scripts.php"; ?>
</body>
</html>