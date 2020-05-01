<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class userModel extends CI_Model {

    public function boleh_login($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', sha1($password));
        $query = $this->db->get(user);
        
        if($query->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }
}