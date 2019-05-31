<?php
class Employee_model extends CI_model
{

    public function getEmployee()
    {
      return $this->db->get('users')->result_array();
       
    }

    public function getEmployeeById($id)
    {
    	return $this->db->get_where('users',['id'=>$id])->row_array();
    }
}