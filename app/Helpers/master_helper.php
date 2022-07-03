<?php

function getGroupDivisi() {
    $db = db_connect();
    return $db->query("select * from tbl_ifmdivisigroup")->getResult();
}

function getDivisi() {
    $db = db_connect();
    return $db->query("select a.*, b.gdiv_nama from tbl_ifmdivisi a join tbl_ifmdivisigroup b on b.iddivisigroup = a.iddivisigroup")->getResult();
}

function getDepartment() {
    $db = db_connect();
    return $db->query("select a.*, b.div_kode from tbl_ifmdepartemen a join tbl_ifmdivisi b on b.iddivisi = a.iddivisi")->getResult();
}