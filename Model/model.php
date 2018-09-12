<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model
 *
 * @author Bhumi
 */
require_once("Model/db_connection.php");
include_once("Model/Employee.php");
class model {
    public function __construct() {
        $this->db=new db_connection();
    }
    public function insert_data($fname,$lname,$dob,$department)
    {
        $con= $this->db->connection();
        $result=$con->query("insert into employee_details (fname,lname,dob,department) values('".$fname."','".$lname."','".$dob."','".$department."')");            
        return $result;
        
    }
    public function display()
    {
        $connction=$this->db->connection();
        $result=$connction->query("select * from employee_details");
        $ans=$result->fetch_all();
		return $ans;
		
    }
   public function bind()
   {
       $con=$this->db->connection();
       $result=$con->query("select * from employee_details");
       $ans=$result->fetch_all();
       return $ans;
   }
}
