<?php

function getGroupDivisi() {
    $db = db_connect();
    return $db->query("select * from tbl_ifmdivisigroup")->getResult();
}

function getDivisi() {
    $db = db_connect();
    return $db->query("select a.*, b.gdiv_nama from tbl_ifmdivisi a join tbl_ifmdivisigroup b on b.iddivisigroup = a.iddivisigroup")->getResult();
}