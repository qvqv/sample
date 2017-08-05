<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

    public function __construct($config=[])
    {
        parent::__construct($config);
    }


	// --------------------------------------------------------------------

	/**
	 * Is Unique Overwride
	 *
	 * Check if the input value doesn't already exist
	 * in the specified database field.
	 *
	 * @param	string	$str
	 * @param	string	$fields
	 * @return	bool
	 */
	public function is_unique($str, $fields)
	{
        // $except="", $except_id='id', $trash=false, $trash_id='del_flg'
        $list = explode(',', $fields);
        $field = $list[0];
        $except = isset($list[1]) ? $list[1] : "";
        $except_id = isset($list[2]) ? $list[2] : "id";
        $trash = isset($list[3]) ? $list[3] : false;
        $trash_id = isset($list[4]) ? $list[4] : "del_flg";
		sscanf($field, '%[^.].%[^.]', $table, $field);
		//return isset($this->CI->db)
		//	? ($this->CI->db->limit(1)->get_where($table, array($field => $str))->num_rows() === 0)
		//	: FALSE;
        if (!isset($this->CI->db)) {
            return false;
        }

        $query = $this->CI->db->where($field, $str);
        if (!empty($except)) {
            $query->where($except_id." !=", $except);
        }
        if (!$trash) {
            $query->where($trash_id, 0);
        }
        $query = $query->limit(1)->get($table);
        return ($query->num_rows() === 0);
	}
}