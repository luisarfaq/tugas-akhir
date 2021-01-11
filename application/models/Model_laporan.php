<?php
class Model_laporan extends CI_model
{

    function laporan()
    {
        $tgl_awal = $this->input->get('tgl_awal');
        $tgl_akhir = $this->input->get('tgl_akhir');
        $this->db->where('proses',3);
        if ($tgl_awal && $tgl_akhir) {
            $this->db->where("waktu_transaksi BETWEEN '$tgl_awal 00:00:00' AND '$tgl_akhir 23:59:59'");
        }
        $this->db->order_by('waktu_transaksi','ASC');
        return $this->db->get('tb_toko_penjualan');
        // return $this->db->query("SELECT * FROM `tb_toko_penjualan` a WHERE proses='3' ORDER BY waktu_transaksi ASC");
    }

    function laporan1()
    {
        $hari = date('Y-m-d');
        $this->db->where("proses='3'");
        $this->db->where("waktu_transaksi='$hari'");
        $this->db->order_by('waktu_transaksi', 'asc');
        return $this->db->get('tb_toko_penjualan');
    }


    function laporan7()
    {
        $hari = date('Y-m-d');
        $this->db->where("proses='3'");
        $this->db->where("waktu_transaksi > DATE_SUB( '$hari' , INTERVAL 7 DAY )");
        $this->db->order_by('waktu_transaksi', 'asc');
        return $this->db->get('tb_toko_penjualan');
    }

    function laporan30()
    {
        $hari = date('Y-m-d');
        $this->db->where("proses='3'");
        $this->db->where("waktu_transaksi > DATE_SUB( '$hari' , INTERVAL 30 DAY )");
        $this->db->order_by('waktu_transaksi', 'asc');
        return $this->db->get('tb_toko_penjualan');
    }

    function laporan360()
    {
        $hari = date('Y-m-d');
        $this->db->where("proses='3'");
        $this->db->where("waktu_transaksi > DATE_SUB( '$hari' , INTERVAL 1 YEAR )");
        $this->db->order_by('waktu_transaksi', 'asc');
        return $this->db->get('tb_toko_penjualan');
    }
}
