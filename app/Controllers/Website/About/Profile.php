<?php

namespace App\Controllers\Website\About;

use App\Controllers\BaseController;
use App\Models\Website\PageModel;

class Profile extends BaseController
{
    private $model = null;
    private $ent = null;
    private $db = null;
    public function __construct()
    {
        $this->model = new \App\Models\Website\About\ProfileModel();
        $this->profile = new \App\Entities\Profile;
        // $this->db = \Config\Database::connect('webiste');
    }

    public function index()
    {
        helper(['admin_helper']);
        helper(['master_helper']);
        $pageModel = new PageModel;
        $menu = getMenu($user='Admin');
        // $profile = $this->model->findAll();
        $profile = $this->model->getDataProfile()->getResult('\App\Entities\Profile');
        $page = $pageModel->findAll();
        //$divisi = getDivisi();
        //$submenu = getSubmenu($moduleid=0);
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Profile']),
			'page_title' => view('partials/page-title', ['title' => 'Dashboard', 'li_1' => 'Website', 'li_2' => 'Profile']),
			'modules' => $menu,
            'route'=>'tentang/profil',
            'menuname' => 'Profile',
            'data' => $profile,
            //'options' => array('option1' => $group),
            'columns_hidden' => array('Action'),
            'columns' => array('Action','Id','Title','Content','Page'),
            //'crudScript' => view('partials/script/department',['menuname' => 'Department']),
            'forms' => [
                # rule
                # column_name => array(type,'name and id','class','style')
                'articleid' => array('type'=>'hidden','idform'=>'id','field'=>'articleid'), 
                'title' => array(
                    'label'=>'Title',
                    'field'=>'title',
                    'type'=>'text',
                    'idform'=>'judul',
                    'form-class'=>'form-control',
                    'style' => 'col-md-8 col-xl-8'
                ),
                'content' => array(
                    'label'=>'Content',
                    'field'=>'content',
                    'type'=>'textarea',
                    'idform'=>'isi',
                    'form-class'=>'form-control',
                    'style' => 'col-md-12 col-xl-12'
                ),
                'pageid' => array(
                    'label'=>'Page',
                    'field'=>'pageid',
                    'type'=>'select',
                    'idform'=>'page_id',
                    'form-class'=>'form-select',
                    'style' => 'col-md-8 col-xl-8',
                    'options' => array(
                        'list' => $page,
                        'id' => 'Id',
                        'value' => 'Page',
                    ),
                ),
            ]
		];
		
		return view('master/w_view', $data);
        // var_dump($page);
    }

    public function delete()
    {
        header("Content-Type: application/json");
        $arr = array(
            'fail' => 500,
            'code' => 'FAILED',
            'message'=>'NOT ALLOWED'
        );
        if($this->request->isAJAX()) {
            try {
                $id = $this->request->getVar('id');
                $this->model->where('iddepartment',$id)->delete();
                if($this->model->find($id)) {
                    $arr = array(
                        'status' => 'warning',
                        'code' => 200,
                        'message' => lang('Files.Delete_Error'),
                        // 'data' => $this->model->findAll()
                    );
                    return json_encode($arr);
                }
                $arr = array(
                    'status' => 'success',
                    'code' => 200,
                    'message' => lang('Files.Delete_Success'),
                    // 'data' =>  $this->model->findAll()
                );
            }catch (\Exception $e) {
                $arr = array(
                    'status' => $e->getMessage(),
                    'code' => 400
                );
            }
        }
        $response = json_encode($arr);
        return $response;
    }

    public function save()
    {
        header("Content-Type: application/json");
        $arr = array(
            'fail' => 500,
            'code' => 'FAILED',
            'message'=>'NOT ALLOWED'
        );
        if($this->request->isAJAX()) {
            try {
                $datas = $this->request->getVar('data');
                if(is_object($datas)) {
                    $datas = (array) $datas;
                }
                $data = [
                    'iddivisi' => $datas['id_divisi'],
                    'dep_kode' => $datas['kode'],
                    'dep_nama' => $datas['namadepartment'],
                    'dep_nama2' => $datas['namadepartment2'],
                    // 'user_m' => $this->session->user_kode,
                    'tgl_m'=>date('Y-m-d'),
                    'time_m'=>date("h:i:s a")
                ];
                if($datas['id']!=='') {
                    $this->model->update($datas['id'],$data);
                    $message = lang('Files.Update_Success');
                }
                
                if($datas['id']==='') {
                    $newdata = [
                        // 'user_c' => $this->session->user_kode,
                        'tgl_c'=>date('Y-m-d'),
                        'time_c'=>date("h:i:s a")
                    ];
                    $data = array_merge($data,$newdata);
                    $this->model->insert($data);
                    $message = lang('Files.Save_Success');
                }
                
                $arr = array(
                    'status' => 'success',
                    'code' => 200,
                    'message' => $message
                );
            }catch (\Exception $e) {
                $arr = array(
                    'status' => $e->getMessage(),
                    'code' => 400
                );
            }
        }
        $response = json_encode($arr);
        return $response;
    }
}
