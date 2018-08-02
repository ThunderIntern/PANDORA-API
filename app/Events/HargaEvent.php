<?php

namespace App\Events;
class HargaEvent extends Event
{
    public $sku;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(String $sku)
    {
        $this->sku=$sku;

    }
}
