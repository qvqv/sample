<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MY_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model("t_user");
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
        $this->is_login_redirect();

        $this->form_validation->set_rules($this->rules());
        if ($this->form_validation->run()) {
            $this->set_user($this->input->post("user_id"));
            $user_name = $this->session->userdata("user_name");
            $this->session->set_flashdata('info', $user_name . 'さん、ようこそ！');
            redirect("user/product/lists");
        }

        $this->view('account/login');
    }

    /**
     * ログアウト処理
     */
    public function logout()
    {
        $this->session->sess_destroy();
        redirect("account/login");
    }

    /**
     * アカウント登録
     */
    public function regist()
    {
        $this->is_login_redirect();

        $this->form_validation->set_message("is_unique", "入力したIDはすでに登録されています");

        $this->form_validation->set_rules($this->rules());
        if ($this->form_validation->run())
        {
            $this->t_user->create();
            $this->set_user($this->input->post("user_id"));
            $this->regist_mail($this->input->post("email"));
            $this->session->set_flashdata('success', '登録が完了しました');
            redirect("user/product/add");
        }

        $this->view("account/regist");
    }

    /**
     * パスワードリマインダ
     */
    public function reminder()
    {
        $this->is_login_redirect();

        $this->form_validation->set_rules($this->rules());
        if ($this->form_validation->run())
        {
            $email = $this->input->post("email");
            $user = $this->t_user->reminder_user($email);
            $key = "";
            if ($user !== false) {
                $key = $this->t_user->reminder_update($user->id);
            }
            if (!empty($key)) {
                $this->reminder_mail($key, $email);
            }
            $this->session->set_flashdata('success', 'パスワード再設定URLを送信しました');
            redirect("account/login");
        }

        $this->view("account/reminder");
    }

    /**
     * パスワード再設定
     */
    public function password($key)
    {
        $user = $this->t_user->is_reminder_key($key);
        if(!$user){
            $this->session->set_flashdata('danger', '不正なアクセスです');
            redirect("account/reminder");
        } else if ($user->reminder_end_at < date('Y-m-d H:i:s')) {
            $this->session->set_flashdata('danger', 'パスワード再設定の有効期限が切れています');
            redirect("account/reminder");
        }

        $this->form_validation->set_rules($this->rules());
        if ($this->form_validation->run())
        {
            $password = $this->input->post("password");
            $this->t_user->password_set($password, $user->id);
            $this->session->set_flashdata('success', 'パスワード再設定が完了しました');
            redirect("account/login");
        }
        $this->view("account/password");
    }

    ///////////////////////////////////////////////////////////////

    private function is_login_redirect()
    {
        if ($this->session->userdata("is_login") == 1)
        {
            redirect("user/product/lists");
        }
    }

    ///////////////////////////////////////////////////////////////

    private function regist_mail($email)
    {
        if (empty($email)) {
            $email = SITE_EMAIL;
        }
        $message = "アカウントの新規登録が完了しました。\r\n\r\n";
        $message .= "▽ログイン\r\n". base_url();
        $this->load->library('email');
        $this->email->set_mail("アカウント追加", $message);
        $this->email->to($email)->send();
    }

    private function reminder_mail($key, $email)
    {
        $url = base_url('account/password/').$key;
        $message = "下記URLにアクセスし、パスワードを再設定してください。\r\n\r\n";
        $message .= "▽パスワード再設定\r\n". $url;
        $this->load->library('email');
        $this->email->set_mail("パスワードリマインダ", $message);
        $this->email->to($email)->send();
    }

    ///////////////////////////////////////////////////////////////

    private function rules()
    {
        $key = $this->router->method;
        $config = [
            'login' => [
                [
                    'field' => 'user_id',
                    'label' => 'ID',
                    'rules' => 'required|trim|callback_validate_credentials',
                ],
                [
                    'field' => 'password',
                    'label' => 'パスワード',
                    'rules' => 'required|md5',
                ],
            ],
            'regist' => [
                [
                    'field' => 'user_id',
                    'label' => 'ID',
                    'rules' => 'required|alpha_numeric|max_length[16]|is_unique[sample_t_user.user_id]',
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
                [
                    'field' => 'user_name',
                    'label' => 'ニックネーム',
                    'rules' => 'required|max_length[20]',
                ],
                [
                    'field' => 'email',
                    'label' => 'メールアドレス',
                    'rules' => 'required|trim|valid_email|max_length[200]|is_unique[sample_t_user.email]',
                ],
            ],
            'reminder' => [
                [
                    'field' => 'email',
                    'label' => 'メールアドレス',
                    'rules' => 'required|trim|valid_email|max_length[200]',
                ],
            ],
            'password' => [
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
        ];

        return $config[$key];
    }

    public function validate_credentials()
    {
        if (!$this->t_user->can_login()) {
            $this->form_validation->set_message("validate_credentials", "ユーザー名かパスワードが異なります。");
            return false;
        }

        return true;
    }
}
