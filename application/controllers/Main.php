<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->top();
    }

    /**
     * トップ画面
     */
    public function top()
    {
        $this->view('main/top');
    }
}
