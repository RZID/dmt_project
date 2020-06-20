<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crud extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function insert($table, $arraydata)
    {
        $send = $this->db->insert($table, $arraydata);
        return $send;
    }

    function select($table)
    {
        $send = $this->db->get($table);
        return $send;
    }

    function select_where($table, $arraydata)
    {
        $send = $this->db->get_where($table, $arraydata);
        return $send;
    }

    function select_sum($field, $table)
    {
        $this->db->select_sum($field);
        $selsum = $this->db->get($table);
        return $selsum;
    }

    function select_nr_where($table, $arraydata)
    {
        $send = $this->db->get_where($table, $arraydata)->num_rows();
        return $send;
    }

    function set_sess_login($email)
    {
        $db_fetch = $this->select_where('user_dmt', array('email_user' => $email))->row_array();

        $set_sess = $this->session->set_userdata(array(
            'login' => TRUE,
            'access_num' => $db_fetch['lv_user'],
            'email' => $db_fetch['email_user'],
            'nama' => $db_fetch['nama_user']
        ));
        return $set_sess;
    }
    function update($table, $wherefil, $whererec, $setarray)
    {
        $this->db->set($setarray);
        $this->db->where($wherefil, $whererec);
        $update = $this->db->update($table);

        return $update;
    }
    function update_where($table, $wherearray, $setarray)
    {
        $this->db->set($setarray);
        $this->db->where($wherearray);
        $update = $this->db->update($table);

        return $update;
    }
    function delete($table, $arraydata)
    {
        $this->db->delete($table, $arraydata);
    }
    function select_sum_where($field, $table, $array, $where)
    {
        $this->db->select_where($where, $array);
        $this->db->select_sum($field);
        $selsum = $this->db->get($table);
        return $selsum;
    }
    function select_sum_where_plth($field, $table, $array, $where)
    {
        $this->db->select_where($where, $array);
        $this->db->select_sum($field);
        $selsum = $this->db->get($table);
        return $selsum;
    }
}
