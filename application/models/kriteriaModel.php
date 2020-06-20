<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class kriteriaModel extends CI_Model {
    public function view(){
        return $this->db->get('kriteria')->result();
    }

    public function view_by($id_kriteria){
        $this->db->where('id_kriteria', $id_kriteria);
        return $this->db->get('kriteria')->row();
    }

    public function validation($mode){
        $this->load->library('form_validation');

        if($mode == "save")
        $this->form_validation->set_rules('input_id_kriteria', 'ID Kriteria', 'require|numeric|max_length[10]');
        $this->form_validation->set_rules('input_nama_kriteria', 'Nama Kriteria', 'required');
        $this->form_validation->set_rules('input_atribut', 'Atribut', 'required');
        $this->form_validation->set_rules('input_bobot', 'Bobot', 'required');
    
        if($this->form_validation->run())
            return TRUE;
        else
            return FALSE;
    }
    
    public function save(){
        $data = array (
            "id_kriteria" => $this->input->post('input_id_kriteria'),
            "nama_kriteria" => $this->input->post('input_nama_kriteria'),
            "atribut" => $this->input->post('input_atribut'),
            "bobot" => $this->input->post('input_bobot')
        );

        $this->db->insert('kriteria', $data);
        //Mengeksekusi perintah insert data
    }

    //Fungsi untuk melakukan uah data siswa berdasarkan id pegawai
    public function edit($id_kriteria){
        $data = array(
            "bobot" => $this->input->post('input_bobot')
        );

        $this->db->where('id_kriteria', $id_kriteria);
        $this->db->update('kriteria', $data);
        //mengeksekusi perintah update data
    }

    //Fungsi untuk menghapus data siswa berdasarkan id pegawai
    public function delete($id_kriteria){
        $this->db->where('id_kriteria', $id_kriteria);
        $this->db->delete('kriteria');
        //mengeksekusi perintah delete data
    }
}