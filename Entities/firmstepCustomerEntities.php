<?php
class firmstepCustomerEntities
{
    public $id;
    public $type;
    public $name;
    public $service;
    public $queued_at;
	
    function __construct($id, $type, $name, $service, $queued_at) {
        $this->id = $id;
        $this->type = $type;
        $this->name = $name;
        $this->service = $service;
        $this->queued_at = $queued_at;
    }
}
?>