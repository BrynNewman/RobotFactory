<?php

class Team extends CI_Model
{
    private $team = array(
        array(
            'id' => 'jcoughlan',
            'name' => 'Jay Coughlan',
            'face' => 'jcoughlan.jpg',
            'quote' => 'Yes, I exist',
            'blurb' => 'jblurb.txt'
        ),

        array(
            'id' => 'bnewman',
            'name' => 'Bryn Newman',
            'face' => 'bnewman.jpg',
            'quote' => 'Howdy do?',
            'blurb' => 'jblurb.txt'
        ),

        array(
            'id' => 'glittle',
            'name' => 'Greg Little',
            'face' => 'jcoughlan.jpg',
            'quote' => 'Gwent, man, gwent.',
            'blurb' => 'jblurb.txt'
        ),

        array(
            'id' => 'ahristea',
            'name' => 'Andrei Hristea',
            'face' => 'jcoughlan.jpg',
            'quote' => 'Sweet home Alabama!',
            'blurb' => 'jblurb.txt'
        ),

        array(
            'id' => 'rdionglay',
            'name' => 'Renz Dionglay',
            'face' => 'jcoughlan.jpg',
            'quote' => '...',
            'blurb' => 'jblurb.txt'
        )
    );

    public function getMember($which)
    {
        foreach($this->team as $record)
            if($record['id'] == $which)
                return $record;
        return null;
    }

    public function all()
    {
        return $this->team;
    }
}