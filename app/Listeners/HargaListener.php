<?php

namespace App\Listeners;
use App\Events\HargaEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use App\Pricing;
class HargaListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  HargaEvent  $event
     * @return void
     */
    public function handle(HargaEvent $event)
    {
       $sku=$event->sku;
        $pricing=Pricing::where('sku_barang',$sku)->get();
       
        if($pricing){
       return $pricing;
        }else{
          return false;
        }

    }
}
