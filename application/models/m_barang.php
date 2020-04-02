<?php

class M_barang extends CI_Model
{
    public function getPembeliById($id)
    {
        return $this->db->get_where('tb_barang', ['id_barang' => $id])->row_array();
    }

    public function ubahDataBarang()
    {
        $data = [
            "nama_penjual" => $this->input->post('nama_penjual', true),
            "nama_barang" => $this->input->post('nama_barang', true),
            "harga" => $this->input->post('harga', true),
        ];

        $this->db->where('id_barang', $this->input->post('id'));
        $this->db->update('tb_barang', $data);
    }

    public function hapusDataBarang($id)
    {
        $this->db->delete('tb_barang', ['id_barang' => $id]);
    }

    public function getBarang()
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->join('tb_barang', 'tb_barang.id_penjual = tb_user.id_user');
        $query = $this->db->get();
    }

    public function ubahDataBarang1()
    {
        $data = [
            "nama_penjual" => $this->input->post('nama_penjual', true),
            "nama_barang" => $this->input->post('nama_barang', true),
            "harga" => $this->input->post('harga', true),
            "status" => $this->input->post('status', true),
            "deskripsi" => $this->input->post('deskripsi', true),
        ];

        $this->db->where('id_barang', $this->input->post('id'));
        $this->db->update('tb_barang', $data);
    }
}
