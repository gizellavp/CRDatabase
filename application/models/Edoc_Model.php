<?php

class Edoc_Model extends CI_Model
{

    private $_table = "edoc";


    function construct()
    {
        parent::__construct();
    }

    function get_all()
    {
        $query = $this->db->query("SELECT * FROM edoc ORDER BY id_doc ASC");

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
        $this->db->from('edoc');
        $this->db->where('node', $node);

        return $this->db->get();
    }

    public function getById($id_doc)
    {
        return $this->db->get_where($this->_table, ["id_doc" => $id_doc])->row();
    }

    function delete_data($id_doc)
    {
        $this->db->where('id_doc', $id_doc);
        $this->db->delete('edoc');
    }

    public function save()
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
        return $this->insert($this->_table, $this);
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
