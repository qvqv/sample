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

        $this->t_user->login_access($u->id);
    }

    /**
     * メール送信
     */
	protected function send_mail($title, $message, $to="", $cc="", $bcc="")
    {
        $this->load->library('email');

        $this->email->set_newline("\r\n");
        $this->email->from(SITE_EMAIL, SITE_NAME);
        if (empty($to)) {
            $to = SITE_EMAIL;
        } else if (empty($bcc)) {
            $bcc = SITE_EMAIL;
        }
        $this->email->to($to);
        if (!empty($cc)) {
            $this->email->cc($cc);
        }
        if (!empty($bcc)) {
            $this->email->bcc($bcc);
        }

        $this->email->subject($title);
        $this->email->message($message);

        if (ENVIRONMENT != 'production') {
            echo $this->email->print_debugger();
            exit;
        }

        if ($this->email->send()) {
            return true;
        } else {
            // :TODO エラー処理
            return false;
        }
    }

}
