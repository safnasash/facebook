<?php
class AppModel extends CI_Model{
    public function createuser($user){
        foreach(array_keys($user) as $i)
        $user[$i]=$this->db->escape($user[$i]);
        $values=implode(',',$user);
    $this->db->query("call regstrtion({$values})");
    
    }
}
?>