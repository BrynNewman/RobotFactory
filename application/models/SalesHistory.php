<?php
class salesHistory extends MY_Model {
        public function __construct()
        {
                parent::__construct('salesHistory', 'timeofTransaction');
        }
}