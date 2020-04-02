<?php

class Coba extends CI_Controller
{
    public function index()
    {
        $this->load->view('template/v_header');
        $this->load->view('Admin/coba');
        $this->load->view('template/v_footer');
    }
}
