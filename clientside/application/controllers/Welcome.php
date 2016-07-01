<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('fbproject.html');
	}
    
    public function app()
    {
            $user['firstname']=$this->input->post('firstname');
            $user['lastname']= $this->input->post('lastname');
            $user['email']= $this->input->post('email');
            $user['mob']= $this->input->post('mob');
            $user['Password']=$this->input->post('Password'); 
            $user['day']=$this->input->post('day');
            $user['month']=$this->input->post('month');
            $user['year']=$this->input->post('year');
            $user['gender']=$this->input->post('gender');
           
            $url= 'http://api.baabtra.com/Sashfbserver/index.php/AppController/adduser';
            //$url='http://localhost/Sashfbserver/AppController/adduser';
            $options = array(
    					'http' => array(
        					'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        					'method'  => 'POST',
        					'content' => http_build_query($user),
    						),
    					);
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
        $json=json_decode($result,true);
        print_r($json);
       /* foreach ($json as $val)
			if($val['Msg']=="Success")
			 	$this->load->view('success');
			 //	echo $_SERVER['HTTP_HOST']."/facebook/images/fb.png";
			else
				$this->load->view('logerr');*/
    }
  /*  public function logapp()
    {
       $user['email']= $this->input->post('email');
       $user['password']=$this->input->post('password'); 
       $url= 'http://api.baabtra.com/LoginService/login.php';
            $options = array(
    					'http' => array(
        					'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        					'method'  => 'POST',
        					'content' => http_build_query($user),
    						),
    					);
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
        $json=json_decode($result,true);
        $user['data'] = $json;
        //print_r($json);
          foreach ($json as $val )
         // echo $val['vchr_user_name'];
			if($val['Msg']=="Success")
                //echo $val['Msg'];
			 	$this->load->view('success');
			 
			else if( $val['Msg']=="Password Incorrect!")
                                       
                     $this->load->view('paserr',$user);
              else if( $val['Msg']=="Email id does not exist")
                     $this->load->view('logerr',$user);
            
				
    }*/
    public function lgnval()
    {
       $user['email']= $this->input->post('email');
       $user['password']=$this->input->post('password'); 
       $url='http://localhost/Sashfbserver/Logval/lgval';
      //$url='http://api.baabtra.com/Sashfbserver/Logval/lgval';
            $options = array(
    					'http' => array(
        					'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        					'method'  => 'POST',
        					'content' => http_build_query($user),
    						),
    					);
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
        $json=json_decode($result,true);
        $user['data'] = $json;
       // print_r($json);
          foreach($json as $val){
          
         // echo $val['vchr_user_name'];
			if($val['Msg']=="Success")
                //echo $val['Msg'];
			 	$this->load->view('success');
			 
			else if( $val['Msg']=="Password Incorrect!")
                                       
                     $this->load->view('paserr',$user);
              else if( $val['Msg']=="Email id does not exist")
                     $this->load->view('logerr');
          }
				
    }
   // public function uploadcall(){
        
        
    
}
?>