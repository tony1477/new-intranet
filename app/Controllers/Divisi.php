<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Divisi extends BaseController
{
    public function __construct()
    {
        $this->model = new \App\Models\DivisiModel();
    }

    public function index()
    {
        helper(['admin_helper']);
        helper(['master_helper']);
        $menu = getMenu($user='Admin');
        $divisi = getDivisi();
        //$submenu = getSubmenu($moduleid=0);
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Divisi']),
			'page_title' => view('partials/page-title', ['title' => 'Dashboard', 'li_1' => 'Intranet', 'li_2' => 'Divisi']),
			'modules' => $menu,
            'divisi' => $divisi,
		];
		
		return view('master/divisi', $data);
    }
}
