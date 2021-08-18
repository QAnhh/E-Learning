<?php
class USER
{
    private $db;
 
    function __construct($conn)
    {
      $this->db = $conn;
    }
 
    public function register($code,$password,$name,$gender,$email,$phone,$address)
    {
       try
       {
           $new_password = password_hash($password, PASSWORD_DEFAULT);
           $sql = "INSERT INTO students(code,password,name,gender,email,phone,is_active,address) 
                                                       VALUES('".$code."','".$new_password."','".$name."','".$gender."','".$email."','".$phone."',0,'".$address."')";
           $stmt = $this->db->prepare($sql);
           $stmt->execute(); 
   
           return $stmt; 
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }
 
    public function login($code,$password)
    {
       try
       {
          $sql = "SELECT * FROM students WHERE code like '".$code."' LIMIT 1";
          $stmt = $this->db->prepare($sql);
          $stmt->execute(array(':code'=>$code));
          $row=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
             if(password_verify($password, $row['password']))
             {
                $_SESSION['user'] = $row['user'];
                return true;
             }
             else
             {
                return false;
             }
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
 
   public function is_loggedin()
   {
      if(isset($_SESSION['user']))
      {
         return true;
      }
      return false;
   }
 
   public function logout()
   {
        session_destroy();
        unset($_SESSION['user']);
        return true;
   }
}
?>