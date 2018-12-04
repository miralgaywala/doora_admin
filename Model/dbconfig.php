<?php
class dbconfig {
    public function connection()
    {
        
            $host="leocan.co";
            $user="leocamq9_spr_usr";
            $pass="spk123!@#";
            $database="leocamq9_sprookr_db";
            $db= mysqli_connect($host, $user, $pass, $database);
        	return $db;
    }
    
}
?>