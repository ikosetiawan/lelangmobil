<?php
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_login');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim', ['required' => 'Harap mengisi username terlebih dahulu']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', ['required' => 'Harap mengisi password terlebih dahulu']);
        if ($this->form_validation->run() == false) {
            $data['judul'] = "Login";
            $this->load->view('template/v_header', $data);
            $this->load->view('auth/v_login');
            $this->load->view('template/v_footer');
        } else {
            $this->login();
        }
    }

    private function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tb_user', ['username' => $username])->row_array(); //SELECT * FROM tb_pembeli WHERE username == username

        if ($user) {
            # usernya ada

            #jika user pembeli 
            // if ($user['is_active'] == 1) {
            //     #user aktif
            // } else {
            //     $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
            // Akun anda belum aktif ! </div>');
            //     redirect('login');
            // }

            #user ada maka cek password
            if ($password = $user['password']) {
                if ($user['status'] == 'penjual') {

                    $data = [
                        'username' => $user['username']
                    ];

                    $this->session->set_userdata($data);
                    redirect(base_url() . "penjual");
                } elseif ($user['status'] == 'pembeli') {
                    $data = [
                        'username' => $user['username']
                    ];

                    $this->session->set_userdata($data);
                    redirect(base_url() . "pembeli");
                }
            } else {

                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Periksa kembali password anda !</div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Maaf username yang anda masukkan salah ! </div>');
            redirect('login');
        }
    }

    public function keluar()
    {
        $this->session->unset_userdata('username');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Anda sudah keluar </div>');
        redirect('login');
    }
}
