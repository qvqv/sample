<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MY_Controller {

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata("is_login") !== 1)
        {
            redirect("account/login");
        }
        $this->load->model("t_user");
    }

    public function index()
    {
        $this->detail();
    }

    public function detail()
    {
        $user = $this->t_user->login_user();
        $this->view('user/account/detail', ['user' => $user]);
    }

    public function update()
    {
        $user = $this->t_user->login_user();

        $list = ['id' => $user->id];
        $this->form_validation->set_rules($this->rules($list));
        if ($this->form_validation->run())
        {
            $this->t_user->update();
            $this->session->set_flashdata('success', 'アカウント情報の変更が完了しました');
            redirect("user/account");
        }
        $this->view('user/account/form', ['user' => $user]);
    }

    public function password()
    {
        $this->form_validation->set_rules($this->rules());
        if ($this->form_validation->run())
        {
            $password = $this->input->post("password");
            $this->t_user->password_set($password);
            $this->session->set_flashdata('success', 'パスワードの変更が完了しました');
            redirect("user/account");
        }
        $this->view('user/account/password');
    }

    ///////////////////////////////////////////////////////////////

    private function rules($list=[])
    {
        $key = $this->router->method;
        $config = [
            'password' => [
                [
                    'field' => 'old_password',
                    'label' => 'パスワード',
                    'rules' => 'required|max_length[32]|callback_validate_old_password',
                ],
                [
                    'field' => 'password',
                    'label' => 'パスワード',
                    'rules' => 'required|max_length[32]',
                ],
                [
                    'field' => 'cpassword',
                    'label' => 'パスワード確認',
                    'rules' => 'required|matches[password]',
                ],
            ],
            'update' => [
                [
                    'field' => 'user_name',
                    'label' => '名前',
                    'rules' => 'required|max_length[20]',
                ],
                [
                    'field' => 'email',
                    'label' => 'メールアドレス',
                    'rules' => 'required|trim|valid_email|max_length[200]|is_unique[sample_t_user.email,'.$list['id'].']',
                ],
            ],
        ];

        return $config[$key];
    }

    public function validate_old_password()
    {
        $password = $this->input->post("old_password");
        if (!$this->t_user->password_user($password)) {
            $this->form_validation->set_message("validate_old_password", "旧パスワードが異なります。");
            return false;
        }

        return true;
    }
}
