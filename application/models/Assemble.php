<?php

/*
* assemble class
* takes information from the database and makes it usable by the webpage
*/
class Assemble extends CI_Model{
	
	/*
	* makes all of the part data able to be used by the webpage
	*/
	public function all(){
		$parts="";
 		foreach($this->partsDatabase->all() as $part){
			$parts[] = array(
				'part'			=>	$part->partID,
				'partCode'		=>	$part->partCode,
				'caCode'		=>	$part->partID,
				'plantBuiltAt'	=>	$part->plantBuiltAt,
				'dateTimeBuilt'	=>	$part->dateTimeBuilt
			); 
		}
			return $parts;
	}
	
	/*
	* determines whether a part is a head torso or body
	*/
		public function getPartType($partCode){
		if(substr($partCode, 1, 2) == 1){
			return "head";
		}else if(substr($partCode, 1, 2) == 2){
			return "torso";
		}else if(substr($partCode, 1, 2) == 3){
			return "bottom";
		}
		return substr($partCode, 1, 2);
	}
	
	public function getModel($type){ 
		return substr($type,0,1);
	}
	
	/*
	* gets the information from the database and uses that to filter by model a,b,c,w,r
	*/
	public function getByModel($type){
		$parts="";
		foreach($this->partsDatabase->all() as $part){
			if(substr($part->partCode,0,1) == $type || substr($part->partCode,0,1) == strtolower($type) )
				$parts[] = array(
				'part'			=>	$part->partID,
				'partCode'		=>	$part->partCode,
				'caCode'		=>	$part->partID,
				'plantBuiltAt'	=>	$part->plantBuiltAt,
				'dateTimeBuilt'	=>	$part->dateTimeBuilt
			);
				
		}
		return $parts;
	}
	
	/*
	* gets all of the completed bots out of the database and able to be desplayed
	*/
	public function allCompleted(){
		$bots="";
 		foreach($this->completeBots->all() as $bot){
			$bots[] = array(
				'model'			=>	$bot->model,
				'headCaCode'		=>	$bot->headCaCode,
				'torsoCaCode'		=>	$bot->torsoCaCode,
				'bottomCaCode'	=>	$bot->bottomCaCode,
			); 
		}
			return $bots;
	}
	
	
	
	
	
	
	
}