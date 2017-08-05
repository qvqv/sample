<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Email extends CI_Email {

	protected $_title = "";

    public function __construct($config=[])
    {
        parent::__construct($config);
    }

    public function send($auto_clear = TRUE)
    {
        $this->from(SITE_EMAIL, SITE_NAME);

        if (ENVIRONMENT == 'production') {
            $result = parent::send($auto_clear);
            if (!$result) {
                // :TODO エラー処理
                return false;
            }
        } else {
            echo "[メール送信]\r\n";
            echo "\r\n===================================\r\n";
            echo htmlspecialchars(implode("\r\n", $this->_headers));
            echo "\r\n===================================\r\n";
            echo htmlspecialchars($this->_body);
            exit;
        }
        return true;
    }

	// --------------------------------------------------------------------

	public function set_mail($title, $message)
	{
        $this->bcc(SITE_EMAIL);
        $this->_title = $title;
        $subject = "[".SITE_NAME."]".$this->_title;
        $this->subject($subject);
        $body = "[".SITE_NAME."]".$this->_title."\r\n\r\n";
        $body .= $message;
        $body .= "\r\n\r\n今後とも".SITE_NAME."をよろしくお願い致します。\r\n";
        $this->message($body);
        return $this;
	}
}