<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends Application 
{
    function __construct()
    {
        parent::__construct();
    }

    /*
        this is the manage page for the robotfactory. 
        this page is meant to manage varous "boss" activities.
    */

    function index()
    {
        $this->data['header'] = NULL;
        $this->data['pagebody'] = 'manage';
		$this->data['completeBots'] = $this->allCompleted();
		$this->render();  
    }

    function reboot()
    {
		$apiKey = $this->getApiKey();
		$response = file_get_contents('https://umbrella.jlparry.com/work/rebootme?key='.$apiKey);
		$return = explode(" ", $response)[0];
		if($return ==='Ok'){
	        $this->data['header'] = "reboot successfull";
			$this->db->empty_table('completebots');
			$this->db->empty_table('parts');
			$this->db->empty_table('saleshistory');
			$this->db->empty_table('utility');
		}
		$this->index();
    }
	
	public function getApiKey()
	{
		$query = $this->db->query("SELECT apiKey FROM utility ORDER BY counter DESC LIMIT 1");

		return ($query->result_array()[0]["apiKey"]);
	}
    function register()
    {
		$data = $this->input->post();
		$password = $this->input->post("password");
		$username = $this->input->post("username");
		if(isset($_POST['username']) && isset($_POST['password'])){
			$response = file_get_contents('https://umbrella.jlparry.com/work/registerme/'.$username.'/'.$password);
			$return = explode(" ", $response);
			echo $return[0];
			if($return[0] == 'Ok'){
		        $this->data['header'] = "REGISTERED";
				$apiKey = explode(" ", $response)[1];
			
			$data = array(
				'apiKey' => $apiKey,
				'alive' => 1
			);
			$this->db->insert("utility", $data);
			
			}
		}
		
		$this->index();
	}
	
	
	public function sellBot(){
		foreach($this->input->post() as $key=>$value){
			if(substr($key,0,4) == 'pick'){
				$head = substr($key,4);
				//$sale = $this->salesHistory->create();
				$bot = $this->completeBots->create();
				
				$bot = $this->completeBots->get($head);
				
				$torso = $bot->torsoCaCode;
				$bottom = $bot->bottomCaCode;
				
				
				$response = file_get_contents('https://umbrella.jlparry.com/work/buymybot/'.$head.'/'.$torso.'/'.$bottom);
				$return = explode(" ", $response);
				if($return[0] ==='Ok'){
					$this->completeBots->delete($head);
				}
			}
		}
	}
	
	
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
	
	//47d1c9
}