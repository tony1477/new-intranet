<?php
function getRoom() {
    $db = db_connect();
    return $db->query("select a.idruangan,nama_ruangan,lokasi_ruangan,jumlah_peserta,keterangan,foto_ruangan
    from data_ruangan a 
    where a.status=1 order by idruangan asc ")->getResult();
}

function getRoomByName($name) {
    if(strpos($name,'-')==TRUE) {
        $name = str_replace('-',' ',$name);
    }
    $db = db_connect();
    return $db->query("select a.idruangan,nama_ruangan,lokasi_ruangan,jumlah_peserta,keterangan,foto_ruangan, fitur, (
        select group_concat(kode) from (select (x.dep_kode) as kode, idruangan,tgl_mulai
        from tbl_ifmdepartemen x
        join peminjaman_ruangan y on y.iddepartment = x.iddepartment 
        group by x.iddepartment
        limit 5) z where z.idruangan = a.idruangan 
        order by tgl_mulai desc
        ) as dep_kode
    from data_ruangan a 
    where a.status=1 and nama_ruangan = '{$name}'order by idruangan asc ")->getResult();
}

function getScheduleByName($name) {
    if(strpos($name,'-')==TRUE) {
        $name = str_replace('-',' ',$name);
    }
    $db = db_connect();
    return $db->query("select a.tgl_mulai,jam_mulai,tgl_selesai,jam_selesai,a.jumlah_peserta, asal_peserta,agenda,pemateri,nama_peserta,kebutuhan, b.nama_ruangan
    from peminjaman_ruangan a
    join data_ruangan b on b.idruangan = a.idruangan
    where b.nama_ruangan = '{$name}' order by tgl_mulai desc")->getResult();
}