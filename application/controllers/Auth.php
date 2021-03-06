<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

  public function __construct(){
    parent::__construct();
  }
  public function index()
  {
    $this->load->view('login/login');//view login
  }

  public function validasi_login(){
    $this->load->library('form_validation');//manggil library form_validation ci
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    if($this->form_validation->run()){
      //true
      $username = $this->input->post('username');//input2an
      $password = $this->input->post('password');
      $this->load->model('userModel');
      if($this->userModel->boleh_login($username, $password)){
        $session_data = array(
          'username' => $username
        );//session disimpan di username
        $this->session->set_userdata($session_data);
        redirect(base_url() . 'Beranda');
      } else {
        $this->session->set_flashdata('error', 'Username atau Password salah.');
        redirect(base_url() . 'Auth');
      }
     } 
    else{
      $this->login();
    }
  }

  function logout(){
    $this->session->unset_userdata('username');
    redirect(base_url() . 'Auth');
  }

}