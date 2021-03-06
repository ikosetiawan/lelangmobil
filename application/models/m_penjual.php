<?php

class M_penjual extends CI_model
{
    public function getPenjualById($id)
    {
        return $this->db->get_where('tb_user', ['id_user' => $id])->row_array();
    }

    public function ubahDataPenjual()
    {
        $data = [
            "status" => $this->input->post('status', true),
            "username" => $this->input->post('username', true),
            "nama" => $this->input->post('nama', true),
            "telephone" => $this->input->post('telephone', true),
            "alamat" => $this->input->post('alamat', true),
            "email" => $this->input->post('email', true),
        ];

        $this->db->where('id_user', $this->input->post('id'));
        $this->db->update('tb_user', $data);
    }

    public function hapusDataPenjual($id)
    {
        $this->db->delete('tb_user', ['id_user' => $id]);
    }
}
