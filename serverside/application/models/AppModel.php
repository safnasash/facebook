<?php
class AppModel extends CI_Model{
    public function createuser($user){
        foreach(array_keys($user) as $i)
        $user[$i]=$this->db->escape($user[$i]);
        $values=implode(',',$user);
        //print_r($values);
    //$this->db->query("call registration({$values})");
    if($this->db->query("call registration({$values})"))
    $response=array("msg"=>"success");
    else
    $response=array("msg"=>"error");
    return $response;
    
    }
    public function lgne($user)
    {
        //$query=$this->db->query("select first_name,last_name,email,password from login join user on fk_login_id=login_id  where email='$user['email']' and password='$user['password']'");
       $email=$user['email'];
       /* $this->db->select('email,');
        $this->db->from('login');
        $this->db->where('$email');
        $mail=$this->db->get();*/
       // $where="email='$email'"
        $this->db->select('*');
        $this->db->from('login');
        $this->db->join('user','fk_login_id=login_id');
        $this->db->where($user);
        $query=$this->db->get();
        if($query->num_rows()==1)
        {
            /*while($fetch=$query->result_array())
            {*/
                $data[]=$query->result_array();
            //}
            $data[0]['ResponseCode']=200;
            $data[0]['Msg']="Success";
        }
        else 
        {
            $this->db->select('email,profile_pic');
            $this->db->from('login');
            $this->db->where('email',$email);
            $query=$this->db->get();
            //$a=$query->num_rows();
            //echo $a;
            //$qry=$this->db->query("select email,profile_pic from user join login on fk_login_id=login_id where email='$email'");
            if($query->num_rows()==1)
             {
                
                   $data[]=$query->result_array();
               
                $data[0]['ResponseCode']=500;
                $data[0]['Msg']="Password Incorrect!";
                 
            }
            else
            {
                $data[0]['ResponseCode']=404;
                 $data[0]['Msg']="Email id does not exist";
            }        
        }
    
    
    return json_encode($data);
    
    }
    public function verifymail($user)
    {
        $user['active']=0;
        $this->db->select('email','hash','active');
        $this->db->from('login');
       // $this->db->join('user','fk_login_id=login_id');
        $this->db->where($user);
        $query=$this->db->get();
        if($query->num_rows()==1)
        {
            $this->db->set('active',1,false);
            $this->db->where($user);
            $this->db->update('login');
            
            //$this->db->query("update login set active='1' where email='".$email."' and hash='".$hash."' and active='0' ");
            $resp[0]['msg']=" you are verified";
        }
         else
        {
          $resp[0]['msg']="The mail id is already taken";
        }
        return json_encode($resp);
    }
    
}
?>