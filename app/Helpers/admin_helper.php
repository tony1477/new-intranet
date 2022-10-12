<?php
function format_rupiah($angka){
  $rupiah=number_format($angka,0,',','.');
  return $rupiah;
}

function getMenu($user) {
  // $user = $_SESSION['users'];
  $db = db_connect();
  return $result = $db->query("select * from module")->getResult();
}

function getSubmenu($moduleid) {
  $db = db_connect();
  return $db->query("select * from menu where moduleid = {$moduleid} and recordstatus = 1 order by urutan asc")->getResult();
}
<<<<<<< HEAD

function getDetailMenu($menuid) {
  $db = db_connect();
  return $db->query("select * from menu where moduleid = {$menuid} and recordstatus = 1 order by urutan asc")->getResult();
}

// bx bxs-card, bx bxs-report, bx bxs-bar-chart-alt-2, bx bx-trending-up, bx bx-bar-chart-square, bx bx-laptop, 
=======
>>>>>>> 942b1dc1a700c83745b6d32c1bb29c99e72b4656
?>