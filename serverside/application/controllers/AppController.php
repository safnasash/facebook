<?php
class AppController extends CI_Controller{
    public function adduser(){
        $validate=true;
        if(isset($_REQUEST['firstname']) && isset($_REQUEST['lastname']) && isset($_REQUEST['email']) && isset($_REQUEST['mob']) && isset($_REQUEST['Password']) && isset($_REQUEST['day']) && isset($_REQUEST['month']) && isset($_REQUEST['year']) && isset($_REQUEST['gender']))
        {
            $user['email']= $this->input->post('email');
            $user['password']=$this->input->post('Password');
            $user['first_name']=$this->input->post('firstname');
            $user['last_sname']= $this->input->post('lastname');
            $user['date']=$this->input->post('day');
            $user['month']=$this->input->post('month');
            $user['year']=$this->input->post('year');
            $user['gender']=$this->input->post('gender');
            
            $ml= $this->input->post('email');
            $ps= $this->input->post('Password');
            $mb= $this->input->post('mob');
            if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/",$ml))
            {
                $response=array("msg"=>"invalid mailid","status"=>120);
                $validate=false;
            }
             else if($mb != $ml)
            {
                $response=array("msg"=>"invalid mailid","status"=>121);
                $validate=false;
            }
             else if(strlen($ps) < 6)
             {
               $response=array("msg"=>"password should have atleast 6 characters please","status"=>101);
               $validate=false;
             }
             if($validate==true)
            {
            $this->load->model('AppModel');
            $this->AppModel->createuser($user);
            } 
            $response=array("msg"=>"success");
        }
        else
         {
            $response=array("msg"=>"no data recieved", "status"=>0);
        }
        
        
        echo json_encode($response);
        
     
     //print_r($user);
    }
}
?>