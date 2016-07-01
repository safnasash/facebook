<?php 
class Logval extends CI_Controller{
    public function lgval(){
       // $validate=true;
        if(isset($_REQUEST['email']) && isset($_REQUEST['password']))
        {
            $user['email']= $this->input->get_post('email');
            $user['password']=$this->input->get_post('password');
            
            $this->load->model('AppModel');
            $data=$this->AppModel->lgne($user);
            
            print_r($data);
        }
        else 
        {
            $response=array("Msg"=>"no data recieved", "status"=>10);
            //print_r($user);
            //echo json_encode($response);
        }  
          
    }
    }
?>