<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/
	 * 	- or -
	 * 		http://example.com/welcome/index
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$role = $this->session->userdata('userrole');
		
		$partCount = 0;
		foreach($this->partsDatabase->all() as $part){
			$partCount++;
		}
		$this->data['numParts'] = $partCount;

		$botCount = 0;
		foreach($this->completeBots->all() as $bots){
			$botCount++;
		}
		$this->data['numBots'] = $botCount;

		$spent = 0;
		$earned = 0;
		foreach($this->salesHistory->all() as $sale){
			if($sale->transactionType == 'purchase')
				$spent += $sale->cost;
			if($sale->transactionType == 'sale')
				$earned += $sale->cost;
			if($sale->transactionType == 'return')
				$earned -= $sale->cost;
		}
		$this->data['moneySpent'] = $spent;
		$this->data['moneyEarned'] = $earned;

		$this->data['pagebody'] = 'homepage';
		$this->render(); 
	}
}
?>