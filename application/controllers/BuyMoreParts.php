<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BuyMoreParts extends Application {
  
  function __construct(){
    parent::__construct();
  }

  public function index(){

    $apiKey = $this->getApiKey();

    $response = file_get_contents('https://umbrella.jlparry.com/work/buybox?key='.$apiKey);

    var_dump($response);

    $newParts = json_decode($response, true);

    $this->addParts($newParts);
    $this->addHistory($newParts);

    redirect('partsFactory');
    
  }

  public function getApiKey()
  {
    $query = $this->db->query("SELECT apiKey FROM utility ORDER BY counter DESC LIMIT 1");

    return ($query->result_array())[0]["apiKey"];
  }

  public function addParts($parts)
  {

    foreach ( $parts as $part )
    {   
      $date = DateTime::createFromFormat('Y-m-d H:i:s.', $part['stamp']);

      $data = array(
        'partID' => $part['id'],
        'partCode' => ($part['model'] . $part['piece']),
        'plantBuiltAt' => $part['plant'],
        'dateTimeBuilt' => $date->format('Y-m-d H:i:s.')
        );

      $this->db->insert("parts", $data);
    }

  }

  public function addHistory($parts)
  {

    foreach ( $parts as $part )
    {   
      $date = DateTime::createFromFormat('Y-m-d H:i:s.', $part['stamp']);

      $data = array(
        'cost' => 0,
        'transactionType' => 'purchase',
        'item' => 'part',
        'model' => $part['model'],
        'piece' => $part['piece'],
        'shipment' => 'head office',
        'timeofTransaction' => $date->format('Y-m-d H:i:s.')
        );

      $this->db->insert("salesHistory", $data);
    }

  }

}