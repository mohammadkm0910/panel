<nav class="navbar navbar-expand-lg navbar-light navbar-admin">
    <div class="container-fluid justify-content-between">
        <ul class="navbar-nav flex-row">
            <li class="nav-item me-3 me-lg-1">
                <a class="nav-link d-sm-flex align-items-sm-center" href="#">
                    <strong class="d-sm-block ms-1">پنل آدمین</strong>
                </a>
            </li>
            <li class="nav-item me-3 me-lg-1 open-panel">
                <a class="nav-link" id="open-sidebar">
                    <i class="fas fa-bars fa-lg"></i>
                </a>
            </li>
            <li class="nav-item me-3 me-lg-1">
                <a class="nav-link" href="<?php url('/'); ?>">
                    <i class="fas fa-home fa-lg"></i>
                </a>
            </li>
            <li class="nav-item dropdown me-3 me-lg-1">
                <a class="nav-link dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown">
                    <i class="fas fa-user fa-lg"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" >
                    <?php if(isset($_SESSION['user'])) { 
                       $userModel = new \Model\UserModel();
                    ?>
                    <li><a class="dropdown-item disabled user-select-none"><?php echo $userModel->getUsernameById($_SESSION['user']); ?></a></li>
                    <li><a class="dropdown-item" href="<?php url('logout'); ?>">خروج</a></li>
                    <?php } else { ?>
                    <li><a class="dropdown-item" href="<?php url('login'); ?>">ورود</a></li>
                    <li><a class="dropdown-item" href="<?php url('register'); ?>">ثبت نام</a></li>
                    <?php } ?>
                </ul>
            </li>
            <li class="nav-item me-3 me-lg-1">
                <a class="nav-link" href="#">
                    <i class="fas fa-comments fa-lg"></i>
                    <span class="badge rounded-pill badge-notification bg-danger">6</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
