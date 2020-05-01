<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Perhitungan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('nilaiModel'); //load pegawaimodel ke controller
        $this->load->model('pegawaiModel');
        $this->load->model('perhitunganModel');
        $this->load->model('userModel');
    }

    public function index()
    {
        //$data['nilai'] = $this->perhitunganModel->view();
        $data = array(
            'data_pegawai' => $this->pegawaiModel->view(),
        );
        $this->load->view('perhitungan/perhitunganSPK', $data);

    }

    public function tambah()
    {
        if ($this->input->post('submit')) {
            //Jika user mengklik tombol submit yang ada di form
            if ($this->nilaiModel->validation("save")) {
                //jika validasi sukses atau hasil validasi adalah true
                $this->nilaiModel->save();
                //panggil fungsi save() yang ada di pegawaimodel.php
                redirect('pegawai');
            }
        }

        $this->load->view('');
    }

    public function tambah_nilai()
    {

        $data_c1 = array(
            'id_pegawai' => $this->input->post('id_pegawai', true),
            'id_masternilai' => $this->input->post('c1', true),
        );
        $this->db->insert('nilai', $data_c1);

        $data_c2 = array(
            'id_pegawai' => $this->input->post('id_pegawai', true),
            'id_masternilai' => $this->input->post('c2', true),
        );
        $this->db->insert('nilai', $data_c2);

        $data_c3 = array(
            'id_pegawai' => $this->input->post('id_pegawai', true),
            'id_masternilai' => $this->input->post('c3', true),
        );
        $this->db->insert('nilai', $data_c3);

        $data_c4 = array(
            'id_pegawai' => $this->input->post('id_pegawai', true),
            'id_masternilai' => $this->input->post('c4', true),
        );
        $this->db->insert('nilai', $data_c4);

        $data_c5 = array(
            'id_pegawai' => $this->input->post('id_pegawai', true),
            'id_masternilai' => $this->input->post('c5', true),
        );
        $this->db->insert('nilai', $data_c5);

        //panggil fungsi edit() yang ada di pegawaiModel.php
        redirect('pegawai');
        //}

        // $data['nilai'] = $this->nilaiModel->view_by($id_pegawai);
        // $this->load->view('pegawai/edit_penilaian', $data);
    }

    public function ubah_nilai()
    {
        $this->db->update('Table', $object);
        
    }

    public function hapus($id_nilai)
    {
        $this->nilaiModel->delete($id_nilai);
        //panggil fungsi delete() yang ada di pegawaiModel.php
        redirect('pegawai');
    }

    public function nilai($id_pegawai)
    {
        $row = $this->pegawaiModel->view_by($id_pegawai);
        if ($row) {
            $cek_nilai = $this->db->query("SELECT id_pegawai FROM nilai WHERE id_pegawai = '$id_pegawai'")->num_rows();
            if ($cek_nilai > 0) {
                $data = array(
                    'id_pegawai' => $row->id_pegawai,
                    'nama_pegawai' => $row->nama_pegawai,
                    'c1' => $this->db->query("SELECT * FROM v_nilai WHERE id_pegawai ='$id_pegawai' AND id_kriteria = 1")->row(),
                    'c2' => $this->db->query("SELECT * FROM v_nilai WHERE id_pegawai ='$id_pegawai' AND id_kriteria = 2")->row(),
                    'c3' => $this->db->query("SELECT * FROM v_nilai WHERE id_pegawai ='$id_pegawai' AND id_kriteria = 3")->row(),
                    'c4' => $this->db->query("SELECT * FROM v_nilai WHERE id_pegawai ='$id_pegawai' AND id_kriteria = 4")->row(),
                    'c5' => $this->db->query("SELECT * FROM v_nilai WHERE id_pegawai ='$id_pegawai' AND id_kriteria = 5")->row(),
                );
                $this->load->view('penilaian/detail_penilaian', $data);
            } else {
                $data = array(
                    'id_pegawai' => $row->id_pegawai,
                    'nama_pegawai' => $row->nama_pegawai,
                    'c1' => $this->db->query("SELECT * FROM masternilai WHERE id_kriteria = 1")->result(),
                    'c2' => $this->db->query("SELECT * FROM masternilai WHERE id_kriteria = 2")->result(),
                    'c3' => $this->db->query("SELECT * FROM masternilai WHERE id_kriteria = 3")->result(),
                    'c4' => $this->db->query("SELECT * FROM masternilai WHERE id_kriteria = 4")->result(),
                    'c5' => $this->db->query("SELECT * FROM masternilai WHERE id_kriteria = 5")->result(),
                );
                $this->load->view('penilaian/tambah_penilaian', $data);
            }
        } else {
            redirect('pegawai');
        }
    }
}
