<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Department extends BaseController
{
    public $model = null;
    public function __construct()
    {
        $this->model = new \App\Models\DepartmentModel();
    }

    public function index()
    {
        helper(['admin_helper']);
        helper(['master_helper']);
        $menu = getMenu($user='Admin');
        $getdepartment = getDepartment();
        //$submenu = getSubmenu($moduleid=0);
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Department']),
			'page_title' => view('partials/page-title', ['title' => 'Dashboard', 'li_1' => 'Intranet', 'li_2' => 'Department']),
			'modules' => $menu,
            'department' => $getdepartment,
		];
		
		return view('master/department', $data);
    }

    // public function delete()
    // {
    //     header("Content-Type: application/json");
    //     $arr = array(
    //         'fail' => 500,
    //         'code' => 'FAILED',
    //         'message'=>'NOT ALLOWED'
    //     );
    //     if($this->request->isAJAX()) {
    //         try {
    //             $id = $this->request->getVar('kode');
    //             $this->model->where('gdiv_kode',$id)->delete();
    //             if($this->model->find($id)) {
    //                 $arr = array(
    //                     'status' => 'warning',
    //                     'code' => 200,
    //                     'message' => 'Terjadi kesalahan dalam menghapus data',
    //                     // 'data' => $this->model->findAll()
    //                 );
    //                 return json_encode($arr);
    //             }
    //             $arr = array(
    //                 'status' => 'success',
    //                 'code' => 200,
    //                 'message' => 'Data Berhasil di Hapus',
    //                 // 'data' =>  $this->model->findAll()
    //             );
    //         }catch (\Exception $e) {
    //             $arr = array(
    //                 'status' => $e->getMessage(),
    //                 'code' => 400
    //             );
    //         }
    //     }
    //     $response = json_encode($arr);
    //     return $response;
    // }

    // public function save()
    // {
    //     header("Content-Type: application/json");
    //     $arr = array(
    //         'fail' => 500,
    //         'code' => 'FAILED',
    //         'message'=>'NOT ALLOWED'
    //     );
    //     if($this->request->isAJAX()) {
    //         try {
    //             $datas = $this->request->getVar('data');
    //             $data = [
    //                 'gdiv_kode' => $datas[1],
    //                 'gdiv_nama' => $datas[2],
    //                 // 'user_m' => $this->session->user_kode,
    //                 'tgl_m'=>date('Y-m-d'),
    //                 'time_m'=>date("h:i:s a")
    //             ];
    //             if($datas[0]!=='') {
    //                 $this->model->update($datas[0],$data);
    //                 $message = 'Data berhasil di ubah';
    //             }
                
    //             if($datas[0]==='') {
    //                 $newdata = [
    //                     // 'user_c' => $this->session->user_kode,
    //                     'tgl_c'=>date('Y-m-d'),
    //                     'time_c'=>date("h:i:s a")
    //                 ];
    //                 $data = array_merge($data,$newdata);
    //                 $this->model->insert($data);
    //                 $message = 'Data berhasil di tambah';
    //             }
                
    //             $arr = array(
    //                 'status' => 'success',
    //                 'code' => 200,
    //                 'message' => $message
    //             );
    //         }catch (\Exception $e) {
    //             $arr = array(
    //                 'status' => $e->getMessage(),
    //                 'code' => 400
    //             );
    //         }
    //     }
    //     $response = json_encode($arr);
    //     return $response;
    // }
}
