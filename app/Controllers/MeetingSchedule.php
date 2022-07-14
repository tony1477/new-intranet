<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class MeetingSchedule extends BaseController
{
    public function index()
    {
        helper(['admin_helper']);
        helper(['meeting_helper']);
        $menu = getMenu($user='Admin');
        $meetingroom = getRoom();
        $data = [
            'title_meta' => view('partials/title-meta', ['title' => 'Meeting_Room']),
			'page_title' => view('partials/page-title', ['title' => 'Dashboard', 'li_1' => 'Intranet', 'li_2' => 'Meeting_Room']),
			'modules' => $menu,
            'data' => $meetingroom,
        ];
        return view('meeting-room/list-room',$data);
    }

    public function schedule() {
        helper(['admin_helper']);
        helper(['meeting_helper']);
        $menu = getMenu($user='Admin');
        $request = \Config\Services::request();
        $param = $request->uri->getSegment(2);
        $getRoom = getRoomByName($param);
        $schedule = getScheduleByName($param);
        if($getRoom==null) return redirect()->to('room-meeting'); 
        $data = [
            'title_meta' => view('partials/title-meta', ['title' => 'Meeting_Room']),
			'page_title' => view('partials/page-title', ['title' => 'Dashboard', 'li_1' => 'Intranet', 'li_2' => 'Meeting_Schedule']),
			'modules' => $menu,
            'data' => $schedule,
            'nama' => ucwords(str_replace('-room',' ',$param)),
        ];
        return view('meeting-room/schedule',$data);
    }

    public function booking() {
        helper(['admin_helper']);
        helper(['meeting_helper']);
        $menu = getMenu($user='Admin');
        $request = \Config\Services::request();
        $param = $request->uri->getSegment(3);
        if($param!='') {
            $getRoom = getRoomByName($param);
            if($getRoom==null) return redirect()->to('room-meeting'); 
        }
        $data = [
            'title_meta' => view('partials/title-meta', ['title' => 'Meeting_Room']),
			'page_title' => view('partials/page-title', ['title' => 'Dashboard', 'li_1' => 'Intranet', 'li_2' => 'Meeting_Schedule']),
			'modules' => $menu,
            // 'data' => $schedule,
            'nama' => ucwords(str_replace('-room',' ',$param)),
        ];
        return view('meeting-room/booking',$data);
    }
}
