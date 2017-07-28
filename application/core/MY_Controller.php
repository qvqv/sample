<?php

class My_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function view($template, $contents="", $layouts='common/layouts')
    {
        $views = [
            $template => $contents
        ];
        $this->load->view($layouts, ['views' => $views]);
    }

    /**
     * ログイン情報をセッションに保持
     */
    public function set_user($user_id)
    {
        $this->load->model("t_user");
        $u = $this->t_user->get_row($user_id, "user_id");

        $data = [
            "id" => $u->id,
            "user_name" => $u->user_name,
            "is_login" => 1,
        ];
        $this->session->set_userdata($data);
    }

}
