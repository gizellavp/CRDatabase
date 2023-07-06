<?php
defined('BASEPATH') or exit('No direct script access allowed');

class View_Dashboard extends CI_Controller
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
        $this->load->model('Dashboard_Model');
    }

    public function index()
    {
        $this->load->model('Auth_Model');
        $id = $this->session->userdata('id');
        $data['user_loged'] = $this->Auth_Model->get_data_user_session($id)->row();

        $data['fibernode'] = $this->Dashboard_Model->get_all();

        $data['title'] = 'Overview Data';
        
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar_admin');
        $this->load->view('template/navbar');
        $this->load->view('admin/view_dashboard', $data);
        $this->load->view('template/footer'); 
    }

    public function view_data()
    {
        $node = $this->input->post('node');

        $data_update = array(
                'node' => $this->input->post('node'),
                'fiber_desc' => $this->input->post('fiber_desc'),
                'class' => $this->input->post('class'),
                'hub' => $this->input->post('hub'),
                'hub_desc' => $this->input->post('hub_desc'),
                'city_town' => $this->input->post('city_town'),
                'ftax' => $this->input->post('ftax'),
                'ftax_desc' => $this->input->post('ftax_desc'),
                'hp_all' => $this->input->post('hp_all'),
                'act_payall' => $this->input->post('act_payall'),
                'pen_payall' => $this->input->post('pen_payall'),
                'pen_all' => $this->input->post('pen_all'),
                'avg_rateall' => $this->input->post('avg_rateall'),
                'revenue' => $this->input->post('revenue'),
        );
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
        redirect('Dashboard_Admin');
    }

}
