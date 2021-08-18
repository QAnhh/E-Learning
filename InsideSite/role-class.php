<?php
class role_user
{
	private $db;
 
    function __construct($conn)
    {
      $this->db = $conn;
    }
    public function ktQuyenThem()
    {
    	if($_SESSION['role'] & 1 !=0)
    		return true;
    	else 
    		return false;
    }
    public function ktQuyenSua()
    {
    	if(($_SESSION['role']>>1) & 1 !=0)
    		return true;
    	else 
    		return false;
    }
    public function ktQuyenXoa()
    {
    	if(($_SESSION['role']>>2) & 1 !=0)
    		return true;
    	else 
    		return false;
    }
}
?>