<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kriteria extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('kriteriaModel'); //load pegawaimodel ke controller
        $this->load->model('userModel');
    }

    public function index(){
        $data['kriteria'] = $this->kriteriaModel->view();
        $this->load->view('kriteria/bobot_kriteria', $data);
    }

    public function tambah(){
        if($this->input->post('submit')) {
            //Jika user mengklik tombol submit yang ada di form
            if($this->kriteriaModel->validation("save")){
                //jika validasi sukses atau hasil validasi adalah true
                $this->kriteriaModel->save();
                //panggil fungsi save() yang ada di pegawaimodel.php
                redirect('kriteria');
            }
        }

        $this->load->view('');
    }

    public function ubah($id_kriteria){
        if($this->input->post('submit')){
            //jika user mengklik tombol submit yang ada di form
                //jika validasi sukses atau hasil validasi adalah true
                $this->kriteriaModel->edit($id_kriteria);
                $this->session->set_flashdata('edit_kriteria','Data berhasil diubah.');
                redirect('kriteria');
        }

        $data['kriteria'] = $this->kriteriaModel->view_by($id_kriteria);
        $this->load->view('kriteria/edit_bobot_kriteria', $data);
    }

    public function hapus($id_kriteria){
        $this->kriteriaModel->delete($id_kriteria);
        //panggil fungsi delete() yang ada di pegawaiModel.php
        redirect('pegawai');
    }

}