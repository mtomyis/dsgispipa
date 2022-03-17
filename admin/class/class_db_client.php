<?php

class database_client
{
   private $con;
   private $host = "localhost";
   private $user = "root"; 
   /*private $host = "128.199.206.70";
   private $user = "tguh"; 
   private $passwd = "tguh64111";*/
   private $db = "gis_pipa";
   
   function __construct(){
        $this->start_con();
   }
   function start_con(){
       if(!$this->con = new mysqli($this->host,$this->user,$this->passwd,  $this->db))
              die('Can not connect mysql server');
   }
   function close_con(){
       return mysqli_close($this->con);
   }
   function sqlquery($sql){
       if(!$this->con = new mysqli($this->host,$this->user,$this->passwd,  $this->db))
              die('<h1>Can not connect mysql server</h1>');
       //mysql_select_db($this->db);
	return $this->con->query($sql);
   }
   function jumrec($sql){ //jumlah hasil
	   if($hasil=$this->sqlquery($sql))
                    $jum=$hasil->num_rows;
            else
                    $jum=0;
	   return $jum;
   }
   function datasql($sql){
            $data = array();
	     if($hasil=$this->sqlquery($sql))
		 	$data=$hasil->fetch_array(MYSQL_BOTH);
            return $data;
   }
   function fetchdata($sql){
   		 $res = array();
	     if($hasil=$this->sqlquery($sql))
			 while($data=$hasil->fetch_array()){
				$res[] = $data;
			 }
		 return $res;
   }

}
?>
