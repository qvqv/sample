<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Security Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Security
 * @author		EllisLab Dev Team
 * @link		http://codeigniter.com/user_guide/libraries/security.html
 */
class MY_Security extends CI_Security {
	/**
	 * Show CSRF Error
	 *
	 * @return	void
	 */
	public function csrf_show_error()
	{
		//show_error('The action you have requested is not allowed.', 403);
        header('Refresh:0;url=/');
	}

}
