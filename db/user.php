<?php 

class user{
    private $db;
    
    function __construct($conn)
    {
        $this->db = $conn;
    }

    public function insertUser($username, $password)
    {
       
                $new_password = md5($password.$username);
             
                $sql = "INSERT INTO users (username,password)" . "VALUES ('$username','$new_password')";
            
                $stmt = $this->db->query($sql);

                if(!$stmt){
                    die("Could not execute");       
                 }else{  
                return true; }
      
    }

    public function getUser($username,$password){
  
            $sql = "select * from users where username = '$username' AND password = '$password' ";

            $stmt = $this->db->query($sql);
            $result = $stmt->fetch_assoc();
            return $result;
            if(!$result){
                echo '<div class="alert alert-danger ">Error Log</div>';
            }else {
                return true;
            }
        }
}
?>