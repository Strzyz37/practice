<?php

  defined('BASEPATH') OR exit('No direct script access allowed.');


  $this->load->view('templates/header');
  if( isset($view) ) $this->load->view($view);
  $this->load->view('templates/footer');

?>
