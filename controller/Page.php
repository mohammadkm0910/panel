<?php


namespace Controller;

use Model\Database;
use Model\PageModel;
use Model\PageGroupModel;
class Page extends Controller
{
    public function index()
    {
        $pModel = new PageModel();
        $joinPages = $pModel->all(true);
        require_once BASE_DIR."/template/admin/page/index.php";
    }
    public function create()
    {
        $pgModel = new PageGroupModel();
        $childPageGroups = $pgModel->childPageGroup(false);
        require_once BASE_DIR."/template/admin/page/create.php";
    }
    public function store($request)
    {
        $db = new Database();
        if ($request['group_id'] != null) {
            $request = array_merge($request,array("user_id"=> $_SESSION['user']));
            $request['image'] = $request['image']['name'] ? $this->saveImage($request['image'],"image-pages") : null;
            $request['slider'] = isset($request['slider']);
            $db->insert("pages",array_keys($request),$request);
            $this->redirect('page');
        } else {
            $this->redirectBack();
        }
    }
    public function edit($id)
    {
        $pgModel = new PageGroupModel();
        $pModel = new PageModel();
        $joinPage = $pModel->byId($id,true);
        $childPageGroups = $pgModel->childPageGroup(false);
        if (empty($joinPage) or empty($childPageGroups)) $this->redirect("page");
        require_once BASE_DIR."/template/admin/page/edit.php";
    }
    public function update($request,$id)
    {
        $db = new Database();
        $pModel = new PageModel();
        if ($request['group_id'] != null) {
            if ($request['image']['name']) {
                $this->removeImage($pModel->byId($id)['image']);
                $request['image'] = $this->saveImage($request['image'],"image-pages");
            } else {
                unset($request['image']);
            }
            $request = array_merge($request,array("user_id"=> $_SESSION['user']));
            $request['slider'] = isset($request['slider']);
            $db->update("pages",$id,array_keys($request),$request);
            $this->redirect('page');
        } else {
            $this->redirectBack();
        }
    }
    public function show($id)
    {
        $pModel = new PageModel();
        $joinPage = $pModel->byId($id,true);
        if (empty($joinPage)) $this->redirect("page");
        require_once BASE_DIR."/template/admin/page/show.php";
    }
    public function delete($id)
    {
        $pModel = new PageModel();
        $joinPage = $pModel->byId($id,true);
        require_once BASE_DIR."/template/admin/page/delete.php";
    }
    public function destroy($id)
    {
        $db = new Database();
        $pModel = new PageModel();
        $page = $pModel->byId($id,false);
        $this->removeImage($page['image']);
        $db->delete("pages",$id);
        $this->redirectBack();
    }
}