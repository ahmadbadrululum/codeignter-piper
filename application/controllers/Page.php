<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{
    public function index()
    {
        $this->load->view('welcome_message');
    }
    
    public function view($page = 'test')
    {
        if (!file_exists(APPPATH."views/pages/".$page.'.php')) {
            show_404();
        }

        $data['title'] = $page;

        $this->load->view('templates/header', $data);
        $this->load->view('pages/'. $page);
        $this->load->view('templates/footer');
    }
}
