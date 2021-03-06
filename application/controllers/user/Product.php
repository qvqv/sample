<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model("t_product");
    }

    public function index()
    {
        $this->lists();
    }

    public function lists()
    {
        $user_id = $this->session->userdata("id");
        $query = $this->t_product->lists($user_id);
        $this->view('user/product/lists', ['query' => $query]);
    }

    public function add()
    {
        $this->form_validation->set_rules($this->rules());
        if ($this->form_validation->run()) {
            $this->save();
        }

        $this->view('user/product/form');
    }

    public function edit($id)
    {
        $this->form_validation->set_rules($this->rules());
        if ($this->form_validation->run()) {
            $this->save($id);
        }

        $data = $this->t_product->get_row($id);
        $contents = [
            'id' => $id,
            'data' => $data,
        ];
        $this->view('user/product/form', $contents);
    }

    public function delete($id)
    {
        if (!$this->t_product->delete($id)) {
            $this->session->set_flashdata('danger', '削除できませんでした');
        } else {
            $this->session->set_flashdata('success', '削除が完了しました');
        }
        redirect('user/product/lists');
    }

    private function save($id="")
    {
        $data = $this->input->post();
        if (!empty($id))
        {
            $this->t_product->update($id, $data);
            $this->session->set_flashdata('success', '編集が完了しました');
        }
        else
        {
            $this->t_product->insert($data);
            $this->session->set_flashdata('success', '登録が完了しました');
        }

        redirect('user/product/lists');
    }

    ///////////////////////////////////////////////////////////////

    private function rules()
    {
        $key = $this->router->method;
        $config = [
            'add' => [
                [
                    'field' => 'name',
                    'label' => '商品名',
                    'rules' => 'required|max_length[200]'
                ],
                [
                    'field' => 'price',
                    'label' => '販売価格',
                    'rules' => 'required|numeric|greater_than_equal_to[300]|less_than_equal_to[9999999]'
                ],
            ],
            'edit' => [
                [
                    'field' => 'name',
                    'label' => '商品名',
                    'rules' => 'required|max_length[200]'
                ],
                [
                    'field' => 'price',
                    'label' => '販売価格',
                    'rules' => 'required|numeric|greater_than_equal_to[300]|less_than_equal_to[9999999]'
                ],
            ],
        ];

        return $config[$key];
    }

}
