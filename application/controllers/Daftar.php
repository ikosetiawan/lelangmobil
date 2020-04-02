<?php

class Daftar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["judul"] = "Daftar ";

        $this->load->view('template/v_header', $data);
        $this->load->view('auth/v_daftar');
        $this->load->view('template/v_footer');
    }

    public function prosesDaftar()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tb_user.username]', ['is_unique' => 'Username telah digunakan', 'required' => 'Harap mengisi username terlebih dahulu']);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => 'Harap mengisi nama lengkap terlebih dahulu']);
        $this->form_validation->set_rules('telephone', 'Telephone', 'required', ['required' => 'Harap mengisi nomor telephone terlebih dahulu']);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', ['required' => 'Harap mengisi alamat terlebih dahulu']);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_emails|is_unique[tb_user.email]', ['required' => 'Harap mengisi email terlebih dahulu', 'valid_emails' => 'harap isi E-mail dengan benar', 'is_unique' => 'Maaf E-mail sudah pernah dipakai']);
        $this->form_validation->set_rules('password1', 'Password', 'required|min_length[5]|trim|matches[password2]', ['matches' => 'password tidak sama', 'min_length' => 'password terlalu pendek', 'required' => 'Harap mengisi password terlebih dahulu']);
        $this->form_validation->set_rules('password2', 'Password', 'required|min_length[5]|trim|matches[password1]', ['required' => 'Harap mengisi password terlebih dahulu']);
        // trim berguna agar tidak ada spasi untuk masuk databse
        // is unique berguna untuk apkah email tersebut sudah di pakai atau belum

        if ($this->form_validation->run() == false) {
            $data["judul"] = "Daftar ";

            $this->load->view('template/v_header', $data);
            $this->load->view('auth/v_daftar');
            $this->load->view('template/v_footer');
        } else {
            $data = [
                'status' => $this->input->post('status', true),
                'username' => $this->input->post('username', true),
                'nama' => $this->input->post('nama', true),
                'telephone' => $this->input->post('telephone', true),
                'alamat' => $this->input->post('alamat', true),
                'email' => $this->input->post('email', true),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                // date_create => time()
            ];

            $this->db->insert('tb_user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
            Terima kasih anda sudah mendaftar, silahkan masuk !</div>');
            redirect('login');
        }
    }
}
