<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_penjual');
        $this->load->model('M_pembeli');
        $this->load->model('M_barang');
        $this->load->model('m_transaksi');
        $this->load->library('dompdf_gen');
        $this->load->library('form_validation');
        // if ($this->session->userdata('status') != "login") {
        //     redirect(base_url() . "login");
        // }
    }

    public function index()
    {
        $data["judul"] = "Halaman Admin";
        $this->load->view("admin/v_header", $data);
        $this->load->view("admin/index");
        $this->load->view("admin/v_footer");
    }

    public function tampilPenjual()
    {
        $status = "penjual";
        $data['judul'] = "Daftar Penjual ";
        $data['penjual'] = $this->db->get_where('tb_user', ['status' => $status])->result_array();
        $this->load->view("admin/v_header", $data);
        $this->load->view("admin/penjual/v_penjual", $data);
        $this->load->view("admin/v_footer");
    }

    public function tambahDataPenjual()
    {
        $data['judul'] = "Tambah data Penjual ";

        $this->form_validation->set_rules('username', 'Username', 'required|trim', ['required' => 'Harap mengisi username terlebih dahulu']);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => 'Harap mengisi nama lengkap terlebih dahulu']);
        $this->form_validation->set_rules('telephone', 'Telephone', 'required', ['required' => 'Harap mengisi nomor telephone terlebih dahulu']);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', ['required' => 'Harap mengisi alamat terlebih dahulu']);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_emails', ['required' => 'Harap mengisi email terlebih dahulu', 'valid_emails' => 'harap isi E-mail dengan benar']);
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("admin/v_header", $data);
            $this->load->view('admin/penjual/V_tambah_penjual', $data);
            $this->load->view("admin/v_footer");
            $this->session->set_flashdata('message', 'Gagal ditambahkan ! ');
        } else {
            $data = [
                'status' => "penjual",
                'username' => $this->input->post('username', true),
                'nama' => $this->input->post('nama', true),
                'telephone' => $this->input->post('telephone', true),
                'alamat' => $this->input->post('alamat', true),
                'email' => $this->input->post('email', true),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                // date_create => time()
            ];
            $this->db->insert('tb_user', $data);
            $this->session->set_flashdata('message', 'Berhasil ditambahkan');
            redirect('Admin/tampilPenjual');
        }
    }

    public function updatePenjual($id)
    {
        $data['judul'] = "Update data Penjual ";
        $data['status'] = ['Penjual', 'Pembeli'];
        $data['penjual'] = $this->M_penjual->getPenjualById($id);

        $this->form_validation->set_rules('status', 'Status', 'required|trim', ['required' => 'Harap memilih status terlebih dahulu']);
        $this->form_validation->set_rules('username', 'Username', 'required|trim', ['required' => 'Harap mengisi username terlebih dahulu']);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => 'Harap mengisi nama lengkap terlebih dahulu']);
        $this->form_validation->set_rules('telephone', 'Telephone', 'required', ['required' => 'Harap mengisi nomor telephone terlebih dahulu']);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', ['required' => 'Harap mengisi alamat terlebih dahulu']);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_emails', ['required' => 'Harap mengisi email terlebih dahulu', 'valid_emails' => 'harap isi E-mail dengan benar']);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("admin/v_header", $data);
            $this->load->view('admin/penjual/V_update_penjual', $data);
            $this->load->view("admin/v_footer");
            $this->session->set_flashdata('message', 'Gagal diubah ! ');
        } else {
            $this->M_penjual->ubahDataPenjual();
            $this->session->set_flashdata('message', 'Berhasil diubah');
            redirect('Admin/tampilPenjual');
        }
    }

    public function hapusPenjual($id)
    {
        $this->M_penjual->hapusDataPenjual($id);
        redirect('Admin/tampilPenjual');
    }

    public function tampilPembeli()
    {
        $status = "pembeli";
        $data['judul'] = "Daftar Pembeli ";
        $data['pembeli'] = $this->db->get_where('tb_user', ['status' => $status])->result_array();
        $this->load->view("admin/v_header", $data);
        $this->load->view("admin/pembeli/v_pembeli", $data);
        $this->load->view("admin/v_footer");
    }

    public function tambahDataPembeli()
    {
        $data['judul'] = "Tambah Data Pembeli ";

        $this->form_validation->set_rules('username', 'Username', 'required|trim', ['required' => 'Harap mengisi username terlebih dahulu']);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => 'Harap mengisi nama lengkap terlebih dahulu']);
        $this->form_validation->set_rules('telephone', 'Telephone', 'required', ['required' => 'Harap mengisi nomor telephone terlebih dahulu']);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', ['required' => 'Harap mengisi alamat terlebih dahulu']);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_emails', ['required' => 'Harap mengisi email terlebih dahulu', 'valid_emails' => 'harap isi E-mail dengan benar']);
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("admin/v_header", $data);
            $this->load->view('admin/pembeli/V_tambah_pembeli', $data);
            $this->load->view("admin/v_footer");
            $this->session->set_flashdata('message', 'Gagal ditambahkan ! ');
        } else {
            $data = [
                'status' => "pembeli",
                'username' => $this->input->post('username', true),
                'nama' => $this->input->post('nama', true),
                'telephone' => $this->input->post('telephone', true),
                'alamat' => $this->input->post('alamat', true),
                'email' => $this->input->post('email', true),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                // date_create => time()
            ];
            $this->db->insert('tb_user', $data);
            $this->session->set_flashdata('message', 'Berhasil ditambahkan');
            redirect('Admin/tampilPembeli');
        }
    }

    public function updatePembeli($id)
    {
        $data['judul'] = "Update Data Pembeli ";
        $data['status'] = ['Pembeli', 'Penjual'];
        $data['pembeli'] = $this->M_pembeli->getPembeliById($id);

        $this->form_validation->set_rules('status', 'Status', 'required|trim', ['required' => 'Harap memilih status terlebih dahulu']);
        $this->form_validation->set_rules('username', 'Username', 'required|trim', ['required' => 'Harap mengisi username terlebih dahulu']);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => 'Harap mengisi nama lengkap terlebih dahulu']);
        $this->form_validation->set_rules('telephone', 'Telephone', 'required', ['required' => 'Harap mengisi nomor telephone terlebih dahulu']);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', ['required' => 'Harap mengisi alamat terlebih dahulu']);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_emails', ['required' => 'Harap mengisi email terlebih dahulu', 'valid_emails' => 'harap isi E-mail dengan benar']);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("admin/v_header", $data);
            $this->load->view('admin/pembeli/V_update_pembeli', $data);
            $this->load->view("admin/v_footer");
            $this->session->set_flashdata('message', 'Gagal diubah ! ');
        } else {
            $this->M_pembeli->ubahDataPembeli();
            $this->session->set_flashdata('message', 'Berhasil diubah');
            redirect('Admin/tampilPembeli');
        }
    }

    public function hapusPembeli($id)
    {
        $this->M_pembeli->hapusDataPembeli($id);
        redirect('Admin/tampilPembeli');
    }

    public function tampilBarang()
    {

        $data['judul'] = "Daftar Barang ";
        $data['barang'] = $this->db->get('tb_barang')->result_array();;
        $this->load->view("admin/v_header", $data);
        $this->load->view("admin/barang/v_barang", $data);
        $this->load->view("admin/v_footer");
    }

    public function tambahDataBarang()
    {
        $data['judul'] = "Tambah Data Barang ";

        $this->form_validation->set_rules('nama_penjual', 'Nama_penjual', 'required|trim', ['required' => 'Harap mengisi nama penjual terlebih dahulu']);
        $this->form_validation->set_rules('nama_barang', 'Nama_barang', 'required|trim', ['required' => 'Harap mengisi nama barang terlebih dahulu']);
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim', ['required' => 'Harap memilih status terlebih dahulu']);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("admin/v_header", $data);
            $this->load->view('admin/barang/V_tambah_barang', $data);
            $this->load->view("admin/v_footer");
            $this->session->set_flashdata('message', 'Gagal ditambahkan ! ');
        } else {
            $data = [
                "id_penjual" => $this->input->post('id_penjual', true),
                "nama_penjual" => $this->input->post('nama_penjual', true),
                "nama_barang" => $this->input->post('nama_barang', true),
                "harga" => $this->input->post('harga', true),
                "deskripsi" => $this->input->post('deskripsi', true),
            ];
            $this->db->insert('tb_barang', $data);
            $this->session->set_flashdata('message', 'Berhasil ditambahkan');
            redirect('Admin/tampilBarang');
        }
    }

    public function updateBarang($id)
    {
        $data['judul'] = "Update Data Pembeli ";
        $data['barang'] = $this->M_barang->getPembeliById($id);

        $this->form_validation->set_rules('nama_penjual', 'Nama_penjual', 'required|trim', ['required' => 'Harap mengisi nama penjual terlebih dahulu']);
        $this->form_validation->set_rules('nama_barang', 'Nama_barang', 'required|trim', ['required' => 'Harap mengisi nama barang terlebih dahulu']);
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim', ['required' => 'Harap memilih status terlebih dahulu']);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("admin/v_header", $data);
            $this->load->view('admin/barang/V_update_barang', $data);
            $this->load->view("admin/v_footer");
            $this->session->set_flashdata('message', 'Gagal diubah ! ');
        } else {
            $this->M_barang->ubahDataBarang();
            $this->session->set_flashdata('message', 'Berhasil diubah');
            redirect('Admin/tampilBarang');
        }
    }

    public function hapusBarang($id)
    {
        $this->M_barang->hapusDataBarang($id);
        $this->session->set_flashdata('message', 'Berhasil dihapus');
        redirect('Admin/tampilBarang');
    }

    public function tampilTransaksi()
    {

        $data['judul'] = "Daftar Transaksi ";
        $data['transaksi'] = $this->db->get('tb_transaksi')->result_array();;
        $this->load->view("admin/v_header", $data);
        $this->load->view("admin/transaksi/v_transaksi", $data);
        $this->load->view("admin/v_footer");
    }

    public function tambahDataTransaksi()
    {
        $data['judul'] = "Tambah Data Transaksi ";

        $this->form_validation->set_rules('id_barang', 'ID_barang', 'required');
        $this->form_validation->set_rules('id_penjual', 'ID_penjual', 'required');
        $this->form_validation->set_rules('id_pembeli', 'ID_pembeli', 'required');
        $this->form_validation->set_rules('nama_penjual', 'Nama_penjual', 'required');
        $this->form_validation->set_rules('nama_pembeli', 'Nama_pembeli', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama_barang', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('alamat_pengiriman', 'Alamat_pengiriman', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("admin/v_header", $data);
            $this->load->view('admin/transaksi/V_tambah_transaksi', $data);
            $this->load->view("admin/v_footer");
            $this->session->set_flashdata('message', 'Gagal ditambahkan ! ');
        } else {
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
            $this->db->insert('tb_transaksi', $data);
            $this->session->set_flashdata('message', 'Berhasil ditambahkan');
            redirect('Admin/tampilTransaksi');
        }
    }

    public function updateTransaksi($id)
    {
        $data['judul'] = "Update Data Transaksi ";
        $data['transaksi'] = $this->m_transaksi->getTransaksiById($id);

        $this->form_validation->set_rules('id_barang', 'ID_barang', 'required');
        $this->form_validation->set_rules('id_penjual', 'ID_penjual', 'required');
        $this->form_validation->set_rules('id_pembeli', 'ID_pembeli', 'required');
        $this->form_validation->set_rules('nama_penjual', 'Nama_penjual', 'required');
        $this->form_validation->set_rules('nama_pembeli', 'Nama_pembeli', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama_barang', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('alamat_pengiriman', 'Alamat_pengiriman', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("admin/v_header", $data);
            $this->load->view('admin/transaksi/V_update_transaksi', $data);
            $this->load->view("admin/v_footer");
            $this->session->set_flashdata('message', 'Gagal diubah ! ');
        } else {
            $this->m_transaksi->ubahDatatransaksi();
            $this->session->set_flashdata('message', 'Berhasil diubah');
            redirect('Admin/tampilTransaksi');
        }
    }

    public function hapusTransaksi($id)
    {
        $this->m_transaksi->hapusDataTransaksi($id);
        $this->session->set_flashdata('message', 'Berhasil dihapus');
        redirect('Admin/tampilTransaksi');
    }






    public function barangPdf()
    {
        $data['barang'] = $this->db->get('tb_barang')->result_array();
        $this->load->view('Admin/barang/laporan_pdf', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan Barang.pdf", array('Attachment' => 0));
    }

    public function pembeliPdf()
    {
        $data['pembeli'] = $this->db->get_where('tb_user', ['status' => 'pembeli'])->result_array();
        $this->load->view('Admin/pembeli/laporan_pdf', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan Daftar Pembeli.pdf", array('Attachment' => 0));
    }

    public function penjualPdf()
    {
        $data['pembeli'] = $this->db->get_where('tb_user', ['status' => 'penjual'])->result_array();
        $this->load->view('Admin/penjual/laporan_pdf', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan Daftar Penjual.pdf", array('Attachment' => 0));
    }

    public function transaksiPdf()
    {
        $data['transaksi'] = $this->db->get('tb_transaksi')->result_array();
        $this->load->view('Admin/transaksi/laporan_pdf', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan Data Transaksi.pdf", array('Attachment' => 0));
    }
}
