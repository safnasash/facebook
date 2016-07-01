<?php
class AppController extends CI_Controller{
    public function adduser(){
        $validate=true;
        if(isset($_REQUEST['firstname']) && isset($_REQUEST['lastname']) && isset($_REQUEST['email']) && isset($_REQUEST['mob']) && isset($_REQUEST['Password']) && isset($_REQUEST['day']) && isset($_REQUEST['month']) && isset($_REQUEST['year']) && isset($_REQUEST['gender']))
        {
            $user['email']= $this->input->get_post('email');
            $user['password']=$this->input->get_post('Password');
            $user['first_name']=$this->input->get_post('firstname');
            $user['last_name']= $this->input->get_post('lastname');
            $user['date']=$this->input->get_post('day');
            $user['month']=$this->input->get_post('month');
            $user['year']=$this->input->get_post('year');
            $user['gender']=$this->input->get_post('gender');
            //print_r($user);
              
            $fnm=$this->input->get_post('firstname');
            $ml= $this->input->get_post('email');
            $ps= $this->input->get_post('Password');
            $mb= $this->input->get_post('mob');
            //$hash=md5(rand(0,1000));
            //$password = rand(1000,5000);
            //$yr=newDate();
             $year=date("Y");
           
            $age=$year-$user['year'];
            
           
            if(strlen($user['first_name'])<3)
            {
                $response=array("msg"=>"firstname should have atleast 3 characters","status"=>130);
                $validate=false;
            }
            else if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/",$ml))
            {
                $response=array("msg"=>"invalid mailid","status"=>120);
                $validate=false;
            }
             else if($mb != $ml)
            {
                $response=array("msg"=>"invalid mailid","status"=>121);
                $validate=false;
            }
             else if(!preg_match("/^(?=.*?[A-Z])(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{6,12}$/",$ps))
            {
               $response=array("msg"=>"password should have atleast 8 characters ,1 uppercase ,1 lowercase 1 number and 1 special charachter","status"=>101);
               $validate=false;
            }
            else if($age < 13 )
            {
               $response=array("msg"=>"registration should not be accepted..sorry","status"=>100);
               $validate=false; 
            }
            if($validate==true)
            {
               
               $user['hash']=md5(rand(0,1000));
            // print_r($user); 
               $this->load->model('AppModel');
               $response=$this->AppModel->createuser($user);
               if($response["msg"]=="success")
               {
                   $mil=$this->mailsndg($user['hash'],$user['email']);
               }
            } 
           
        }
        else
         {
            $response=array("msg"=>"no data recieved", "status"=>0);
        }
        
        
        echo json_encode($response);
     //  "^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$1%*?&]{8,}" 
    // print_r($age);
    // print_r($user);
    }
    public function mailsndg($hash,$email)
    {
      /*   $config = Array(
  'protocol' => 'smtp',
  'smtp_host' => 'ssl://smtp.googlemail.com',
  'smtp_port' => 465,
  'smtp_user' => 'safnasash@gmail.com', // change it to yours
  'smtp_pass' => 'avinash26', // change it to yours
  'mailtype' => 'html',
  'charset' => 'utf-8',
  'wordwrap' => TRUE
);
      // $message = '';
        //$this->load->library('email', $config);
      $this->email->set_newline("\r\n");*/
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.googlemail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "safnasash@gmail.com"; 
        $config['smtp_pass'] = "avinash26";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";

        $this->email->initialize($config);
         $this->email->from('safnasash@gmail.com');
         $this->email->to('muhsi154@gmail.com');
         $subject='email verification';
         $this->email->subject($subject);
         $msg="Please click this link to activate your account:
         http://localhost/Sashfbserver/AppController/verify? email='.$email.' & hash='.$hash.'";
         $this->email->message($msg);
        if($this->email->send())
        {
            echo 'send';
        } 
        else
        {
            echo $this->email->print_debugger();
        }    
    }
    
    public function verify() 
    {
        if(isset($_REQUEST['email'])&&isset($_REQUEST['hash']))  
       {
    
         $user['email']=$this->input->get_post('email');
         $user['hash']=$this->input->get_post('hash');
         
         $this->load->model('AppModel');
         $resp=$this->AppModel->verifymail($user);
         print_r($resp);
        // $response=array("msg"=>"verifydata","status"=>204);
    
      } 
      else
      {
           $response=array("msg"=>"invalid approach", "status"=>110);
           echo json_encode($response);
      }        
    
    }
    
}
?>