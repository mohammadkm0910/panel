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
    <title>ورود کاربر</title>
</head>

<body dir="rtl">
    <div class="d-flex justify-content-center align-items-center page-auth">
        <form action="<?php url('check-login'); ?>" method="post" class="p2 m-2 w-350px bg-white p-4 bg-round">
            <div class="mt-2 form-info">
                <h5>فرم ورود کاربران</h5>
                <a class="btn btn-info btn-floating"href="javascript:history.go(-1)" title="بازگشت به قبل">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>
            <div class="form-outline mt-3">
                <input type="email" class="form-control" name="email" id="email">
                <label for="email" class="form-label">ایمیل کاربر</label>
            </div>
            <div class="form-outline mt-2">
                <i class="fas fa-eye trailing show-password"></i>
                <input type="password" class="form-control" name="password" id="password">
                <label for="password" class="form-label">پسورد کاربر</label>
            </div>
            <div class="mt-2">
                <label for="remember" class="form-label user-select-none">مرا به خاطر نگه دار</label>
                <input type="checkbox" class="form-check-input"name="remember" id="remember">
            </div>
            <?php
            if ($httpReferer == $domain."/panel/login") {
                echo "<span class='text-danger'>فیلد ها معتبر نیستند!!</span>";
            }
            ?>
            <input type="submit" class="btn btn-primary btn-block mt-2" value="ورود کاربر">
        </form>
    </div>
</body>
</html>