<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Masternilai extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('subkriteriaModel'); //load pegawaimodel ke controller
        $this->load->model('userModel');
    }

    public function index(){
        $data['masternilai'] = $this->subkriteriaModel->view();
        $this->load->view('subkriteria/sub_kriteria', $data);
    }

    public function tambah(){
        if($this->input->post('submit')) {
            //Jika user mengklik tombol submit yang ada di form
            if($this->subkriteriaModel->validation("save")){
                //jika validasi sukses atau hasil validasi adalah true
                $this->subkriteriaModel->save();
                //panggil fungsi save() yang ada di pegawaimodel.php
                redirect('subkriteria');
            }
        }

        $this->load->view('');
    }

    public function ubah($id_masternilai){
        if($this->input->post('submit')){
            //jika user mengklik tombol submit yang ada di form
                //jika validasi sukses atau hasil validasi adalah true
                $this->subkriteriaModel->edit($id_masternilai);
                //panggil fungsi edit() yang ada di pegawaiModel.php
                redirect('subkriteria');
        }

        $data['subkriteria'] = $this->subkriteriaModel->view_by($id_masternilai);
        $this->load->view('subkriteria/edit_pegawai', $data);
    }

    public function hapus($id_pegawai){
        $this->pegawaiModel->delete($id_pegawai);
        //panggil fungsi delete() yang ada di pegawaiModel.php
        redirect('pegawai');
    }
}