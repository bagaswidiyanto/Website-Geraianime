<?php  
 class Daftar_username extends CI_Model  
 {  
        function is_username_available($user)  
      {  
           $this->db->where('username', $user);  
           $query = $this->db->get("sys_users");  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
     
 } 
 } 
 ?>  