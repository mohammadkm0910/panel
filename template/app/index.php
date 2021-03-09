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
        <nav class="navbar row">
            <a href="#" class="navbar-brand">شهر فناوری</a>
            <div class="navbar-mobile" id="nav-mobile">
                <?php foreach ($parentPageGroups as $parentPageGroup) { ?>
                    <div class="dropdown">
                        <button class="btn-drop">
                            <?php echo $parentPageGroup['title']; ?>
                        </button>
                        <div class="dropdown-content">
                            <?php foreach ($childPageGroups as $childPageGroup) {
                                if ($childPageGroup['parent_id'] == $parentPageGroup['id']) { ?>
                                    <a href="#"><?php echo $childPageGroup['title']; ?></a>
                            <?php }
                            } ?>
                        </div>
                    </div>
                <?php } ?>
                <div class="dropdown register">
                    <button class="btn-drop">
                        <i class="fas fa-user-alt"></i>
                    </button>
                    <div class="dropdown-content">
                        <a href="#">ثبت نام</a>
                        <a href="#">ورود</a>
                    </div>
                </div>
            </div>
            <div class="navbar-left">
                <button>
                    <i class="fas fa-search"></i>
                </button>
                <button class="btn-nav" id="nav-open">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </nav>
    </header>
</body>

</html>