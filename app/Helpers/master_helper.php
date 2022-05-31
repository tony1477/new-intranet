<?php

function getDivisi() {
    $db = db_connect();
    return $db->query("select * from tbl_ifmdivisigroup")->getResult();
}