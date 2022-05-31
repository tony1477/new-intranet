<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Grupdivisi extends BaseController
{
    public function index()
    {
        helper(['admin_helper']);
        helper(['master_helper']);
        $menu = getMenu($user='Admin');
        $getdivisi = getDivisi();
        //$submenu = getSubmenu($moduleid=0);
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Dashboard']),
			'page_title' => view('partials/page-title', ['title' => 'Dashboard', 'li_1' => 'Intranet', 'li_2' => 'Dashboard']),
			'modules' => $menu,
            'divisi' => $getdivisi
		];
		
		return view('master/grupdivisi', $data);
    }
}
