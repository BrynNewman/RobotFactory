<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Part extends Application {
  
  function __construct(){
    parent::__construct();
  }

  public function index(){

   
    $this->data['pagebody'] = 'part';


  }

  public function display($id){
    
    $this->load->model('parts');

    $this->data = array_merge($this->data, $this->parts->getPart($id));

    $this->data['pagebody'] = 'part';

    $this->render();
    

  }


}