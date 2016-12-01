<?php

Class Task_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database('default');
    }
    public function insert($args=array()){
        if($args){
            $this->db->insert('tasks',$args);
        }
    }
    public function remove($id){
        $this->db->where('id', $id);
        $this->db->delete('tasks');
    }
    public function update($id,$data){
        $this->updated_at($id);
        $this->db->where('id', $id);
        $this->db->update('tasks',$data);
        echo $this->db->last_query();
    }
    public function readAll(){
        $query=$this->db->get('tasks');
        return $query->result();
    }
    public function read($id){

    }
    public function updated_at($id){
        $this->db->query("update tasks set updated_at=now()  where id=".$id." ");
    }
}


 ?>
