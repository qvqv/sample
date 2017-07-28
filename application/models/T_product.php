<?php

class T_product extends MY_Model
{
    public $table = 'sample_t_product';

    public function lists($user_id)
    {
        $params = ["user_id" => $user_id, 'del_flg' => 0];
        $query = $this->db->where($params);
        $query->order_by("create_date", "DESC");
        return $query->get($this->table, $this->max_limit);
    }

    public function insert($data)
    {
        $ins_data = [
            'name' => $data['name'],
            'price' => $data['price'],
            'memo' => $data['memo'],
        ];

        $ins_data['user_id'] = $this->session->userdata('id');

        return $this->db->insert($this->table, $ins_data);
    }

    public function update($id, $data)
    {
        $ins_data = [
            'name' => $data['name'],
            'price' => $data['price'],
            'memo' => $data['memo'],
        ];

        $ins_data['update_date'] = date('Y-m-d H:i:s');
        $user_id = $this->session->userdata('id');

        $this->db->where(['id' => $id, 'user_id' => $user_id]);
        return $this->db->update($this->table, $ins_data);
    }

    public function delete($id)
    {
        $user_id = $this->session->userdata('id');
        $this->db->where(['id' => $id, 'user_id' => $user_id]);

        return $this->db->update($this->table, ['del_flg' => 1]);
    }
}

