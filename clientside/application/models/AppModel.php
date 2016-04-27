<?php
class AppModel extends CI_Model{
    public function createuser($user){
    $this->db->insert($user);
    //insert('vchr_fname'=>'safna',)
    }
}
?>