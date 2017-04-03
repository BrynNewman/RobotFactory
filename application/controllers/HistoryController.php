<?php



defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * History description
*/
class HistoryController extends Application
{
    function __construct()
    {
	parent::__construct();
    }

    public function index()
    {
		
	$this->data['pagebody'] = 'historyview'; // Show history view
		
	$source = $this->history->all();	// build the list of history, to pass on to our view 
	$history = array ();
		
	foreach ($source as $record)
	{
            // ID, Purchases, assemblies, shipments, time
            $history[] = array (
            'id' => $record['id'],
            'purchase' => $record['purchase'],
            'assemblies' => $record['assemblies'],
            'shipment' => $record['shipment'],
            'time' => $record['time']
            );
	}
        
	$this->data['history'] = $history;
	$this->render();
    }
}