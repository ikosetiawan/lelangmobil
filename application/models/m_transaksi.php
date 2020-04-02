<?php

class M_transaksi extends CI_Model
{
    public function getTransaksiById($id)
    {
        return $this->db->get_where('tb_transaksi', ['id_transaksi' => $id])->row_array();
    }

    public function hapusDataTransaksi($id)
    {
        $this->db->delete('tb_transaksi', ['id_transaksi' => $id]);
    }

    public function ubahDataTransaksi()
    {
        $data = [
            "id_barang" => $this->input->post('id_barang', true),
            "id_penjual" => $this->input->post('id_penjual', true),
            "id_pembeli" => $this->input->post('id_pembeli', true),
            "nama_penjual" => $this->input->post('nama_penjual', true),
            "nama_pembeli" => $this->input->post('nama_pembeli', true),
            "nama_barang" => $this->input->post('nama_barang', true),
            "harga" => $this->input->post('harga', true),
            "alamat_pengiriman" => $this->input->post('alamat_pengiriman', true),
            "tanggal" => $this->input->post('tanggal', true),
        ];

        $this->db->where('id_transaksi', $this->input->post('id'));
        $this->db->update('tb_transaksi', $data);
    }
}
