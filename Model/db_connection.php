<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of db_connection
 *
 * @author Bhumi
 */
class db_connection {
    public function connection()
    {
        
            $host="localhost";
            $user="root";
            $pass="";
            $database="employee";
            $db= mysqli_connect($host, $user, $pass, $database);
        
        return $db;
    }
}
