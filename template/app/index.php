<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php asset('public/app/css/style.css'); ?>">
    <script src="<?php asset('public/shared/js/jquery.min.js') ?>"></script>
    <script src="<?php asset('public/shared/js/mdb.min.js') ?>" defer></script>
    <script src="<?php asset('public/app/js/main.js') ?>" defer></script>
    <link rel="stylesheet" href="<?php asset('public/shared/font-awesome-free-5.15.2/all.css'); ?>">
    <title>شهر فناوری</title>
</head>
<body dir="rtl">
    <header class="header-top">
        <nav class="nav-container">
            <section class="nav-icon" id="nav-mobile">
                <span></span>
                <span></span>
                <span></span>
            </section>
            <section class="nav-brand">
                <a href="#">شهر فناوری</a>
            </section>
            <ul class="nav-content" id="nav-content-mobile">
                <?php foreach ($parentPageGroups as $parentPageGroup) { ?>
                    <li>
                        <a href="#"><?php echo $parentPageGroup['title']; ?></a>
                        <ul class="nav-sub-list">
                            <?php foreach ($childPageGroups as $childPageGroup) {
                                if ($childPageGroup['parent_id'] == $parentPageGroup['id']) { ?>
                                    <li><a href="#"><?php echo $childPageGroup['title']; ?></a></li>
                            <?php }
                            } ?>
                        </ul>
                    </li>
                <?php } ?>
                <li class="nav-register">
                    <?php if (isset($_SESSION['user'])) { ?>
                        <a><i class="fas fa-power-off"></i></a>
                        <ul class="nav-sub-list">
                            <li><a><?php echo $userModel->getUsernameById($_SESSION['user']); ?></a></li>
                            <li>
                                <a href="<?php url('logout'); ?>">خروج</a>
                            </li>
                        </ul>
                    <?php } else { ?>
                        <a><i class="fas fa-user-alt"></i></a>
                        <ul class="nav-sub-list">
                            <li>
                                <a href="<?php url('register'); ?>">ثبت نام</a>
                            </li>
                            <li>
                                <a href="<?php url('login'); ?>">ورود</a>
                            </li>
                        </ul>
                    <?php } ?>
                </li>
            </ul>
            <div class="nav-left">
                <a href="#"><i class="fa fa-search"></i></a>
            </div>
        </nav>
    </header>
</body>

</html>