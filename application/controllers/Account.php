<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->login();
    }

    /**
     * ログイン画面
     */
    public function login()
    {
        $this->form_validation->set_rules("user_id", "ID", "required|trim|callback_validate_credentials");
        $this->form_validation->set_rules("password", "パスワード", "required|md5");

        if ($this->form_validation->run()) {
            $this->set_user($this->input->post("user_id"));
            $user_name = $this->session->userdata("user_name");
            $this->session->set_flashdata('info', $user_name . 'さん、ようこそ！');
            redirect("user/product/lists");
        }

        $this->view('account/login');
    }

    public function validate_credentials()
    {
        $this->load->model("t_user");

        if (!$this->t_user->can_login()) {
            $this->form_validation->set_message("validate_credentials", "ユーザー名かパスワードが異なります。");
            return false;
        }

        return true;
    }

    /**
     * ログアウト処理
     */
    public function logout()
    {
        $this->session->sess_destroy();
        redirect("main/top");
    }

}
