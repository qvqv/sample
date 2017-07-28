<?php

class MY_Model extends CI_Model
{
    public $table;
    public $max_limit = 100;

    public function get_row($id, $key="id")
    {
        $this->db->where($key, $id);
        return $this->db->get($this->table)->row();
    }

}
