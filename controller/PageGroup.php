<?php

namespace Controller;
use Model\Database;
use Model\PageGroupModel;
class PageGroup extends Controller {
    public function index()
    {
        $pgModel = new PageGroupModel();
        $pageGroups = $pgModel->all();
        require_once BASE_DIR."/template/admin/page-group/index.php";
    }
    public function create()
    {
        $pgModel = new PageGroupModel();
        $groupRootCount = $pgModel->countParentGroup();
        $groupRoots = $pgModel->parentPageGroup();
        require_once BASE_DIR."/template/admin/page-group/create.php";
    }
    public function store($request)
    {
        $db = new Database();
        $request['parent_id'] = $request['parent_id'] != "" ? $request['parent_id'] : null;
        $db->insert("page_groups",array_keys($request),$request);
        $this->redirect("page-group");
    }
    public function show($id)
    {
        $pgModel = new PageGroupModel();
        $pageGroup = array_merge($pgModel->byId($id),["parent_title" => $pgModel->titleParentById($pgModel->byId($id)['parent_id'])]);
        if (empty($pageGroup)) $this->redirect("page-group");
        require_once BASE_DIR."/template/admin/page-group/show.php";
    }
    public function edit($id)
    {
        $pgModel = new PageGroupModel();
        $pageGroup = $pgModel->byId($id);
        $groupRootCount = $pgModel->countParentGroup();
        $groupCount = $pgModel->countPageGroup();
        $groupRoots = $pgModel->parentPageGroup();
        if ($groupCount == 0 or empty($pageGroup)) $this->redirect("page-group");
        require_once BASE_DIR."/template/admin/page-group/edit.php";
    }
    public function update($request,$id)
    {
        $db = new Database();
        $db->update("page_groups",$id,array_keys($request),$request);
        $this->redirect("page-group");
    }
    public function delete($id)
    {
        $pgModel = new PageGroupModel();
        $pageGroup = $pgModel->byId($id);
        require_once BASE_DIR."/template/admin/page-group/delete.php";
    }
    public function destroy($id)
    {
        $db = new Database();
        $db->delete("page_groups",$id);
        $this->redirectBack();
    }
}