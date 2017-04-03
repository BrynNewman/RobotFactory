<?php

class Parts extends CI_Model {

  private $partId;    // unique
  private $partCode;
  private $caCode;    // Cert of Authenticity
  private $plantBuiltAt;
  private $dateTimeBuilt;

  private $data = array();

  private $topParts = array(), $torsoParts = array(), $bottomParts = array();

  public function __construct() {
    parent::__construct();

    $this->getAllParts();

    $this->sort($this->data);
  }

  public function getModel($partCode){

    return substr($partCode, 0, 1);

  }

  public function getPartType($partCode){

    return substr($partCode, 1, 2);

  }

  public function getPart($partCode){

    foreach ($this->data as $part) {
      if ( $partCode == $part['partCode'])
        return $part;
    }

  }

  private function sort($data){
    
    foreach ($data as $part) {

      $pType = $this->getPartType($part['partCode']);
      $part['model'] = $this->getModel($part['partCode']);
      $part['partType'] = $pType;

      switch ($pType) {
        case '1':         
          array_push($this->topParts, $part);
        break;

        case '2':
          array_push($this->torsoParts, $part);
        break;

        case '3':
          array_push($this->bottomParts, $part);
        break;

        default:
          throw new Exception("Parts Model error in sorting"); 
      }
    }

  }

  public function getAllParts(){

    $query = $this->db->get("parts");

    foreach ($query->result() as $row)
    {
      $bot = array(
              'partId'        => $row->partID,
              'partCode'      => $row->partCode,
              'caCode'        => $row->caCode,
              'plantBuiltAt'  => $row->plantBuiltAt,
              'dateTimeBuilt' => $row->dateTimeBuilt
              );

      array_push($this->data, $bot);
    }

  }

  public function getTorsoParts(){
    return $this->torsoParts;
  }

  public function getTopParts(){
    return $this->topParts;
  }

  public function getBottomParts(){
    return $this->bottomParts;
  }
}