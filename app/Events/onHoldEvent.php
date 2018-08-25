<?php

namespace App\Events;
class onHoldEvent extends Event
{
    public $id;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(int $id)
    {
        $this->id=$id;
 
    }
}
