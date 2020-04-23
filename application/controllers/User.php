<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{

  public function __construct() {
          parent::__construct();
            $this->load->model('UserDAO');
            $this->load->database();

  }

  public function index()
	{
		$viewData = array();

    $viewData['title'] = 'UZYTKOWNICY';

		$viewData['view'] = 'pages/user/user-list';
    $viewData['users']= $this->UserDAO->getDT();
    $editorData['edit']= $this->UserDAO->getEDT();
		$this->load->view('template', $viewData);
    $this->load->view('pages/user/modals/addDT');
    $this->load->view('pages/user/modals/editDT');
    $this->load->view('pages/user/modals/addEDT');
    $this->load->view('pages/user/editorDataTable/edit');
    $this->load->view('pages/user/dataTable/users');

	}
  public function addDT()
  {
         $user = array(
                      'id'=>NULL,
                      'first_name'=> $this->input->post('first_name'),
                      'surname'=> $this->input->post('surname'),
                      'email'=> $this->input->post('email'),
                      'modify_date'=> date('d-m-y')
        );
        $this->UserDAO->addDT($user);
  }

  public function updateDT()
  {
    $user = array(
                  'id'=>$this->input->post('id'),
                  'first_name'=>$this->input->post('first_name'),
                  'surname'=>$this->input->post('surname'),
                  'email'=>$this->input->post('email'),
                  'modify_date'=> date('d-m-y')
    );
    $this->UserDAO->updateDT($user);
  }
  public function deleteDT()
  {
    $id=$this->input->post('id');
    $this->UserDAO->deleteDT($id);
  }
  public function getDT()
  {
    $users=$this->UserDAO->getDT();
    $users = json_encode(array('usersData'=>$users));
    echo $users;
  }
  public function getEDT()
  {
    $users=$this->UserDAO->getEDT();
    $users= json_encode(array('data'=>$users));
    echo $users;
  }
  public function updateEDT()
  {
      $user = array(
                    'id'=>$this->input->post('id'),
                    'first_name'=>$this->input->post('first_name'),
                    'surname'=>$this->input->post('surname'),
                    'position'=>$this->input->post('position'),
                    'startup'=>$this->input->post('startup')
      );
      $this->UserDAO->updateEDT($user);
  }
  public function addEDT()
  {
    $user = array(
                'id'=>NULL,
                'first_name'=> $this->input->post('first_name'),
                'surname'=> $this->input->post('surname'),
                'position'=> $this->input->post('position'),
                'startup'=> $this->input->post('startup'),
        );
        $this->UserDAO->addEDT($user);
  }
  public function deleteEDT()
  {
    $id=$this->input->post('id');
    $this->UserDAO->deleteEDT($id);
  }

}
