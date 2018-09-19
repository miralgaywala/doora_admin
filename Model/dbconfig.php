<?php
class dbconfig {
    public function connection()
    {
        
            $host="localhost";
            $user="root";
            $pass="";
            $database="sprookr";
            $db= mysqli_connect($host, $user, $pass, $database);
        	return $db;
    }
    
}
?>