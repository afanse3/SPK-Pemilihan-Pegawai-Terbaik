<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class subkriteriaModel extends CI_Model {
    public function view(){
        return $this->db->get('masternilai')->result();
    }

    public function view_by($id_masternilai){
        $this->db->where('id_masternilai', $id_masternilai);
        return $this->db->get('masternilai')->row();
    }

    public function validation($mode){
        $this->load->library('form_validation');

        if($mode == "save")
        $this->form_validation->set_rules('input_id_masternilai', 'ID Masternilai', 'require|numeric|max_length[10]');
        $this->form_validation->set_rules('input_nama_masternilai', 'Nama Masternilai', 'required');
        $this->form_validation->set_rules('input_nilai', 'Nilai', 'required');
    
        if($this->form_validation->run())
            return TRUE;
        else
            return FALSE;
    }
    
    public function save(){
        $data = array (
            "id_masternilai" => $this->input->post('input_id_masternilai'),
            "nama_masternilai" => $this->input->post('input_nama_masternilai'),
            "nilai" => $this->input->post('input_nilai')
        );

        $this->db->insert('subkriteria', $data);
        //Mengeksekusi perintah insert data
    }

    //Fungsi untuk melakukan uah data siswa berdasarkan id pegawai
    public function edit($id_masternilai){
        $data = array(
            "nama_masternilai" => $this->input->post('input_nama_masternilai'),
            "nilai" => $this->input->post('input_nilai')
        );

        $this->db->where('id_masternilai', $id_masternilai);
        $this->db->update('masternilai', $data);
        //mengeksekusi perintah update data
    }
}