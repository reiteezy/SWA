<?php

class User_model extends CI_Model{
//users
    function getUsers()
    {
        $query = $this->db->get('users');
        return $query->result_array();
    }

}