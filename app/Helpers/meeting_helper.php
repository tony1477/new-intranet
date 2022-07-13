<?php
function getRoom() {
    $db = db_connect();
    return $db->query("select a.idruangan,nama_ruangan,lokasi_ruangan,jumlah_peserta,keterangan,foto_ruangan
    from data_ruangan a 
    where a.status=1 order by idruangan asc ")->getResult();
}