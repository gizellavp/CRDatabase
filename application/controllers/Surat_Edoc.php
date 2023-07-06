<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_Edoc extends CI_Controller
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

        $this->load->model('Surat_Edoc_Model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->model('Auth_Model');
        $id_doc = $this->session->userdata('id_doc');
        $data['user_loged'] = $this->Auth_Model->get_data_user_session($id_doc)->row();

        $data['edoc'] = $this->Surat_Edoc_Model->get_all_data();

        $data['title'] = 'Kelola Electronic Document';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar_admin');
        $this->load->view('template/navbar');
        $this->load->view('admin/surat_edoc', $data);
        $this->load->view('template/footer');
    }

    public function tambah_surat()
    {
        $this->form_validation->set_rules('node', 'Node', 'required');

        //Mengambil filename untuk disimpan
        date_default_timezone_set("Asia/Jakarta");
        $nmfile = "surat_edoc_" . date("d-m-Y_H-i-s");
        $config['upload_path'] = './assets/upload/edoc/';
        $config['allowed_types'] = 'pdf|jpg|png|jpeg|doc|docx|xls|xlsx';
        $config['max_size'] = '2048'; //kb
        $config['file_name'] = $nmfile;

        if (($this->form_validation->run() == TRUE) && (!empty($_FILES['file']['name']))) {
            $file = NULL;

            $surat_edoc = array(
                'tanggal' => $this->input->post('tanggal'),
                'keterangan' => $this->input->post('keterangan'),
                'file' => NULL
            );
            $data['edoc'] = $surat_edoc;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('file')) {
                $file = $this->upload->data();
                $surat_edoc['file'] = $file['file_name'];

                $this->db->insert('edoc', $surat_edoc);
                $this->session->set_flashdata('notification_berhasil', 'Surat Kwitansi berhasil ditambahkan');
                redirect('Surat_Edoc');
            } else {
                $this->session->set_flashdata('notification_gagal', 'Surat Kwitansi gagal ditambahkan, cek type file dan ukuran file yang anda upload');
                redirect('Surat_Edoc');
            }
        } else {
            $this->session->set_flashdata('notification_gagal', 'Surat Kwitansi gagal ditambahkan, cek inputan anda');
            redirect('Surat_Edoc');
        }
    }

    public function edit_surat()
    {
        $id = $this->input->post('id_doc');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
    
        //Mengambil filename untuk disimpan
        date_default_timezone_set("Asia/Jakarta");
        $nmfile = "surat_kwitansi_" . date("d-m-Y_H-i-s");
        $config['upload_path'] = './assets/upload/surat_kwitansi/';
        $config['allowed_types'] = 'pdf|jpg|png|jpeg|doc|docx|xls|xlsx';
        $config['max_size'] = '2048'; //kb
        $config['file_name'] = $nmfile;

        $data_update_surat_kwitansi = array(
            'tanggal' => $this->input->post('tanggal'),
            'keterangan' => $this->input->post('keterangan'),
            'file' => $this->input->post('file_lama')
        );
        $data['edit_surat_kwitansi'] = $data_update_surat_kwitansi;

        if (($this->form_validation->run() == TRUE)) {
            $file = NULL;
            $iserror = false;
            if ((!empty($_FILES['file_baru']['name']))) {
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file_baru')) {
                    $data_file_lama = $this->input->post('file_lama');

                    $file = $this->upload->data();
                    $data_update_surat_kwitansi['file'] = $file['file_name'];

                    //hapus file dari folder
                    $filehapus = './assets/upload/surat_kwitansi/' . $data_file_lama;
                    unlink($filehapus);
                } else {
                    $this->session->set_flashdata('notification_gagal', 'Data Surat Kwitansi gagal diedit');
                    $iserror = true;
                }
            } else {
                $data_update_surat_kwitansi['file'] = $this->input->post('file_lama');
            }
            if (!$iserror) {
                $this->db->update('surat_kwitansi', $data_update_surat_kwitansi, array('id' => $id));
                $this->session->set_flashdata('notification_berhasil', 'Surat Kwitansi berhasil diubah');
                redirect('Surat_Kwitansi');
            }
        } else {
            $this->session->set_flashdata('notification_gagal', 'Data Surat Kwitansi gagal diedit, cek inputan anda');
            redirect('Surat_Kwitansi');
        }
    }

    public function delete_surat()
    {
        $id = $_POST['id'];

        //load data folder
        $data['surat_kwitansi'] = $this->Surat_Kwitansi_Model->select_data_surat_byId($id)->row();
        $file = $data['surat_kwitansi']->file;

        //hapus file dari folder
        $filehapus = './assets/upload/surat_kwitansi/' . $file;
        unlink($filehapus);

        //hapus data repositori
        $this->Surat_Kwitansi_Model->delete_surat($id);
    }
}
