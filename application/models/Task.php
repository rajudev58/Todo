<?php

Class Task extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database('default');
    }
    public function insert(){

    }
    public function remove($id){
        $this->db->where('id', $id);
        $this->db->delete('tasks');
    }
    public function update($id){

    }
    public function readAll(){
        $query=$this->db->get('tasks');
        return $query->result();
    }
    public function read($id){

    }
}


 ?>
