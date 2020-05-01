<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pegawaiModel extends CI_Model {
    //fungsi menampilkan semua data pegawai
    public function view(){
        return $this->db->get('pegawai')->result();
    }

    //Fungsi menampilkan data pegawai berdasarkan id_pegawai
    public function view_by($id_pegawai){
        $this->db->where('id_pegawai', $id_pegawai);
        return $this->db->get('pegawai')->row();
    }

    //fungsi untuk validasi form tambah dan ubah
    public function validation($mode){
        $this->load->library('form_validation'); //load library
        //form validation untuk proses validasi
    
        //tambahkan if apakah $mode save atau update
        //karena ketida update, id_pegawai tidak harus divalidasi
        //jadi id_pegawai divalidasi hanya saat menambah data pegawai saja
        if($mode == "save")
        $this->form_validation->set_rules('input_nama_pegawai', 'Nama Pegawai', 'required');
        $this->form_validation->set_rules('input_pekerjaan', 'Pekerjaan', 'required');

        if($this->form_validation->run())//Jika validasi benar
            return TRUE;
        else
            return FALSE;
    }

    //Fungsi melakukan simpan data ke tabel pegawai
    public function save(){
        $data = array (
            "id_pegawai" => $this->input->post('input_id_pegawai'),
            "nama_pegawai" => $this->input->post('input_nama_pegawai'),
            "pekerjaan" => $this->input->post('input_pekerjaan')
        );

        $this->db->insert('pegawai', $data);
        //Mengeksekusi perintah insert data
    }

    //Fungsi untuk melakukan uah data siswa berdasarkan id pegawai
    public function edit($id_pegawai){
        $data = array(
            "nama_pegawai" => $this->input->post('input_nama_pegawai'),
            "pekerjaan" => $this->input->post('input_pekerjaan')
        );

        $this->db->where('id_pegawai', $id_pegawai);
        $this->db->update('pegawai', $data);
        //mengeksekusi perintah update data
    }

    //Fungsi untuk menghapus data siswa berdasarkan id pegawai
    public function delete($id_pegawai){
        $this->db->where('id_pegawai', $id_pegawai);
        $this->db->delete('pegawai');
        //mengeksekusi perintah delete data
    }
}