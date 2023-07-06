<?php

class Dashboard_Model extends CI_Model
{
    private $_table = "fibernode";


    function construct()
    {
        parent::__construct();
    }

    function getData()
    {
        return $this->db->table('fibernode')
        ->join('edoc','edoc.node=fibernode.node')
        ->join('vip','vip.node=fibernode.node')
        ->get()->getResultArray();
    }

    /*function get_all()
    {
        $query = $this->db->query("SELECT * FROM fibernode
            JOIN edoc ON fibernode.node = edoc.node
            JOIN vip ON fibernode.node = vip.node");

        $indeks = 0;
        $result = array();

        foreach ($query->result_array() as $row) {
            $result[$indeks] = $row;
        }

        return $result;
    } */

    function get_vip()
    {
        $query = $this->db->query("SELECT * FROM fibernode
            JOIN vip ON fibernode.node = vip.node");

        $indeks = 0;
        $result = array();

        foreach ($query->result_array() as $row) {
            $result[$indeks++] = $row;
        }

        return $result;
    }


    function get_all()
    {
        $query = $this->db->query("SELECT * FROM fibernode ORDER BY node ASC");

        $indeks = 0;
        $result = array();

        foreach ($query->result_array() as $row) {
            $result[$indeks++] = $row;
        }

        return $result;
    }

    function select_data_byNode($node)
    {
        $this->db->select('*');
        $this->db->from('fibernode');
        $this->db->where('node', $node);

        return $this->db->get();
    }

    public function getById($node)
    {
        return $this->db->get_where($this->_table, ["node" => $node])->row();
    }

    public function update()
    {
        $post = $this->input->post();
        $this->node = uniqid();
        $this->fiber_desc = $post["fiber_desc"];
        $this->class = $post["class"];
        $this->hub = $post["hub"];
        $this->hub_desc = $post["hub_desc"];
        $this->city_town = $post["city_town"];
        $this->ftax = $post["ftax"];
        $this->ftax_desc = $post["ftax_desc"];
        $this->rel_tsell = $post["rel_tsell"];
        $this->hp_all = $post["hp_all"];
        $this->act_payall = $post["act_payall"];
        $this->pen_payall = $post["pen_payall"];
        $this->pen_all = $post["pen_all"];
        $this->avg_rateall = $post["avg_rateall"];
        $this->revenue = $post["revenue"];
        return $this->db->update($this->_table, $this, array('fibernode' => $post['node']));
    }


}




   