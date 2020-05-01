<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('userModel');
    }

    public function index(){
        $this->load->view('beranda');
    }
    
}