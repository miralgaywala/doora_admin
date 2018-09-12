<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of controller
 *
 * @author Bhumi
 */

include_once("Model/model.php");
class controller {
    public function __construct() {
        $this->model=new model();
    }
    public function dashboard()
    {
        include_once("addcategory.php");
    }
    public function invoke()
    {
        if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['dob']) && isset($_POST['department']))
        {
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $dob=$_POST['dob'];
        $department=$_POST['department'];
        $result= $this->model->insert_data($fname,$lname,$dob,$department);
        
        }
    }
    public function getlist()
    {
        
        $ans= $this->model->display();
        
        include 'data.php';
        return $ans; 
     
    }
   public function binddropdown()
   {
       $result=$this->model->bind();
       include 'dropdown.php';
       return $result;
   }
}
