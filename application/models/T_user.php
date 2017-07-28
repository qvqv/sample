<?php

class T_user extends MY_Model
{
    public $table = 'sample_t_user';

    public function can_login()
    {
        $this->db->where("user_id", $this->input->post("user_id"));
        $this->db->where("password", md5($this->input->post("password")));
        $query = $this->db->get($this->table);

        if (!$query->num_rows() == 1) {
            return false;
        }

        return true;
    }
}

