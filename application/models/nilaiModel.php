<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class nilaiModel extends CI_Model {
    //fungsi menampilkan semua data pegawai
    public function view(){
        return $this->db->get('nilai')->result();
    }

    //Fungsi menampilkan data pegawai berdasarkan id_pegawai
    public function view_by($id_nilai){
        $this->db->where('id_nilai', $id_nilai);
        return $this->db->get('nilai')->row();
    }

    //fungsi untuk validasi form tambah dan ubah
    public function validation($mode){
        $this->load->library('form_validation'); //load library
        //form validation untuk proses validasi
    
        //tambahkan if apakah $mode save atau update
        //karena ketida update, id_pegawai tidak harus divalidasi
        //jadi id_pegawai divalidasi hanya saat menambah data pegawai saja
        if($mode == "save")
        $this->form_validation->set_rules('input_id_nilai', 'ID Nilai', 'required|numeric|max_length[10]');
        if($this->form_validation->run())//Jika validasi benar
            return TRUE;
        else
            return FALSE;
    }

    //Fungsi melakukan simpan data ke tabel pegawai
    public function save(){
        $data = array (
            "id_pegawai" => $this->input->post('')
        );

        $this->db->insert('nilai', $data);
        //Mengeksekusi perintah insert data
    }

    //Fungsi untuk melakukan uah data siswa berdasarkan id pegawai
    public function edit($id_nilai){
        $this->db->where('id_nilai', $id_nilai);
        $this->db->update('nilai');
        //mengeksekusi perintah update data
    }

    //Fungsi untuk menghapus data siswa berdasarkan id pegawai
    public function delete($id_pegawai){
        $this->db->where('id_pegawai', $id_pegawai);
        $this->db->delete('nilai');
        //mengeksekusi perintah delete data
    }
}