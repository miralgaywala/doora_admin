<?php
class dbconfig {
    public function connection()
    {
        	
            $host="localhost";
            $user="root";
            $pass="de!1@2#al";
            $database="doora_db";
            $db= mysqli_connect($host, $user, $pass, $database);
        	return $db;
    }
    
}
?>