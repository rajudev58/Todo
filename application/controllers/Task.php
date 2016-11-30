<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {

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


	public function remove($id){
        $this->load->model('Task_model');
        $this->Task_model->remove($id);

    }
	public function add(){
		$title = $this->input->post('title');
		$description = $this->input->post('description');
		$this->load->model('Task_model');
		if($title && $description){
			$this->Task_model->insert(['title'=>$title,'description'=>$description]);
			$this->load->helper('url');
			return redirect('');
		}
	}
	public function editDone($id){
		$done=$this->input->post('done');
		$this->load->model('Task_model');
		$this->Task_model->update($id,['done'=>$done]);
	}
	public function edit($id){

		$title =$this->input->post('title');
		$description =$this->input->post('description');
		$this->load->model('Task_model');
		$this->Task_model->update($id,['title'=>$title,'description'=>$description]);
		$this->load->helper('url');

		return redirect('');
	}
}
