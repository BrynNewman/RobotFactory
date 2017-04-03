<?php
class partsDatabase extends MY_Model {
        public function __construct()
        {
                parent::__construct('parts','partID');
        }
}