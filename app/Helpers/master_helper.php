<?php

function getGroupDivisi() {
    $db = db_connect();
    return $db->query("select a.iddivisigroup as Id, a.gdiv_kode as Code_GroupDivisi, a.gdiv_nama as Name_GroupDivisi, a.gdiv_nama2 as Name_GroupDivisi2,user_c as User_Created, a.user_m as User_Modified from tbl_ifmdivisigroup a ")->getResult();
}

function getDivisi() {
    $db = db_connect();
    return $db->query("select a.iddivisi as Id, a.div_kode as Code_Divisi, a.div_nama as Name_Divisi, a.user_c as User_Created, a.user_m as User_Modified, b.iddivisigroup, b.gdiv_nama as Name_GroupDivisi
    from tbl_ifmdivisi a 
    join tbl_ifmdivisigroup b on b.iddivisigroup = a.iddivisigroup")->getResult();
}

function getDepartment() {
    $db = db_connect();
    return $db->query("select a.*, b.div_kode from tbl_ifmdepartemen a join tbl_ifmdivisi b on b.iddivisi = a.iddivisi")->getResult();
}