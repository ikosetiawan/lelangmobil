<?php

class Penjual extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_barang');
    }

    public function index()
    {
        $data['username'] = $this->session->userdata('username');
        $data['barang'] = $this->db->get_where('tb_barang', ['id_penjual' => 15])->result_array();
        $data["judul"] = "Lelang Mobil Nusantara Penjual";
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template/v_header', $data);
        $this->load->view('penjual/v_index', $data);
        $this->load->view('penjual/v_footer');

        echo 'selamat datang ' . $data['user']['nama'];
        echo '<br>  selamat datang ' . $data['user']['nama'];
    }

    public function tambahDataBarang()
    {
        $data['judul'] = "Tambah Data Barang ";
        $data['username'] = $this->session->userdata('username');

        $this->form_validation->set_rules('nama_penjual', 'Nama_penjual', 'required|trim', ['required' => 'Harap mengisi nama penjual terlebih dahulu']);
        $this->form_validation->set_rules('nama_barang', 'Nama_barang', 'required|trim', ['required' => 'Harap mengisi nama barang terlebih dahulu']);
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim', ['required' => 'Harap memilih status terlebih dahulu']);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("template/v_header", $data);
            $this->load->view("penjual/v_tambah_barang", $data);
            $this->load->view("template/v_footer");
            $this->session->set_flashdata('message', 'Gagal ditambahkan ! ');
        } else {
            $data = [
                "id_penjual" => $this->input->post('id_penjual', true),
                "nama_penjual" => $this->input->post('nama_penjual', true),
                "nama_barang" => $this->input->post('nama_barang', true),
                "harga" => $this->input->post('harga', true),
                "status" => "Masih dalam Lelang",
                "deskripsi" => $this->input->post('deskripsi', true),
            ];
            $this->db->insert('tb_barang', $data);
            $this->session->set_flashdata('message', 'Berhasil ditambahkan');
            redirect('penjual');
        }
    }

    public function updateBarang($id)
    {
        $data['judul'] = "Update Data Barang ";
        $data['username'] = $this->session->userdata('username');
        $data['barang'] = $this->M_barang->getPembeliById($id);

        $this->form_validation->set_rules('nama_penjual', 'Nama_penjual', 'required|trim', ['required' => 'Harap mengisi nama penjual terlebih dahulu']);
        $this->form_validation->set_rules('nama_barang', 'Nama_barang', 'required|trim', ['required' => 'Harap mengisi nama barang terlebih dahulu']);
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim', ['required' => 'Harap memilih status terlebih dahulu']);
        $this->form_validation->set_rules('', '', 'required', ['required' => 'Harap memilih status terlebih dahulu']);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("template/v_header", $data);
            $this->load->view('penjual/V_update_barang', $data);
            $this->load->view("template/v_footer");
            $this->session->set_flashdata('message', 'Gagal diubah ! ');
        } else {
            $this->M_barang->ubahDataBarang1();
            $this->session->set_flashdata('message', 'Berhasil diubah');
            redirect('penjual');
        }
    }
}
