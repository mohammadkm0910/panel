<?php

namespace Controller;
use Model\PageGroupModel;
use Model\UserModel;
class Home {

    public function index()
    {
        $userModel = new UserModel();
        $pageGroupModel = new PageGroupModel();
        $parentPageGroups = $pageGroupModel->parentPageGroup(false);
        $childPageGroups = $pageGroupModel->childPageGroup();
        require_once BASE_DIR."/template/app/index.php";
    }
}