<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fibernode extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('login')) {
            $this->session->set_flashdata('notification', '<div class="alert alert-danger" role="alert"> Silakan login terlebih dahulu!</div>');
            redirect('Auth');
        } else {
            if (!($this->session->userdata('level') == 'admin')) {
                $this->session->set_flashdata('notification', '<div class="alert alert-danger" role="alert">Anda bukan Admin!</div>');
                redirect('Auth');
            }
        }

        $this->load->model('Fibernode_Model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->model('Auth_Model');
        $id = $this->session->userdata('id');
        $data['user_loged'] = $this->Auth_Model->get_data_user_session($id)->row();

        $data['fibernode'] = $this->Fibernode_Model->get_all();

        $data['title'] = 'Data Fiber Node BU-5';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar_admin');
        $this->load->view('template/navbar');
        $this->load->view('admin/fibernode', $data);
        $this->load->view('template/footer');
    }

    public function tambah_data()
    {
        $this->form_validation->set_rules('node', 'Node', 'required|is_unique[fibernode.node]', array('is_unique' => 'Node already exist, Use an other Node!'));

        if ($this->form_validation->run() == true) {
            $fibernode = array(
                'node' => $this->input->post('node'),
                'fiber_desc' => $this->input->post('fiber_desc'),
                'class' => $this->input->post('class'),
                'hub' => $this->input->post('hub'),
                'hub_desc' => $this->input->post('hub_desc'),
                'city_town' => $this->input->post('city_town'),
                'ftax' => $this->input->post('ftax'),
                'rel_tsell' => $this->input->post('rel_tsell'),
                'hp_all' => $this->input->post('hp_all'),
                'act_payall' => $this->input->post('act_payall'),
                'pen_payall' => $this->input->post('pen_payall'),
                'pen_all' => $this->input->post('pen_all'),
                'avg_rateall' => $this->input->post('avg_rateall'),
                'revenue' => $this->input->post('revenue'),       
            );
            $data['fibernode'] = $fibernode;
            $this->db->insert('fibernode', $fibernode);
            $this->session->set_flashdata('notification_berhasil', 'Data Fibernode berhasil ditambahkan!');
            redirect('Fibernode');
        } else {
            $this->session->set_flashdata('notification_gagal', 'Data Fibernode gagal ditambahkan');
            redirect('Fibernode');
        }
    }

    public function edit_data()
    {
        $node = $this->input->post('node');

        $this->form_validation->set_rules('node', 'Node', 'required|trim|is_unique[fibernode.node]', array('is_unique' => 'Node already exist, Use an other Node!'));

        $data_update = array(
            'node' => $this->input->post('node'),
                'fiber_desc' => $this->input->post('fiber_desc'),
                'class' => $this->input->post('class'),
                'hub' => $this->input->post('hub'),
                'hub_desc' => $this->input->post('hub_desc'),
                'city_town' => $this->input->post('city_town'),
                'ftax' => $this->input->post('ftax'),
                'rel_tsell' => $this->input->post('rel_tsell'),
                'hp_all' => $this->input->post('hp_all'),
                'act_payall' => $this->input->post('act_payall'),
                'pen_payall' => $this->input->post('pen_payall'),
                'pen_all' => $this->input->post('pen_all'),
                'avg_rateall' => $this->input->post('avg_rateall'),
                'revenue' => $this->input->post('revenue'),
        );
        $data['fibernode'] = $data_update;

        $this->db->update('fibernode', $data_update, array('node' => $node));
        $this->session->set_flashdata('notification_berhasil', 'Data Fibernode berhasil diubah');
        redirect('Fibernode');
    }



















    /*public function tambah_surat()
    {
        $this->form_validation->set_rules('nomor', 'Nomor', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('isi', 'Isi', 'required');

        //Mengambil filename untuk disimpan
        date_default_timezone_set("Asia/Jakarta");
        $nmfile = "surat_proposal_" . date("d-m-Y_H-i-s");
        $config['upload_path'] = './assets/upload/surat_proposal/';
        $config['allowed_types'] = 'pdf|jpg|png|jpeg|doc|docx|xls|xlsx';
        $config['max_size'] = '2048'; //kb
        $config['file_name'] = $nmfile;

        if (($this->form_validation->run() == TRUE) && (!empty($_FILES['file']['name']))) {
            $file = NULL;

            $surat_proposal = array(
                'nomor' => $this->input->post('nomor'),
                'tanggal' => $this->input->post('tanggal'),
                'isi' => $this->input->post('isi'),
                'file' => NULL
            );
            $data['surat_proposal'] = $surat_proposal;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('file')) {
                $file = $this->upload->data();
                $surat_proposal['file'] = $file['file_name'];

                $this->db->insert('surat_proposal', $surat_proposal);
                $this->session->set_flashdata('notification_berhasil', 'Proposal berhasil ditambahkan');
                redirect('Surat_Proposal');
            } else {
                $this->session->set_flashdata('notification_gagal', 'Proposal gagal ditambahkan, cek type file dan ukuran file yang anda upload');
                redirect('Surat_Proposal');
            }
        } else {
            $this->session->set_flashdata('notification_gagal', 'Proposal gagal ditambahkan, cek inputan anda');
            redirect('Surat_Proposal');
        }
    }*/

    /*public function edit_surat()
    {
        $id = $this->input->post('id');
        $this->form_validation->set_rules('nomor', 'Nomor', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('isi', 'Isi', 'required');
    
        //Mengambil filename untuk disimpan
        date_default_timezone_set("Asia/Jakarta");
        $nmfile = "surat_proposal_" . date("d-m-Y_H-i-s");
        $config['upload_path'] = './assets/upload/surat_proposal/';
        $config['allowed_types'] = 'pdf|jpg|png|jpeg|doc|docx|xls|xlsx';
        $config['max_size'] = '2048'; //kb
        $config['file_name'] = $nmfile;

        $data_update_surat_proposal = array(
            'nomor' => $this->input->post('nomor'),
            'tanggal' => $this->input->post('tanggal'),
            'isi' => $this->input->post('Isi'),
            'file' => $this->input->post('file_lama')
        );
        $data['edit_surat_proposal'] = $data_update_surat_proposal;

        if (($this->form_validation->run() == TRUE)) {
            $file = NULL;
            $iserror = false;
            if ((!empty($_FILES['file_baru']['name']))) {
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file_baru')) {
                    $data_file_lama = $this->input->post('file_lama');

                    $file = $this->upload->data();
                    $data_update_surat_proposal['file'] = $file['file_name'];

                    //hapus file dari folder
                    $filehapus = './assets/upload/surat_proposal/' . $data_file_lama;
                    unlink($filehapus);
                } else {
                    $this->session->set_flashdata('notification_gagal', 'Data Proposal gagal diedit');
                    $iserror = true;
                }
            } else {
                $data_update_surat_proposal['file'] = $this->input->post('file_lama');
            }
            if (!$iserror) {
                $this->db->update('surat_proposal', $data_update_surat_proposal, array('id' => $id));
                $this->session->set_flashdata('notification_berhasil', 'Proposal berhasil diubah');
                redirect('Surat_Proposal');
            }
        } else {
            $this->session->set_flashdata('notification_gagal', 'Data Proposal gagal diedit, cek inputan anda');
            redirect('Surat_Proposal');
        }
    } */

    /*public function delete_surat()
    {
        $id = $_POST['id'];

        //load data folder
        $data['surat_proposal'] = $this->Surat_Proposal_Model->select_data_surat_byId($id)->row();
        $file = $data['surat_proposal']->file;

        //hapus file dari folder
        $filehapus = './assets/upload/surat_proposal/' . $file;
        unlink($filehapus);

        //hapus data repositori
        $this->Surat_Proposal_Model->delete_surat($id);
    } */
}
