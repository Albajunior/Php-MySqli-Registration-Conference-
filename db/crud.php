<?php 

class crud{
    // private database object\
    private $db;
    
    //constructor to initialize private variable to the database connection
    function __construct($conn){
        $this->db = $conn;
    }
    
    // function to insert a new record into the attendee database
    public function insertAttendees($fname, $lname, $dob, $email,$contact,$specialty,$avatar_path){
       
            // define sql statement to be executed
            $sql = "INSERT INTO attendee (firstname,lastname,dateofbirth,emailaddress,contactnumber,specialty_id,avatar_path)" . "VALUES 
            ('$fname', '$lname', '$dob', '$email', '$contact','$specialty','$avatar_path')";
          
            
            $stmt = $this->db->query($sql);
            
            if(!$stmt){
               die("Could not execute");
               
            }  
     
    }


    public function getSpecialtyById($id){
       
            $sql = "SELECT * FROM `specialties` where specialty_id = $id";
            $stmt = $this->db->query($sql);
            $result = $stmt->fetch_assoc();
            return $result;      
    }
    

    public function getSpecialties(){
        
            $sql = "SELECT * FROM `specialties`";
            $result = $this->db->query($sql);
            return $result;
            if(!$result){
                die("invalid query: " );
            }     
    }


    
    public function getAttendees(){
        
            $sql = "SELECT * FROM `attendee` a inner join specialties s on a.specialty_id = s.specialty_id";
            $result = $this->db->query($sql);
            return $result;
       if(!$result){
            die("invalid query: " );
        }    
    }
    

    public function getAttendeeDetails($id){
       
            $sql = "select * from attendee a inner join specialties s on a.specialty_id = s.specialty_id 
            where attendee_id = $id";
            $stmt = $this->db->query($sql);
            $result = $stmt->fetch_assoc();
            return $result;
        if(!$result){

            return false;
        }
    }
    
    public function editAttendee($id,$fname, $lname, $dob, $email,$contact,$specialty){
      

            $sql = "UPDATE attendee SET firstname='$fname', lastname='$lname', dateofbirth='$dob', emailaddress='$email', contactnumber='$contact', specialty_id='$specialty' " . " where attendee_id=$id";

            $stmt = $this->db->query($sql);
            
            if(!$stmt){
                echo '<div class="alert alert-danger ">Error</div>';
            }else {
                return true;
            }
         
        
    }

    public function deleteAttendee($id){
       
             $sql = "delete from attendee where attendee_id = $id";

             $stmt = $this->db->query($sql);

             if(!$stmt){
                echo '<div class="alert alert-danger ">Error</div>';
            }else {
                return true;
            }
    }
}
        
?>