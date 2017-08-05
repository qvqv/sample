<?php

class T_user extends MY_Model
{
    public $table = 'sample_t_user';

    public function create()
    {
        $data = [	
            "user_id" => $this->input->post("user_id"),
            "password" => md5($this->input->post("password")),
            "user_name" => $this->input->post("user_name"),
            "email" => $this->input->post("email"),
        ];

        return $this->db->insert($this->table, $data);
    }

    public function update()
    {
        $id = $this->session->userdata('id');
        $this->db->where(['id' => $id]);
        $data = [
            "user_name" => $this->input->post("user_name"),
            "email" => $this->input->post("email"),
            'update_date' => date('Y-m-d H:i:s'),
        ];

        return $this->db->update($this->table, $data);
    }

    public function delete()
    {
        $id = $this->session->userdata('id');
        $this->db->where(['id' => $id]);
        $data = [
            'del_flg' => 1,
            'update_date' => date('Y-m-d H:i:s'),
        ];

        return $this->db->update($this->table, $data);
    }

    public function can_login()
    {
        $this->db->where("user_id", $this->input->post("user_id"));
        $this->db->where("password", md5($this->input->post("password")));
        $this->db->where("del_flg", 0);
        $query = $this->db->get($this->table);

        if ($query->num_rows() !== 1) {
            return false;
        }

        return true;
    }

    public function login_access($id)
    {
        $upd_data = [
            'access_date' => date('Y-m-d H:i:s'),
        ];

        $this->db->where(['id' => $id]);
        return $this->db->update($this->table, $upd_data);
    }

    public function login_user()
    {
        $id = $this->session->userdata('id');
        return $this->get_row($id);
    }

    public function reminder_user($email)
    {
        $this->db->where("email", $email);
        $this->db->where("del_flg", 0);
        $query = $this->db->get($this->table);

        if ($query->num_rows() !== 1) {
            return false;
        }
        return $query->row();
    }

    public function reminder_update($id)
    {
        $upd_data = [
            'reminder_key' => md5(uniqid()),
            'reminder_end_at' => date('Y-m-d H:i:s', strtotime('+1 hour')),
        ];

        $this->db->where(['id' => $id]);
        if (!$this->db->update($this->table, $upd_data)) {
            return false;
        }
        return $upd_data['reminder_key'];
    }

    public function is_reminder_key($key)
    {
        $this->db->where("reminder_key", $key);
        $this->db->where("del_flg", 0);
        $query = $this->db->get($this->table);

        if($query->num_rows() == 1){
            return $query->row();
        }
        return false;
    }

    public function password_user($password)
    {
        $this->db->where("id", $this->session->userdata('id'));
        $this->db->where("password", md5($password));
        $this->db->where("del_flg", 0);
        $query = $this->db->get($this->table);

        if ($query->num_rows() !== 1) {
            return false;
        }
        return $query->row();
    }

    public function password_set($password, $id="")
    {
        if (empty($id)) {
            $id = $this->session->userdata('id');
        }

        $upd_data = [
            'password' => md5($password),
            'reminder_key' => null,
            'reminder_end_at' => null,
            'update_date' => date('Y-m-d H:i:s'),
        ];

        $this->db->where(['id' => $id]);
        return $this->db->update($this->table, $upd_data);
    }
}

