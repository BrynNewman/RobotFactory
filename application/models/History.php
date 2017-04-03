<?php

/**
 * This is a "CMS" model for quotes, but with bogus hard-coded data,
 * so that we don't have to worry about any database setup.
 * This would be considered a "mock database" model.
 *
 * @author jim
 */
class history extends CI_Model {
	// The data comes from http://www.quotery.com/top-100-funny-quotes-of-all-time/?PageSpeed=noscript
	var $data = array(
		array(
			'id' => '1', 
			'purchase' => 'purchase #1', 
			'assemblies' => 'assemblies #1', 
			'shipment' => 'shipment #1',
			'time' => 'time #1'),
		array(
			'id' => '2', 
			'purchase' => 'purchase #2', 
			'assemblies' => 'assemblies #2', 
			'shipment' => 'shipment #2',
			'time' => 'time #2'),
		array(
			'id' => '3', 
			'purchase' => 'purchase #3', 
			'assemblies' => 'assemblies #3', 
			'shipment' => 'shipment #3',
			'time' => 'time #3'),
		array(
			'id' => '4', 
			'purchase' => 'purchase #4', 
			'assemblies' => 'assemblies #4', 
			'shipment' => 'shipment #4',
			'time' => 'time #4'),
		array(
			'id' => '5', 
			'purchase' => 'purchase #5', 
			'assemblies' => 'assemblies #5', 
			'shipment' => 'shipment #5',
			'time' => 'time #5'),
		array(
			'id' => '6', 
			'purchase' => 'purchase #6', 
			'assemblies' => 'assemblies #6', 
			'shipment' => 'shipment #6',
			'time' => 'time #6'),
	);
	
	// Constructor
	public function __construct()
	{
		parent::__construct();
	}

	// retrieve a single quote
	public function get($which)
	{
		// iterate over the data until we find the one we want
		foreach ($this->data as $record)
			if ($record['id'] == $which)
				return $record;
		return null;
	}
	// retrieve all of the quotes
	public function all()
	{
		return $this->data;
	}
}