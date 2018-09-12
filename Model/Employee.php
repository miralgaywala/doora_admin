<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Employee
 *
 * @author Bhumi
 */
class Employee {
    public $id;
    public $fname;
    public $lname;
    public $dob;
    public $department;
    public function __construct($id,$fname,$lname,$dob,$department)
      {
        $this->id=$id;
        $this->fname=$fname;
        $this->lname=$lname;
        $this->dob=$dob;
        $this->department=$department;
     }
    public function setid($id)
    {
        $this->id=$id;
    }
    public function setfname($fname)
    {
        $this->fname=$fname;
    }
    public function setlname($lname)
    {
        $this->lname=$lname;
    }
    public function setdob($dob)
    {
        $this->dob=$dob;
    }
    public function setdepartment($department)
    {
        $this->department=$department;
    }
    public function getid()
    {
        return $this->id;
    }
    public function getfname()
    {
        return $this->fname;
    }
    public function getlname()
    {
        return $this->lname;
    }
    public function getdob()
    {
        return $this->dob;
    }
    public function getdepartment()
    {
        return $this->department;
    }
}
