<?php

class Pembeli extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['username'] = $this->session->userdata('username');
        $data["judul"] = "Lelang Mobil Nusantara Penjual";
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template/v_header', $data);
        $this->load->view('pembeli/v_nav', $data);
        $this->load->view('pembeli/v_index');
        $this->load->view('pembeli/v_footer');

        echo 'selamat datang ' . $data['user']['nama'];
        echo '<br>  selamat datang ' . $data['user']['nama'];
    }
}
