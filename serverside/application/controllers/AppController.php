<?php
class AppController extends CI_Controller{
    public function adduser(){
      $user['first_name']=$this->input->post('firstname');
      $user['last_sname']= $this->input->post('lastname');
      $user['email']= $this->input->post('email');
      $user['password']=$this->input->post('password');
      $user['date']=$this->input->post('day');
      $user['month']=$this->input->post('month');
      $user['year']=$this->input->post('year');
      $user['gender']=$this->input->post('gender');
     // $this->load->model('AppModel');
     // $this->AppModel->createuser($user);
     print_r($user);
    }
}
?>