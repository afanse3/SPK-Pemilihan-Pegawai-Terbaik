<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pegawai extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('pegawaiModel'); //load pegawaimodel ke controller
        $this->load->model('userModel');
    }

    public function index(){
        $data['pegawai'] = $this->pegawaiModel->view();
        $this->load->view('pegawai/daftar_pegawai', $data);
    }

    public function tambah(){
        if($this->input->post('submit')) {
            //Jika user mengklik tombol submit yang ada di form
            if($this->pegawaiModel->validation("save")){
                //jika validasi sukses atau hasil validasi adalah true
                $this->pegawaiModel->save();
                //panggil fungsi save() yang ada di pegawaimodel.php
                $this->session->set_flashdata('tambah_pegawai', 'Data berhasil ditambahkan.');
                redirect('pegawai');
            }
        }

        $this->load->view('');
    }

    public function ubah($id_pegawai){
        if($this->input->post('submit')){//jika user mengklik tombol submit yang ada di form
            if($this->pegawaiModel->validation("update")){
                //jika validasi sukses atau hasil validasi adalah true
                $this->pegawaiModel->edit($id_pegawai);
                //panggil fungsi edit() yang ada di pegawaiModel.php
                $this->session->set_flashdata('edit_pegawai','Data berhasil diubah.');
                redirect('pegawai');
            }
        }
        $data['pegawai'] = $this->pegawaiModel->view_by($id_pegawai);
        $this->load->view('pegawai/edit_pegawai', $data);
    }

    public function hapus($id_pegawai){
        $this->pegawaiModel->delete($id_pegawai);
        $this->session->set_flashdata('hapus_pegawai','Data berhasil dihapus.');
        //panggil fungsi delete() yang ada di pegawaiModel.php
        redirect('pegawai');
    }
}