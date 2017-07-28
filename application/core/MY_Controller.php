<?php

class My_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function view($views, $layouts = 'common/layouts')
    {
        $this->load->view($layouts, ['views' => $views]);
    }

}
