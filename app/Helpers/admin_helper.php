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
?>