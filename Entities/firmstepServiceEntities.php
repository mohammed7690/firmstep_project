<?php
class firmstepServiceEntities
{
    public $id;
    public $service;
	
    function __construct($id, $service) {
        $this->id = $id;
        $this->service = $service;
    }
}
?>