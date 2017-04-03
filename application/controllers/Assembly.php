<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
*	Assembly controller class runs the assembly page
*/
class Assembly extends Application
{
	function __construct()
	{
		parent::__construct();
	}
	
	/*
	*	index function sets up begining data loads in the Assemble model
	*	gets the default and filtered pages when needed
	*/
	public function index()
	{
		$filter = $this->session->userdata('filter');
		$this->data['pagebody'] = 'assembly';
		$this->load->model('Assemble');
		$stock = $this->Assemble->all();
		$bots = $this->Assemble->allCompleted();
		
		$this->data['hasBots'] = NULL;
		$this->data['hasParts'] = NULL;
		
		
		if($filter != FILTER_ALL){
			$a = $this->Assemble->getByModel($filter);
			if($a != NULL){
				$this->data['partTable'] = $a;
			}else {
				$this->data['hasParts'] = "no parts in stock";
				$this->data['partTable'] = $stock;
			}
		}else{
			$this->data['partTable'] = $stock;
		}
		
		$this->data['completeBots'] = $bots;


		$this->render();		
	}
	
	/*
	* finds out which button was pressed in the form 
	*/
	function pressed(){
		if(isset($_POST['build'])){
			$this->build();
		}else if(isset($_POST['return'])){
			$this->returnPart();
		}
		$this->index();
	}
	
	/*
	* the build function for when the build button is pressed 
	* checks to see if a top bottom and torso have been picked
	* checks to see if thats all thats been picked
	* removes the items and adds a new completed bot with their caCodes
	*/
	function build(){
		$this->load->model('Assemble');
		$botHead ="";
		$botTorso ="";
		$botBottom = "";
		$completedBot ="";
		$count=0;
		foreach($this->input->post() as $key=>$value){
			if(substr($key,0,4) == 'pick'){
				$partID = substr($key,4);
				$count++;
				$part = $this->partsDatabase->get($partID);
			
				if($this->Assemble->getPartType($part->partCode)== "head" && $botHead == NULL){
					$botHead =  $part;
				}
				if($this->Assemble->getPartType($part->partCode) == "torso" && $botTorso == NULL){
					$botTorso = $part;
				}
				if($this->Assemble->getPartType($part->partCode) == "bottom" && $botBottom == NULL){
					$botBottom = $part;
				}
			}
		}
		if($botHead != NULL && $botTorso != NULL && $botBottom != NULL && $count == 3){
			$completedBot = $this->completeBots->create();
			$sale = $this->salesHistory->create();
			
			if(substr($botHead->partCode,0,1) == substr($botTorso->partCode,0,1) && substr($botTorso->partCode,0,1) == substr($botBottom->partCode,0,1))
				$completedBot->model = substr($botHead->partCode,0,1);
			
			$completedBot->headCaCode = $botHead->caCode;
			$completedBot->torsoCaCode = $botTorso->caCode;
			$completedBot->bottomCaCode = $botBottom->caCode;
			$this->completeBots->add($completedBot);
			$this->partsDatabase->delete($botHead->partID);
			$this->partsDatabase->delete($botTorso->partID);
			$this->partsDatabase->delete($botBottom->partID);	
			
			$sale->transactionType = "Building";
			$sale->item = "bot";
		if($completedBot->model == 'A'|| $completedBot->model == 'B' || $completedBot->model == 'C'){// || $completedBot->model == 'D'|| $completedBot->model == 'E' || $completedBot->model == 'F' || $completedBot->model == 'G'|| $completedBot->model == 'H' || $completedBot->model == 'I' || $completedBot->model == 'J'|| $completedBot->model == 'K' || $completedBot->model == 'L'){
			$sale->series = "household";
			$sale->model = $completedBot->model;
		}else if($completedBot->model == 'M'|| $completedBot->model == 'R' || $completedBot->model == 'V'){
			$sale->series = "butler";
			$sale->model = $completedBot->model;
		}else if($completedBot->model == 'Z'|| $completedBot->model == 'X' || $completedBot->model == 'W'){
			$sale->series = "companion";
			$sale->model = $completedBot->model;
		}
		$sale->timeofTransaction = $nowFormat = date('Y-m-d H:i:s');
		$this->salesHistory->add($sale);
		}
		
	}
	
	/*
	* return part function if the return to headquarters button has been pressed
	* removes a part from the database
	*/
	function returnPart(){
		$this->load->model('Assemble');
		foreach($this->input->post() as $key=>$value){
			if(substr($key,0,4) == 'pick'){
				$partID = substr($key,4);
				$sale = $this->salesHistory->create(); 
				$part = $this->partsDatabase->get($partID);
				
				$sale->cost = 5;
				$sale->transactionType = "return";
				$sale->item = "part";
				$sale->model = $this->Assemble->getModel($part->partCode);
				$sale->piece = $this->Assemble->getPartType($part->partCode);
				$sale->timeofTransaction = $nowFormat = date('Y-m-d H:i:s');
				
				
				$this->salesHistory->add($sale);
				$this->partsDatabase->delete($part->partID);
			}
		}
	}
}